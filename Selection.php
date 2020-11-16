<html>
    <head>
        <title>Selection Request</title>
        <h1>CREATE TABLE Has_Manager(      ManagerID INTEGER, 
Name_MSC CHAR(20) NOT NULL,
CEO CHAR(20) NOT NULL,
Name_m CHAR(20),
Workforce INTEGER,
PRIMARY KEY ManagerID,
FOREIGN KEY (CEO, Name_MSC) REFERENCES Manage_MSC(CEO, Name_MSC) ON DELETE CASCADE) </h1>
    </head>

    <body>
        <h2>Select tuples with input Id and parameter from the Has_Manager Table</h2>
        <form method="POST" action="Selection.php"> <!--refresh page when submitted-->
            <select name="type">
               <option value="Name_MSC">Name_MSC</option>
               <option value="CEO">CEO</option>
               <option value="ManagerID">ManagerID</option>
               <option value="Workforce">Workforce</option>
            </select>
            operator <input type="text" name="operator"> value <input type="text" name="value">
            <input type="submit" value="SelectButton" name="Select"></p>
        </form>

        <hr />

        <h2>Display the Tuples in Has_Manager Table</h2>
        <form method="POST" action="Selection.php"> <!--refresh page when submitted-->
            <input type="submit" id="displayTupleRequest" name="displayTupleRequest">
    
        </form>
        <?php
        //this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

            return $statement;
        }

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
        In this case you don't need to create the statement several times. Bound variables cause a statement to only be
        parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
        See the sample code below for how this function is used */

            global $db_conn, $success;
            $statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
                }

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table demoTable:<br>";
            echo "<table>";
            echo "<tr><th> ManagerID</th><th>Name_MSC</th><th>Name_mCEO</th><th>Workforce</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
               echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] 
            . "</td><td>" ; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
            // ora_platypus is the username and a12345678 is the password.
            // $db_conn = OCILogon("ora_lyuchenh", "a95094207", "dbhost.students.cs.ubc.ca:1522/stu");
            $db_conn = OCILogon("ora_zhuoyil", "a37859600", "dbhost.students.cs.ubc.ca:1522/stu");
            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleSelectionRequest() {
             global $db_conn;
            $query = "SELECT * FROM Has_Manager WHERE {$_POST['type']} {$_POST['operator']} {$_POST['value']}";
            $result = executePlainSQL($query);
            printResult($result);
            OCICommit($db_conn);
        }
            
        function handledisplayRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Has_Manager");
                printResult($result);
                
            }

       
        if (isset($_POST['Select'])) {
            if(connectToDB()) {
                handleSelectionRequest();
                disconnectFromDB();
            } 
        } else if (isset($_GET['displayTupleRequest'])) {
            if(connectToDB()) {
                handledisplayRequest();
                disconnectFromDB();
            }
        } else if (isset($_POST['DEMO_redirect'])) {
            header('Location: https://www.students.cs.ubc.ca/~maxonzz/military-system/demo_page.php');
            exit;
        } 
        ?>
    </body>
</html>

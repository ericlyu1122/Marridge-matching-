<html>
    <head>
        <title>Join Request</title>
        <h1></h1>
    </head>

    <body>
        <h2>Reset</h2>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>

        <form method="POST" action="Join.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <hr />

        <h2>Join Has_Manager table with Matchmaker_manage table</h2>
        <form method="POST" action="Join.php"> <!--refresh page when submitted-->
            <select name="atable">
               <option value="Name_MSC">Name_MSC</option>
               <option value="CEO">CEO</option>
               <option value="Name_m">Name_m</option>
               <option value="ManagerID">ManagerID</option>
               <option value="Workforce">Workforce</option>
            </select>
            operator <input type="text" name="operator"> value <input type="text" name="value">
        
            <input type="submit" value="JoinButton" name="joinSubmit"></p>
        </form>

        <hr />

        <h2>Display the Tuples in Has_Manager Table</h2>
        <form method="GET" action="Join.php"> <!--refresh page when submitted-->
            <input type="submit" id="displayTupleRequest" name="displayTupleRequest">
    
        </form>

         <hr />
         
          <h2>Display the Tuples in Matchmaker_manage Table</h2>
        <form method="GET" action="Join.php"> <!--refresh page when submitted-->
            <input type="submit" id="displayTupleRequest2" name="displayTupleRequest2">
    
        </form>
    
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

    function printJoinResult($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from joined table :<br>";
        echo "<table>";
        $flag = FALSE;

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr>";
            if (!$flag) {
                foreach (array_keys($row) as $column) {
                    if (!is_numeric($column)) {
                        echo "<th>$column</th>";
                    }
                }
                $flag = TRUE;
            }
            echo "</tr>";
            echo "<tr>";
            for ($i = 0; $i <= count($row); $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }


         function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table Has_Manager:<br>";
            echo "<table>";
           echo "<tr><th> ManagerID </th><th>Name_MSC </th><th>Name_mCEO </th><th>Workforce </th></tr>";

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


        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE Has_Manager");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE Has_Manager (ManagerID int PRIMARY KEY, Name_MSC char(20) NOT NULL,CEO char(20) NOT NULL,Name_m char(20),Workforce int)");
            OCICommit($db_conn);
        }

        function handleJoinRequest() {
             global $db_conn;
    
        $result=executePlainSQL("SELECT * FROM Has_Manager H, Matchmaker_manage M WHERE {$_POST['atable']} {$_POST['operator']} {$_POST['value']} AND H.ManagerID = M.ManagerID");
        printJoinResult($result);
        OCICommit($db_conn);
        }
            
        function handledisplayRequest() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Has_Manager");
                printResult($result);
                
            }
        
        function handledisplayRequest2() {
                global $db_conn;

                $result = executePlainSQL("SELECT * FROM Mathchmaker_manage");
                printResult($result);
                
            }

       

        // HANDLE ALL POST ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                }

                disconnectFromDB();
            }
        }


        if (isset($_POST['reset'])) {
            handlePOSTRequest();
        } else if (isset($_GET['displayTupleRequest'])) {
            if(connectToDB()) {
                handledisplayRequest();
                disconnectFromDB();
            }
        } else if(isset($_POST['joinSubmit'])){
            if(connectToDB()){
                handleJoinRequest();
                disconnectFromDB();
            }
        }
        else if(isset($_GET['displayTupleRequest2'])){
              if(connectToDB()) {
                handledisplayRequest2();
                disconnectFromDB();
            }
        }
        else if (isset($_POST['DEMO_redirect'])) {
            header('Location: https://www.students.cs.ubc.ca/~maxonzz/military-system/demo_page.php');
            exit;
        }
        ?>
    </body>
</html>

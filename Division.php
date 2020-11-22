
<html>
    <style>
        head {
            font-size:40px;
        }
        body{
        background-image: url('background_ocean.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        }
        
    </style>

<head >
    <title>CPSC 304 PHP/Oracle Demonstration</title>
    <h1>Division Request</h1>
</head>


<body >
    <div class="content">
        <h2>Division </h2>
        <form method="GET" action="Division.php">
            <!--refresh page when submitted-->
            <input type="hidden" id="requestDivision" name="requestDivision">
            Find the name of the MSCs(Marriage Service Coorperations) that has all the managers.<br /><br />

            <input type="submit" value="clickDivision" name="clickDivision"></p>
        </form>

        <hr />
        <h2>Result:</h2>

        <form method="GET" action="Division.php">
            <!--refresh page when submitted-->
            <input type="submit" value="List all the tuples in Manage_MSC table and in Has_Manager table" name="display_result"></p>
        </form>
        <hr />
        <form method="POST" action="demo_page.php">
            <!--refresh page when submitted-->
            <input type="submit" value="BACK TO Main PAGE" name="DEMO_redirect"></p>
        </form>

   

        <?php
        //this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message)
        {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr)
        { //takes a plain (no bound variables) SQL command and executes it
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

        function executeBoundSQL($cmdstr, $list)
        {
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
                    unset($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
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

        function printDivisionResult($result)
        { //prints results from a select statement
            echo "<br>The name of the MSCs(Marriage Service Coorperations) that manage all the managers is(are):<br>";
            echo "<table>";
            echo "<tr><th>Name_MSC </th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td></tr>"; 
                // echo $row[0];
            }

            echo "</table>";
        }

        function printResultHas_Manager($result)
        { //prints results from a select statement
            echo "<br>Retrieved data from table Has_Manager:<br>";
            echo "<table>";
            echo "<tr><th>ManagerID </th><th>Name_MSC </th><th>CEO </th><th>M_Name </th><th>Workforce </th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" 
                . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4]."</td></tr>"; 
                // echo $row[0];
            }

            echo "</table>";
        }

        function printResultManage_MSC($result)
        { //prints results from a select statement
            echo "<br>Retrieved data from table Manage_MSC:<br>";
            echo "<table>";
            echo "<tr><th>Name_MSC </th><th>CEO </th><th>ClubName </th><th>DA_Name </th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" 
                . $row[2] . "</td><td>" . $row[3] ."</td></tr>"; 
                // echo $row[0];
            }

            echo "</table>";
        }

        
        function connectToDB()
        {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
            // ora_platypus is the username and a12345678 is the password.
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

        function disconnectFromDB()
        {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleDivision()
        {
        
            $result = executePlainSQL(" SELECT mmsc.Name_MSC
                                        FROM Manage_MSC mmsc 
                                        WHERE NOT EXISTS 
                                            ((SELECT hm.ManagerID 
                                            FROM Has_Manager hm) 
                                            MINUS
                                            (SELECT hm2.ManagerID
                                            FROM Has_Manager hm2 
                                            WHERE hm2.Name_MSC = mmsc.Name_MSC AND hm2.CEO = mmsc.CEO))");
            
            printDivisionResult($result);
        }

        if (isset($_GET['clickDivision'])) {
            if (connectToDB()) {
                handleDivision();
                disconnectFromDB();
            }
        } else if (isset($_GET['display_result'])) {
            if (connectToDB()) {
                $result = executePlainSQL("SELECT * FROM Manage_MSC");
                printResultManage_MSC($result);
                $result2 = executePlainSQL("SELECT * FROM Has_Manager");
                printResultHas_Manager($result2);
                disconnectFromDB();
            }
        } else if (isset($_POST['DEMO_redirect'])) {
            header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/demo_page.php');
            exit;
        }
        ?>
    </div>
</body>

</html>
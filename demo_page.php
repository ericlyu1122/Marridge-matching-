<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
            function opentab(evt, tabname) {
                    // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(tabname).style.display = "block";
                evt.currentTarget.className += " active";
            }
    </script>
    <style>

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: "Lucida Console", Courier, monospace;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
            background-image: url("backgroup_ocean.jpg");

            /* Add the blur effect */
            filter: blur(3px);
            -webkit-filter: blur(3px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            /* background-position: center; */
            background-position: 50% 25%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }

        
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #FFEFD5;
            }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body style="color:white;">
<div class="tab">
  <button class="tablinks" onclick="opentab(event, 'Insert')">Insert</button>
  <button class="tablinks" onclick="opentab(event, 'Delete')">Delete</button>
    <button class="tablinks" onclick="opentab(event, 'Update')">Update</button>
    <button class="tablinks" onclick="opentab(event, 'Selection')">Selection</button>
    <button class="tablinks" onclick="opentab(event, 'Projection')">Projection</button>
    <button class="tablinks" onclick="opentab(event, 'Join')">Join</button>
    <button class="tablinks" onclick="opentab(event, 'Aggregation Having')">Aggregation Having</button>
    <button class="tablinks" onclick="opentab(event, 'Nested Aggregation')">Nested Aggregation</button>
    <button class="tablinks" onclick="opentab(event, 'Aggregation Group By')">Aggregation Group By</button>
    <button class="tablinks" onclick="opentab(event, 'Division')">Division</button>

</div>

<!-- Tab content -->


<div id="Insert" class="tabcontent">
  <h3><font size="3" face="Lucida Console" color="black"> Insert</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
  Insert tuples into the Has_Manager Table:
    <br>    INSERT
    <br>    INTO Has_Manager
    <br>    VALUES(123, "Huang's Marriage.Co","Steven Huang","Patrick Huang",20	")</p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Insert.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Insert" />  
</form>
</div>

<div id="Delete" class="tabcontent">
  <h3> Delete</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
  Delete tuples in the Has_Manager Table:  
    <br>    Delete
    <br>    FROM Has_Manager 
    <br>    WHERE ManagerID=123</p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Delete.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Delete" />  
</form>
</div>

<div id="Update" class="tabcontent">
  <h3> Update</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
   Update values in the Customer_advises Table:  
      <br>  UPDATE
      <br>  FROM Customer_advises
      <br>  SET Name= Eric Lyu
      <br>  WHERE MemberID = 22331
 </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Update.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Update" />  
</form>
</div>

<div id="Selection" class="tabcontent">
  <h3> Selection</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
   Select values from the Has_Manager Table: 
      <br>  SELECT * 
      <br>  FROM Has_Manager
      <br>  WHERE workforce > 10

    </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Selection.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Selection" />  
</form>
</div>

<div id="Projection" class="tabcontent">
  <h3> Projection</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
    List all Matchmakers' name in MatchMaker_manage
     <br>   SELECT name
     <br>   FROM MatchMaker_manage

    </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Projection.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Projection" />  
</form>
</div>

<div id="Join" class="tabcontent">
  <h3> Join</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
      Join the Has_Manager table with Matchmaker_manage table and user need to provide an operator and a number to qualify Workforce in the WHERE clause:
      <br>  SELECT * 
      <br>  FROM Has_Manager H, Matchmaker_manage M 
      <br>  WHERE workforce > 10 AND H.ManagerID = M.ManagerID
      </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Join.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Join" />  
</form>
</div>

<div id="Aggregation Having" class="tabcontent">
  <h3> Aggregation Having</h3>
  <p> <font size="2" face="Lucida Console" color="black">
      Find the maximum age for each occupations where there have more than one person: 
        <br>    SELECT Occupation,MAX(age) AS maxage
        <br>    FROM Customer_advises 
        <br>    GROUP BY Occupation
        <br>    HAVING COUNT(*)>1;
      </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_having.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Aggregation Having" />  
</form>
</div>

<div id="Nested Aggregation" class="tabcontent">
  <h3> Nested Aggregation</h3>
   <p> <font size="2" face="Lucida Console" color="black"> 
       Find those occupations for which thier minimum age is strictly below the average of the minimum age over all occupations.
    <br>WITH tmp AS (SELECT Occupation, MIN(Age) AS minage
    <br>            FROM Customer_advises  
    <br>            GROUP BY Occupation) 
    <br>SELECT tmp.Occupation, tmp.minage
    <br>FROM tmp
    <br>WHERE tmp.minage < (SELECT AVG(tmp.minage) FROM tmp) </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/NestedAggregation.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Nested Aggregation" />  
</form>
</div>


<div id="Aggregation Group By" class="tabcontent">
  <h3> Aggregation with Group By</h3>
  <p> <font size="2" face="Lucida Console" color="black">
    Find the maximum age for each occupation in Customer_advises table: 
        <br>    SELECT Occupation,MAX(age) AS maxage
        <br>    FROM Customer_advises 
        <br>    GROUP BY Occupation;
     </p>
<form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_groupby.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Aggregation Group By" />  
</form>
</div>

<div id="Division" class="tabcontent">
  <h3> Division</h3>
  <p> <font size="2" face="Lucida Console" color="black"> 
Find the name of the MSCs(Marriage Service Coorperations) that has all the managers.
    <br>SELECT mmsc.Name_MSC
    <br>FROM Manage_MSC mmsc 
    <br>WHERE NOT EXISTS 
        <br>    ((SELECT hm.ManagerID 
        <br>    FROM Has_Manager hm) 
        <br>    MINUS
        <br>    (SELECT hm2.ManagerID
        <br>    FROM Has_Manager hm2 
        <br>    WHERE hm2.Name_MSC = mmsc.Name_MSC AND hm2.CEO = mmsc.CEO));</p>
        
   <form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Division.php">
    <!--refresh page when submitted-->
     <input type="submit" value="Go to Division" />  
</form>
</div>




    <div class="bg-image"></div>

    <div class="bg-text">
        <!-- <P><font face="Lucida Console" color="white"><P>
        <h2>Marriage Matching Corporation</h2> -->
        <!-- <h1 style="font-size:50px">CPSC 304 PHP/Oracle Demonstration</h1> -->
        <p>
            <font size="7" face="Lucida Console" color="white">Marriage Matching Corporation<p>
                
             <form action="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/cover_page.php">
             <!--refresh page when submitted-->
             <input type="submit" value="Go to Cover" />                 
                </p>
                </form>
    </div>


</body>

</html>

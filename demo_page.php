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
  <button class="tablinks" onclick="opentab(event, 'Reset')">Reset</button>
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
<div id="Reset" class="tabcontent">
  <h3> Reset</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/reset.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Reset" name="RES_redirect"></p>
</form>
</div>

<div id="Insert" class="tabcontent">
  <h3> Insert</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Insert.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Insert" name="INS_redirect"></p>
</form>
</div>

<div id="Delete" class="tabcontent">
  <h3> Delete</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Delete.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Delete" name="DEL_redirect"></p>
</form>
</div>

<div id="Update" class="tabcontent">
  <h3> Update</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Update.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Update" name="UPD_redirect"></p>
</form>
</div>

<div id="Selection" class="tabcontent">
  <h3> Selection</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Selection.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Selection" name="SEL_redirect"></p>
</form>
</div>

<div id="Projection" class="tabcontent">
  <h3> Projection</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Projection.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Projection" name="PROJ_redirect"></p>
</form>
</div>

<div id="Join" class="tabcontent">
  <h3> Join</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Join.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Join" name="JOIN_redirect"></p>
</form>
</div>

<div id="Aggregation Having" class="tabcontent">
  <h3> Aggregation Having</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_having.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Aggregation Having" name="AGGH_redirect"></p>
</form>
</div>

<div id="Nested Aggregation" class="tabcontent">
  <h3> Nested Aggregation</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/NestedAggregation.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Aggregation Group By" name="AGN_redirect"></p>
</form>
</div>


<div id="Aggregation Group By" class="tabcontent">
  <h3> Aggregation Group By</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_groupby.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Aggregation Group By" name="AGGB_redirect"></p>
</form>
</div>

<div id="Division" class="tabcontent">
  <h3> Division</h3>
  <p> "https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Division.php" </p>
<form method="POST" action="demo_page.php">
    <!--refresh page when submitted-->
    <input type="submit" value="Go to Division" name="DIV_redirect"></p>
</form>
</div>




    <div class="bg-image"></div>

    <div class="bg-text">
        <h1 style="font-size:50px;color:white;">Marriage Matching Corporation</h1>

        <form method="POST" action="demo_page.php">
            <!--refresh page when submitted-->
            <input type="submit" value="Back to Cover Page" name="START_redirect"></p>
        </form>
    </div>



    <?php

    if (isset($_POST['START_redirect'])) {
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/cover_page.php');
        exit;
    }elseif(isset($_POST['DIV_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Division.php');
        exit;
    }elseif(isset($_POST['AGGB_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_groupby.php');
        exit;
    }elseif(isset($_POST['AGN_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/NestedAggregation.php');
        exit;
    }elseif(isset($_POST['AGGH_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_having.php');
        exit;
    }elseif(isset($_POST['JOIN_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Join.php');
        exit;
    }elseif(isset($_POST['PROJ_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Projection.php');
        exit;
    }elseif(isset($_POST['SEL_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Selection.php');
        exit;
    }elseif(isset($_POST['UPD_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Update.php');
        exit;
    }elseif(isset($_POST['DEL_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Delete.php');
        exit;
    }elseif(isset($_POST['INS_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Insert.php');
        exit;
    }elseif(isset($_POST['RES_redirect'])){
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/reset.php');
        exit;
    }

    ?>
</body>

</html>

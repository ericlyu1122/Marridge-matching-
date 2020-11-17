<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 5px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>

<body style="color:white;">

    <div class="dropdown">
        <button class="dropbtn">Select Operation</button>
        <div class="dropdown-content">
            <!-- <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/reset.php">Reset</a></p> -->

            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Insert.php">Insert</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Delete.php">Delete</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Update.php">Update</a></p>

            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Selection.php">Selection</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Projection.php">Projection</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Join.php">Join</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_having.php">Aggregation Having</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/NestedAggregation.php">Nested Aggregation</a></p>
 
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Aggregation_groupby.php">Aggregation Group By</a></p>
            <p><a href="https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/Division.php">Division</a></p>
            
        </div>
    </div>

    <div class="bg-image"></div>

    <div class="bg-text">
        <h1 style="font-size:50px;color:white;">Marriage Matching Corporation</h1>

        <form method="POST" action="demo_page.php">
            <!--refresh page when submitted-->
            <input type="submit" value="BACK TO COVER PAGE" name="START_redirect"></p>
        </form>
    </div>



    <?php

    if (isset($_POST['START_redirect'])) {
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/cover_page.php');
        exit;
    }

    ?>
</body>

</html>

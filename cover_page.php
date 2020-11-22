<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <title>Where There is Love There is Life</title>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: "Lucida Console", Courier, monospace;
        }

        * {
            box-sizing: border-box;
        }

        body{
            /* The image used */
            background-image: url("background_ocean.png");

            /* Full height */
            height: 100%;
            background-position: center;
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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }


    .marginauto {
        margin: 150px auto 10px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        height: 50%; 
        width: 50%;
    }
    </style>
</head>

<body>

<div>
    <img class="marginauto" src="marriage-Greece.jpg" alt="centered image" />
</div>
    <div class="bg-text">
        <!-- <P><font face="Lucida Console" color="white"><P>
        <h2>Marriage Matching Corporation</h2> -->
        <!-- <h1 style="font-size:50px">CPSC 304 PHP/Oracle Demonstration</h1> -->
        <p>
            <font size="5" face="Lucida Console" color="white">Marriage Matching Corporation<p>
                    <p>
                        <font size="6" face="Lucida Console" color="white">CPSC 304 PHP/Oracle Demonstration
                    </p>
                    <p>
                        <font size="5" face="Lucida Console" color="white"> Eric Lyu, Steven Huang, Zoey Li
                    </p>
                    <form method="POST" action="cover_page.php">
                        <!--refresh page when submitted-->
                        <input type="submit" value="START" name="START_redirect">
                </p>
                </form>
    </div>

    <?php

    if (isset($_POST['START_redirect'])) {
        
        header('Location: https://www.students.cs.ubc.ca/~zhuoyil/Marridge-matching-/demo_page.php');
        exit;
    }
    ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/includes/css_index.css" />
    <title>PHP Incremental Loop || Matthew Moore</title>
</head>

<body>
    <div class="header">PHP // matthewmoore.pro</div>

    <div class="content">

    <div class="left">
        <?php include '../includes/nav_site.php';?>
        <hr />
        <?php include '../includes/nav_projects.php';?>
        <hr />
    </div>

    <div class="main">
        <h3>Simple Incremental Loop</h3>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                echo "<form method='post' action='/recursion/loop_by.php'>";
                echo "<div>";
                echo "<label for='loop_inc'>Loop by:</label><br />";
                echo "<input type='text' name='loop_inc' id='loop_inc' />";
                echo "</div><div>";
                echo "<label for='loop_max'>Loop to:</label><br />";
                echo "<input type='text' name='loop_max' id='loop_max' />";
                echo "</div><div>";
                echo "<input type='submit' name='submit' value='Show!' />";
                echo "</div></form>";
            }
            else {
                $w = $_POST["loop_max"];
                $x = (int)$w;
                $y = $_POST["loop_inc"];
                $z = (int)$y;

                echo "<ul>";
                for ($a = 0; $a <= $x; ($a+=$z)) {
                    echo "<li>The increment number is $a </li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

    <div class="right">
        <?php include '../includes/nav_useful.php';?>
    </div>

    </div>

    <div class="footer">&copy; Matthew Moore, 2019</div>

</body>

</html>
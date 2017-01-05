<!-- Work done by Jacob Merizian for Codepath assignment. -->

<?php
    if (isset($_POST['subtotal']))
        $subtotal = $_POST['subtotal'];
    else
        $subtotal = 0;
    if (isset($_POST['percentage']))
        $percentage = $_POST['percentage'];
?>

<html>
    <head>
        <title>Tip Calculator</title>
        <style type="text/css">
            p {
                padding-left: 20px;
                font-size: 16px;
            }

            h1 {
                text-align: center;
            }

            body {
                font-family: sans-serif;
                background-color: lightyellow;
            }

            #textbox {
                width: 80px;
                font-size: 14px;
            }

            #container {
                width: 250px;
                background-color: white;
                border: 1px solid black;
                display: block;
                margin: auto;
                position: relative;
            }

            #submit {
                margin: auto;
                position: relative;
                display: block;
            }

            #result {
                width: 80%;
                height: 80px;
                border: 1px solid blue;
                position: relative;
                margin: auto;
                margin-bottom: 10px;
                color: blue;
                font-weight: bold;
            }

            #signature {
                width: 250px;
                display: block;
                margin: auto;
                text-align: right;
                font-style: italic;
            }
        </style>
    </head>
    <body>

        <div id='container'>
            <h1>Tip Calculator</h1>
            <form method='POST' action='tipcalc.php'>
                <p id="subtotal">Bill subtotal: $
                    <?php
                        echo "
                        <input type='text' id='textbox' name='subtotal' value='{$subtotal}' />
                        ";
                    ?>
                </p>
                <p>Tip Percentage: </p>
                <p>
                    <?php
                        for ($i = 10; $i < 21; $i = $i + 5) {
                            echo "<input type='radio' name='percentage' value='{$i}' ";
                            if ($percentage == $i) echo "checked";
                            echo "/> {$i}% &nbsp;";
                        }
                    ?>
                </p>
                <input id="submit" type='submit' value='Submit'>
            </form>

            <div id="result">
                <?php
                    $tip = intval($percentage) * $subtotal * 0.01;
                    $total = $subtotal + $tip;
                    echo "<p>Tip: $".sprintf("%0.2f", $tip)."</p>";
                    echo "<p>Total: $".sprintf("%0.2f", $total)."</p>";
                    if (!is_numeric($subtotal) || $subtotal < 0) {
                        echo "
                        <style type='text/css'>
                            #subtotal {color: red; font-weight: bold;}
                            #result {display: none;}
                        </style>";
                    } else {
                        echo "
                        <style type='text/css'>
                            #subtotal {color: black; font-weight: regular;}
                            #result {display: block;}
                        </style>";
                    }
                    if (strlen($percentage) == 0) {
                        echo "
                        <style type='text/css'>
                            #result {display: none;}
                        </style>";
                    }
                ?>
            </div>

        </div>

        <div id="signature"><p>by Jacob Merizian</p></div>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
        <h1>Calculate On Your Choice</h1>
        <div class="wrapper">
            <div class="form-group">
                <label for="num1">Number 1:</label>
                <input type="number" id="num1" name="num1" required>
                <label for="num2">Number 2:</label>
                <input type="number" id="num2" name="num2" required>
            </div>
            <div class="submit-group">
                <input type="submit" name="sum" value="Sum">
                <input type="submit" name="difference" value="Difference">
                <input type="submit" name="product" value="Product">
                <input type="submit" name="quotient" value="Quotient">
                <input type="submit" name="euler" value="Euler's Number">
                <input type="submit" name="log" value="Logarithm">
                <input type="submit" name="power" value="Power">
            </div>
            <!-- Output container -->
            <div class="output">
                <?php
                function logBase($number, $base) {
                    if ($base <= 0 || $base == 1 || $number <= 0) {
                        return 'Invalid input. Base must be > 0 and != 1, number must be > 0.';
                    }
                    return log($number) / log($base);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $x = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
                    $y = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;

                    if (isset($_POST['sum'])) {
                        $sum = $x + $y;
                        echo "<p class='result'>The sum of the 2 numbers is: <strong>$sum</strong></p>";
                    }

                    if (isset($_POST['difference'])) {
                        if ($x < $y) {
                            echo "<p class='result'>Number 2 is greater than Number 1, so the result is negative.</p>";
                        }
                        $difference = $x - $y;
                        echo "<p class='result'>The difference of the 2 numbers is: <strong>$difference</strong></p>";
                    }

                    if (isset($_POST['product'])) {
                        $product = $x * $y;
                        echo "<p class='result'>The product of the 2 numbers is: <strong>$product</strong></p>";
                    }

                    if (isset($_POST['euler'])) {
                        echo "<p class='result'>The exponential of Number 2 is: <strong>" . exp($y) . "</strong></p>";
                        echo "<p class='result'>The exponential of Number 1 is: <strong>" . exp($x) . "</strong></p>";
                    }

                    if (isset($_POST['power'])) {
                        echo"Number 1 is the base and Number 2 is the Power" ; 
                        echo "<p class='result'>Number 1 raised to the power of Number 2 is: <strong>" . pow($x, $y) . "</strong></p>";
                    }

                    if (isset($_POST['log'])) {
                        echo "<p class='result'>The logarithm of Number 1 with base Number 2 is: <strong>" . logBase($x, $y) . "</strong></p>";
                    }

                    if (isset($_POST['quotient'])) {
                        if ($y != 0) {
                            if ($x < $y) {
                                echo "<p class='result'>Number 2 is greater than Number 1, so the result is less than 1.</p>";
                            }
                            $quotient = $x / $y;
                            echo "<p class='result'>The quotient of the 2 numbers is: <strong>$quotient</strong></p>";
                        } else {
                            echo "<p class='result'>Cannot divide by zero.</p>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </form>
</body>
</html>

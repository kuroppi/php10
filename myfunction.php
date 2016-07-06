<!DOCTYPE html>
<html>

<head>
    <title>Calcuate Weekly Starbucks</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>

    <header>
        <h1>STARBUCKS SPENDING CALCULATOR</h1>
    </header>

    <main>

        <?php
    
    function calculate_total($quantity, $price, $tax) {

        $total = $quantity * $price;                // Calculation of quantity and price submitted from the input fields.
        $taxrate = ($tax / 100) + 1;                // Add 1 to this value to get a multiplier.
        $total = $total * $taxrate;                 // Add the tax.
        $total = number_format($total, 2);          // formats the total cost in 2 digits
        
        return $total;
    }
    
    // Check for a form submission
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Call the function and output the results:
            
            $total = calculate_total($_POST['quantity'], $_POST['price'], $_POST['tax']);
            
            print "<p class=\"print-total\">You're spending $<span style=\"font-weight: bold;\">$total</span> a week on Starbucks!</p>";
            
            if ($total > 30) {
                print '<p>Uh-oh. You might have a Starbucks problem. May I suggest joining <a href="http://www.starbucksanonymous.net/" target="_blank">Starbucks Anonymous?</a>';
            }
    }
    
?>

            <section>
                <form action="" method="post">

                    <fieldset>
                        <h2>Let's calculate how much you're spending on Starbucks every week:</h2>

                        <p>What is your favorite Starbucks beverage?
                            <br>
                            <select name="price">
                                <option value="3.78">Caffe Latte</option>
                                <option value="4.42">Caffe Mocha</option>
                                <option value="4.80">Caramel Macchiato</option>
                                <option value="5.44">Pumpkin Spice Latte</option>
                                <option value="2.88">Iced Coffee</option>
                                <option value="4.80">Caramel Frappuccino</option>
                                <option value="5.06">Mocha Frappuccino</option>
                                <option value="2.24">Tevana Shaken Iced Tea</option>
                            </select>
                        </p>


                        <p>How many times a week do you enjoy your favorite beverage?
                            <br>
                            <input type="number" name="quantity" min="1" max="100" step="1" value="1" size="5">
                        </p>

                        <p>What is your local tax?
                            <br>
                            <input type="number" name="tax" min="0" max="10" step=".01" value="8.75" size="3" (%)>
                        </p>

                        <p>
                            <input type="submit" name="submit" value="Calculate!">
                        </p>

                    </fieldset>

                </form>
            </section>

    </main>
</body>

</html>

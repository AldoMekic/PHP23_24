<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # Created the class ShopProduct
        class ShopProduct
        {
            # Created its arguments
            public $title = "default product";
            public $producerMainName = "main name";
            public $producerFirstName = "first name";
            public $price = 0;
        }

        # Created two ShopProduct objects
        $product1 = new ShopProduct();
        $product2 = new ShopProduct();

        # Showing the types of the objects, which is ShopProduct
        var_dump($product1);
        echo "<br>";
        var_dump($product2);
        echo "<br>";

        # Testing how calling specific arguments of an object can work in the program, first the call of the default value and
        # then a change to the called argument and the call for its changed state
        echo "$product1->title <br>";
        $product1->title = "Rip and Tear";
        echo "$product1->title <br>";

        # We can also create new arguments outside the class itself, like this
        $product2->addedArgument = 10;
        echo "$product2->addedArgument <br>";
    ?>
</body>
</html>
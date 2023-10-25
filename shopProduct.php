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
            public $title;
            public $producerMainName;
            public $producerFirstName;
            public $price = 0;

            # Added a constructor for the objects
            public function __construct($title="", $firstName="", $mainName="", $price=0)
            {
                $this->title = $title;
                $this->producerFirstName = $firstName;
                $this->producerMainName = $mainName;
                $this->price = $price;
            }

            # Added a get method for the producer's first and main name
            public function getProducer()
            {
                return "$this->producerFirstName $this->producerMainName <br>";
            }
        }

        # Created two ShopProduct objects, whose values are created through the constructor
        $product1 = new ShopProduct("","","",100);
        $product2 = new ShopProduct("Another one", "John", "Cox", 150);

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

        # Testing the getProducer() method. With the constructor initiated at the start, we can simply call $product2
        $product1->producerFirstName = "Aldin1";
        $product1->producerMainName = "Mekic1";
        echo $product1->getProducer();
        echo $product2->getProducer();
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        class ShopProduct
        {
            
            public $title;
            public $producerMainName;
            public $producerFirstName;
            public $price = 0;

           
            public function __construct(string $title,string $firstName,string $mainName,float $price)
            {
                $this->title = $title;
                $this->producerFirstName = $firstName;
                $this->producerMainName = $mainName;
                $this->price = $price;
            }

            
            public function getProducer()
            {
                return "$this->producerFirstName $this->producerMainName ";
            }
        }

        # Created another class, ShopProductWriter, that uses the ShopProduct class in its implementation
        class ShopProductWriter
        {
            # A method that writes out all the values of a ShopProduct object
            public function write(ShopProduct $shopProduct)
            {
                $str = $shopProduct->title . " : " . $shopProduct->getProducer() . "(" . $shopProduct->price . ") <br>";
                return $str;
            }
        }

        # Testing of the write method
        $product1 = new ShopProduct("Rip and Tear","Aldin","Mekic",100.5);
        $writer = new ShopProductWriter();
        echo $writer->write($product1);

    ?>
</body>
</html>
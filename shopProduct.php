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
            # Added the numPages and playLength arguments
            public $numPages;
            public $playLength;
            public $title;
            public $producerMainName;
            public $producerFirstName;
            public $price = 0;

           # Changed the constructor to apply the two new arguments
            public function __construct(string $title,string $firstName,string $mainName,float $price, int $numPages, int $playLength)
            {
                $this->title = $title;
                $this->producerFirstName = $firstName;
                $this->producerMainName = $mainName;
                $this->price = $price;
                $this->numPages = $numPages;
                $this->playLength = $playLength;
            }

            
            public function getProducer(): string
            {
                return "$this->producerFirstName $this->producerMainName ";
            }

            # Added a method for the values of ShopProduct
            public function getSummaryLine(): string
            {
                $base = "{$this->title}  {$this->producerMainName},";
                $base .= "{$this->producerFirstName}";
                return $base;
            }
        }

        # Created the CdProduct that inherits ShopProduct
        class CdProduct extends ShopProduct
        {
            # A method that allows for the playLength argument to be taken
            public function getPlayLength(): int
            {
                return $this->playLength;
            }

            # Method for the values of CdProduct
            public function getSummaryLine(): string
            {
                $base = "{$this->title}  {$this->producerMainName},";
                $base .= "{$this->producerFirstName}";
                $base .= ": playing time - {$this->playLength}";
                return $base;
            }
        }

        #Created the BookProduct that inherits ShopProduct
        class BookProduct extends ShopProduct
        {
            # A method that allows for the numPages argument to be taken
            public function getNumberOfPages(): int
            {
                return $this->numPages;
            }

            # Method for the values of BookProduct
            public function getSummaryLine(): string
            {
                $base = "{$this->title}  {$this->producerMainName},";
                $base .= "{$this->producerFirstName}";
                $base .= ": playing time - {$this->numPages}";
                return $base;
            }
        }

        class ShopProductWriter
        {
            public function write(ShopProduct $shopProduct)
            {
                $str = $shopProduct->title . " : " . $shopProduct->getProducer() . "(" . $shopProduct->price . ") <br>";
                return $str;
            }
        }

        # Testing the inheritance
        $product2 = new CdProduct("Music album", "Aldo", "Meki", 15.45, 0, 120);
        echo "{$product2->getSummaryLine()} <br>";
        echo "artist: {$product2->getPlayLength()} <br>";
    ?>
</body>
</html>
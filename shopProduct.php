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
            # Removed the numPages and playLength arguments from the parent class
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

            
            public function getProducer(): string
            {
                return "$this->producerFirstName $this->producerMainName ";
            }

            
            public function getSummaryLine(): string
            {
                $base = "{$this->title}  {$this->producerMainName},";
                $base .= "{$this->producerFirstName}";
                return $base;
            }
        }

        
        class CdProduct extends ShopProduct
        {
            # Added the argument playLength
            public $playLength;

            # Created a CDProduct constructor that callls the parent constructor for the inherited arguments and then applies
            # the CDProduct specific arguments independently
            public function __construct(string $title,string $firstName,string $mainName,float $price, int $playLength)
            {
                parent::__construct($title,$firstName,$mainName,$price);
                $this->playLength = $playLength;
            }

            public function getPlayLength(): int
            {
                return $this->playLength;
            }

            
            public function getSummaryLine(): string
            {
                # Invoked the overriden method
                $base = parent::getSummaryLine();
                $base .= ": playing time - {$this->playLength}";
                return $base;
            }
        }

        
        class BookProduct extends ShopProduct
        {
            # Added the argument numPages
            public $numPages;

            # Created a BookProduct constructor that calls the parent constructor for the inherited arguments and then applies
            # the BookProduct specific arguments independently
            public function __construct(string $title,string $firstName,string $mainName,float $price, int $numPages)
            {
                parent::__construct($title,$firstName,$mainName,$price);
                $this->numPages = $numPages;
            }

            public function getNumberOfPages(): int
            {
                return $this->numPages;
            }

            
            public function getSummaryLine(): string
            {
                # Invoked the overriden method
                $base = parent::getSummaryLine();
                $base .= ": number of pages - {$this->numPages}";
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

        
        $product1 = new CdProduct("Music album", "Aldo", "Meki", 15.45, 120);
        echo "{$product1->getSummaryLine()} <br>";
        echo "play length: {$product1->getPlayLength()} <br>";

        $product2 = new BookProduct("Book", "Aldin", "Mekic", 25.94, 55);
        echo "{$product2->getSummaryLine()} <br>";
        echo "number of pages: {$product2->getNumberOfPages()} <br>";
    ?>
</body>
</html>
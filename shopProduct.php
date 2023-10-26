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
            # Added a discount, as well as made all the arguments protected
            protected $discount = 0;
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

            # Added a set method for a discount
            public function setDiscount(int $num):void
            {
                $this->discount = $num;
            }

            
            public function getProducer(): string
            {
                return "$this->producerFirstName $this->producerMainName ";
            }

            # Added a get method for the price that subtracts the given price with the discount
            public function getPrice(): int
            {
                return ($this->price - $this->discount);
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
            protected $playLength;

            
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
                $base = parent::getSummaryLine();
                $base .= ": playing time - {$this->playLength}";
                return $base;
            }
        }

        
        class BookProduct extends ShopProduct
        {
            
            protected $numPages;

            
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
                
                $base = parent::getSummaryLine();
                $base .= ": number of pages - {$this->numPages}";
                return $base;
            }
        }

        class ShopProductWriter
        {
            # Added a private array of products
            private $products = [];

            # Added a method for adding ShopProduct objects to the products array
            public function addProduct(ShopProduct $shopProduct): void 
            {
                $this->products[] = $shopProduct;
            }

            # The write method shows information about every single ShopProduct
            public function write(): void
            {
                $str = "";
                foreach($this->products as $shopProduct)
                {
                    $str .= "{$shopProduct->title}: ";
                    $str .= $shopProduct->getProducer();
                    $str .= "({$shopProduct->getPrice()}) <br>";
                }
                echo $str;
            }
        }

        
        $product1 = new CdProduct("Music album", "Aldo", "Meki", 15.45, 120);
        echo "{$product1->getSummaryLine()} <br>";
        echo "play length: {$product1->getPlayLength()} <br>";

        $product2 = new BookProduct("Book", "Aldin", "Mekic", 25.94, 55);
        echo "{$product2->getSummaryLine()} <br>";
        echo "number of pages: {$product2->getNumberOfPages()} <br>";

        # Testing the discount and price methods
        $product3 = new ShopProduct("Product", "First", "Product", 100);
        $product3->setDiscount(15);
        echo $product3->getPrice();
        echo "<br>";

        # Testing the writer object
        $writer = new ShopProductWriter();
        $writer->addProduct($product3);
        $writer->write();
        $writer->addProduct($product1);
        $writer->write();
    ?>
</body>
</html>
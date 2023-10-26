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
            private int $discount = 0;
            private $title;
            private $producerMainName;
            private $producerFirstName;
            protected $price;

            public function __construct(string $title,string $firstName,string $mainName,float $price)
            {
                $this->title = $title;
                $this->producerFirstName = $firstName;
                $this->producerMainName = $mainName;
                $this->price = $price;
            }

            public function getProducerFirstName(): string
            {
                return $this->producerFirstName;
            }

            public function getProducerMainName(): string
            {
                return $this->producerMainName;
            }

            public function setDiscount(int $num):void
            {
                $this->discount = $num;
            }

            public function getDiscount(): int
            {
                return $this->discount;
            }

            public function getTitle(): string
            {
                return $this->title;
            }

            public function getPrice(): int
            {
                return ($this->price - $this->discount);
            }

            public function getProducer():string
            {
                return "$this->producerFirstName $this->producerMainName";
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
            private $playLength;

            
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
            private $numPages;

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

        # Turned the ShopProductWriter class into an abstract class
        abstract class ShopProductWriter
        {
            protected array $products = [];

            public function addProduct(ShopProduct $shopProduct): void 
            {
                $this->products[] = $shopProduct;
            }

            abstract public function write(): void;
        }

        # Created the TextProductWriter class which inherits the abstract class ShopProductWriter
        class TextProductWriter extends ShopProductWriter
        {
            public function write(): void
            {
                $str = "PRODUCTS: <br>";
                foreach($this->products as $shopProduct)
                {
                    $str .= $shopProduct->getSummaryLine();
                    $str .= "<br>";
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

        $product3 = new ShopProduct("Product", "First", "Product", 100);
        $product3->setDiscount(15);
        echo $product3->getPrice();
        echo "<br>";

        # Since an abstract class's methods cannot be implicitly called, we use the newly created TextProductWriter
        # class to once again call the write method
        $writer = new TextProductWriter();
        $writer->addProduct($product3);
        $writer->write();
    ?>
</body>
</html>
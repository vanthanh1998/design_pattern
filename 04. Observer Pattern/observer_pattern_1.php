<?php
// Định nghĩa: Stratery pattern là nơi định nghĩa tập hợp các thuật toán or chiến lược và cho phép ngdung chọn bất kì thuật toán nào để thực thi tại thời điểm chạy => giúp tách biệt logic code, làm cho code dễ bảo trì, mở rộng


// Subject (Observable)
class Product {
    private $name;
    private $price;
    private $observers = [];

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($newPrice) {
        $this->price = $newPrice;
        $this->notifyObservers();
    }

    public function attachObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detachObserver(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

// Observer
interface Observer {
    public function update(Product $product);
}

// Concrete Observer
class PriceChangeLogger implements Observer {
    public function update(Product $product) {
        echo "Giá sản phẩm '{$product->getName()}' đã thay đổi thành '{$product->getPrice()}'." . PHP_EOL;
    }
}

// Concrete Observer
class PriceChangeNotifier implements Observer {
    public function update(Product $product) {
        // Gửi thông báo về sự thay đổi giá sản phẩm cho người dùng
        // Code xử lý thông báo...
        echo "Thông báo: Giá sản phẩm '{$product->getName()}' đã thay đổi." . PHP_EOL;
    }
}

// Sử dụng Mẫu Observer
$product = new Product('Áo thun', 100000);
$logger = new PriceChangeLogger();
$notifier = new PriceChangeNotifier();

// Đăng ký các đối tượng quan sát
$product->attachObserver($logger);
$product->attachObserver($notifier);

// Thay đổi giá sản phẩm và thông báo cho các quan sát
$product->setPrice(99999);

// Khi thay đổi giá, cả PriceChangeLogger và PriceChangeNotifier sẽ nhận được thông báo và thực hiện hành động tương ứng.

<?php
// Observer Pattern là một mẫu thiết kế hướng đối tượng cho phép một đối tượng (subject) thông báo cho nhiều đối tượng khác (observers) khi trạng thái của nó thay đổi. Trong trường hợp này, "subject" là cửa hàng điện tử, và "observers" là người dùng đăng ký để nhận thông báo về sản phẩm mới.
// Observer interface
// 1. tạo một interface để đại diện cho các đối tượng quan sát (observers):
interface Observer {
    public function update($message);
}

// Subject class (Cửa hàng)
// tạo một lớp cửa hàng (subject) để quản lý danh sách các observers và thông báo cho họ về sản phẩm mới:
class ElectronicStore {
    private $observers = array();
    
    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }
    
    public function addProduct($product) {
        // Lưu ý: Trong thực tế, bạn sẽ lưu sản phẩm vào cơ sở dữ liệu ở đây.
        
        // Sau khi lưu sản phẩm, thông báo cho tất cả các observers.
        $message = "Sản phẩm mới đã được thêm vào cửa hàng: " . $product;
        $this->notifyObservers($message);
    }
    
    private function notifyObservers($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

// Concrete Observer class (Người dùng đăng ký)
//  tạo một lớp Observer cụ thể, trong trường hợp này là người dùng đăng ký để nhận thông báo:
class User implements Observer {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function update($message) {
        echo $this->name . " đã nhận được thông báo: " . $message . "<br>";
    }
}

// Sử dụng Observer Pattern

// Tạo một cửa hàng điện tử
$store = new ElectronicStore();

// Tạo các người dùng đăng ký
$user1 = new User("Người dùng A");
$user2 = new User("Người dùng B");
$user3 = new User("Người dùng C");

// Đăng ký các người dùng nhận thông báo từ cửa hàng
$store->addObserver($user1);
$store->addObserver($user2);
$store->addObserver($user3);

// Thêm sản phẩm mới vào cửa hàng
$store->addProduct("Điện thoại di động XYZ");
$store->addProduct("Laptop ABC");


// Người dùng A đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Điện thoại di động XYZ
// Người dùng B đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Điện thoại di động XYZ
// Người dùng C đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Điện thoại di động XYZ
// Người dùng A đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Laptop ABC
// Người dùng B đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Laptop ABC
// Người dùng C đã nhận được thông báo: Sản phẩm mới đã được thêm vào cửa hàng: Laptop ABC
<?php
// Định nghĩa: Proxy pattern cho phép bạn cung cấp một giao diện đơn giản để truy cập một hệ thống phức tạp với nhiều class và method. Pattern này giúp giảm sự phức tạp và tăng tính rõ ràng trong việc sử dụng các thành phần phức tạp bên trong hệ thống. Thay vì gọi trực tiếp tới các class và methods phức tạp thì chỉ cần gọi thông qua một "facade" (giao diện) đơn giản.

// ứng dụng cuộc sống:  uống coffee
// => nếu như chúng ta tự mua về pha và uống thì rất phức tạp và cầu kỳ. Chính vì thế, mua một ly coffee, để trong xe vừa đi vừa uống một cảm giác rất thư thái.

// ứng dụng phần mềm: shoppe , upload video lên ytb
// 1. người dùng họ chỉ biết một cú click mua hàng là mọi chuyện được làm sáng tỏ như giảm giá bao nhiêu? Chi phí vận chuyển bao nhiêu? Chi phí chiết khấu bao nhiêu? Mọi việc trở nên rõ ràng hơn
// => Nhưng đằng sau đó mỗi hệ thống chịu trách nhiệm nhiều chức năng như discount, fees, shipping... Tất cả đều dựa vào Facade Pattern để đơn giản hóa nó đi.

// 2. Khi chúng ta upload một file video lên youtube. Thì có nhiều độ phân giải khác nhau như 360, 720... Nghĩa là đằng sau đó có nhiều tác vụ liên quan trong đó bao gồm convert video ra nhiều độ phân giải, check xem có ăn cắp bản quyền hay không vv... Tất cả được đóng gói và sử dung Facade Pattern.
class Discount {
    public function calc($value) {
        return $value * 0.9;
    }
}

class Shipping {
    public function calc() {
        return 5;
    }
}

class Fees {
    public function calc($value) {
        return $value * 1.05;
    }
}

class ShopPattern {
    private $discount;
    private $shipping;
    private $fees;

    public function __construct() {
        $this->discount = new Discount();
        $this->shipping = new Shipping();
        $this->fees = new Fees();
    }

    public function calc($price) {
        $price = $this->discount->calc($price);
        echo "discount: $price\n";
        $price = $this->fees->calc($price);
        echo "fees: $price\n";
        $price += $this->shipping->calc();
        echo "shipping: $price\n";

        return $price;
    }
}

function buy($price){
    $shoppe = new ShopPattern();
    echo "Price: " . $shoppe->calc($price) . "\n";
}

buy(1000);
?>
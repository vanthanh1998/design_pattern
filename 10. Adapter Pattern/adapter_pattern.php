<?php
// Định nghĩa: Adapter pattern là một trong những Design Pattern trong lập trình hướng đối tượng, được sử dụng để tạo ra một giao diện thích hợp để làm cho hai lớp không liên quan có thể làm việc cùng nhau. Nó giúp chuyển đổi giao diện của một lớp thành một giao diện khác mà client mong muốn.

// Ứng dụng phần mềm: fifa online 4

// Ưu điểm:
// + Sử dụng cho dự án một lớp riêng mà không đụng tới những code cũ, hay còn gọi là code gốc 
// + Tăng tính minh bạch và khả năng tái sử dụng của lớp, đóng gói việc triển khai, và khả năng tái sử dụng rất cao. Tính sẵn sàng luôn có. 
// + Tính linh hoạt và khả năng mở rộng rất tốt. Thông qua việc sử dụng các tệp cấu hình, Adapter pattern có thể dễ dàng được thay thế và có thể thêm các lớp Adapter mà không cần sửa đổi mã gốc, tuân theo nguyên tắc mở và đóng trong lập trình. 
// Nhược điểm: khi thêm 1 tính năng nào đó nó khá phức tạp
// + Việc sử dụng quá nhiều mẫu thiết kế Adapter sẽ làm cho hệ thống trở nên rất lộn xộn và khó nắm bắt một cách tổng thể như các mấu thiết kế trước như Factory pattern. 

// Giao diện hình học chuẩn
interface Shape {
    public function calculateArea();
}

// Lớp hình vuông
class Square implements Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function calculateArea() {
        return $this->side * $this->side;
    }
}

// Thư viện bên ngoài có giao diện khác
class ThirdPartyCircle {
    public function computeCircleArea($radius) {
        return pi() * $radius * $radius;
    }
}

// Adapter chuyển đổi từ ThirdPartyCircle sang giao diện Shape
class CircleAdapter implements Shape {
    private $circle;

    public function __construct(ThirdPartyCircle $circle) {
        $this->circle = $circle;
    }

    public function calculateArea() {
        return $this->circle->computeCircleArea(5); // Giả sử bán kính là 5
    }
}

// Client sử dụng giao diện Shape để tính diện tích hình học
function printArea(Shape $shape) {
    echo "Area: " . $shape->calculateArea() . PHP_EOL;
}

// Sử dụng Adapter Pattern để tính diện tích hình tròn thông qua giao diện Shape
$circle = new CircleAdapter(new ThirdPartyCircle());
$square = new Square(4);

printArea($circle); // Kết quả: "Area: 78.539816339745"
printArea($square); // Kết quả: "Area: 16"


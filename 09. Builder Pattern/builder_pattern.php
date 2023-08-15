<?php
// Định nghĩa: Builder Pattern  là một mẫu thiết kế thường được sử dụng để xây dựng các đối tượng phức tạp bằng cách chia nhỏ quá trình xây dựng thành các bước đơn giản và có thể tái sử dụng. Mẫu thiết kế này giúp tách biệt quá trình xây dựng đối tượng từ việc cài đặt cụ thể của đối tượng đó, giúp mã nguồn dễ đọc, dễ bảo trì và mở rộng hơn.

// Ứng dụng phần mềm: fifa online 4

// Ưu điểm: độc lập, dễ dàng mở rộng, nhanh chóng, kiểm soát rủi ro 1 cách chi tiết mà mình đang sử dụng để mà builder
// Nhược điểm: khi thêm 1 tính năng nào đó nó khá phức tạp

// Giống và khác giữa prototype và builder:
// Ví dụ: 
// nhà thầu, mỗi nhà đều có cách bố trí, vị trí khác nhau => builder
// chung cư nó giống nhau, cách bố trí, vị trí giống như nhau => prototype


class FifaOnlinePlayer {
    public $name;
    public $age;
    public $nationality;
    public $position;
    public $team;
    public $stats;

    public function __construct($builder) {
        $this->name = $builder->name;
        $this->age = $builder->age;
        $this->nationality = $builder->nationality;
        $this->position = $builder->position;
        $this->team = $builder->team;
        $this->stats = $builder->stats;
    }

    public function toString() {
        $player = "Player:\n";
        $player .= "- Name: {$this->name}\n";
        $player .= "- Age: {$this->age}\n";
        $player .= "- Nationality: {$this->nationality}\n";
        $player .= "- Position: {$this->position}\n";
        $player .= "- Team: {$this->team}\n";
        $player .= "- Stats: " . print_r($this->stats, true) . "\n";
        return $player;
    }
}

class FifaOnlinePlayerBuilder {
    public $name = '';
    public $age = 0;
    public $nationality = '';
    public $position = '';
    public $team = '';
    public $stats = [];

    public function withName($name) {
        $this->name = $name;
        return $this;
    }
    public function withAge($age) {
        $this->age = $age;
        return $this;
    }
    public function withNationality($nationality) {
        $this->nationality = $nationality;
        return $this;
    }
    public function withPosition($position) {
        $this->position = $position;
        return $this;
    }
    public function withTeam($team) {
        $this->team = $team;
        return $this;
    }
    public function withStats($stats) {
        $this->stats = $stats;
        return $this;
    }

    // Các phương thức withAge, withNationality, withPosition, withTeam và withStats tương tự
    // Chúng thiết lập giá trị của thuộc tính tương ứng và trả về đối tượng builder để có thể chuỗi gọi phương thức

    public function build() {
        return new FifaOnlinePlayer($this);
    }
}


// Sử dụng
$builderPattern = new FifaOnlinePlayerBuilder();

$cr7 = $builderPattern
    ->withName('Cr7')
    ->withAge(38)
    ->withNationality('Portugal')
    ->withTeam('Real')
    ->withPosition('ST')
    ->withStats(['goals' => 15, 'assists' => 2])
    ->build();

echo $cr7->toString();

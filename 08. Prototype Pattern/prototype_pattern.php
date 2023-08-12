<?php
// Định nghĩa: Prototype Pattern là một mẫu thiết kế được sử dụng để tạo các đối tượng mới bằng cách sao chép các thuộc tính và phương thức từ một đối tượng đã tồn tại. Điều này giúp bạn tạo ra các đối tượng mới mà không cần khởi tạo lại từ đầu.

// Ứng dụng phần mềm: fifa online 4 thiết kế cầu thủ (cr bưởi, messi) => of nexon

// Nhược điểm: nếu 1 object đc sửa đổi thuộc tính nào đó thì nó cũng sẽ ảnh hưởng đến tất cả các instance khác


class FifaOnline4Player {
    public $name, $team, $position, $goals;
	public function __construct($name, $team, $position, $goals){
		$this->name = $name;
        $this->team = $team;
        $this->position = $position;
        $this->goals = $goals;
	}

    public function number_of_goals(){
        $this->goals++;
    }

    public function clone(){
        $clone = new FifaOnline4Player($this->name, $this->team, $this->position, $this->goals);
        return $clone;
    }
}

// create player
$player = new FifaOnline4Player("CR7", "Real Madrid", "ST", 9);


// echo "<pre>";
// print_r($player);
// echo "</pre>";



$cr7 = $player->clone();
// Ex nhược điểm
// Thêm thuộc tính mới mà không viết trong class
$cr7->stats = new stdClass();
$cr7->stats->minute = 90;

$m10 = $player->clone();
$m10->name = "Messi";
$m10->team = "Barcelona";
$m10->position = "CF";
$m10->goals = "35";

// test
$cr7->number_of_goals();
echo "".$cr7->name ." has ".$cr7->goals." goals this sesons 2020 of CLB ".$cr7->team." with ".$cr7->stats->minute."";
echo "<br>";

$m10->number_of_goals();
echo "".$m10->name ." has ".$m10->goals." goals this sesons 2021 of CLB ".$m10->team." with ".$cr7->stats->minute."";

// result 
// CR7 has 10 goals this sesons 2020 of CLB Real Madrid with 90
// Messi has 36 goals this sesons 2021 of CLB Barcelona with 90








    
<?php
// Định nghĩa: Simple Factory Pattern cung cấp một cách tiện lợi để tạo đối tượng mà không cần tiết lộ logic xây dựng của đối tượng đó trong phạm vi của lớp sử dụng nó. Simple Factory Pattern không phải là mẫu thiết kế chính thống nhưng nó là một trong những cách đơn giản nhất để tạo đối tượng.

// Mục đích chủ yếu là đê tạo ra đối tượng ()

class ServiceLogistics{
    public  $name;
    public  $doors;
    public  $price;

    public function __construct($name = 'Truck 10', $doors = 6, $price = '100.000 VND') {
        $this->name = $name;
        $this->doors = $doors;
        $this->price = $price;
    }

    public static function getTransport($cargoVolumne) {
        switch ($cargoVolumne) {
            case '10':
                return new ServiceLogistics();
            
            case '20':
                return new ServiceLogistics('Truck20', 16, '1.000.000 VND');
        }
    }
}
$result = ServiceLogistics::getTransport('20');
echo "<pre>";
print_r($result);
echo "</pre>";

echo "Level xxxx::: " . $result->name . " - " . $result->doors . " doors - " . $result->price;


?>

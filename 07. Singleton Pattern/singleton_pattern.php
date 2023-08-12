<?php
// Định nghĩa: Singleton là một design pattern thuộc nhóm khởi tạo, với design pattern này thì mỗi class sẽ chỉ khởi tạo được một đối tượng duy nhất.

// Khi nào cần sd SINGLETON DESGIN PATTERN:
    // Nói đơn giản thì Khi bạn muốn một class sẽ chỉ tạo ra một đối tượng xuyên suốt toàn bộ dự án thì sẽ sử dụng tới Singleton design pattern, giống như trường hợp kết nối tới database mà mình đề ở ở mục I. Tuy nhiên cái khó là làm sao để bạn biết rằng class đó chỉ nên tạo ra một đối tượng duy nhất. Để biết được điều này thì chỉ có cách là bạn phải thật sự hiểu mình đang làm gì và muốn làm gì, bằng cách đọc rõ yêu cầu hoặc phân tích rõ yêu cầu trước khi lao vào code.

    // Mình sẽ liệt kê cho bạn một số trường hợp nên sử dụng Single design pattern, tuy nó có thể không chính xác với bạn, nhưng cứ tham khảo xem thế nào nhé:

    // Khi muốn tạo một class quản lý việc kết nối tới database, hoặc các kết nối tương tự.
    // Khi tích hợp tính năng thanh toán qua các cổng thanh toán.
    // Khi bạn muốn quản lý các thông tin cấu hình của hệ thống thông qua các class

    // Lớp Database: Đây là lớp chứa logic để tạo và quản lý kết nối cơ sở dữ liệu.
    class Database {
        private static $instance; // Biến để lưu thể hiện duy nhất của lớp Database.
        private $connection; // Biến để lưu kết nối cơ sở dữ liệu
    
        // Phương thức khởi tạo __construct(): Trong hàm khởi tạo, một kết nối đến cơ sở dữ liệu MySQL được tạo bằng cách sử dụng lớp mysqli. Nếu kết nối không thành công, thông báo lỗi sẽ được hiển thị.
        private function __construct() {
            $host = ''; // Thay thế bằng thông tin cơ sở dữ liệu thực tế
            $username = ''; // Thay thế bằng thông tin cơ sở dữ liệu thực tế
            $password = ''; // Thay thế bằng thông tin cơ sở dữ liệu thực tế
            $database = ''; // Thay thế bằng thông tin cơ sở dữ liệu thực tế
            $this->connection = new \mysqli($host, $username, $password, $database);
            
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }
    
        // Phương thức tĩnh getInstance(): Đây là phương thức được sử dụng để tạo thể hiện duy nhất của lớp Database. Nếu thể hiện chưa tồn tại, nó sẽ được tạo mới.
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new Database(); // Tạo thể hiện duy nhất nếu chưa có
            }
            return self::$instance;
        }
    
        // Phương thức getConnection(): Đây là phương thức trả về kết nối cơ sở dữ liệu để sử dụng cho các truy vấn.
        public function getConnection() {
            return $this->connection; // Trả về kết nối cơ sở dữ liệu để sử dụng
        }
    }
    // Cuối cùng, bạn có thể thấy cách sử dụng Singleton pattern để tạo và sử dụng một thể hiện duy nhất của lớp Database. Bạn lấy thể hiện duy nhất thông qua Database::getInstance(), sau đó lấy kết nối từ thể hiện và sử dụng kết nối để thực hiện các truy vấn.    
    $database = Database::getInstance(); // Lấy thể hiện duy nhất của lớp Database
    $connection = $database->getConnection(); // Lấy kết nối cơ sở dữ liệu từ thể hiện
    
    // Bây giờ bạn có thể sử dụng kết nối để thực hiện các truy vấn
    $connection->query("...");







    
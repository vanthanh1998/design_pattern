<?php
// Định nghĩa: Proxy pattern cho phép bạn tạo một đối tượng đại diện (Proxy) để kiểm soát quyền truy cập vào đối tượng thực. Proxy có thể kiểm soát các tác vụ như kiểm tra, chuyển tiếp, cache, ghi lại và đồng bộ hóa trước khi chuyển yêu cầu đến đối tượng thực.

// ứng dụng cuộc sống: gửi yêu cầu tăng lương sếp thì phải thông qua nhân sự
class Leader {
	public function receiveRequest($offer){
		echo "ok mức lương: " . $offer;
	}
}

class Secretary {
	private $leader;
	public function __construct(){
		$this->leader = new Leader();
	}
	
	public function receiveRequest($offer){
		$this->leader->receiveRequest($offer);
	}
	
}

class Developer {
	public function __construct($offer){
		$this->offer = $offer;
	}
	
	public function applyFor($target){
		$target->receiveRequest($this->offer);
	}
}

$devs = new Developer("up to 2k USD");
$devs->applyFor(new Secretary());

?>
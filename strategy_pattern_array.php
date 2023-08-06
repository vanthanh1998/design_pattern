<?php
/**
 * Giảm giá khi người dùng đặt trước một sản phẩm của VINFAST 
 * @param float $originalPrice
 * @return float
 */
function preOrderPrice($originalPrice) {
    return $originalPrice * 0.2;
}

/**
 * Tiếp tục thêm tính năng khuyễn mãi thông thường, ví dụ Nếu giá gốc < 200 thì giảm 10%, còn > thì giảm tối đa 30
 * @param float $originalPrice
 * @return float
 */
function promotionPrice($originalPrice) {
    return $originalPrice <= 200 ?  $originalPrice * 0.1 : $originalPrice - 30;
}

/**
 * Đến ngày blackFriday promotion
 * @param float $originalPrice
 * @return float
 */
function blackFridayPrice($originalPrice) {
    return $originalPrice <= 200 ?  $originalPrice * 0.2 : $originalPrice - 50;
}

/**
 * Đến ngày giảm giá 50% promotion
 * @param float $originalPrice
 * @return float
 */
function price50($originalPrice) {
    return $originalPrice * 0.5;
}


/**
 * Giá mặc định
 * @param float $originalPrice
 * @return float
 */
function defaultPrice($originalPrice) {
    return $originalPrice;
}

// Chúng ta sẽ sử dụng một cấu trúc mảng trong PHP để lưu trữ các chiến lược giá
$getPriceStrategies = [
    'preOrder' => 'preOrderPrice',
    'promotion' => 'promotionPrice',
    'blackFriday' => 'blackFridayPrice',
    'default' => 'defaultPrice',
    'price50' => 'price50',
];

// Kết hợp trạng thái với chiến lược chiết khấu, hàm giá có thể được tối ưu hóa như sau:
function getPrice($originalPrice, $typePromotion) {
    global $getPriceStrategies;
    return $getPriceStrategies[$typePromotion]($originalPrice);
}

echo '-->>>' .  getPrice(200, 'price50');
?>

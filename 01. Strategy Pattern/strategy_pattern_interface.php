<?php
interface ShippingStrategy {
    public function calculateCost(float $weight): float;
}

class ExpressShipping implements ShippingStrategy {
    public function calculateCost(float $weight): float {
        // Cài đặt tính chi phí giao hàng nhanh dựa vào trọng lượng
        return $weight * 0.5;
    }
}

class StandardShipping implements ShippingStrategy {
    public function calculateCost(float $weight): float {
        // Cài đặt tính chi phí giao hàng tiêu chuẩn dựa vào trọng lượng
        return $weight * 0.3;
    }
}

class ShippingCostCalculator {
    private $shippingStrategy;

    public function __construct(ShippingStrategy $shippingStrategy) {
        $this->shippingStrategy = $shippingStrategy; // get shippingStrategy
    }

    public function calculateShippingCost(float $weight): float {
        return $this->shippingStrategy->calculateCost($weight); // set shippingStrategy
    }
}

// Sử dụng chiến lược ExpressShipping
$expressShipping = new ExpressShipping();
$shippingCalculator = new ShippingCostCalculator($expressShipping);
echo "Chi phí giao hàng nhanh cho một sản phẩm có trọng lượng 2kg: " . $shippingCalculator->calculateShippingCost(2). "<br>";

// Sử dụng chiến lược StandardShipping
$standardShipping = new StandardShipping();
$shippingCalculator = new ShippingCostCalculator($standardShipping);
echo "Chi phí giao hàng tiêu chuẩn cho một sản phẩm có trọng lượng 2kg: " . $shippingCalculator->calculateShippingCost(2). "<br>";


?>

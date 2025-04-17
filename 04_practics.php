<?php

class OrderPrototype {
    public $order_number;
    public $products = [];
    public $total_price;

    public function clone() {
        
        return clone $this;
    }
}

class Order {
    public $order_number;
    public $products = [];
    public $total_price;

    public function __construct(OrderPrototype $prototype) {
        $this->order_number = $prototype->order_number;
        $this->products = $prototype->products; 
        $this->total_price = $prototype->total_price;
    }
}


$prototype_order = new OrderPrototype();
$prototype_order->order_number = 2005;
$prototype_order->products = ["Product A", "Product B", "Product C"];
$prototype_order->total_price = 200.00;

$order1 = new Order($prototype_order->clone());
$order1->order_number = 2006;  
$order1->total_price = 300.00;  

$order2 = new Order($prototype_order->clone());
$order2->order_number = 2007;  
$order2->products[] = "Product D";  

// Выводим информацию о заказах
echo "Order 1:\n";
echo "Order Number: " . $order1->order_number . "\n";
echo "Products: " . implode(", ", $order1->products) . "\n";
echo "Total Price: " . $order1->total_price . "\n";

echo "\nOrder 2:\n";
echo "Order Number: " . $order2->order_number . "\n";
echo "Products: " . implode(", ", $order2->products) . "\n";
echo "Total Price: " . $order2->total_price . "\n";

?>
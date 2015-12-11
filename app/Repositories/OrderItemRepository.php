<?php namespace App\Repositories;


use App\OrderItem;

class OrderItemRepository {

    public function getOrderItems($orderId)
    {
        return OrderItem::where('order_id', $orderId)->get();
    }
    /**
     * Save order item
     *
     * @param $name
     * @param $amount
     * @param $orderId
     */
    public function save($name, $amount, $orderId)
    {
        OrderItem::create([
            'name' => $name,
            'amount' => $amount,
            'order_id' => $orderId
        ]);
    }
}
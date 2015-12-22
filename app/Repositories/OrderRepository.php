<?php namespace App\Repositories;


use App\Order;

class OrderRepository {

    /**
     * Find all orders
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Order::withTrashed()->paginate(15);
    }

    /**
     * find Order by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Order::withTrashed()->where('id',$id)->first();
    }

    /**
     * get Orders that belong to user
     *
     * @param $userId
     * @return mixed
     */
    public function getUsersOrders($userId)
    {
        return Order::withTrashed()->where('user_id', $userId)->get();
    }

    /**
     * Save order in the db
     *
     * @param $stripeOrderData
     */
    public function save($stripeOrderData)
    {
        $order = new Order;
        $order->number = substr(md5(microtime()),rand(0,26),3) . time();
        $order->email = $stripeOrderData['stripeEmail'];
        $order->user_id  = \Auth::user()->id;
        $order->billing_name = $stripeOrderData['stripeBillingName'];
        $order->billing_address = $stripeOrderData['stripeBillingAddressLine1'];
        $order->billing_city = $stripeOrderData['stripeBillingAddressCity'];
        $order->billing_zip = $stripeOrderData['stripeBillingAddressZip'];
        $order->billing_country = $stripeOrderData['stripeBillingAddressCountry'];
        $order->billing_country_code = $stripeOrderData['stripeBillingAddressCountryCode'];
        $order->shipping_name = $stripeOrderData['stripeShippingName'];
        $order->shipping_address = $stripeOrderData['stripeShippingAddressLine1'];
        $order->shipping_city = $stripeOrderData['stripeShippingAddressCity'];
        $order->shipping_zip = $stripeOrderData['stripeShippingAddressZip'];
        $order->shipping_country = $stripeOrderData['stripeShippingAddressCountry'];
        $order->shipping_country_code = $stripeOrderData['stripeShippingAddressCountryCode'];
        $order->save();


    }

    /**
     * find the id of the last saved order
     *
     * @return mixed
     */
    public function findLastSavedId()
    {
        return Order::orderBy('updated_at', 'desc')->first()->id;
    }

}
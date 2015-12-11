<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {


    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(is_admin())
        {
            $orders = $this->orderRepository->all();
        }

        else
        {
            $orders = $this->orderRepository->getUsersOrders(Auth::user()->id);
        }

        return view('orders.index', compact('orders'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = $this->orderRepository->findById($id);

        return view('orders.show', compact('order'));
    }

    public function destroy($id)
    {
        $this->orderRepository->findById($id)->delete();

        return redirect()->back();
    }
}

<?php namespace App\Http\Controllers;

use App\Commands\SaveOrderCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $total = $request->input('total');

        return view('payment.index', compact('total'));
	}

    public function pay(Request $request)
    {
       $orderItems = array_count_values($request->session()->get('products'));

        Auth::user()->charge($request->input('total'), [
            'source' => $request->input('stripeToken'),
            'receipt_email' => $request->input('stripeEmail'),
        ]);

        $this->dispatch(new SaveOrderCommand($request->all(), $orderItems));

        $request->session()->forget('products');

        app()->make('flash')->success('Payment completed');

        return redirect('order');
    }
}

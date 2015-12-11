<?php namespace App\Http\Controllers;

use App\Commands\GetProductsFromCart;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productsArray = Session::get('products') ? : [];

        $productsInTheCart = array_count_values($productsArray);

        $products = $this->dispatch(new GetProductsFromCart($productsInTheCart));

        $total = 0;

        foreach ($products as $product )
        {
            $total += $product[0]->price * $product[1];
        }


        return view('cart.index', compact('products', 'total'));
    }

    /**
     * Add product to cart
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function add(Request $request)
    {
        if($request->ajax())
        {
            $productId = $request->input('product_id');

            $request->session()->push('products', $productId);

            $numberOfProducts = count($request->session()->get('products'));

            return response()->json([$productId,$numberOfProducts]);
        }
    }

    /**
     * Delete product from shopping cart
     *
     * @param Request $request
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(Request $request, $productId)
    {
        $products = $request->session()->pull('products');

        $products = $this->setArrayMemberCount($productId, $products, 0);

        $request->session()->put('products', $products);

        return redirect()->back();
    }
    /**
     * Empty entire shopping cart
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->session()->forget('products');

        app()->make('flash')->info('All products deleted.');

        return redirect()->back();
    }

    /**
     * Change number of specific product (amount) in the cart
     *
     * @param Request $request
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeAmount(CartRequest $request, $productId)
    {
        $amount = $request->input('product-amount');

        $products = $request->session()->pull('products');

        $products = $this->setArrayMemberCount($productId, $products, $amount);

        $request->session()->put('products', $products);

        return redirect()->back();
    }

    /**
     * Set element with some value to have
     *
     * @param $productId
     * @param $products
     * @param $amount
     * @return array
     */
    private function setArrayMemberCount($productId, $products, $amount)
    {
        $position = array_search($productId, $products);

        foreach ($products as $key => $value)
        {
            if ( $value == $productId ) unset($products[$key]);
        }

        if ($amount == 0) return $products;

        $products[$position] = $productId;

        $amount --;

        sort($products);

        while ($amount > 0)
        {
            $products[] = $productId;
            $amount --;
        }

        return $products;
    }

}

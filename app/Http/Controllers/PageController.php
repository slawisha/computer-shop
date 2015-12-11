<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class PageController extends Controller {

    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->all();

        return view('pages.index', compact('products'));
    }

}

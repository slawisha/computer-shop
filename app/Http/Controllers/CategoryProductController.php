<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CategoryProductController extends Controller {

    public function index($categoryId, ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $categoryName = $categoryRepository->findById($categoryId)->name;

        $products = $productRepository->findByCategory($categoryId);

        return view('categories.products.index', compact('products', 'categoryName'));
    }
}

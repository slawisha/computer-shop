<?php namespace App\Http\Controllers;

use App\Commands\SaveProduct;
use App\Commands\UpdateProduct;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductController extends Controller {

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    function __construct(ProductRepository $productRepository, ImageRepository $imageRepository)
    {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->dispatch(new SaveProduct($request->all()));

        Flash::success('Product saved');

        return \Redirect::route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findById($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findById($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->dispatch(new UpdateProduct($id, $request->all()));

        Flash::success('Product updated');

        return \Redirect::route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        Flash::info('Product deleted');

        return \Redirect::back();
    }

    public function showProductImages($id)
    {
        //dd($id);

        $product = $this->productRepository->findById($id);

        return view('products.images', compact('product'));
    }

}

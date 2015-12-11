<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends Controller {

	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categoryRepository->all();

		return view('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CategoryRequest $request
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$this->categoryRepository->save($request->input('name'));

		Flash::success('Category saved');

		return redirect()->route('admin.category.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = $this->categoryRepository->findById($id);

		return view('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param CategoryRequest $request
	 * @return Response
	 */
	public function update($id, CategoryRequest $request)
	{
		$this->categoryRepository->update($id, $request->input('name'));

		Flash::success('Category updated');

		return  redirect()->route('admin.category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->categoryRepository->delete($id);

		Flash::info('Category deleted');

		return redirect()->back();
	}

}

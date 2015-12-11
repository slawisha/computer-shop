<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use App\Repositories\ManufacturerRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ManufacturerController extends Controller {

	/**
	 * @var ManufacturerRepository
	 */
	private $manufacturerRepository;

	function __construct(ManufacturerRepository $manufacturerRepository)
	{
		$this->manufacturerRepository = $manufacturerRepository;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$manufacturers = $this->manufacturerRepository->all();

		return view('manufacturers.index', compact('manufacturers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('manufacturers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ManufacturerRequest $request
	 * @return Response
	 */
	public function store(ManufacturerRequest $request)
	{
		$this->manufacturerRepository->save($request->input('name'));

		Flash::success('Manufacturer created succesufuly');

		return \Redirect::route('admin.manufacturer.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$manufacturer = $this->manufacturerRepository->findById($id);

		return view('manufacturers.edit', compact('manufacturer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param ManufacturerRequest $request
	 * @return Response
	 */
	public function update($id, ManufacturerRequest $request)
	{
		$this->manufacturerRepository->update($id, $request->input('name'));

		Flash::success('Manufacturer updated');

		return \Redirect::route('admin.manufacturer.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->manufacturerRepository->delete($id);

		Flash::info('Manufacturer deleted');

		return \Redirect::back();
	}

}

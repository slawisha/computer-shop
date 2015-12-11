<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller {

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @param Request $request
	 * @return Response
	 * @throws \Exception
	 */
	public function destroy($id, Request $request)
	{
		Image::find($id)->delete();

		\File::delete($request->input('image_url'), $request->input('image_thumb_url'));

		return \Redirect::route('admin.product.images', ['id' => $request->input('product_id')]);
	}

}

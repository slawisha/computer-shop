<?php namespace App\Commands;

use App\Commands\Command;

class UpdateProduct extends Command {

	/**
	 * @var
	 */
	public $productId;
	/**
	 * @var
	 */
	public $input;

	/**
	 * Create a new command instance.
	 *
	 * @param $productId
	 * @param $input
	 */
	public function __construct($productId, $input)
	{
		//
		$this->productId = $productId;
		$this->input = $input;
	}

}

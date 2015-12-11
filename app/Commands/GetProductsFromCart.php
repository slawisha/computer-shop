<?php namespace App\Commands;

use App\Commands\Command;

class GetProductsFromCart extends Command {

	public $productsInTheCart;

	/**
	 * Create a new command instance.
	 *
	 * @param $productsInTheCart
	 */
	public function __construct($productsInTheCart)
	{
		$this->productsInTheCart = $productsInTheCart;
	}

}

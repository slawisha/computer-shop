<?php namespace App\Commands;

use App\Commands\Command;

class SaveOrderCommand extends Command {

	public $input;

	public $orderItems;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($input, $orderItems)
	{
		//
		$this->input = $input;
		$this->orderItems = $orderItems;
	}

}

<?php namespace App\Commands;

use App\Commands\Command;

class SaveProduct extends Command {

	/**
	 * @var
	 */
	public $input;

	/**
	 * Create a new command instance.
	 *
	 * @param $input
	 */
	public function __construct($input)
	{
		$this->input = $input;
	}

}

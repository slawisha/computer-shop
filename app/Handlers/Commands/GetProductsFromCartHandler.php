<?php namespace App\Handlers\Commands;

use App\Commands\GetProductsFromCart;

use App\Repositories\ProductRepository;
use Illuminate\Queue\InteractsWithQueue;

class GetProductsFromCartHandler {

    protected $productRepository;

    /**
     * Create the command handler.
     *
     * @param ProductRepository $productRepository
     */
	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	/**
	 * Handle the command.
	 *
	 * @param  GetProductsFromCart  $command
	 * @return void
	 */
	public function handle(GetProductsFromCart $command)
	{
		$products = [];

		foreach( $command->productsInTheCart as $productId => $productAmount )
		{
			$products[] =  [$this->productRepository->findById($productId), $productAmount];
		}

        return $products;
	}

}

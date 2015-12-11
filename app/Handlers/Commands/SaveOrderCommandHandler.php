<?php namespace App\Handlers\Commands;

use App\Commands\SaveOrderCommand;

use App\Product;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SaveOrderCommandHandler {

	/**
	 * @var OrderRepository
	 */
	private $orderRepository;
	/**
	 * @var OrderItemRepository
	 */
	private $orderItemRepository;
	/**
	 * @var ProductRepository
	 */
	private $productRepository;

	/**
	 * Create the command handler.
	 *
	 * @param OrderRepository $orderRepository
	 * @param OrderItemRepository $orderItemRepository
	 * @param ProductRepository $productRepository
	 */
	public function __construct(OrderRepository $orderRepository, OrderItemRepository $orderItemRepository,
								ProductRepository $productRepository)
	{
		//
		$this->orderRepository = $orderRepository;
		$this->orderItemRepository = $orderItemRepository;
		$this->productRepository = $productRepository;
	}

	/**
	 * Handle the command.
	 *
	 * @param  SaveOrderCommand  $command
	 * @return void
	 */
	public function handle(SaveOrderCommand $command)
	{
		$this->orderRepository->save($command->input);

		$lastOrderId = $this->orderRepository->findLastSavedId();

		foreach($command->orderItems as $id => $amount)
		{
			$orderItemName = $this->productRepository->findById($id)->name;

			$this->orderItemRepository->save($orderItemName, $amount, $lastOrderId );
		}

        $order = $this->orderRepository->findById($lastOrderId);

        Mail::send('emails.orderinfo', ['order' => $order ], function($m) use($order){
            $m->to($order->email, $order->billing_name)->subject('Your Order Information');
        });
	}

}

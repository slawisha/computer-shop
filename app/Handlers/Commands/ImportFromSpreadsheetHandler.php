<?php namespace App\Handlers\Commands;

use App\Commands\ImportFromSpreadsheet;

use App\Repositories\CategoryRepository;
use App\Repositories\ExcelImportRepository;
use App\Repositories\ManufacturerRepository;
use App\Repositories\ProductRepository;
use Illuminate\Queue\InteractsWithQueue;

class ImportFromSpreadsheetHandler {

	/**
	 * @var ExcelImportRepository
	 */
	private $excelImportRepository;
	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;
	/**
	 * @var ManufacturerRepository
	 */
	private $manufacturerRepository;
	/**
	 * @var ProductRepository
	 */
	private $productRepository;

	/**
	 * Create the command handler.
	 *
	 * @param ExcelImportRepository $excelImportRepository
	 * @param CategoryRepository $categoryRepository
	 * @param ManufacturerRepository $manufacturerRepository
	 * @param ProductRepository $productRepository
	 */
	public function __construct(ExcelImportRepository $excelImportRepository, CategoryRepository $categoryRepository,
					ManufacturerRepository $manufacturerRepository, ProductRepository $productRepository)
	{
		$this->excelImportRepository = $excelImportRepository;
		$this->categoryRepository = $categoryRepository;
		$this->manufacturerRepository = $manufacturerRepository;
		$this->productRepository = $productRepository;
	}

	/**
	 * Handle the command.
	 *
	 * @internal param ImportFromSpreadsheet $command
	 */
	public function handle()
	{
		$this->categoryRepository->saveFromList($this->excelImportRepository->getColumn('category'));
		$this->manufacturerRepository->saveFromList($this->excelImportRepository->getColumn('manufacturer'));
		$this->productRepository->saveFromList($this->excelImportRepository->getAllColumns());
	}

}

<?php  namespace App\Repositories;


use Maatwebsite\Excel\Facades\Excel;

class ExcelImportRepository {

    /**
     * Import data from excel spreadsheet
     *
     * @return mixed
     */
    private function import()
    {
        return Excel::load('storage/imports/file.xlsx', function ($reader)
        {
        })->get()->toArray();
    }

    /**
     * Get column from excel spreadsheet
     *
     * @param $columnName
     * @return array
     */
    public function getColumn($columnName)
    {
        $importArray = $this->import();
        $result = [];

        foreach ($importArray as $item)
        {
            if ( !in_array($item[$columnName], $result) ) $result[] = $item[$columnName];
        }

        return $result;
    }

    /**
     * get all coulmn from excel spreadsheet
     *
     * @return mixed
     */
    public function getAllColumns()
    {
        return $this->import();
    }
}
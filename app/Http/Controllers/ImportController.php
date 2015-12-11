<?php namespace App\Http\Controllers;

use App\Commands\ImportFromSpreadsheet;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelSpredsheetRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class ImportController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('import.index');
    }

    /**
     * Store data imported from excel spreadsheet
     *
     * @param ExcelSpredsheetRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ExcelSpredsheetRequest $request)
    {
        $request->file('excel-file')->move('storage/imports', 'file.xlsx');

        $this->dispatch(new ImportFromSpreadsheet);

        Flash::info('Data imported');

        return redirect('admin/import');
    }

}

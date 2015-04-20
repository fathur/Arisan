<?php

use \Carbon\Carbon;
use \PHPExcel;
use \PHPExcel_IOFactory as IO_Factory;
use \PHPExcel_Cell as Cell;
use \PHPExcel_Cell_DataType as DataType;

class ImportController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('login');
	}

	public function getUpload()
	{
		return View::make('import.upload');
	}

	public function postUpload()
	{
		if (Input::file('sheet')->isValid())
		{
			// Upload file
			$filename = Input::file('sheet')->getClientOriginalName();
			$moveLocation = Input::file('sheet')->move(
				'app/storage/upload', 
				$filename
			);

			// Import file
			$objPHPExcel = IO_Factory::load( $moveLocation );
			$worksheets = $objPHPExcel->getWorksheetIterator();

			foreach ($worksheets as $worksheet) {
				$worksheetTitle     = $worksheet->getTitle();
				$highestRow         = $worksheet->getHighestRow(); // e.g. 10
				$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
				$highestColumnIndex = Cell::columnIndexFromString($highestColumn);

				for ($row = 2; $row <= $highestRow; $row++) { 

					$data = array(
						'undian_number'		=> $worksheet->getCellByColumnAndRow(1-1, $row),
						'member_number' 	=> $worksheet->getCellByColumnAndRow(2-1, $row),
						'member_name' 		=> $worksheet->getCellByColumnAndRow(3-1, $row),
						
					);

					$this->insert($data);
				}
			}

		}
	}

	private function insert($data) 
	{
		
	}
}
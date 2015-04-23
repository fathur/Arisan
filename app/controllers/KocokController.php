<?php

use Carbon\Carbon;

class KocokController extends \BaseController {

	protected $intervalKocok = 10; // dalam milisecond

	function __construct()
	{
		$this->beforeFilter('login');
	}

	public function getIndex()
	{

		return View::make('kocok.index')
			->with('interval', $this->intervalKocok);
	}

	public function getNomorUndian()
	{
		$undians = Undian::where('dikocok', false)
			->get();
		
		$numbers = [];
		foreach ($undians as $undian) {

			array_push($numbers, $undian->undian_number);
		}
		
		return $numbers;
	}

	public function getMenang($undian_number)
	{
		$undian = Undian::where('dikocok', false)
			->where('undian_number','=',$undian_number)
			->first();

		$random = Undian::find($undian->id);
		$random->dikocok = true;
		$random->dikocok_date = Carbon::now()->toDateTimeString();
		$random->save();

		return [$undian, $undian->member];
	}

}
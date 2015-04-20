<?php

use Carbon\Carbon;

class KocokController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('login');
	}

	public function getIndex()
	{
		return View::make('kocok.index');
	}

	public function getRandom()
	{
		//return [123,345,45,1213,35435,2313,4656,6786,1231,34,76,86,23,235,776,82,435,4686,11111,3423];
		// return 2345;

		$undian = Undian::take(1)
			->where('dikocok', false)
			->orderBy(DB::raw('RAND()'))
			->first();
		$random = Undian::find($undian->id);
		$random->dikocok = true;
		$random->dikocok_date = Carbon::now()->toDateTimeString();
		$random->save();
		return $undian;
	}

}
<?php

use Carbon\Carbon;

class KocokController extends \BaseController {

	protected $intervalKocok = 100; // dalam milisecond

	function __construct()
	{
		$this->beforeFilter('login');
	}

	public function getIndex()
	{

		return View::make('kocok.index')
			->with('interval', $this->intervalKocok);
	}

	public function getAcak()
	{
		$undian = Undian::take(1)
			->join('members','members.id','=','undians.member_id')
			->where('dikocok', false)
			->orderBy(DB::raw('RAND()'))
			->first();
		return $undian;
	}

	public function getMenang()
	{
		$undian = Undian::take(1)
			->join('members','members.id','=','undians.member_id')
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
<?php

class SearchController extends \BaseController {

	public function getIndex()
	{
		return View::make('search.index');
	}

	public function postResult()
	{
		$search = Input::get('search');	

		$members = Member::join('undians','members.id','=','undians.id')
			->where(function($query) use ($search)
			{
				$query->where('member_name', 'like', '%'.$search.'%');
				$query->orWhere('member_number','like', '%'.$search.'%');
				$query->orWhere('undian_number','like', '%'.$search.'%');
			})
			->get();


		if (count($members) == 1) {
			$member = $members[0];
			$message = 'Selamat';
			$memberCount = 99999;

		} else {
			$message = 'Ada '.count($members).' hasil pencarian. Coba cari lebih spesifik untuk ditampilkan!';
			$memberCount = 0;
			$member = 'xxx';

		}

		return View::make('search.result')
			->withSearch($search)
			->with('memberCount', $memberCount)
			->with('member', $member)
			->with('message', $message);
	}
}

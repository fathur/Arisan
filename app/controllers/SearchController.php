<?php

class SearchController extends \BaseController {

	public function getIndex()
	{
		return View::make('search.index');
	}

	public function getResult()
	{
		$search = Input::get('search');	

		/*$results = Member::join('undians','members.id','=','undians.member_id')
			->where(function($query) use ($search)
			{
				$query->where('member_name', 'like', '%'.$search.'%');
				$query->orWhere('member_number','like', '%'.$search.'%');
				$query->orWhere('undian_number','like', '%'.$search.'%');
			})
			->get();*/


		//dd($members[0]);
/*
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
			->with('message', $message);*/

		$resultsOne = Member::where('member_name', 'like', '%'.$search.'%')->get();
		$resultsTwo = Member::where('member_number', 'like', '%'.$search.'%')->get();
		$resultsThree = Undian::where('undian_number', 'like', '%'.$search.'%')->get();

		$results = [];

		if (count($resultsOne) > 0) {
			foreach ($resultsOne as $r) {
				$s['key']	= 'Nama Anggota';
				$s['val']	= $r->member_name;
				$s['num']	= $r->member_number;

				array_push($results, $s);
			}
		}

		if (count($resultsTwo) > 0) {
			foreach ($resultsTwo as $r) {
				$s['key']	= 'Nomor Anggota';
				$s['val']	= $r->member_number;
				$s['num']	= $r->member_number;
				array_push($results, $s);

			}
		}

		if (count($resultsThree) > 0) {
			foreach ($resultsThree as $r) {
				$s['key']	= 'Nomor Undian';
				$s['val']	= $r->undian_number;
				$s['num']	= $r->member->member_number;

				array_push($results, $s);

			}
		}

		return View::make('search.result')
			->with('search', $search)
			->with('results', $results);
	}

	public function getMember($member_number)
	{
		$search = Input::get('search');	

		$member = Member::where('member_number','=',$member_number)->first();
		//wheredd($member->id);
		$status = [
			'total' => Undian::where('member_id','=',$member->id)->count(),
			'sudah' => Undian::where('member_id','=',$member->id)->where('dikocok','=',true)->count(),
			'belum' => Undian::where('member_id','=',$member->id)->where('dikocok','=',false)->count()
		];

		//dd(DB::getQueryLog());

		return View::make('search.member')
			->with('search', $search)
			->with('member', $member)
			->with('status', $status);
	}
}

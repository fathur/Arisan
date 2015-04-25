<?php

class SearchController extends \BaseController {

	public function getIndex()
	{
		return View::make('search.index');
	}

	public function getResult()
	{
		$search = Input::get('search');	

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

		$status = [
			'total' => Undian::where('member_id','=',$member->id)->count(),
			'sudah' => Undian::where('member_id','=',$member->id)->where('dikocok','=',true)->count(),
			'belum' => Undian::where('member_id','=',$member->id)->where('dikocok','=',false)->count()
		];

		return View::make('search.member')
			->with('search', $search)
			->with('member', $member)
			->with('status', $status);
	}
}

<?php

class UndiansController extends \BaseController {

	protected $minNumber = 1;
	protected $maxNumber = 99999;

	function __construct()
	{
		$this->beforeFilter('login');
	}

	public function destroy($memberId, $undianId)
	{
		Undian::destroy($undianId);

		Session::flash('alertClass', 'alert-danger');
		Session::flash('message', 'Berhasil menghapus Voucher');
		return Redirect::route('members.show', $memberId);
	}

	public function getAll()
	{
		$undians = Undian::orderBy('undian_number', 'asc')
			->paginate(10);

		$status = [
			'total' => Undian::all()->count(),
			'sudah' => Undian::where('dikocok','=',true)->count(),
			'belum' => Undian::where('dikocok','=',false)->count()
		];

		return View::make('undians.index', compact('undians'))
			->with('undians', $undians)
			->with('status', $status);
	}

	public function getSearch()
	{
		return $this->index();
	}

	public function getResults()
	{
		$search = Input::get('search');
		$kocok = Input::get('kocok');

		$undians = DB::table('undians')
			->select(DB::raw('undians.id as undian_id'), 'member_id', 'undian_number', 'dikocok', 'dikocok_date', 'undians.created_at', 'undians.updated_at', 'member_number', 'member_name')
			->where(function($query) use ($search)
			{
				if ($search != '') {
					$query->where('undian_number','like','%'.$search.'%');
					$query->orWhere('member_name','like','%'.$search.'%');
				}
			})
			->where(function($query) use ($kocok)
			{
				if ($kocok == 'all') {
					$query->where('dikocok','=',0);
					$query->orWhere('dikocok','=',1);
				} else {
					if (!is_null($kocok)) {
						$query->where('dikocok','=',$kocok);
					}
				}
			})
			->join('members','members.id', '=', 'undians.member_id')
			->orderBy('dikocok_date', 'desc')
			//->orderBy('dikocok', 'desc')
			->orderBy('undian_number', 'asc')
			->paginate(10);

		//dd(DB::getQueryLog());

		$status = [
			'total' => Undian::all()->count(),
			'sudah' => Undian::where('dikocok','=',true)->count(),
			'belum' => Undian::where('dikocok','=',false)->count()
		];
			
		return View::make('undians.search_results', compact('undians'))
			->with('undians', $undians)
			->with('status', $status);
	}

	public function getUndo($id)
	{
		$undian = Undian::find($id);
		$undian->dikocok = false;
		$undian->save();

		Session::flash('alertClass', 'alert-warning');
		Session::flash('message', 'Berhasil!! Anda telah membatalkan '.$undian->member->member_name.' untuk mendapatkan undian');
		return Redirect::route('undian.all');
	}

	public function getGenerate($member_number)
	{
		$member = Member::where('member_number','=',$member_number)->first();

		if ($this->generate($member)) {
			Session::flash('alertClass', 'alert-success');
			Session::flash('message', 'Voucher baru telah terbuat');
			return Redirect::route('members.show', $member->id);
		}	
	}

	private function generate(Member $member)
	{
		$random_undian = mt_rand($this->minNumber, $this->maxNumber);

		$undian = Undian::where('undian_number','=',$random_undian)->get();

		if (count($undian) == 0) {

			$member->undians()->save(new Undian([
				'undian_number' => $random_undian
			]));

			return $random_undian;

		} 
		else {
			$this->generate($member);
		}
	}
}

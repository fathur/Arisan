<?php

class UndiansController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('login');
	}

	/**
	 * Display a listing of undians
	 *
	 * @return Response
	 */
	public function index()
	{
		$undians = Undian::join('members','members.id', '=', 'undians.member_id')
			->orderBy('undian_number', 'asc')
			->paginate(10);

		return View::make('undians.index', compact('undians'));
	}

	/**
	 * Show the form for creating a new undian
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('undians.create');
	}

	/**
	 * Store a newly created undian in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Undian::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Undian::create($data);

		return Redirect::route('undians.index');
	}

	/**
	 * Display the specified undian.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$undian = Undian::findOrFail($id);

		return View::make('undians.show', compact('undian'));
	}

	/**
	 * Show the form for editing the specified undian.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$undian = Undian::find($id);

		return View::make('undians.edit', compact('undian'));
	}

	/**
	 * Update the specified undian in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$undian = Undian::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Undian::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$undian->update($data);

		return Redirect::route('undians.index');
	}

	/**
	 * Remove the specified undian from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Undian::destroy($id);

		return Redirect::route('undians.index');
	}

	public function getSearch()
	{
		return $this->index();
	}

	public function postSearch()
	{
		$search = Input::get('search');
		$kocok = Input::get('kocok');

		$undians = DB::table('undians')
			->select(DB::raw('undians.id as undian_id'), 'member_id', 'undian_number', 'dikocok', 'dikocok_date', 'undians.created_at', 'undians.updated_at', 'member_number', 'member_name')
			->where(function($query) use ($search)
			{
				$query->where('undian_number','like','%'.$search.'%');
				$query->orWhere('member_name','like','%'.$search.'%');
			})
			->where(function($query) use ($kocok)
			{
				if ($kocok == 'all') {
					$query->where('dikocok','=',0);
					$query->orWhere('dikocok','=',1);
				} else {
					$query->where('dikocok','=',$kocok);
				}
			})
			->join('members','members.id', '=', 'undians.member_id')
			->orderBy('undian_number', 'asc')
			->paginate(10);
			
		return View::make('undians.index', compact('undians'));
	}

	public function getUndo($id)
	{
		$undian = Undian::find($id);
		$undian->dikocok = false;
		$undian->save();

		return Redirect::route('undian.index');
	}

}

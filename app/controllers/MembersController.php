<?php

class MembersController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('login');
	}

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = Member::with('undians')->paginate(10);

		$total = Member::all()->count();

		return View::make('members.index')
			->with('members', $members)
			->with('total', $total);
	}

	/**
	 * Show the form for creating a new member
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('members.create');
	}

	/**
	 * Store a newly created member in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$member = Member::create($data);

		return Redirect::route('members.show', $member->id);
	}

	/**
	 * Display the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::findOrFail($id);

		return View::make('members.show', compact('member'));
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = Member::find($id);

		return View::make('members.edit', compact('member'));
	}

	/**
	 * Update the specified member in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$member = Member::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$member->update($data);

		return Redirect::route('members.show', $id);
	}

	/**
	 * Remove the specified member from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$member = Member::find($id);

		foreach ($member->undians as $undian) {
			Undian::destroy($undian->id);
		}

		Member::destroy($id);

		return Redirect::route('members.index');
	}

	public function getSearch()
	{
		$searchInput = Input::get('search');
		$members = Member::where('member_name','like','%'.$searchInput.'%')
			->orWhere('member_number', 'like', '%'.$searchInput.'%')
			->paginate(10);

		$total = Member::all()->count();
		
		return View::make('members.index')
			->with('members', $members)
			->with('total', $total);
	}

	/** Truncate all data members and undians
	 */
	public function getTruncate()
	{
		DB::table('members')->truncate();
		DB::table('undians')->truncate();

		return Redirect::route('members.index');
	}

}

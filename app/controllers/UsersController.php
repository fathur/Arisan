<?php

class UsersController extends \BaseController {



	function __construct()
	{
		$this->beforeFilter('login');
	}

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}*/


		$user = Sentry::createUser(array(
			'email'     	=> Input::get('email'),
			'password'  	=> Input::get('password'),
			'first_name'	=> Input::get('first_name'),
			'last_name'		=> Input::get('last_name'),
			'activated' 	=> true,
		));

		Session::flash('alertClass', 'alert-success');
		Session::flash('message', 'Berhasil membuat user baru');
		return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		/*$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);*/

		$user = Sentry::findUserById($id);

		$user->email = Input::get('email');
    	$user->first_name = Input::get('first_name');
    	$user->last_name = Input::get('last_name');

    	if (Input::get('password') != '') {
    		$user->password = Input::get('password');
    	}

    	$user->save();

		Session::flash('alertClass', 'alert-success');
		Session::flash('message', 'Berhasil mengupdate user '. Input::get('first_name')	);
		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		Session::flash('alertClass', 'alert-danger');
		Session::flash('message', 'Berhasil menghapus user');
		return Redirect::route('users.index');
	}

}
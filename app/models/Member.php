<?php

class Member extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'member_number'	=> 'required',
		'member_name'	=> 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['member_number','member_name'];

	public function undians()
	{
		return $this->hasMany('Undian');
	}

}
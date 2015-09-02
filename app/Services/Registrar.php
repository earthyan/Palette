<?php namespace Palette\Services;

use Palette\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data){
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
      'name' => 'required|max:255',
      'group' => 'required'
		]);
	}
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data){
		return User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
      'name' => $data['name'],
      'disk_used' => '0',
      'disk_total' => '512',
      'tran_used' => '0',
      'group' => $data['group']
		]);
	}
}

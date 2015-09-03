<?php namespace Palette\Http\Controllers\Auth;

use Auth;
use Palette\User;
use Validator;
use Palette\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Palette\Services\Registrar;

class AuthController extends Controller {
  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  public function __construct(){
    $this->middleware('guest', ['except' => 'getLogout']);
  }

  public function postRegister(Request $request){
    $data = $request->all();

    $validator = $this->validator($data);

    if ($validator->fails()) {
      $this->throwValidationException($request, $validator);
    }

    Auth::login($this->create($data));

    return redirect($this->redirectPath());
  }

  protected function validator(array $data){
    return (new Registrar)->validator($data);
  }

  protected function create(array $data){
    return (new Registrar)->create($data);
  }
}

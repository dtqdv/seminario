<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input as Input;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'El campo :attribute no puede estar vacio' , 
            'max' => 'El campo :attribute no puede exceder el largo definido' , 
            'email' => 'El campo :attribute debe ser de tipo email' , 
            'unique' => 'Este :attribute ya existe' , 
            'min' => 'El campo :attribute debe contener al menos 6 caracteres' , 
            'confirmed' => 'Las contraseñas no coinciden'
        ];
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'apellido' => 'required|max:255'
        ] , $messages);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'apellido' => $data['apellido']
        ]);
    }

    public function loginDtqdv()
    {
        $data = Input::except('_token');
        //return dd($data);
        $messages = [
            'required' => 'El campo :attribute no puede estar vacio' , 
            'email' => 'El campo :attribute debe ser de tipo email' , 
        ];
        $validator = Validator::make($data, [
            'password' => 'required',
            'email' => 'required|email',
        ] , $messages);

        if (\Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->intended('/');
        }else{
            return redirect()->intended('/login')->withErrors($validator)->withInput();
        }       
    }
}

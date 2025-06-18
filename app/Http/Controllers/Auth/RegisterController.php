<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\BloodGroup;
use App\Models\UserType;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users',
            'email' => 'nullable|email|max:100|unique:users',
            'user_type' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:255',
            'photo' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'bg_id' => 'nullable|integer|exists:blood_groups,id',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'] ?? null,
            'code' => \App\Helpers\Qs::generateUserCode(),
            'user_type' => $data['user_type'],
            'dob' => $data['dob'] ?? null,
            'gender' => $data['gender'] ?? null,
            'photo' => $data['photo'] ?? 'http://localhost/global_assets/images/user.png',
            'phone' => $data['phone'] ?? null,
            'phone2' => $data['phone2'] ?? null,
            'bg_id' => $data['bg_id'] ?? null,
            'address' => $data['address'] ?? null,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $blood_groups = BloodGroup::all();
        $user_types = UserType::all();
        return view('auth.register', compact('blood_groups', 'user_types'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\District;
use App\Division;

use App\Notifications\VerifyRegistration;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // override showRegistrationForm

    public function showRegistrationForm()
    {

        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::orderBy('name', 'asc')->get();
        return view('auth.register', compact('district', 'divisions'));
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'division_id' => 'required|numeric',
            // 'district_id' => 'required|numeric',
            'city' => 'required',
            'phone' => 'required|max:11',
            'street_address' => 'relquired|max:100',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => str_slug($request->first_name.$request->last_name),
            'email' => $request->email,
            // 'division_id' => $request->division_id,
            // 'district_id' => $request->district_id,
            'city' => $request->city,
            'street_address' => $request->street_address,
            'phone' => $request->phone,
            'ip_address' => request()->ip(),
            'password' => bcrypt($request->password),
            'remember_token' => str_random(50),
            'status' => 1,

        ]);


        // $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'Customer added successfully');

        return redirect('/customer');
    }
}

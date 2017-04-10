<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        return Validator::make($data,
            [
                'member_fname' => 'required|max:255',
                'member_lname' => 'required|max:255',
                'user_email' => 'email|max:255|unique:users',
                //'member_dbirth' => 'date',
                'member_gender' => 'required',
                'user_name' => 'required|max:20|unique:users',
                'user_pword' => 'required|min:8|confirmed',
            ],
            [
                'confirmed' => 'Your passwords do not match.',
                'member_dbirth.date' => 'Your date of birth is invalid.'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $member = new Member([      
            'member_fname' => $data['member_fname'], 
            'member_lname' => $data['member_lname'], 
            'member_addr' => $data['member_addr'], 
            'member_dbirth' => $data['member_dbirth'], 
            'member_gender' => $data['member_gender']
        ]);

        //add new user record
        $user = User::create([
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_pword' => bcrypt($data['user_pword']),
        ]);


        //add member record
        $user->member()->save($member);

        //dd($user);

        // IMPORTANT!!! Always return the User instance.
        return $user;
    }
}

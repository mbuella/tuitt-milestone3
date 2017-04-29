<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\File;
use Storage;


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
    private function generateAvatar($user_name,$type = 'members') {
        //Avatars generated from Robohash.org
        $url = "https://api.adorable.io/avatars/150/$user_name";
        $temp_path = "storage/temp/{$user_name}.png";


        set_time_limit(0); 
        //download avatar in temp directory
        $content = file_get_contents($url);
        $store = Storage::disk('public')->put("temp/{$user_name}.png", $content);
        if($store) {
            //copy the file with auto id using Storage class
            $avatar = Storage::disk('public')->putFile("avatars/$type", new File($temp_path));
            //delete temp image
            unlink($temp_path);    

            return basename($avatar);
        }
        
        dd("Image download Failed!");

    }

    protected function create(array $data)
    {
        //generate a new avatar for the member
        $avatar = $this->generateAvatar($data['user_name']);

        //add new user record
        $user = User::create([
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_pword' => bcrypt($data['user_pword']),
        ]);

        $member = new Member([
            'member_fname' => $data['member_fname'], 
            'member_lname' => $data['member_lname'], 
            'member_addr' => $data['member_addr'], 
            'member_dbirth' => $data['member_dbirth'], 
            'member_gender' => $data['member_gender'],
            'avatar' => $avatar
        ]);

        $author_avatar = $this->generateAvatar($data['user_name'],'authors');

        //this time, create a default author for the user
        $author = new Author([
            'pen_name' => $data['user_name'],
            'avatar' => $author_avatar,
            'user_pword' => bcrypt($data['user_pword']),
        ]);

        //add member record
        $user->member()->save($member);

        //add author
        $user->authors()->save($author);

        // IMPORTANT!!! Always return the User instance.
        return $user;
    }
}

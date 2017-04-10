<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // composer for header profile
        View::composer(
            ['layout.header.profile','home'],
            function ($view) {
                $user = Auth::user();
                $member = $user->member;
                //get username
                $user_name = $user->user_name; 
                //get full name
                $fullname = $member->member_fname . " " . $member->member_lname;

                $view->with(
                    [
                        'user_name' => $user_name,
                        'fullname' => $fullname
                    ]
                );

            }
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
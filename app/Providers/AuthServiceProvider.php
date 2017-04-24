<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Chapter;

use App\Policies\ChapterPolicy;
use App\Policies\StoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        //Chapter::class => ChapterPolicy::class,
        //Story::class => StoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*** GATE POLICIES ***/

        /*** User ***/

        /*** Story ***/

        Gate::define('update-story', function ($user, $story) {
            return $user->id == $story->author->user_id;
        });


        /*** Chapter ***/

        Gate::define('create-chapter', function ($user, $story) {
            return $user->id == $story->author->user_id;
        });

        Gate::define('update-chapter', function ($user, $chapter) {
            return $user->id == $chapter->story->author->user_id;
        });

        Gate::define('delete-chapter', function ($user, $chapter) {
            return $user->id == $chapter->story->author->user_id;
        });
    }
}

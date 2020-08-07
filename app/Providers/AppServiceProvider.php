<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Profile\ProfileRepositoryInterface::class,
            \App\Repositories\Profile\ProfileRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Community\CommunityRepositoryInterface::class,
            \App\Repositories\Community\CommunityRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Comment\CommentRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Follower\FollowerRepositoryInterface::class,
            \App\Repositories\Follower\FollowerRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Notification\NotificationRepositoryInterface::class,
            \App\Repositories\Notification\NotificationRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\CSRF\CsrfRepositoryInterface::class,
            \App\Repositories\CSRF\CsrfRepository::class,

        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

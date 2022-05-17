<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Models\Paper;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $papers = Paper::all();
        $users = User::all();

        $lastMonthPapers = Paper::whereMonth('created_at', '=', Carbon::now()->month)->get();
        $lastMonthUsers = User::whereMonth('created_at', '=', Carbon::now()->month)->get();
        $latestUsers = User::latest()->take(3)->get();

        view()->share('papers', $papers);
        view()->share('users', $users);
        view()->share('lastMonthPapers', $lastMonthPapers);
        view()->share('lastMonthUsers', $lastMonthUsers);
        view()->share('latestUsers', $latestUsers);
    }
}

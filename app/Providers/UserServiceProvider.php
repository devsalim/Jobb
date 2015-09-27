<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Induser;
use App\Corpuser;

class UserServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('includes.sidebar', function($view){
			if(Auth::user()->identifier == 1){
				$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
			}else if(Auth::user()->identifier == 2){
				$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
			}
			$view->with('user', $user);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Induser;
use App\Corpuser;
use App\Postactivity;

class UserServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('includes.sidebar', function($view){
			$favouritesCount = 0;
			$thanksCount = 0;
			if(Auth::user()->identifier == 1){
				$user = Induser::where('id', '=', Auth::user()->induser_id)->first();

				$favouritesCount = Postactivity::with('user')
									      ->where('fav_post', '=', 1)
									      ->where('user_id', '=', Auth::user()->induser_id)
									      ->orderBy('id', 'desc')
								          ->sum('postactivities.fav_post');
				$thanksCount = Postactivity::with('user', 'post')
								      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
									  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
									  ->where('postactivities.thanks', '=', 1)
								      ->orderBy('postactivities.id', 'desc')
								      ->sum('postactivities.thanks');

			}else if(Auth::user()->identifier == 2){
				$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
			}
			$view->with('session_user', $user)->with('favouritesCount', $favouritesCount)->with('thanksCount', $thanksCount);
		});

		view()->composer('includes.header', function($view){
			if(Auth::user()->identifier == 1 || Auth::user()->identifier == 2){
				$applications = Postactivity::with('user', 'post')
											->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
											->where('postjobs.individual_id', '=', Auth::user()->induser_id)
											->where('postactivities.apply', '=', 1)
											->orderBy('postactivities.id', 'desc')
											->take(5)
											->get(['postactivities.id', 'postjobs.unique_id', 'postactivities.apply', 'postactivities.apply_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
				$thanks = Postactivity::with('user', 'post')
								      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
									  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
									  ->where('postactivities.thanks', '=', 1)
								      ->orderBy('postactivities.id', 'desc')
								      ->take(5)
								      ->get(['postactivities.id', 'postjobs.unique_id', 'postactivities.thanks', 'postactivities.thanks_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
				$favourites = Postactivity::with('user')
									      ->where('fav_post', '=', 1)
									      ->where('user_id', '=', Auth::user()->induser_id)
									      ->orderBy('id', 'desc')
								          ->get(['id', 'fav_post', 'fav_post_dtTime', 'user_id', 'post_id']);
				$thanksCount = Postactivity::with('user', 'post')
								      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
									  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
									  ->where('postactivities.thanks', '=', 1)
								      ->orderBy('postactivities.id', 'desc')
								      ->sum('postactivities.thanks');
				$applicationsCount = Postactivity::with('user', 'post')
											->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
											->where('postjobs.individual_id', '=', Auth::user()->induser_id)
											->where('postactivities.apply', '=', 1)
											->orderBy('postactivities.id', 'desc')
											->sum('postactivities.apply');
			}
			$view->with('applications', $applications)
			  	 ->with('thanks', $thanks)
			  	 ->with('favourites', $favourites)
			  	 ->with('thanksCount', $thanksCount)
			  	 ->with('applicationsCount', $applicationsCount);	
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

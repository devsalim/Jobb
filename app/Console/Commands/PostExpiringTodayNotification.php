<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\Notification;
use App\Postjob;
use App\User;
use DB;

class PostExpiringTodayNotification extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'postexpiring:notify';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command will send notification about post expiring today to post user.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		\Log::info('Expire notification started @ ' . \Carbon\Carbon::now());
		$tz = new \DateTimeZone('Asia/Kolkata');
		$today = \Carbon\Carbon::now($tz)->format('Y-m-d');

		$posts = Postjob::where(DB::raw('date(post_expire_Dt)'), '=', $today)->get(['id', 'unique_id', 'individual_id', 'corporate_id']);

		foreach ($posts as $post) {
			if($post->individual_id != null){
				$uid = User::where('induser_id', '=', $post->individual_id)->pluck('id');
			}else if($post->corporate_id != null){
				$uid = User::where('corpuser_id', '=', $post->corporate_id)->pluck('id');
			}
			$notification = new Notification();
			$notification->from_user = null;
			$notification->to_user = $uid;			
			$notification->remark = 'Your post - '.$post->unique_id.' getting expired today.';
			$notification->operation = 'job expire';
			$notification->save();
		}
		\Log::info('Expire notification ended @ ' . \Carbon\Carbon::now());
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}

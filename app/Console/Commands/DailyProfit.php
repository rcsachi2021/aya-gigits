<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserProfit;
use App\Models\User;

class DailyProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save daily profit';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return Command::SUCCESS;
        //$users = User::all()->where('active_status', 1);
        //Log::info('here');
        $users = User::all()->where('active_status', 1)->where('user_type','user');
        //return $users;
        //\Log::info(var_dump($users));
        //\Log::info(print_r($users, true));
        foreach($users as $user){
            $plan = $user->plan;
            $userID = $user->id;
            switch($plan)
            {
                case "pollux":
                    $min = 12;
                    $max = 50;
                    break;
                case "antares":
                    $min = 20;
                    $max = 50;
                    break;
                case "tauri":
                    $min = 80;
                    $max = 120;
                    break;
                case "exclusive":
                    $min = 120;
                    $max = 250;    
                default:
                    $min = 12;
                    $max = 50;
            }            
           
            $profitPercent = rand($min,$max);

            UserProfit::create([
                'user_id' => $userID,
                'plan' => $plan,
                'profit' => $profitPercent,
                'profit_date' => date('Y-m-d')
            ]);
           
        }
    }
}

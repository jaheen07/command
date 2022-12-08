<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\wallet;

class rexoit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rexoit:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command increases salary of users';

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
     * @return int
     */
    public function handle()
    {
        foreach(wallet::all() as $wallet){
            
            wallet::find($wallet->id)->update([
                'salary_ammount' => ($wallet::find($wallet->id)->salary_ammount) + ($wallet::find($wallet->id)->cash_ammount),
            ]);
        }
        $this->info('salary added successfully');
    }
}

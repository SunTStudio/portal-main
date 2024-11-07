<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class LogoutAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logout:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logout All User';

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
        User::query()->update(['is_logged_in' => 0]);
        $this->info('Semua User telah logout');
        return 0;
    }
}

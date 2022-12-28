<?php

namespace App\Console\Commands;

use App\Models\XWEB_VIP;
use Illuminate\Console\Command;

class RemoveVipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:vip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove VIP Status in every hour';

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
        $now = time();
        $get = XWEB_VIP::get();

        foreach ($get as $i => $gets) {
            if ($get[$i]['duration'] <= $now)
            {
                XWEB_VIP::where('account', $get[$i]['account'])->update(['expires' => 'Expired']);
            }
        }


        return 0;
    }
}

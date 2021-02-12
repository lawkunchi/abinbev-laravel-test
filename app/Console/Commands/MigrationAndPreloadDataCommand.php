<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrationAndPreloadDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:migrate-database-and-load-predefined-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        print "-----------------------------------------------------------------------------------\r\n";
        print "--------   MIGRATING DB TABLES  \r\n";
        print "-----------------------------------------------------------------------------------\r\n";
        print "\r\n";
        sleep(1);

      $this->call('migrate');  

      sleep(1);

      print "--- MIGRATION COMPLETED\r\n";
      sleep(1);

       print "-----------------------------------------------------------------------------------\r\n";
        print "--------   SEEDING THE DB  \r\n";
        print "-----------------------------------------------------------------------------------\r\n";
        sleep(1);


        print "\r\n";   

        $this->call('db:seed');  
        sleep(1);

       print "--- DB MIGRATION AND SEEDING DONE\r\n";
    }


}

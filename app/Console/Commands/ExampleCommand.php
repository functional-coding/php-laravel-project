<?php

namespace App\Console\Commands;

use App\Console\Command;

class ExampleCommand extends Command
{
    protected $signature = 'command:example';

    public function handle()
    {
        dd('Example Command');
    }
}

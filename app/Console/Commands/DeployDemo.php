<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deploy-demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Resetting demo database...');
        $this->call('migrate:fresh', ['--force' => true]);
    
        if (app()->environment('demo')) {
            $this->info('Seeding demo data...');
            $this->call('db:seed', ['--force' => true]);
        }
    
        $this->info('⚡ Caching Laravel config and routes...');
        $this->call('event:cache');
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('view:cache');
    
        $this->info('🔨 Compiling frontend assets...');
        exec('npm ci --prefer-offline --no-audit');
        exec('npm run build');
    
        $this->info('Demo deployment complete.');
    }
}

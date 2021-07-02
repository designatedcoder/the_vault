<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VoyagerAdminInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voyageradmin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs custom dummy data.';

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
    public function handle() {
        $this->loadDefaults();
    }

    protected function loadDefaults() {
        if ($this->confirm('This will delete All current data. Are you sure?')) {

            $this->call('migrate:fresh', [
                '--seed' => true,
            ]);

            $this->call('db:seed', [
                '--class' => 'VoyagerDatabaseSeeder'
            ]);

            $this->call('db:seed', [
                '--class' => 'VoyagerDummyDatabaseSeeder'
            ]);

            $this->call('db:seed', [
                '--class' => 'DataTypesTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'DataRowsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'MenuItemsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'RolesTableSeederCustom',
                '--force' => true,
            ]);

            $this->call('db:seed', [
                '--class' => 'PermissionsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'PermissionRoleTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'UsersTableSeederCustom',
            ]);

            $this->info('Dummy data has been installed!');
        }
    }
}

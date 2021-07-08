<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

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
        if ($this->confirm('This will delete All current data. Are you sure?')) {
             $this->loadDefaults();
            $this->info('Dummy data has been installed!');
        }
    }

    protected function loadDefaults() {

        File::deleteDirectory(public_path('storage/profile-photos'));
        File::deleteDirectory(public_path('storage/settings'));
        File::deleteDirectory(public_path('storage/pages'));
        File::deleteDirectory(public_path('storage/posts'));
        File::deleteDirectory(public_path('storage/users'));

        $this->callSilent('storage:link');

        $copySuccess = [
            File::copyDirectory(public_path('storage/images/settings'), public_path('storage/settings')),
            File::copyDirectory(public_path('storage/images/pages'), public_path('storage/pages')),
            File::copyDirectory(public_path('storage/images/posts'), public_path('storage/posts')),
            File::copyDirectory(public_path('storage/images/avatar'), public_path('storage/users')),
        ];

        if ($copySuccess) {
            $this->info('Images successfully copied to storage folder.');
        }

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

        $this->call('db:seed', [
            '--class' => 'SettingsTableSeederCustom',
        ]);
    }
}

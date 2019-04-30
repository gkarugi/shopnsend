<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\ShopnsendAccount;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateSuperAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administrator:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create administrator account';

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
    public function handle()
    {
        if (! Role::find(1)) {
            $this->error('Role definitions have not been run. please update the role definitions first');
            return;
        }

        $name = $this->ask('Enter full name');
        $email = $this->ask('Enter the admin Email address');
        $phone = $this->ask('Enter the admin phone number');
        $password = $this->secret('Enter the admin\'s password?');

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt($password);
        $user->save();

        $user->markPhoneAsVerified();

        // TODO: refactor how roles are attached to user
        $user->roles()->attach(1);

        ShopnsendAccount::create();

        $this->info('Successfully created the Administrator account');
    }
}

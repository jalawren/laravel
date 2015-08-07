<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->import();
    }
}

<?php

use App\Permission;
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    protected $user;
    protected $role;
    protected $permission;

    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->import();
        $this->role->import();
        $this->permission->import();

        $perm = $this->role->find(200000);

        $perm->permissions()->attach(4000);
        $perm->permissions()->attach(4001);
        $perm->permissions()->attach(4002);
        $perm->permissions()->attach(4003);
        $perm->permissions()->attach(4004);
        $perm->permissions()->attach(4005);
        $perm->permissions()->attach(4006);
        $perm->permissions()->attach(4007);

        $perm->users()->attach(100000);

    }
}

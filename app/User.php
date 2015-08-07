<?php

namespace App;

use Excel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Storage;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function import()
    {
        $file = 'BR_USERS.XLSX';

        if ( Storage::exists($file))
        {
            $this->truncate();

            Excel::load('/storage/app/'. $file, function($reader) {

                $reader->each(function ($row) {

                    $array = [
                        'id'          => $row->id,
                        'first_name'        => $row->first_name,
                        'last_name'        => $row->last_name,
                        'user_name'       => $row->user_name,
                        'email' => $row->email,
                        'password'     => bcrypt('dohc2000'),
                    ];

                    $this->create($array);
                });
            });

            return 'User Table Imported Successfully!';
        }
        else
        {
            return $file . ' not found!';
        }

    }

}

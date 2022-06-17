<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'User';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'UserId', 'FirstName', 'MiddleName', 'LastName', 'Title', 'Email', 'Company', 'PhoneNumber', 'Password', 'StreetAddress1',
        'StreetAddress2', 'City', 'State', 'ZipCode', 'Country', 'Description', 'CreateDate', 'AccountStatus', 'MailingList','Subscribed', 'Role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // os campos que irei liberar
//    protected $fillable = [
//        'firstName',
//        'lastName',
//        'email',
//        'password',
//    ];

// os campos que irei bloquear
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function insert(array $data)
    {
//        $this->firstName = $data['firstName'];
//        $this->lastName = $data['lastName'];
//        $this->email = $data['email'];
//        $this->password = bcrypt($data['password']);
//        return $this->save();
        $data['password'] = bcrypt($data['password']);
        return $this->create($data);
    }
}

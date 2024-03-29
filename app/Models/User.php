<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->user_id) {
                while (true) {
                    try {
                        $latest = User::where('role', $user->role)->latest('user_id')->first();

                        $uid = 100;

                        if ($latest != null && $latest->exists()) {
                            $uid = random_int(101, 999);
                        }

                        if ($user->role == 'admin') {
                            $user->user_id = 'A' . $uid;
                        }
                        elseif ($user->role == 'customer') {
                            $user->user_id = 'C' . $uid;
                        }
                        elseif ($user->role == 'employee') {
                            $user->user_id = 'E' . $uid;
                        }
//                        $user->user_id = ($user->role !== 'admin' ? 'C' : 'A').$uid;
                        break;

                    } catch (QueryException $exception) {
                        continue;
                    }
                }
            }
        });
    }
}

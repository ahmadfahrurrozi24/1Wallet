<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ["id"];
    protected $with = ["role"];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function record()
    {
        return $this->hasMany(Record::class, "user_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function scopeReBalance()
    {
        $totalRecord = Record::MyLastTransaction()->get()->sum("amount");
        $firstBalance = auth()->user()->first_balance;
        $currentBalance = $firstBalance + $totalRecord;

        $this->find(auth()->user()->id)->update([
            "current_balance" => $currentBalance
        ]);
    }
}

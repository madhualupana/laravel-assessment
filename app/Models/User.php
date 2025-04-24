<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Events\UserSaved;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'prefixname',
        'username',
        'firstname',
        'middlename',
        'lastname',
        'suffixname',
        'username',
        'email',
        'photo',
        'type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'saved' => UserSaved::class,
    ];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function getMiddleInitialAttribute()
    {
        return $this->middlename ? strtoupper(substr($this->middlename, 0, 1)) . '.' : '';
    }

    public function getFullNameAttribute()
    {
        $name = $this->firstname;
        
        if ($this->middlename) {
            $name .= ' ' . $this->middlename;
        }
        
        $name .= ' ' . $this->lastname;
        
        if ($this->suffixname) {
            $name .= ' ' . $this->suffixname;
        }
        
        return $name;
    }

    public function getAvatarAttribute()
    {
        return $this->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->firstname . ' ' . $this->lastname);
    }
}
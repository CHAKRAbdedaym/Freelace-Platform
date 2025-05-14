<?php

namespace App\Models;
use App\Models\Gig;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // In App\Models\User
    public function gigs(): HasMany
    {
        return $this->hasMany(Gig::class);
    }


    public function orders()
{
    return $this->hasMany(Order::class);
}



public function isAdmin()
{
    return $this->role === 'admin';
}

public function isFreelancer()
{
    return $this->role === 'freelancer';
}

public function isClient()
{
    return $this->role === 'client';
}

public function reviews()
{
    return $this->hasMany(Review::class);
}


}

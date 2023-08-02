<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserHobbies;
use App\Models\Hobbies;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];  

    /**
     * 
     * @var array
     */
    protected $appends = [
        'user_hobbie_names',
    ];
    
    /**
     * Get all of the hobbies for the user.
     */
    public function hobbies() {
        return $this->hasManyThrough(Hobbies::class, UserHobbies::class, 'user_id', 'id');
    }

    /**
     * 
     * @return string
     */
    public function getUserHobbieNamesAttribute(): string {  
        return $this->hobbies->implode('hobbie_name', ', ');
    }
 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Hobbies;

class UserHobbies extends Model
{
    use HasFactory;    
    
    /**
     * Get the User 
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the Hobby 
     */
    public function hobby() {
        return $this->belongsTo(Hobbies::class, 'hobby_id', 'id');
    }
}

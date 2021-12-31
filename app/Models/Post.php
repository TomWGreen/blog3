<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
    
    protected $dates = ['created_at', 'updated_at'];
    
    /**
     * This model is associated with the User model.
     */
    public function user () {
        return $this->belongsTo(User::class);
    }
    
}

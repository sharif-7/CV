<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'describe',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'github',
        'hero_picture',
        'profile_picture',
        'job_title',
        'birthday',
        'website',
        'phone',
        'city',
        'age',
        'degree',
        'email',
        'freelance',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

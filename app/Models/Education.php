<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';
    protected $fillable = ['title', 'year_of_graduate', 'university', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

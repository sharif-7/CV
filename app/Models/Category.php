<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

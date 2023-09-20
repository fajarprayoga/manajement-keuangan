<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topic';
    protected $fillable = [
        'name', // Add more fields as needed.
        'address',
        'contact',
        'image',
    ];
}

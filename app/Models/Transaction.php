<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = [
        'user_id', // Add more fields as needed.
        'category_id',
        'topic_id',
        'transaction_date',
        'amount',
        'type',
        'description',
    ];
}

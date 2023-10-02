<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        'type', //income || expense
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'id', 'topic_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }
}

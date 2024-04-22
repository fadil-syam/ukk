<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function book() {
        return $this->belongsTo(book::class, 'book_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

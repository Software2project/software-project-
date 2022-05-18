<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $table = 'papers';

    protected $fillable = [
        'user_id',
        'title',
        'src',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

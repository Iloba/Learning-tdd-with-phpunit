<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Music extends Model
{
    use RefreshDatabase;
    use HasFactory;

    protected $fillable = [
        'title',
        'music'
    ];
}

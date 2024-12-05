<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ideasis extends Model
{
    use HasFactory;

    protected $table = 'ideasis'; // Nama tabel

    protected $fillable = [
        'title',
        'title_en',
        'subtitle',
        'subtitle_en',
        'content',
        'content_en',
        'image',
        'is_approved',
        'is_share',
        'created_by',
        'updated_by',
        'slug',
        
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'inactive_at',
    ];

    public function comments()
    {
        return $this->hasMany(IdeasisComment::class, 'id', 'id'); // relasi ke IdeasisComment
    }

}

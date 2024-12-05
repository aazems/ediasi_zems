<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeasisComment extends Model
{
    use HasFactory;

    protected $table = 'ideasis_comment';
    protected $primaryKey = 'id_comment';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user',
        'comment',
        'reply',
        'likes',
        'report',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'status'
    ];

    // Relationship to Ideasis
    public function ideasis()
    {
        return $this->belongsTo(Ideasis::class, 'id');
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
}

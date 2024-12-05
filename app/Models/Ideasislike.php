<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IdeasisLike extends Model
{
    use HasFactory;

    protected $table = 'ideasis_like';
    protected $primaryKey = 'id_like';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_like',
        'user',
        'created_date',

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory;
    use HasApiTokens;
    // use SoftDeletes;
    use Sluggable;
    protected $fillable =
    [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class) ;
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
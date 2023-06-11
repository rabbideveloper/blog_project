<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $post_data)
 */
class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}

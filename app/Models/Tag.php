<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string)
 * @method static where(string $string, int $int)
 */
class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}

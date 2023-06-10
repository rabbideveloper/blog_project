<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $category_data)
 * @method static orderBy(string $string)
 * @method static pluck(string $string, string $string1)
 * @method static where(string $string, int $int)
 */
class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
}

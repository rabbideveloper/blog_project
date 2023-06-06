<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $category_data)
 * @method static orderBy(string $string)
 */
class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
}

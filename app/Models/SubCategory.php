<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static select(string $string, string $string1)
 */
class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category (){
       return $this->belongsTo(Category::class);
    }
}

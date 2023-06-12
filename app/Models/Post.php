<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $post_data)
 * @method static latest()
 */
class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category (): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

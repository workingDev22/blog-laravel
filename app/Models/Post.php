<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

//    protected $fillable = ["content"];

    protected $table = 'posts';
    protected $guarded = false;

    public function Tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}

<?php

namespace App\Models;

use Dom\Attr;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'author_name',
        'title',
        'body',
    ];

    protected function date(): Attribute
    {
        return Attribute::get(fn($value) => date("F j, Y, g:i a", strtotime($this->created_at)));
    }
}

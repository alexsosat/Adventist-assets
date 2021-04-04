<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'Image';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pub_id', 'image_file'
    ];
}

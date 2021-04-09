<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'Publication';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'title', 'desc', 'url','dimension', 'format'
    ];

}

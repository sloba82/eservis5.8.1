<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $table = 'media';

    protected $fillable = [
        'entity_type',
        'entity_type_id',
        'name',
        'type',
        'path'
    ];
}

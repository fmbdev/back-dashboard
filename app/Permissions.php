<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'id', 'table', 'fields', 'executiveId'
    ];

    public function executive(){
        return $this->belongsTo('App\Executives');
    }
}

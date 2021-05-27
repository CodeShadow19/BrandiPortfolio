<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountModel extends Model
{
    public $table='count';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}

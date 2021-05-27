<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturesModel extends Model
{
    public $table='features';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}

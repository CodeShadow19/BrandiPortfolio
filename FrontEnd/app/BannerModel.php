<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    public $table='banner';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}

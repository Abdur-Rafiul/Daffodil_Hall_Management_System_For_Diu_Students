<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manyStudentModel extends Model
{
    use HasFactory;
    protected $table='unit_student';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public  $timestamps=false;
}

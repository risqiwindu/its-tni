<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentKuesionerStatus extends Model
{
    protected $table = "kuesioner_status";
    protected $primarykey = "id";
    protected $fillable = ["id","user_id","status_belajar"];
    public $timestamps = false;
}

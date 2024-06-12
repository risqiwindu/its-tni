<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentKuesionerStatus extends Model
{
    protected $table = "kuesioner_status";
    protected $primarykey = "id";
    protected $fillable = ["id","user_id","status_belajar","course_category_id","audio","visual","kinestetik"];
    public $timestamps = false;
}

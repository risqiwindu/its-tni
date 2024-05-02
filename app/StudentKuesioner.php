<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentKuesioner extends Model
{
    protected $table = "kuesioner";
    protected $primarykey = "id";
    protected $fillable = ["id","pertanyaan","jawabanVisual","jawabanAudio","jawabanKinestetik"];
    public $timestamps = false;

}

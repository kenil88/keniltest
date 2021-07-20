<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'incidents';
    public $timestamps = false;
    protected $dates = ['incidentDate', 'createDate', 'modifyDate'];

    protected $fillable = ['location', 'title', 'category', 'people', 'comments'];
}
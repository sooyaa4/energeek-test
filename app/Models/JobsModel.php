<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
    use HasFactory;
    public $table = 'jobs';
    protected $guarded = ['id'];
    protected $fillable = [
        'name'
    ];
}

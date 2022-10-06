<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsModel extends Model
{
    use HasFactory;
    public $table = 'skills';
    protected $guarded = ['id'];
    protected $fillable = [
        'name'
    ];

    public function skilset()
    {
        return $this->hasMany(SkillSetModel::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatesModel extends Model
{
    use HasFactory;
    public $table = 'candidates';
    protected $guarded = ['id'];

    public function skillsets()
    {
        return $this->hasMany(SkillSetModel::class, 'candidate_id', 'id');
    }
}

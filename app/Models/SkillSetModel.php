<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSetModel extends Model
{
    use HasFactory;
    public $table = 'skill_sets';
    // protected $guarded = ['id'];
    protected $fillable = [
        'candidate_id',
        'skill_id'
    ];
    public $timestamps = false;
    public function setSkillAttribute($skill_id)
    {
        $this->attributes['skill_id'] = implode(",", $skill_id);
    }
    public function getGetSkillListAttribute()
    {
        $skill_id = explode(",", $this->attributes['skill_id']);
        $result = SkillsModel::whereIn('id', $skill_id)->get();

        return $result;
    }

}

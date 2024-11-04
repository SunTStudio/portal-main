<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_departement extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departement_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'detail_dept_id');
    }
}

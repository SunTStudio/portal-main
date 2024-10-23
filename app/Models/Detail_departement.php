<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_departement extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'detail_dept_id');
    }
}
    
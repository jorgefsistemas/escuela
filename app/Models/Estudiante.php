<?php

namespace App\Models;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    use HasFactory;

 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',

    ];
    //Relationships Many to Many
public function materias(){
    return $this->belongsToMany(Materia::class, 'estudiante_materia');
}


}

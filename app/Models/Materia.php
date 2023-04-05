<?php

namespace App\Models;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    //Relationships Many to Many
    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class, 'estudiante_materia');
    }
}

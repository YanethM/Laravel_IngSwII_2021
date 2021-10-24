<?php

namespace App\Models;
use App\Models\Owner;
use App\Models\PetImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'pet_name',
        'clinical_history',
        'pet_type',
        'pedigree'
    ];

    /* Relación de 1 a 1 
    Foto del perro en la clinica*/
    public function image(){
        return $this->hasOne(PetImage::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
}

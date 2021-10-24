<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'document_type',
        'document'
    ]; 
    public function pet(){
        return $this->hasMany(Pet::class);
    }
}

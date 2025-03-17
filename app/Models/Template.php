<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail'];

    public function businessCards()
    {
        return $this->hasMany(BusinessCard::class);
    }
}

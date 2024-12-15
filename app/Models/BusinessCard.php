<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BusinessCard extends Model
{
    use HasFactory;

    public $incrementing = false; // Désactive l'auto-incrémentation
    protected $keyType = 'string'; // Clé primaire en tant que chaîne (UUID)

    protected $fillable = [
        'id', 'name', 'job_title', 'company', 'email', 'phone',
        'website', 'address', 'template_id', 'colors', 'drive_link', 'user_id', 'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        // Génère automatiquement un UUID pour le champ `id`
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Relation avec le modèle Template
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

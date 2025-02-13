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
        'id', 'full_name', 'job_title', 'company', 'email', 'phone',
        'website', 'address', 'template_id', 'colors', 'drive_link',
        'user_id', 'is_active','social_links','logo','qr_code_url','photo_url',
        'description','whatsapp_number','personal_message','date_of_birth',
        'gender','company_size','registration_number','industry','tax_id',
        'contact_person','position_contact_person','additional_services',
    ];

    protected $casts = [
        'social_links' => 'array',
        'additional_services' => 'array',
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

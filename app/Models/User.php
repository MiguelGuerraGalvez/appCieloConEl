<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'icon',
        'tel_number',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'tel_number' => 'integer',
            'password' => 'hashed',
        ];
    }

    public function hermandad() {
        return $this->hasOne(Hermandade::class, 'id_usuario');
    }


    public static function eliminar($id) {
        $registro = parent::findOrFail($id);
        if (File::exists(public_path('img/' . $registro->icon)) && $registro->icon != 'Usuario_Default.png') {
            File::delete(public_path('img/' . $registro->icon));
        }

        $registro->delete();
    }
}

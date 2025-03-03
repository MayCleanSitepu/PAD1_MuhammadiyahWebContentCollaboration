<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'foto_profile',
        'foto_kta',
        'alamat',
        'nomor_keanggotaan',
        'cabang',
        'tempat_lahir',
        'wilayah',
        'daerah',
        'tanggal_lahir',
    ];

    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function kajians()
    {
        return $this->hasMany(Kajian::class, 'id_user'); // Sesuaikan 'user_id' dengan nama kolom foreign key di tabel 'kajian'
    }

    public function versions()
    {
        return $this->hasMany(versionHistory::class, 'user_id');
    }

    public function is_admin() {
        $adminUsernames = ['admint']; // Username admin yang diizinkan
    
        return in_array($this->username, $adminUsernames);
    }
    
}

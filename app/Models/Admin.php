<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Memudahkan untuk otentikasi

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_admin';
    protected $keyType = 'string';
    protected $fillable = [
        'id_admin',
        'nama',
        'password',
        'no_telp',
    ];

    // Agar kolom password tidak ditampilkan saat model diambil
    protected $hidden = [
        'password',
    ];

    /** Nama kolom yang akan digunakan untuk otentikasi
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id_admin';
    }

    /** Mendapatkan identifier dari admin
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getAttribute('id_admin');
    }

    /** Mendapatkan password dari admin
     * @return mixed
     */
    public function getAuthPassword()
    {
        return $this->getAttribute('password');
    }
}

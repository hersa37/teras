<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tenant';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nama_tenant',
        'kategori_tenant',
        'password',
        'no_telp',
    ];

    protected $hidden = [
        'password',
    ];

    /** Buat id_tenant secara otomatis berdasarkan waktu dan random number
     * @return void
     */
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->id_tenant = 'TE' . time()+ (random_int(1, 99999) * random_int(1, 99));
        });
    }

}

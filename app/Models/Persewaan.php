<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persewaan extends Model
{
    use HasFactory;

    protected $table = 'persewaan';
    protected $primaryKey = 'id_persewaan';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_persewaan',
        'id_tenant',
        'id_admin',
        'id_lokasi',
        'start_date',
        'end_date'
    ];
}

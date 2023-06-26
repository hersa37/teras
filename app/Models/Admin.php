<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_admin';
    protected $keyType = 'string';

    public function getAuthIdentifierName()
    {
        return 'id_admin';
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute('id_admin');
    }

    public function getAuthPassword()
    {
        return $this->getAttribute('password');
    }
}

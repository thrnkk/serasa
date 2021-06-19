<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'cpf', 'password', 'api_token'];
    protected $hidden = ['id', 'password', 'created_at', 'updated_at'];

    public function contracts() {
        return $this->hasMany(Contract::class);
    }
}

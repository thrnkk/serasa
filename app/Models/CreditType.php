<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditType extends Model
{
    protected $table  = "credit_types";
	protected $fillable = ['type', 'description'];
	protected $hidden = ['id', 'created_at', 'updated_at'];

	public function offers() {
		return $this->hasMany(Offer::class);
	}
}

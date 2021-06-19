<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table  = "partners";
	protected $fillable = ['name', 'description', 'approval_percentage'];
	protected $hidden = ['id', 'created_at', 'updated_at'];

	public function offers() {
		return $this->hasMany(Offer::class);
	}
}

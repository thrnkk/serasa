<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\Client;

class Contract extends Model
{
    protected $table  = "contracts";
	protected $fillable = ['offer_id', 'client_id', 'date'];
	protected $hidden = ['offer_id', 'client_id', 'created_at', 'updated_at'];

	public function creditOffers() {
		return $this->belongsToMany(Offer::class);
	}

	public function clients() {
		return $this->belongsToMany(Client::class);
	}
}

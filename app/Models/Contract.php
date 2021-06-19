<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\Client;

class Contract extends Model
{
    protected $table  = "contracts";
	protected $fillable = ['offer_id', 'client_id'];
	protected $hidden = ['offer_id', 'client_id', 'created_at', 'updated_at'];

	public function offer(){
	    return $this->belongsToMany(Offer::class, 'contracts', 'id', 'offer_id');
	}

	public function client(){
	    return $this->belongsToMany(Client::class, 'contracts', 'id', 'client_id');
	}

}

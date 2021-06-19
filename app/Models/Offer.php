<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use App\Models\CreditType;
use App\Models\Client;

class Offer extends Model
{
	protected $table  = "credit_offers";
	protected $fillable = ['partner_id', 'credit_type_id', 'value', 'installments', 'installments_value', 'tax_rate_percent'];
	protected $hidden = ['partner_id', 'credit_type_id', 'created_at', 'updated_at', 'pivot'];

	public function creditType() {
		return $this->belongsTo(CreditType::class);
	}

	public function partner() {
		return $this->belongsTo(Partner::class);
	}

	public function clients(){
	    return $this->belongsToMany(Client::class, 'contracts');
	}

}

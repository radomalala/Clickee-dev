<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encasement extends Model
{
    /**
	 * @var string
	 */
	protected $table = 'encasement';
	/**
	 * @var string
	 */
	protected $primaryKey = 'encasement_id';
	/**
	 * @var array
	 */
	protected $fillable = ['customer_id', 'discount', 'total_ht', 'total_ttc', 'discount', 'tva'];

	public function products()
	{
		return $this->hasMany(Product::class, 'product_id', 'product_id');
	}

	public function customer()
	{
		return $this->hasOne(Customer::class,'customer_id','customer_id');
	}
}

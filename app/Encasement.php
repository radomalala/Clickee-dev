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
	protected $fillable = ['customer_id', 'product_id', 'attribute_size_id', 'attribute_color_id', 'parent_category', 'sub_category', 'promo_code_id', 'discount'];

	public function product()
	{
		return $this->hasOne(Product::class, 'product_id', 'product_id');
	}
}

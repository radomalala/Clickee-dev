<?php
namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Customer;
use App\Encasement;
use App\EncasementProduct;
use Carbon\Carbon;
/**
 * Class CustomerRepository
 *
 * @package App\Repositories\Backend
 */
class CustomerRepository implements CustomerRepositoryInterface
{
	protected $model;

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

	public function create($input){
		dd($input);
	}

	public function getById($id)
    {
		return Customer::where('customer_id', $id)->get()->first();
    }

	public function update($id,$input){
		$customer = $this->model->findOrNew($id);
		$customer->first_name = $input['first_name'];
		$customer->last_name = $input['last_name'];
		$customer->address = $input['address'];
		$customer->postal_code = $input['postal_code'];
		$customer->country = $input['country'];
		$customer->phone_number = $input['phone_number'];
		$customer->email = $input['email'];
		$customer->birthday = Carbon::parse($input['birthday']);
		$customer->save();
		
		$encasement = new Encasement();
		$encasement->customer_id = $this->model->customer_id;
		$encasement->total_ht = $input['total_ht'];
		$encasement->save();

		for ($i=1; $i <= sizeof($input['product_name']); $i++) {
			$encasement_product = new EncasementProduct();
			$encasement_product->encasement_id = $encasement->encasement_id;
			$encasement_product->product_id = $input['product_name'][$i];
			$encasement_product->attribute_size_id = $input['product_size'][$i];
			$encasement_product->attribute_color_id = $input['product_color'][$i];
			$encasement_product->discount = $input['discount'][$i];
			$encasement_product->promo_code_id = $input['promo_code'][$i];
			$encasement_product->parent_category = $input['parent_category'][$i];
			$encasement_product->sub_category = $input['sub_category'][$i];
			$encasement_product->save();
		}
		return $this->model;
	}

	public function deleteById($id){
		return $this->model->where('customer_id', $id)
			->delete();
	}

	public function save($input){
		$customer = new Customer();
		$this->model->first_name = $input['first_name'];
		$this->model->last_name = $input['last_name'];
		$this->model->address = $input['address'];
		$this->model->postal_code = $input['postal_code'];
		$this->model->country = $input['country'];
		$this->model->phone_number = $input['phone_number'];
		$this->model->email = $input['email'];
		$this->model->birthday = $input['birthday'];
		$this->model->save();
		
		$encasement = new Encasement();
		$encasement->customer_id = $this->model->customer_id;
		$encasement->total_ht = $input['total_ht'];
		$encasement->save();

		for ($i=1; $i <= sizeof($input['product_name']); $i++) {
			$encasement_product = new EncasementProduct();
			$encasement_product->encasement_id = $encasement->encasement_id;
			$encasement_product->product_id = $input['product_name'][$i];
			$encasement_product->attribute_size_id = $input['product_size'][$i];
			$encasement_product->attribute_color_id = $input['product_color'][$i];
			$encasement_product->discount = $input['discount'][$i];
			$encasement_product->promo_code_id = $input['promo_code'][$i];
			$encasement_product->parent_category = $input['parent_category'][$i];
			$encasement_product->sub_category = $input['sub_category'][$i];
			$encasement_product->save();
		}

		return $this->model;
	}

	public function getAll(){
		return $this->model->get();
	}
}			
<?php
namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Customer;
use App\Encasement;
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
		$this->model->first_name = $input['first_name'];
		$this->model->last_name = $input['last_name'];
		$this->model->address = $input['address'];
		$this->model->postal_code = $input['postal_code'];
		$this->model->country = $input['country'];
		$this->model->phone_number = $input['phone_number'];
		$this->model->email = $input['email'];
		$this->model->birthday = $input['birthday'];
		$this->model->save();

		for ($i=1; $i <= sizeof($input['product_name']); $i++) { 
			$encasement = new Encasement();
			$encasement->customer_id = $this->model->customer_id;
			$encasement->product_id = $input['product_name'][$i];
			$encasement->attribute_size_id = $input['product_size'][$i];
			$encasement->attribute_color_id = $input['product_color'][$i];
			$encasement->discount = $input['discount'][$i];
			$encasement->promo_code_id = $input['promo_code'][$i];
			$encasement->parent_category = $input['parent_category'][$i];
			$encasement->sub_category = $input['sub_category'][$i];
			$encasement->save();
		}

		return $this->model;
	}

	public function deleteById($id){
		return $this->model->where('customer_id', $id)
			->delete();
	}

	public function save($input){
		$this->model->first_name = $input['first_name'];
		$this->model->last_name = $input['last_name'];
		$this->model->address = $input['address'];
		$this->model->postal_code = $input['postal_code'];
		$this->model->country = $input['country'];
		$this->model->phone_number = $input['phone_number'];
		$this->model->email = $input['email'];
		$this->model->birthday = $input['birthday'];
		$this->model->save();
		for ($i=1; $i <= sizeof($input['product_name']); $i++) { 
			$encasement = new Encasement();
			$encasement->customer_id = $this->model->customer_id;
			$encasement->product_id = $input['product_name'][$i];
			$encasement->attribute_size_id = $input['product_size'][$i];
			$encasement->attribute_color_id = $input['product_color'][$i];
			$encasement->discount = $input['discount'][$i];
			$encasement->promo_code_id = $input['promo_code'][$i];
			$encasement->parent_category = $input['parent_category'][$i];
			$encasement->sub_category = $input['sub_category'][$i];
			$encasement->save();
		}
		return $this->model;
	}

	public function getAll(){
		return $this->model->get();
	}
}
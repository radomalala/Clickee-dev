<?php
namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Customer;

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
		return $this->model;
	}

	public function getAll(){
		return $this->model->get();
	}
}
<?php

namespace App\Http\Controllers\Front\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $customer_repository;
    protected $product_repository;

    public function __construct(CustomerRepositoryInterface $customer_rep_interface, ProductRepositoryInterface $product_repos){
        $this->customer_repository = $customer_rep_interface;
        $this->product_repository = $product_repos;
    }

    public function index()
    {
        $customers = $this->customer_repository->getAll();
        return view('front.merchant.customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = [];
        $product_is_active = $this->product_repository->getAll();
        return view('front.merchant.customer.form', compact('customer','product_is_active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        );
        $validator = \Validator::make($request->all(), $rules);   
        if($validator->fails()){   
            return Redirect::back()->withInput()->withErrors($validator);   
        }else{
            $customer = $this->customer_repository->save($request->all());
            flash()->success(config('message.customer.add-success'));
        }
        return \Redirect('merchant/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customer_repository->getById($id);
        $products = $this->product_repository->getAll();
        return view('front.merchant.customer.form')->with('customer', $customer)->with('product_is_active', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        );
        $validator = \Validator::make($request->all(), $rules);   
        if($validator->fails()){   
            return Redirect::back()->withInput()->withErrors($validator);   
        }else{
            $customer = $this->customer_repository->update($id, $request->all());
            flash()->success(config('message.customer.update-success'));
        }
        return \Redirect('merchant/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customer_repository->deleteById($id);
        flash()->success(config('message.customer.delete-success'));
        return \Redirect('merchant/customer');
    }

    public function encasement()
    {
        return view('front.merchant.customer.encasement');
    }

    public function addContact()
    {
        $customer = [];
        return view('front.merchant.customer.contact_customer',compact('customer'));
    }

    public function saveContactCustomer(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        );
        $validator = \Validator::make($request->all(), $rules);   
        if($validator->fails()){   
            return Redirect::back()->withInput()->withErrors($validator);   
        }else{
            $customer = $this->customer_repository->saveContactCustomer($request->all());
            flash()->success("Enregistrement avec succèss !");
        }
        return \Redirect('merchant/promotion');
    }
}

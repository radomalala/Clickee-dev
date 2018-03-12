<?php

namespace App\Http\Controllers\Front\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $customer_repository;

    public function __construct(CustomerRepositoryInterface $customer_rep_interface){
        $this->customer_repository = $customer_rep_interface;
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
        return view('front.merchant.customer.form')->with('customer', false);
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
            flash()->success("Enregistrement du client avec succèss !");
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
        return view('front.merchant.customer.form')->with('customer', $customer);
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
            flash()->success("Modification du client avec succèss !");
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
        flash()->success("Suppression du client avec succèss ! ");
        return \Redirect('merchant/customer');
    }
}

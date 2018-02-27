<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;

class AutocompleteController extends Controller
{
    //
    protected $product_repository;

    public function __construct(ProductRepositoryInterface $product_interface, StoreRepositoryInterface $store_repo)
    {
    	$this->product_repository = $product_interface;
        $this->store_repository = $store_repo;
    }

    public function productName(Request $request)
    {
    	
    	$product_json = array('product_name' => '', 'brand_name' => '', 'img' => '');
        $product_names = [];
        $all_product = [];

        $categorie_id = Input::get('category');
         if(Cookie::has('zip_code') || Cookie::has('distance')){
            $zip_code = Cookie::get('zip_code');
            $zip_code = str_replace(' ', '+', $zip_code);
            $zip_code = str_replace('%', '+', $zip_code);
            $requested_distance = intval(Cookie::get('distance'));
            $responses = [];
            $stores = $this->store_repository->getAll();
            foreach ($stores as $store) {
                $responses[] = $store->store_name;
                $address1 = str_replace(' ', '+', $store->address1);               
                $address2 = str_replace(' ', '+', $store->address2);
                $city = str_replace(' ', '+', $store->city);

                $country_name = str_replace(' ', '+', $store->country->name);
                $zip = $store->sip;
                $files = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$zip_code.'&destinations='.$address1.','.$city.','.$zip.'&sensor=false';
                $result = file_get_contents($files);
                $output = json_decode($result, true);
                if($output['status'] != "INVALID_REQUEST" && !empty($output['rows'][0]) && !empty($output['rows'][0]['elements'][0])){
                    if($output['rows'][0]['elements'][0]['status'] != "NOT_FOUND" && $output['rows'][0]['elements'][0]['status'] != "ZERO_RESULTS"){
                        $distances = $output['rows'][0]['elements'][0]['distance']['text'];
                        $distances = str_replace(',', '', $distances);
                        $distance = intval($distances);
                        if($distance < $requested_distance){
                           foreach ($store->brands as $brand) {
                              $brand_ids[] = (string) $brand->brand_id;
                           }
                        }
                    }
                }
            }
            /*$brands_param = [];
            If(Input::has('brand'))
                $brands_param = explode(',', Input::get('brand'));
            else
                $brands_param = $brand_ids;*/
            Input::merge(['local_store' => 'a store local']);
            //dd($brand_ids);
            if(!empty($brand_ids)){
                if($categorie_id != 0){
                   $all_product = $this->product_repository->getProductByCategory($categorie_id, $brand_ids);
                }else{
                   $all_product = $this->product_repository->getProductByCategory([], $brand_ids);
                }
            }else{
                $brand_ids[] = 0;
                if($categorie_id != 0){
                   $all_product = $this->product_repository->getProductByCategory($categorie_id, $brand_ids);
                }else{
                   $all_product = $this->product_repository->getProductByCategory([], $brand_ids);
                }
            }
        }else{
           if($categorie_id != 0){
               $all_product = $this->product_repository->getProductByCategory($categorie_id, []);
            }else{
               $all_product = $this->product_repository->getProductByCategory([], []);
            }
        }
        
		foreach ($all_product as $product) {
			$product_json['product_name'] = $product->getByLanguageId(app('language')->language_id)->product_name;
            $product_json['brand_name'] =  $product->brand['brand_name'];
            $product_json['img'] = 'upload/product/thumb/'.$product->images;
    	    $product_names[] = $product_json;
        }

		return response()->json($product_names);
    }
}

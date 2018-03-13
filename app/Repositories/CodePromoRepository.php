<?php

namespace App\Repositories;

use App\Interfaces\CodePromoRepositoryInterface;
use App\Models\CodePromo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CodePromoRepository implements CodePromoRepositoryInterface
{
    protected $model;

    public function __construct(CodePromo $code_promo)
    {
        $this->model = $code_promo;
    }
    public function save($input){
        $this->model->user_id = \Auth::user()->user_id;
        $this->model->code_promo_name = $input['code_promo_name'];
        $this->model->date_debut = Carbon::parse($input['date_debut']);
        $this->model->date_fin = Carbon::parse($input['date_fin']);
        $this->model->quantity_max = $input['quantity_max'];
        $this->model->save();
        if (isset($input['categories'])) {
            foreach ($input['categories'] as $category) {
                $this->model->categories()->attach($category);
            }
        }
        return $this->model;
    }

    public function getAll($user_id){
        return $this->model->with('categories','categories.french')->where('user_id',$user_id)->orderBy('code_promo_id', 'desc')->get();
    }

    public function updateById($code_promo_id, $input){
        $code_promo = $this->model->findOrNew($code_promo_id);
        $code_promo->code_promo_name = $input['code_promo_name'];
        $code_promo->date_debut = Carbon::parse($input['date_debut']);
        $code_promo->date_fin = Carbon::parse($input['date_fin']);
        $code_promo->quantity_max = $input['quantity_max'];
        $code_promo->save();
        if (isset($input['categories'])) {
            foreach ($input['categories'] as $category) {
                $code_promo->categories()->attach($category);
            }
        }
        return $code_promo;
    }

    public function deleteById($code_promo_id){
        return $this->model->where('code_promo_id', $code_promo_id)->delete();
    }

    public function getById($code_promo_id){
        return $this->model->where('code_promo_id', $code_promo_id)->first();
    }
}
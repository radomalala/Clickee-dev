<?php

namespace App\Repositories;

use App\Interfaces\PromotionRepositoryInterface;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PromotionRepository implements PromotionRepositoryInterface
{
    protected $model;

    public function __construct(Promotion $promotion)
    {
        $this->model = $promotion;
    }
    public function save($input){
        $this->model->user_id = \Auth::user()->user_id;
        $this->model->campagne_name = $input['campagne_name'];
        $this->model->code_promo_id = $input['code_promo'];
        $this->model->subject = $input['subject'];
        $this->model->description = $input['description'];
        $this->model->send_number = 75;
        $this->model->save();
        return $this->model;
    }

    public function getAll($user_id){
        return $this->model->where('user_id',$user_id)->orderBy('promotion_id', 'desc')->get();
    }

    public function updateById($promotion_id, $input){
        
    }

    public function deleteById($promotion_id){
        
    }

    public function getById($promotion_id){
        
    }
}
@extends('merchant.layout.master')

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('frontend/css/font-awesome.min.css') !!}
    {!! Html::style('backend/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('backend/plugins/select2/select2.css') !!}
    {!! Html::style('backend/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/dist/css/skins/skin-black-light.css') !!}
    {!! Html::style('backend/css/style.css') !!}

    {!! Html::style('frontend/css/style-clickee.css') !!}
@stop
@section('content')

<?php
$category_parents = [];
if(count($categories) > 0){        
    foreach ($categories as $category) {
        $category_parents[$category->category_id] = $category->getByLanguage(app('language')->language_id)->category_name;
    }
}
/*var_dump($category_parents);*/
$selected_category = [];
    if ($code_promo && count($code_promo->categories) > 0) {
        foreach ($code_promo->categories as $category) {
            $selected_category[] = $category->category_id;
        }
    }
?>

<section class="content-header">
    <h1>
        Mise à jours code promo
    </h1>
</section>

<section class="content">
    @include('admin.layout.notification')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {!! Form::open(array('url' =>($code_promo) ? Url("fr/merchant/code_promo/$code_promo->code_promo_id") : Url("fr/merchant/code_promo"),'id'=>'code_promo','class'=>'code_promo','method' => ($code_promo)? 'PATCH':'POST')) !!}
                <div class="box-body">                    
                    <div class="row">
                    	<div class="col-lg-6">
	                    	<div class="form-group col-lg-12">
		                        <label for="code_promo_name">Nom du code</label>
		                        <input type="text" name="code_promo_name" class="form-control required" id="code_promo_name"
		                               value="{!! ($code_promo) ? $code_promo->code_promo_name : null !!}"
		                               placeholder="Nom du code">
		                    </div>
	                    	<div class="form-group col-lg-12">
	                            <label for="date_debut">Date début</label>
	                            <input type="text" name="date_debut" class="form-control datepicker required" id="date_debut"
	                                   value="{!! ($code_promo) ? $code_promo->date_debut : null !!}"
	                                   placeholder="Date début">
	                        </div>
	                        <div class="form-group col-lg-12">
	                            <label for="date_fin">Date fin</label>
	                            <input type="text" name="date_fin" class="form-control datepicker required" id="date_fin"
	                                   value="{!! ($code_promo) ? $code_promo->date_fin : null !!}"
	                                   placeholder="Date fin">
	                        </div>	
                    	</div>
                    	<div class="col-lg-6">	
	                    	<div class="form-group col-lg-12">
	                            {!! Form::label('categories[]','Catégorie produit concernés') !!}
								{!! Form::select('categories[]',$category_parents,($code_promo) ? $selected_category : null,['class'=>'form-control required','id'=>'categories','style'=>'height: 11rem;','multiple'=>true]) !!}
	                        </div>
	                        <div class="form-group col-lg-12">
	                            <label for="quantity_max">Quantité max</label>
	                            <input type="number" name="quantity_max" class="form-control required" id="quantity_max"
	                                   value="{!! ($code_promo) ? $code_promo->quantity_max : null !!}"
	                                   placeholder="Quantité max">
	                        </div>
                    	</div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{!! Url('fr/merchant/code_promo') !!}" class="btn btn-default">Annuler</a>
                    <button type="submit" class="btn btn-primary pull-right" id="add-role">Enregistrer</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@stop
@section('additional-script')
    <script type="text/javascript">
        $(function () {
            $('#date_debut').change(function(){
                var date_debut = $('#date_debut').val();
                console.log(date_debut);
                $('#date_fin').datepicker('update', date_debut);  
            }); 

            $('#date_fin').change(function(){
                var date_debut = $('#date_debut').val();
                var date_fin = $('#date_fin').val();
                console.log('*****************')
                console.log(date_debut, date_fin);
                if(date_fin && date_fin < date_debut){
                    alert('Choisissez une date antérieure à la date début');
                    $('#date_fin').datepicker('update', ''); 
                }
            });                     
        });
    </script>
@stop
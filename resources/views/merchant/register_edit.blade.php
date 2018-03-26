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
<section class="content-header">
    <h1>
        Modification profil
    </h1>
</section>

<section class="content">
    @include('admin.layout.notification')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            	<?php
                    $url = url(LaravelLocalization::getCurrentLocale()."/store/$store->store_id");
            	?>                    
                {!! Form::open(['url' =>$url , 'id'=>'store_form', 'method' => 'PATCH', 'role' => 'form','class'=>'edit_product','enctype' => 'multipart/form-data']) !!}
                <div class="box-body">                    
                    <div class="row">
                    	<div class="col-md-12">
                			<h2>
                                Mes coordonées
                            </h2>
                		</div>	
                		<div class="form-group col-md-12">
                			{!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}
                            {!! Form::file('logo',array('class'=>' ','id'=>'logo')) !!}
                            @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                <img src="{!! url('upload/logo/'.$store->logo) !!}" height="100" width="100">
                            @endif
                		</div>
                    	@if($store)
                            @foreach($store->users as $index=>$user)
                                {{Form::text('user_id', ($store) ? $user->user_id : null ,['class'=>'hidden'])}}
                            @endforeach
                        @endif
                		                    		
                        <div class="">
	                    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="shop_name">{!! trans("merchant.shop_name")!!} *</label>
                                    {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'form-control required'])}}
                                </div>
                                <div class="form-group">
                                    <label for="address1">Addresse *</label>
                                    {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'form-control required','id'=>"address1"])}}
                                </div>

                                <div class="form-group">
                                    <label for="phone">Téléphone *</label>
                                    {!! Form::number('phone', ($store) ? $store->phone :  null  , ['class' => 'form-control required','id'=>'phone']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="email">Addresse mail *</label>
                                    {!! Form::text('email',($store) ? $store->email :  null , ['class' => 'form-control required','id'=>'email']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="created_date"> Date de création </label>
                                    {{Form::date('created_date', ($store) ? $store->created_date :  null,['class'=>'form-control '])}}
                                </div>
                                <div class="form-group">
                                    <label for="tva_number">Numéro TVA *</label>
                                    {{Form::text('tva_number', ($store) ? $store->tva_number :  null ,['class'=>'form-control required','id'=>"tva_number"])}}
                                </div>

                                <div class="form-group">
                                    <label for="siret_number">Numéro siret *</label>
                                    {{Form::text('siret_number', ($store) ? $store->siret_number :  null ,['class'=>'form-control required','id'=>"siret_number"])}}
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe *</label>
                                    {{ Form::password('password', ['class' => 'form-control required','id'=>'password']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                			<h2>
                                Coordonnées de paiement
                            </h2>
                		</div>
                		<div class="col-md-12">
                            <div class="form-group">
                                <label for="banque_number">Nom du compte en banque *</label>
                                {{Form::text('banque_number', ($store) ? $store->banque_number :  null ,['class'=>'form-control required','id'=>"banque_number"])}}
                            </div>    
                        </div>
                        <div class="">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="eban">EBAN *</label>
                                    {{Form::text('eban', ($store) ? $store->eban :  null ,['class'=>'form-control required','id'=>"eban"])}}
                                </div>
                                <div class="form-group">
                                    <label for="bic">BIC *</label>
                                    {{Form::text('bic', ($store) ? $store->bic :  null ,['class'=>'form-control required','id'=>"bic"])}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="banque_domicile">Domicialisation banque *</label>
                                    {{Form::text('banque_domicile', ($store) ? $store->banque_domicile :  null ,['class'=>'form-control required','id'=>"banque_domicile"])}}
                                </div>
                                <div class="form-group">
                                    <label for="banque_address">Adresse banque *</label>
                                    {{Form::text('banque_address', ($store) ? $store->banque_address :  null ,['class'=>'form-control required','id'=>"banque_address"])}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" id="add-role">Modifier</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</section>
@stop
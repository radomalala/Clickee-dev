@extends('front.merchant.layout.master')
@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('frontend/css/font-awesome.min.css') !!}
    {!! Html::style('backend/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('backend/plugins/select2/select2.css') !!}
    {!! Html::style('backend/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/dist/css/skins/skin-black-light.css') !!}
    {!! Html::style('backend/css/style.css') !!}
     {!! Html::style('backend/plugins/dynatree/src/skin/ui.dynatree.css') !!}
    {!! Html::style('backend/plugins/dropzone/dropzone.css') !!}
    {!! Html::style('backend/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css') !!}
    {!! Html::style('frontend/css/style-clickee.css') !!}
@stop
@section('content')
    <?php 
        $category_arr = [];
        $attributes = array();
    ?>
    <section class="content-header" style="text-align: center;">
        <h1>
            @if($customer)
                Dejà Client
            @else
                Nouveau Client
            @endif
        </h1>
    </section>
    <section class="content">
        @include('admin.layout.notification')
    	<div class="row">
    		<div class="col-md-12">
    			<div class="nav-tabs-custom">
    				{!! Form::open(['url' => ($customer) ? route('customer.update', ['id' => $customer->customer_id]) : route('customer.store'), 'id' =>'customer_form', 'enctype' => 'multipart/form-data', 'method' => ($customer) ? 'PATCH' : 'POST']) !!}
    					<div class="tab-content">
                             <div class="tab-pane active" id="tab_1">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-body">
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('firt_name', 'Nom', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('first_name', ($customer) ? $customer->first_name : null , ['class' => 'form-control required','id'=>'first_name','placeholder'=>"Nom"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('last_name', 'Prénom', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('last_name', ($customer) ? $customer->last_name : null , ['class' => 'form-control','id'=>'last_name','placeholder'=>"Prénom"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('address', 'Adresse', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('address', ($customer) ? $customer->address : null , ['class' => 'form-control','id'=>'address','placeholder'=>"Adresse"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('postal_code', 'Code Postal', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('postal_code', ($customer) ? $customer->postal_code : null , ['class' => 'form-control','id'=>'postal_code','placeholder'=>"Code postal"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('country', 'Ville', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('country', ($customer) ? $customer->country : null , ['class' => 'form-control','id'=>'country','placeholder'=>"Ville"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('phone_number', 'Téléphone', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('phone_number', ($customer) ? $customer->phone_number : null , ['class' => 'form-control','id'=>'phone_number','placeholder'=>"Téléphone"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('birthday', 'Date de naissance', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('birthday', ($customer) ? $customer->birthday : null , ['class' => 'form-control','id'=>'birthday','placeholder'=>"Date de naissance"]) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('email', 'Adresse email', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-sm-9">
                                                        {!! Form::text('email', ($customer) ? $customer->email : null , ['class' => 'form-control required','id'=>'email','placeholder'=>"Adresse email"]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                @include('front.merchant.customer.product_encasement')
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <h1>tab 3</h1>
                            </div>
                                
                            <div class="box-footer">
                                <a href="{!! Url('merchant/customer') !!}" class="btn btn-default">Annuler</a>
                                
                                <button type="submit" class="btn btn-primary pull-right hidden"> {!! ($customer) ? "Confirmer client" : "Ajouter client"!!}
                                </button>
                                <a class="btn btn-primary pull-right" href="#tab_2" data-toggle="tab"> {!! ($customer) ? "Confirmer client" : "Ajouter client"!!}
                                </a>
                            </div>
                        </div>
    				{!! Form::close() !!}
    			</div>
    		</div> 
    	</div>
    </section>

@endsection
@section('additional-script')
    {!! Html::script('frontend/js/product_merchant.js') !!}
@stop
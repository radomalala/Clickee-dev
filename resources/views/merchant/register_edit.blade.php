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
                    <div class="">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <div class="form-group">
                                <label for="shop_name">{!! trans("merchant.shop_name")!!} *</label>
                                {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'form-control required'])}}
                            </div>
                            <div class="form-group">
                                <label for="address1">{!! trans("merchant.address_1")!!} *</label>
                                {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'form-control required','id'=>"address1"])}}
                            </div>

                            <div class="form-group">
                                <label for="address2">{!! trans("merchant.address_2")!!}</label>
                                {{Form::text('address2', ($store && $store->address2 !='') ? $store->address2 : null,['class'=>'form-control','id'=>"address2"])}}
                            </div>
                            <div class="form-group">
                                <label for="country">{!! trans("merchant.country")!!}* </label>
                                <select name="country_id" id="country"
                                        class="form-control required">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{!! $country->id !!}" {!! ($store && $store->country_id == $country->id) ? "selected":"" !!}>{!! $country->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="registration_number">{!! trans("merchant.registration_number")!!} *</label>
                                {{Form::text('registration_number', ($store) ? $store->registration_number :  null,['class'=>'form-control required'])}}
                            </div>
                            <div class="form-group">
                                <label for="city">{!! trans("merchant.city")!!} *</label>
                                {{Form::text('city', ($store) ? $store->city :  null ,['class'=>'form-control required','id'=>"city"])}}
                            </div>

                            <div class="form-group">
                                <label for="zip_code">{!! trans("merchant.zip_code")!!} *</label>
                                {{Form::text('zip_code', ($store) ? $store->zip :  null ,['class'=>'form-control required','id'=>"zip"])}}
                            </div>
                            <div class="form-group">
                                <label for="state">{!! trans("merchant.state")!!} *</label>
                                <select name="state_id" id="state" class="required form-control">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    	@if($store)
                            @foreach($store->users as $index=>$user)
                                {{Form::text('user_id', ($store) ? $user->user_id : null ,['class'=>'hidden'])}}
                            @endforeach
                        @endif

                    <div class="">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary"
                                    id="confirm_position">{!! trans('merchant.confirm_position') !!}</button>
                        </div>
                        <div class="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('latitude', trans('merchant.latitude'), ['class' => 'control-label']) !!}
                                    {!! Form::text('latitude', ($store) ? $store->latitude :  null, ['class' => 'required form-control','id'=>'latitude']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('longitude', trans('merchant.longitude'), ['class' => 'control-label']) !!}                                
                                    {!! Form::text('longitude', ($store) ? $store->longitude :  null, ['class' => 'required form-control','id'=>'longitude']) !!}
                                    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-12">
                        <h2>
                            {!! trans('merchant.contact') !!}
                        </h2>
                    </div>    
                    <div class="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="main_phone">{!! trans('merchant.main_phone') !!} *</label>
                                {!! Form::text('main_phone', ($store) ? $store->phone :  null  , ['class' => 'required form-control','id'=>'main_phone']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="main_email">{!! trans('merchant.main_email') !!} *</label>
                                {!! Form::text('main_email',($store) ? $store->email :  null , ['class' => 'required form-control','id'=>'main_email']) !!}
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-12">
                            <h2>{!! trans('merchant.corporate_identity') !!}</h2>
                    </div>
                    <div class="">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}
                                {!! Form::file('logo',array('class'=>'form-control','id'=>'logo')) !!}
                                @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                    <img src="{!! url('upload/logo/'.$store->logo) !!}" height="100" width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('shop_image', trans('merchant.shop_picture'), ['class' => '']) !!}
                                {!! Form::file('shop_image',array('class'=>'form-control','id'=>'shop_image')) !!}
                                @if($store && file_exists(public_path('upload/shop/'.$store->shop_image)))
                                    <img src="{!! url('upload/shop/'.$store->shop_image) !!}" height="100" width="100">
                                @endif
                            </div>
                        </div>                   
                        

                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('short_description', trans('merchant.short_description'), ['class' => '']) !!}
                                <textarea class="form-control" id="short_description" rows="4" placeholder="Short Description"
                                          name="short_description">
                                    @if($store)
                                        {!!  $store->short_description !!}
                                    @endif
                                </textarea>
                            </div>        
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h2>
                            Directeur(s)
                        </h2>
                    </div>

                        <div class="row hidden">
                            <div class="col-md-6 mr-l-25">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="checked">
                                            {!! trans('merchant.same_as_primary') !!}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($store->users) && count($store->users)>0)
                        <?php $old_manager_id = []; ?>
                        @foreach($store->users as $index=>$user)
                         <?php $key = $index+1;
                               $old_manager_id[] =  $user->user_id;
                         ?>
                        <div class="master_manager" id="{!! $key !!}">
                            <div class="hidden">
                                <div class="add-user">
                                    @if($key=='1')
                                        <label><button type="button" class="simple-btn btn btn-primary add_user">{!! trans('merchant.add_user') !!}</button> </label>
                                    @else
                                        <label><button type="button" class="simple-btn btn btn-primary remove_user">{!! trans('merchant.remove_user') !!}</button> </label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if($key=='1')
                                    <span> {!! trans('merchant.main_account') !!} / {!! $user->first_name !!} {!! $user->last_name !!}</span>
                                @else
                                    <span> {!! trans('merchant.account') !!} #{!! $key !!} &nbsp;&nbsp;&nbsp;&nbsp; <a class="remove_user"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span>
                                @endif    
                            </div>
                            <div class="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][last_name]", ($store && $user!=null) ?$user->last_name:null , ['class' => 'form-control required','id'=>'last_name']) !!}
                                        <input type="hidden" name="manager[{!! $key !!}][manager_id]" value="{!! ($store && $user!=null) ? $user->user_id:null  !!}">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('sms', trans('merchant.sms'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][sms]", ($store && $user!=null) ? $user->phone_number:null, ['class' => 'required form-control','id'=>'sms']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}
                                        {!! Form::password("manager[".$key."][password]", ['class' => 'form-control required password".$key."','id'=>'password','onkeyup'=>'confirmPassword(".$key.");']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][first_name]",($store && $user!=null) ? $user->first_name:null, ['class' => 'form-control required','id'=>'first_name']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', trans('merchant.main_email'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][email]", ($store && $user !=null) ? $user->email:null, ['class' => 'required form-control','id'=>'email']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('confirm_password', trans('merchant.confirm_password'), ['class' => '']) !!}
                                        {!! Form::password("manager[".$key."][confirm_password]", ['class' => 'form-control required confirm_password".$key."','id'=>'confirm_password','onkeyup'=>'confirmPassword(".$key.");']) !!}
                                    </div>
                                </div>
                            </div>                            

                            <!-- Anciens checkbox -->
                            <div class="col-md-4 hidden">
                                <div class="box-body mr-t-23">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked" name="manager[{!! $key !!}"][global_manager]" id="global_manager" value="1" {!! ($user->pivot->is_global_manager=='1') ? "checked":'' !!}>
                                                {!! trans('merchant.main_account_owner') !!}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked" name="manager[{!! $key !!}][receive_request]" id="receive_request" {!! ($user->pivot->receive_request=='1') ? "checked":'' !!} value="1">
                                                {!! trans('merchant.receive_purchase_request') !!}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked" name="manager[{!! $key !!}][reply_request]" id="reply_request" value="1" {!! ($user->pivot->reply_request=='1') ? "checked":'' !!}>
                                                {!! trans('merchant.can_reply_to_request') !!}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <input type="hidden" name="old_manager_id" value="{!! implode(',',$old_manager_id) !!}">
                        
                        @endif
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-primary call_add_user">{!! trans('merchant.add_user') !!}</button>
                        </div>

                    <!-- end -->    
                		               
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
@section('additional-script')
    {!! Html::script('frontend/js/store.js') !!}
@stop
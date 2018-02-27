@extends('front.layout.master')

@section('content')

<?php Session::put('role_user',2); ?>

<div class="container mtb-80" style="width: 60%">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a class="size-17" href="#cnxTab" aria-controls="cnxTab" role="tab" data-toggle="tab">{!! trans("common/label.login_title")!!}</a></li>
        <li role="presentation"><a class="size-17" href="#enregTab" aria-controls="enregTab" role="tab" data-toggle="tab">{!! trans("common/label.register_title")!!}</a></li>
    </ul>
    <div class="tab-content tab-login">
        <div role="tabpanel" class="tab-pane active" id="cnxTab">

            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 merchant-top-bottom">
                    <div class="login-area">
                        <!-- <div class="section-title mb-20">
                            <h2>{!! trans("merchant.merchant_login")!!}</h2>
                        </div> -->

                        <p></p>
                        {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/merchant/login'), 'id'=>'login_form', 'method' => 'post', 'role' => 'form' ,'class'=>'form-horizontal','autocomplete'=>'off']) !!}
                        <div class="form-group row mb-0">
                            <label for="username" class="col-sm-3 col-form-label">{!! trans("form.email_address")!!} *</label>
                            <div class="col-sm-9">
                                {{ Form::text('email', '',['class'=>"required"]) }}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="password" class="col-sm-3 col-form-label">{!! trans("form.password")!!} *</label>
                            <div class="col-sm-9">
                                {{ Form::password('password',['class'=>"required"]) }}
                            </div>    
                        </div>

                        <div class="checkbox mg-18 text-center check-merchant-left">
                            <label for="rememberme">
                                <input class="check-merchant" type="checkbox" name='memoty'>
                                {!! trans("form.remember")!!}
                            </label>
                        </div>

                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/forgot-password') }}">{!! trans("form.forgot_password")!!}</a>
                        <div class="login-footer-area text-center">
                                <button type="submit" id="login-btn">{!! trans("form.login")!!}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>
        <div role="tabpanel" class="tab-pane" id="enregTab">
            @include('front.merchant.register')
        </div>
    </div>
</div>

@stop
@section('footer-script')
    {!! Html::style('backend/plugins/bootstrap-duallistbox-master/src/bootstrap-duallistbox.css') !!}
    {!! Html::style('backend/bootstrap/css/bootstrap.css') !!}
    {!! Html::script('backend/plugins/dynatree/jquery/jquery-ui.custom.js') !!}
    {!! Html::script('backend/plugins/select2/select2.js') !!}
    {!! Html::script('backend/plugins/dual-list-box/dual-list-box.js') !!}
    {!! Html::script('backend/plugins/bootstrap-duallistbox-master/src/jquery.bootstrap-duallistbox.js') !!}
    {!! Html::script('frontend/js/store.js') !!}
@stop
@section('additional-script')
    <script type="application/javascript">
        var selected_state_id = '{!! ($store && $store->state_id!='') ? $store->state_id :'' !!}';
        var selected_country_id = '{!! ($store && $store->country_id!='') ? $store->country_id :'' !!}';
    </script>
@stop
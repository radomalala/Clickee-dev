{{-- @extends('front.layout.master') --}}

{{-- @section('content') --}}
           <!-- register-area-start -->
                    <div class="register-area text-center">
                        <div class="section-title mb-20">
                            <div class="row">
                                    <div class="login-signup-title text-blue">
                                        <h2>{!! trans("common/label.sign_up_with")!!} ...</h2>
                                    </div>    
                                     <div class="connect-social-media mt-10">   
                                        <div class="col-md-4">
                                            <button onclick="location.href='{{url(LaravelLocalization::getCurrentLocale().'/auth/facebook')}}'" class="btn btn-lg btn-facebook mt-20 col-xs-12">
                                                    <i class="fa fa-facebook pull-left"></i><span>FACEBOOK</span>
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button onclick="location.href='{{ url(LaravelLocalization::getCurrentLocale().'/auth/google')}}'" class="btn btn-lg btn-google mt-20 col-xs-12">
                                                    <i class="fa fa-google-plus pull-left"></i><span>GOOGLE</span>
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button onclick="location.href='{{ url(LaravelLocalization::getCurrentLocale().'/auth/twitter')}}'" class="btn btn-lg btn-twitter mt-20 col-xs-12">
                                                    <i class="fa fa-twitter pull-left"></i><span>TWITTER</span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <p class="mb-20 mt-30">{!! trans("common/label.your_count_information_is_protected") !!}</p>
                </div>
                        <!-- register-area-end -->
            <div class="or-with-title text-blue mt-30">
                    <h2>
                        <span>{!! trans("common/label.or_with")!!}</span>
                    </h2>
            </div>  
            <div class="account-area mb-40 mt-50">
            <div class="row">
                @include('notification')
                <div class="register-area">
                    {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/register'), 'id'=>'account_form', 'method' => 'post', 'role' => 'form','class'=>'form-horizontal','autocomplete'=>'off']) !!}

                    <input type="hidden" name="role_id" value="{!! $role_id !!}">
                    <div class="member-title text-blue text-center mb-40">
                            <h2>{!! trans("common/label.information_member")!!}</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-20">
                            <!-- register-area-start -->
                            <div class="register-area">
                                <div class="form-group row mb-0">
                                    <label for="username" class="col-sm-5 col-form-label">{!! trans("form.first_name")!!} *</label>
                                    <div class="col-sm-7">   
                                        {{Form::text('first_name', '',['class'=>'required form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="username" class="col-sm-5 col-form-label">{!! trans("form.last_name")!!}  *</label>
                                    <div class="col-sm-7">     
                                        {{Form::text('last_name', '',['class'=>'required form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                   <label for="username" class="col-sm-5 col-form-label">{!! trans("form.email_address")!!}  *</label>
                                    <div class="col-sm-7">      
                                        {{Form::text('email', '',['class'=>'required form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                   <label for="phone_number" class="col-sm-5 col-form-label">{!! trans("form.phone_number")!!} </label>
                                    <div class="col-sm-7">     
                                        {{Form::text('phone_number', '',['class'=>' form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="password" class="col-sm-5 col-form-label">{!! trans("form.password")!!} * :</label>
                                     <div class="col-sm-7">     
                                        {{Form::password('password',['class'=>'required form-control', 'id'=>"password"])}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                   <label for="password" class="col-sm-5 col-form-label">{!! trans("form.confirm_password")!!} * :</label> 
                                     <div class="col-sm-7">     
                                        {{Form::password('confirm_password', ['class'=>'required form-control', 'id'=>"password"])}}
                                    </div>
                                </div>
                                <input type="hidden" name="is_active" value="1">
                            </div>
                            <!-- register-area-end -->
                        </div>
                    </div>
                    <div class="other-info col-md-12 mt-10">   
                            <ul class="content-actuality text-center mt-25 mb-30 pb-20 row">
                                <li>    
                                    <a href="#" class="receive-notification"><i class="fa fa-square-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! trans("common/label.receive_notification") !!}</a>             
                                </li>
                                <li>
                                    <a href="#" class="receive-email mt-30"><i class="fa fa-square-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! trans("common/label.receive_email_actuality") !!}</a><br>
                                    <span> {!! trans("common/label.actuality_local_achat") !!}</span>
                                </li>
                                
                                
                            </ul>
                              <div class="recaptcha">  
                                <div class="g-recaptcha col-lg-6 col-lg-offset-4 col-sm-7 col-sm-offset-2 mt-20" data-sitekey="6LcZPD8UAAAAAJ4j09YFkZROb1s34VgnXX6AvbRU"></div>
                              </div>
                                <div class="register-footer-area text-center">
                                    <button class="btn btn-submit" type="submit" id="register-btn">{!! trans("form.submit_button")!!}</button>
                                </div>
                            {!! Form::close() !!}
                            <div class="condition-confidentiality text-center">
                                <span> {!! trans("common/label.condition_create_account") !!} <a href="">{!! trans("common/label.general_condition") !!}</a></span>
                            </div>
                       </div>
                </div>
            </div>
        </div>
         <!-- service-area-2-start -->
        <div class="service-area-register"> 
            @include('front.layout.service-area')
        </div>           
         <!-- service-area-2-end -->
    </div>
{{-- @stop --}}


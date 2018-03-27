    <div class="account-area">
            <div class="row account">
                @include('notification')
                <div class="col-lg-12">
                    <div class="account-title title text-uppercase mb-26 text-center mt-40">
                        <h2>
                            @if($store)
                                {!! trans('merchant.update_info') !!}
                            @elseif(Auth::check())
                                {!! trans('merchant.add_store') !!}
                            @else
                                {!! trans('merchant.title') !!}
                            @endif
                        </h2>
                    </div>
                </div>
                <div class="register-area register-area-merchant">
                    <?php
                        if($store){
                            $url = url(LaravelLocalization::getCurrentLocale()."/store/$store->store_id");
                        }elseif(Auth::check()){
                            $url = url(LaravelLocalization::getCurrentLocale()."/store");
                        }else{
                            $url = url(LaravelLocalization::getCurrentLocale().'/merchant/sign-up');
                        }
                    ?>
                    
                    {!! Form::open(['url' =>$url , 'id'=>'store_form', 'method' => ($store) ? 'PATCH' : 'post', 'role' => 'form','class'=>'form-horizontal','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="section-title">
                            <div style="height: 110px;"></div>
                            <h2 class="souligne">
                                Mes coordonées
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                            <div class="register-area">
                                <div class="ptb-7">
                                    <label for="shop_name">{!! trans("merchant.shop_name")!!} *</label>
                                    {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'required'])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="address1">{!! trans("merchant.address_1")!!} *</label>
                                    {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'required','id'=>"address1"])}}
                                </div>

                                <div class="ptb-7">
                                    <label for="address2">{!! trans("merchant.address_2")!!}</label>
                                    {{Form::text('address2', ($store && $store->address2 !='') ? $store->address2 : null,['class'=>'','id'=>"address2"])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="country">{!! trans("merchant.country")!!}* </label>
                                    <select name="country_id" id="country"
                                            class="required select_merchant">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->id !!}" {!! ($store && $store->country_id == $country->id) ? "selected":"" !!}>{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                            <div class="register-area">
                                <div class="ptb-7">
                                    <label for="registration_number">{!! trans("merchant.registration_number")!!} *</label>
                                    {{Form::text('registration_number', ($store) ? $store->registration_number :  null,['class'=>'required'])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="city">{!! trans("merchant.city")!!} *</label>
                                    {{Form::text('city', ($store) ? $store->city :  null ,['class'=>'required','id'=>"city"])}}
                                </div>

                                <div class="ptb-7">
                                    <label for="zip_code">{!! trans("merchant.zip_code")!!} *</label>
                                    {{Form::text('zip_code', ($store) ? $store->zip :  null ,['class'=>'required','id'=>"zip"])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="state">{!! trans("merchant.state")!!} *</label>
                                    <select name="state_id" id="state" class="required select_merchant">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center mt-10 mb-20">
                            <button type="button" class="btn btn-clickee-primary"
                                    id="confirm_position">{!! trans('merchant.confirm_position') !!}</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ptb-7">
                                    {!! Form::label('latitude', trans('merchant.latitude'), ['class' => 'control-label']) !!}
                                    {!! Form::text('latitude', ($store) ? $store->latitude :  null, ['class' => 'required','id'=>'latitude']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ptb-7">
                                    {!! Form::label('longitude', trans('merchant.longitude'), ['class' => 'control-label']) !!}                                
                                    {!! Form::text('longitude', ($store) ? $store->longitude :  null, ['class' => 'required','id'=>'longitude']) !!}
                                    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="section-title">
                            <div class="align-title"></div>
                            <h2 class="souligne">
                                {!! trans('merchant.contact') !!}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="">
                                    <label for="main_phone">{!! trans('merchant.main_phone') !!} *</label>
                                    {!! Form::text('main_phone', ($store) ? $store->phone :  null  , ['class' => 'required','id'=>'main_phone']) !!}
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="">
                                    <label for="main_email">{!! trans('merchant.main_email') !!} *</label>
                                    {!! Form::text('main_email',($store) ? $store->email :  null , ['class' => 'required','id'=>'main_email']) !!}
                                </div>                                
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="section-title">
                            <div class="align-title"></div>
                            <h2 class="souligne">{!! trans('merchant.corporate_identity') !!}</h2>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="row"> 
                        <div class="col-lg-6">
                            <div class="">
                                {!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}
                                {!! Form::file('logo',array('class'=>' ','id'=>'logo')) !!}
                                @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                    <img src="{!! url('upload/logo/'.$store->logo) !!}" height="100" width="100">
                                @endif
                            </div>
                            <div class="ptb-7">
                                {!! Form::label('shop_image', trans('merchant.shop_picture'), ['class' => '']) !!}
                                {!! Form::file('shop_image',array('class'=>'','id'=>'shop_image')) !!}
                                @if($store && file_exists(public_path('upload/shop/'.$store->shop_image)))
                                    <img src="{!! url('upload/shop/'.$store->shop_image) !!}" height="100" width="100">
                                @endif
                            </div>
                        </div>                   
                        

                        <div class="col-lg-6">
                            {!! Form::label('short_description', trans('merchant.short_description'), ['class' => '']) !!}
                            <textarea class="" id="short_description" placeholder="Short Description"
                                      name="short_description"
                                      style="width: 100%; height: 128px; font-size: 14px; line-height: 18px;     border: 4px solid rgb(4, 70, 81); padding: 10px;">
                                @if($store)
                                    {!!  $store->short_description !!}
                                @endif
                                    </textarea>
                        </div>
                        </div>
                    </div>

                    @if($store || Auth::check()==false)
                        <div class="row">
                            <div class="section-title">
                                <div style="height: 29px;"></div>
                                <h2 class="souligne">
                                    Directeur(s)
                                </h2>
                            </div>
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
                        <div class="row master_manager" id="{!! $key !!}">
                            <div class="hidden">
                                <div class="form-group add-user">
                                    @if($key=='1')
                                        <label><button type="button" class="simple-btn btn btn-primary add_user">{!! trans('merchant.add_user') !!}</button> </label>
                                    @else
                                        <label><button type="button" class="simple-btn btn btn-primary remove_user">{!! trans('merchant.remove_user') !!}</button> </label>
                                    @endif
                                </div>
                            </div>
                            <div class="row line-separator hidden"></div>
                            <div class="title-master-manager">
                                @if($key=='1')
                                    <span> {!! trans('merchant.main_account') !!} / {!! $user->first_name !!} {!! $user->last_name !!}</span>
                                @else
                                    <span> {!! trans('merchant.account') !!} #{!! $key !!} &nbsp;&nbsp;&nbsp;&nbsp; <a class="remove_user"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span>
                                @endif    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][last_name]", ($store && $user!=null) ?$user->last_name:null , ['class' => 'required','id'=>'last_name']) !!}
                                        <input type="hidden" name="manager[{!! $key !!}][manager_id]" value="{!! ($store && $user!=null) ? $user->user_id:null  !!}">
                                    </div>
                                    <div class="">
                                        {!! Form::label('sms', trans('merchant.sms'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][sms]", ($store && $user!=null) ? $user->phone_number:null, ['class' => 'required','id'=>'sms']) !!}
                                    </div>
                                    <div class="">
                                        {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}
                                        {!! Form::password("manager[".$key."][password]", ['class' => 'required password".$key."','id'=>'password','onkeyup'=>'confirmPassword(".$key.");']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][first_name]",($store && $user!=null) ? $user->first_name:null, ['class' => 'required','id'=>'first_name']) !!}
                                    </div>
                                    <div class="">
                                        {!! Form::label('email', trans('merchant.main_email'), ['class' => '']) !!}
                                        {!! Form::text("manager[".$key."][email]", ($store && $user !=null) ? $user->email:null, ['class' => 'required','id'=>'email']) !!}
                                    </div>
                                    <div class="">
                                        {!! Form::label('confirm_password', trans('merchant.confirm_password'), ['class' => '']) !!}
                                        {!! Form::password("manager[".$key."][confirm_password]", ['class' => 'required confirm_password".$key."','id'=>'confirm_password','onkeyup'=>'confirmPassword(".$key.");']) !!}
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
                        @else
                            <div class="row master_manager" id="1">
                                <div class="col-lg-12">
                                    <div class="form-group add-user hidden">
                                        <label><button type="button" class="simple-btn btn btn-primary add_user">{!! trans('merchant.add_user') !!}</button> </label>
                                    </div>
                                </div>
                                <div class="row line-separator hidden"></div>
                                <div class="title-master-manager">
                                    <span> Compte principal / propriétaire </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ptb-7">
                                            {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][last_name]", null , ['class' => 'required','id'=>'last_name']) !!}
                                            <input type="hidden" name="manager[1][manager_id]" value="null">
                                        </div>
                                        <div class="ptb-7">
                                            {!! Form::label('sms', trans('merchant.sms'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][sms]", null, ['class' => 'required','id'=>'sms']) !!}
                                        </div>
                                        <div class="ptb-7">
                                            {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}
                                            {!! Form::password("manager[1][password]", ['class' => 'required password1','id'=>'password','onkeyup'=>'confirmPassword("1");']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ptb-7">
                                            {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][first_name]",null, ['class' => 'required','id'=>'first_name']) !!}    
                                        </div>
                                        <div class="ptb-7">
                                            {!! Form::label('email', trans('merchant.main_email'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][email]", null, ['class' => 'required','id'=>'email']) !!}
                                        </div>
                                        <div class="ptb-7">
                                            {!! Form::label('confirm_password', trans('merchant.confirm_password'), ['class' => '']) !!}
                                            {!! Form::password("manager[1][confirm_password]", ['class' => 'required confirm_password1','id'=>'confirm_password','onkeyup'=>'confirmPassword("1");']) !!}
                                        </div>
                                    </div>
                                </div>                                

                                <!-- Les anciens checkbox -->
                                <div class="col-md-4 hidden">
                                    <div class="box-body mr-t-23">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="manager[1][global_manager]" id="global_manager" value="1">
                                                    {!! trans('merchant.main_account_owner') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="manager[1][receive_request]" id="receive_request" value="1">
                                                    {!! trans('merchant.receive_purchase_request') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="manager[1][reply_request]" id="reply_request" value="1">
                                                    {!! trans('merchant.can_reply_to_request') !!}
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>                                
                        @endif

                        <div class="text-center add-user-alignement mb-20">
                            <button type="button" class="btn btn-clickee-primary call_add_user">{!! trans('merchant.add_user') !!}</button>
                        </div>

                    @endif
                    
                    <!-- <div class="recaptcha">  
                                <div class="g-recaptcha col-lg-6 col-sm-7 mt-30 mb-50" data-sitekey="6LcZPD8UAAAAAJ4j09YFkZROb1s34VgnXX6AvbRU"></div>
                    </div> -->
                    
                    <div class="text-center mr-t-btn">
                        <button class="btn btn-clickee-primary" type="submit" id="add-store">{!! trans("merchant.complete_registration")!!}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>

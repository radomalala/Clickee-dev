
    <?php
    $global_manager = ($store && $store->users->first() !=null && $store->users->first()->pivot->is_global_manager == '1') ? true : false;
    $receive_request = ($store && $store->users->first() !=null && $store->users->first()->pivot->receive_request == '1') ? true : false;
    $reply_request = ($store && $store->users->first() !=null && $store->users->first()->pivot->reply_request == '1') ? true : false;
    if($store){
        $selected_brands = [];
        foreach($store->brands as $brand){
            $selected_brands[] = $brand->brand_id;
        }
    }
    ?>
    <div class="account-area">
            <div class="row account">
                @include('notification')
                <div class="col-lg-12">
                    <div class="account-title mb-26 text-center">
                        <h1>
                            @if($store)
                                {!! trans('merchant.update_info') !!}
                            @elseif(Auth::check())
                                {!! trans('merchant.add_store') !!}
                            @else
                                {!! trans('merchant.title') !!}
                            @endif
                        </h1>
                    </div>
                </div>
                <div class="register-area">
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
                                {!! trans('merchant.branch_info') !!}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                            <div class="register-area">
                                <div class="">
                                    <label for="shop_name">{!! trans("merchant.shop_name")!!} *</label>
                                    {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'required'])}}
                                </div>
                                <div class="">
                                    <label for="address1">{!! trans("merchant.address_1")!!} *</label>
                                    {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'required','id'=>"address1"])}}
                                </div>

                                <div class="">
                                    <label for="address2">{!! trans("merchant.address_2")!!}</label>
                                    {{Form::text('address2', ($store && $store->address2 !='') ? $store->address2 : null,['class'=>'','id'=>"address2"])}}
                                </div>
                                <div class="">
                                    <label for="country">{!! trans("merchant.country")!!}* </label>
                                    <select name="country_id" id="country"
                                            class="required">
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
                                <div class="">
                                    <label for="registration_number">{!! trans("merchant.registration_number")!!} *</label>
                                    {{Form::text('registration_number', ($store) ? $store->registration_number :  null,['class'=>'required'])}}
                                </div>
                                <div class="">
                                    <label for="city">{!! trans("merchant.city")!!} *</label>
                                    {{Form::text('city', ($store) ? $store->city :  null ,['class'=>'required','id'=>"city"])}}
                                </div>

                                <div class="">
                                    <label for="zip_code">{!! trans("merchant.zip_code")!!} *</label>
                                    {{Form::text('zip_code', ($store) ? $store->zip :  null ,['class'=>'required','id'=>"zip"])}}
                                </div>
                                <div class="">
                                    <label for="state">{!! trans("merchant.state")!!} *</label>
                                    <select name="state_id" id="state" class="required">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center btn-mr-tb">
                            <button type="button" class="simple-btn"
                                    id="confirm_position">{!! trans('merchant.confirm_position') !!}</button>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                {!! Form::label('latitude', trans('merchant.latitude'), ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('latitude', ($store) ? $store->latitude :  null, ['class' => 'required','id'=>'latitude']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                {!! Form::label('longitude', trans('merchant.longitude'), ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
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
                    <div class="row">
                        <div class="section-title">
                            <div class="align-title"></div>
                            <h2 class="souligne">{!! trans('merchant.corporate_identity') !!}</h2>
                        </div>    
                    </div>
                    <div class="row"> 
                        <div class="col-lg-6">
                            <div class="">
                                {!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}
                                {!! Form::file('logo',array('class'=>' ','id'=>'logo')) !!}
                                @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                    <img src="{!! url('upload/logo/'.$store->logo) !!}" height="100" width="100">
                                @endif
                            </div>
                            <div class="">
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
                                      style="width: 100%; height: 138px; border-radius: 8px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                @if($store)
                                    {!!  $store->short_description !!}
                                @endif
                                    </textarea>
                        </div>
                    </div>
                    @if($store || Auth::check()==false)
                        <div class="row">
                            <div class="section-title">
                                <div style="height: 29px;"></div>
                                <h2 class="souligne">
                                    {!! trans('merchant.managers') !!}
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
                                    <span> {!! trans('merchant.main_account') !!} </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][last_name]", null , ['class' => 'required','id'=>'last_name']) !!}
                                            <input type="hidden" name="manager[1][manager_id]" value="null">
                                        </div>
                                        <div class="">
                                            {!! Form::label('sms', trans('merchant.sms'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][sms]", null, ['class' => 'required','id'=>'sms']) !!}
                                        </div>
                                        <div class="">
                                            {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}
                                            {!! Form::password("manager[1][password]", ['class' => 'required password1','id'=>'password','onkeyup'=>'confirmPassword("1");']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][first_name]",null, ['class' => 'required','id'=>'first_name']) !!}    
                                        </div>
                                        <div class="">
                                            {!! Form::label('email', trans('merchant.main_email'), ['class' => '']) !!}
                                            {!! Form::text("manager[1][email]", null, ['class' => 'required','id'=>'email']) !!}
                                        </div>
                                        <div class="">
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

                        <div class="text-center add-user-alignement">
                            <button type="button" class="simple-btn btn btn-primary call_add_user">{!! trans('merchant.add_user') !!}</button>
                        </div>

                    @endif

                    <div class="row">
                        <div class="section-title mb-30">
                            <div class="align-title"></div>
                            <h2 class="souligne">
                                {!! trans('merchant.brand_sales') !!}
                            </h2>
                        </div>
                    </div>
                    <div>
                        <div class="row" id="tag_container">
                            @foreach($brand_tags as $tag)
                                <?php 
                                    $c_font = (strlen($tag->tag_name) > 30) ? 'c_font' : '';
                                ?>
                                <button type="button" id="{!! $tag->brand_tag_id !!}"
                                        class="btn btn-primary btn-sm brand-tag-btn simple-btn-brand {!! $c_font !!}">{!! $tag->tag_name !!} </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="section-title mb-30">
                            <div class="align-title"></div>
                            <h2 class="souligne">
                                {!! trans('merchant.option_stock_or_commande') !!}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            
                            <div class="form-group dual-list">
                                <select name="brand_list[]" id="all_brands"
                                        class="form-control all_brands required" multiple="multiple">
                                    @foreach($brands as $brand)
                                        <option value="{!! $brand->brand_id !!}" {!! ($store && in_array($brand->brand_id,$selected_brands)) ? "selected":"" !!}>
                                            {!! $brand->brand_name !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mr-t-btn">
                        <button type="submit" id="add-store">{!! trans("merchant.complete_registration")!!}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
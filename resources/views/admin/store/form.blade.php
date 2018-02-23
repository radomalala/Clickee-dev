@extends($layout)

@section('content')
    <section class="content-header">
        <h1>
            @if($store)
                Update Store
            @else
                Add Store
            @endif
        </h1>
        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">
                    <div class="btn btn-small">
                        <a href="javascript://" class="btn btn-block btn-primary" id="add_new_store">Add New Store</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php
    if($store){
        $selected_brands = [];
        foreach($store->brands as $brand){
            $selected_brands[] = $brand->brand_id;
        }
    }
    ?>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => ($store) ? url("admin/store/$store->store_id"):url('admin/store'), 'class' => 'form-horizontal','id' =>'store_form', 'enctype' => 'multipart/form-data','method'=>($store) ? 'PATCH' : 'post']) !!}
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="tabs">
                        <li class="active"><a href="#tab_1" id="1" data-toggle="tab">Store 1</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <section class="content branch-info">
                        <div class="store-header">
                            <h2>BRANCH INFORMATION</h2>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('shop_name', 'Shop Name', ['class' => '']) !!}
                                    {!! Form::text('store[0][shop_name]',($store) ? $store->store_name :  null , ['class' => 'form-control required','id'=>'shop_name','placeholder'=>"Shop Name"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address1', 'Address 1', ['class' => '']) !!}
                                        {!! Form::text('store[0][address1]', ($store) ? $store->address1 :  null, ['class' => 'form-control required','id'=>'address1','placeholder'=>"Address 1"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address2', 'Address 2', ['class' => '']) !!}
                                        {!! Form::text('store[0][address2]', ($store) ? $store->address2 :  null, ['class' => 'form-control required','id'=>'address2','placeholder'=>"Address 2"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => '']) !!}
                                    <select name="store[0][country_id]" id="country"
                                            class="form-control required">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->id !!}" {!! ($store && $store->country_id == $country->id) ? "selected":"" !!}>{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('registration_number', 'Registration Number', ['class' => '']) !!}
                                        {!! Form::text('store[0][registration_number]', ($store) ? $store->registration_number :  null , ['class' => 'form-control required','id'=>'registration_number','placeholder'=>"Registration Number"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('city', 'City', ['class' => '']) !!}
                                        {!! Form::text('store[0][city]', ($store) ? $store->city :  null , ['class' => 'form-control required','id'=>'city','placeholder'=>"City"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('zip', 'Zip Code', ['class' => '']) !!}
                                        {!! Form::text('store[0][zip]', ($store) ? $store->zip :  null , ['class' => 'form-control required','id'=>'zip','placeholder'=>"Zip Code"]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('state', 'State', ['class' => '']) !!}
                                    <select name="store[0][state_id]" id="state" class="form-control required">
                                        <option value="">Select State</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary pull-right" id="confirm_position">Confirm Position</button>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('latitude', 'Latitude', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('store[0][latitude]', ($store) ? $store->latitude :  null, ['class' => 'form-control required','id'=>'latitude','placeholder'=>"Latitude"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('longitude', 'Longitude', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('store[0][longitude]', ($store) ? $store->longitude :  null, ['class' => 'form-control required','id'=>'longitude','placeholder'=>"Longitude"]) !!}
                                </div>
                            </div>

                        </div>
                     </div>
                </section>
                <section class="content contacts">
                    <div class="store-header">
                        <h2>CONTACTS</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('main_phone', 'Main Phone', ['class' => '']) !!}
                                    {!! Form::text('store[0][main_phone]', ($store) ? $store->phone :  null , ['class' => 'form-control required','id'=>'main_phone','placeholder'=>"Main Phone"]) !!}
                                </div>
                                <div class=" store-header">
                                    <h2>CORPORATE IDENTITY</h2>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('logo', 'Logo', ['class' => '']) !!}
                                        {!! Form::file('store[0][logo]',array('class'=>'form-control ', 'placeholder'=>'Logo','id'=>'logo')) !!}
                                    @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                    {{ Form::image('upload/logo/'.$store->logo, null, ['class' => 'brand-image'])}}
                                     @endif

                                </div>
                                <div class="form-group">
                                    {!! Form::label('shop_image', 'Shop Picture', ['class' => '']) !!}
                                        {!! Form::file('store[0][shop_image]',array('class'=>'form-control ','id'=>'shop_image', 'placeholder'=>'Shop Picture')) !!}
                                    @if($store && file_exists(public_path('upload/shop/'.$store->shop_image)))
                                    {{ Form::image('upload/shop/'.$store->shop_image, null, ['class' => 'brand-image'])}}
                                    @endif
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('main_email', 'Main Email', ['class' => '']) !!}
                                        {!! Form::text('store[0][main_email]', ($store) ? $store->email :  null , ['class' => 'form-control required','id'=>'main_email','placeholder'=>"Main Email"]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_description', 'Short Description', ['class' => '']) !!}
                                            <textarea class="" id="short_description" placeholder="Short Description" name="store[0][short_description]"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                @if($store)
                                                    {!!  $store->short_description !!}
                                                @endif
                                            </textarea>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>
                <section class="content managers">
                    <div class="store-header">
                        <h2>MANAGERS</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mr-l-25">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Same as primary account
                                </label>
                            </div>
                        </div>
                            </div>
                    </div>
                    @include('admin.store.manager')
                </section>
                <section class="content brand_sales">
                    <div class="store-header">
                        <h2>BRANDS SALES</h2>
                    </div>

                    <div>
                        <div class="col-md-12" id="tag_container">
                            @foreach($brand_tags as $tag)
                                <button type="button" id="{!! $tag->brand_tag_id !!}" class="btn btn-primary btn-sm brand-tag-btn">{!! $tag->tag_name !!} </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="form-group dual-list">
                                    <select name="store[0][brand_list][]" id="all_brands"
                                            class="form-control all_brands required" multiple="multiple">
                                        @foreach($brands as $brand)
                                            <option value="{!! $brand->brand_id !!}" {!! ($store && in_array($brand->brand_id,$selected_brands)) ? "selected":"" !!}>{!! $brand->brand_name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                    <div class="box-body request_add_mark">
                        <div class="store-header">
                            <h2>REQUEST ADD MARK</h2>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('brand_name', 'Brand Name', ['class' => '']) !!}
                                        {!! Form::text('brand_name', ($store && !empty($store->requestBrand)) ? $store->requestBrand->brand_name :  null , ['class' => 'form-control','id'=>'brand_name','placeholder'=>"Brand Name"]) !!}
                                    </div>
                                    <input type="hidden" name="request_brand_id" value="{!! ($store && !empty($store->requestBrand)) ? $store->requestBrand->request_brand_id :  null !!}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-body">

                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => '']) !!}
                                    {!! Form::text('website', ($store && !empty($store->requestBrand)) ? $store->requestBrand->website :  null , ['class' => 'form-control','id'=>'website','placeholder'=>"Website"]) !!}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="{!! route('product') !!}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right" id="add-store">Save
                        </button>
                    </div>

                </div>

                {!! Form::close() !!}
        </div>
    </div>
    </section>
@stop

@section('additional-styles')
    {!! Html::style('backend/plugins/bootstrap-duallistbox-master/src/bootstrap-duallistbox.css') !!}

@stop

@section('additional-scripts')
    {!! Html::script('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
    {!! Html::script('backend/plugins/dynatree/jquery/jquery-ui.custom.js') !!}
    {!! Html::script('backend/plugins/select2/select2.js') !!}
    {!! Html::script('backend/plugins/dual-list-box/dual-list-box.js') !!}
    {!! Html::script('backend/plugins/bootstrap-duallistbox-master/src/jquery.bootstrap-duallistbox.js') !!}
    {!! Html::script('backend/js/store.js') !!}

@stop

@section('footer-scripts')
    <script>
        var selected_state_id = '{!! ($store && $store->state_id!='') ? $store->state_id :'' !!}';
        var selected_country_id = '{!! ($store && $store->country_id!='') ? $store->country_id :'' !!}';
        var selected_brand_array = '{!! ($store) ? addslashes($store->brands->toJson()) : json_encode([]) !!}';
    </script>
@stop
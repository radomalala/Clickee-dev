<div class="tab-pane active" id="tab_{!! $index !!}">
    <section class="content branch-info">
        <div class="store-header">
            <h2>BRANCH INFORMATION</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('shop_name', 'Shop Name', ['class' => '']) !!}
                        {!! Form::text("store[$index][shop_name]",($store) ? $store->store_name :  null , ['class' => 'form-control required','id'=>'shop_name','placeholder'=>"Shop Name"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address1', 'Address 1', ['class' => '']) !!}
                        {!! Form::text("store[$index][address1]", ($store) ? $store->address1 :  null, ['class' => 'form-control required','id'=>'address1','placeholder'=>"Address 1"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address2', 'Address 2', ['class' => '']) !!}
                        {!! Form::text("store[$index][address2]", ($store) ? $store->address2 :  null, ['class' => 'form-control required','id'=>'address2','placeholder'=>"Address 2"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', 'Country', ['class' => '']) !!}
                        <select name="store[{!! $index !!}][country_id]" id="country"
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
                        {!! Form::text("store[$index][registration_number]", ($store) ? $store->registration_number :  null , ['class' => 'form-control required','id'=>'registration_number','placeholder'=>"Registration Number"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', 'City', ['class' => '']) !!}
                        {!! Form::text("store[$index][city]", ($store) ? $store->city :  null , ['class' => 'form-control required','id'=>'city','placeholder'=>"City"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('zip', 'Zip Code', ['class' => '']) !!}
                        {!! Form::text("store[$index][zip]", ($store) ? $store->zip :  null , ['class' => 'form-control required','id'=>'zip','placeholder'=>"Zip Code"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('state', 'State', ['class' => '']) !!}
                        <select name="store[{!! $index !!}][state_id]" id="state" class="form-control required">
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
                        {!! Form::text("store[$index][latitude]", ($store) ? $store->latitude :  null, ['class' => 'form-control required','id'=>'latitude','placeholder'=>"Latitude"]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('longitude', 'Longitude', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text("store[$index][longitude]", ($store) ? $store->longitude :  null, ['class' => 'form-control required','id'=>'longitude','placeholder'=>"Longitude"]) !!}
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
                        {!! Form::text("store[$index][main_phone]", ($store) ? $store->phone :  null , ['class' => 'form-control required','id'=>'main_phone','placeholder'=>"Main Phone"]) !!}
                    </div>
                    <div class=" store-header">
                        <h2>CORPORATE IDENTITY</h2>
                    </div>
                    <div class="form-group">
                        {!! Form::label('logo', 'Logo', ['class' => '']) !!}
                        {!! Form::file("store[$index][logo]",array('class'=>'form-control ', 'placeholder'=>'Logo','id'=>'logo')) !!}
                        @if($store && file_exists(url('upload/logo/'.$store->logo)))
                            {{ Form::image('upload/logo/'.$store->logo, null, ['class' => 'brand-image'])}}
                        @endif

                    </div>
                    <div class="form-group">
                        {!! Form::label('shop_image', 'Shop Picture', ['class' => '']) !!}
                        {!! Form::file("store[$index][shop_image]",array('class'=>'form-control ','id'=>'shop_image', 'placeholder'=>'Shop Picture')) !!}
                        @if($store && file_exists(url('upload/shop/'.$store->shop_image)))
                            {{ Form::image('upload/shop/'.$store->shop_image, null, ['class' => 'brand-image'])}}
                        @endif
                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('main_email', 'Main Email', ['class' => '']) !!}
                        {!! Form::text("store[$index][main_email]", ($store) ? $store->email :  null , ['class' => 'form-control required','id'=>'main_email','placeholder'=>"Main Email"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('short_description', 'Short Description', ['class' => '']) !!}
                        <textarea class="textarea" id="short_description" placeholder="Short Description" name="store[{!! $index !!}][short_description]"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            </textarea>
                    </div>


                </div>
            </div>
        </div>
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
                    <div class="form-group">
                        <select name="store[{!! $index !!}][brand_list][]" id="all_brands"
                                class="form-control all_brands required" multiple="multiple">
                            @if(count($brands)>0)
                                @foreach($brands as $brand)
                                    <option value="{!! $brand->brand_id !!}">{!! ($brand->parent_id==null) ? $brand->brand_name : $brand->parent->brand_name." ".$brand->brand_name !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

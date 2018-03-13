 
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
                                Mes coordonées
                            </h2>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="">
                            {!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}
                            {!! Form::file('logo',array('class'=>' ','id'=>'logo')) !!}
                            @if($store && file_exists(public_path('upload/logo/'.$store->logo)))
                                <img src="{!! url('upload/logo/'.$store->logo) !!}" height="100" width="100">
                            @endif
                        </div>
                    </div>
                    @if($store)
                        @foreach($store->users as $index=>$user)
                            {{Form::text('user_id', ($store) ? $user->user_id : null ,['class'=>'hidden'])}}
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                            <div class="register-area">
                                <div class="ptb-7">
                                    <label for="shop_name">{!! trans("merchant.shop_name")!!} *</label>
                                    {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'required'])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="address1">Addresse *</label>
                                    {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'required','id'=>"address1"])}}
                                </div>

                                <div class="ptb-7">
                                    <label for="phone">Téléphone *</label>
                                    {!! Form::number('phone', ($store) ? $store->phone :  null  , ['class' => 'required','id'=>'phone']) !!}
                                </div>
                                <div class="ptb-7">
                                    <label for="email">Addresse mail *</label>
                                    {!! Form::text('email',($store) ? $store->email :  null , ['class' => 'required','id'=>'email']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18">
                            <div class="register-area">
                                <div class="ptb-7">
                                    <label for="created_date"> Date de création </label>
                                    {{Form::date('created_date', ($store) ? $store->created_date :  null,['class'=>''])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="tva_number">Numéro TVA *</label>
                                    {{Form::text('tva_number', ($store) ? $store->tva_number :  null ,['class'=>'required','id'=>"tva_number"])}}
                                </div>

                                <div class="ptb-7">
                                    <label for="siret_number">Numéro siret *</label>
                                    {{Form::text('siret_number', ($store) ? $store->siret_number :  null ,['class'=>'required','id'=>"siret_number"])}}
                                </div>
                                <div class="ptb-7">
                                    <label for="password">Mot de passe *</label>
                                    {{ Form::password('password', ['class' => 'required','id'=>'password']) }}
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="section-title">
                            <div class="align-title"></div>
                            <h2 class="souligne">
                                Coordonnées de paiement
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="register-area">
                            <div class="ptb-7">
                                <label for="banque_number">Nom du compte en banque *</label>
                                {{Form::text('banque_number', ($store) ? $store->banque_number :  null ,['class'=>'required','id'=>"banque_number"])}}
                            </div>

                            <div class="ptb-7">
                                <label for="eban">EBAN *</label>
                                {{Form::text('eban', ($store) ? $store->eban :  null ,['class'=>'required','id'=>"eban"])}}
                            </div>
                            <div class="ptb-7">
                                <label for="bic">BIC *</label>
                                {{Form::text('bic', ($store) ? $store->bic :  null ,['class'=>'required','id'=>"bic"])}}
                            </div>
                            <div class="ptb-7">
                                <label for="banque_domicile">Domicialisation banque *</label>
                                {{Form::text('banque_domicile', ($store) ? $store->banque_domicile :  null ,['class'=>'required','id'=>"banque_domicile"])}}
                            </div>
                            <div class="ptb-7">
                                <label for="banque_address">Adresse banque *</label>
                                {{Form::text('banque_address', ($store) ? $store->banque_address :  null ,['class'=>'required','id'=>"banque_address"])}}
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="text-center mr-t-btn">
                        <button class="btn btn-clickee-default" type="submit" id="add-store">{!! trans("merchant.complete_registration")!!}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>

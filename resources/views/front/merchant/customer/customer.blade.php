                            <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-body mt-30">
                                                <div class="row">
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
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::label('address', 'Adresse', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('address', ($customer) ? $customer->address : null , ['class' => 'form-control','id'=>'address','placeholder'=>"Adresse"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('phone_number', ($customer) ? $customer->phone_number : null , ['class' => 'form-control','id'=>'phone_number','placeholder'=>"Téléphone"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('birthday', 'Date de naissance', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::date('birthday', ($customer) ? $customer->birthday : null , ['class' => 'form-control datepicker','id'=>'birthday','placeholder'=>"Date de naissance"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::label('email', 'Adresse email', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('email', ($customer) ? $customer->email : null , ['type' => 'email', 'class' => 'form-control required','id'=>'email','placeholder'=>"Adresse email"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="box-footer">
                                    <a href="{!! Url('merchant/customer') !!}" class="btn btn-default">Annuler</a>
                                    <a class="btn btn-primary pull-right" href="#tab_2" data-toggle="tab"> {!! ($customer) ? "Confirmer client" : "Ajouter client"!!}
                                    </a>
                                </div>
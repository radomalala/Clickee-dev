@if($store && !empty($store->users))
<?php $user_ids = []; ?>
@foreach($store->users as $index=>$user)
    <?php $user_ids[] = $user->user_id; ?>
    <div class="row master_manager" id="{!! $index !!}">
        <div class="col-md-4">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('last_name', 'Nom', ['class' => '']) !!}
                    {!! Form::text("manager[$index][last_name]", $user->last_name, ['class' => 'form-control required','id'=>'last_name','placeholder'=>"Nom"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('first_name', 'Prénom', ['class' => '']) !!}
                    {!! Form::text("manager[$index][first_name]",$user->first_name, ['class' => 'form-control required','id'=>'first_name','placeholder'=>"Prénom"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('position', 'Position', ['class' => '']) !!}
                    {!! Form::text("manager[$index][position]", $user->position , ['class' => 'form-control required','id'=>'position','placeholder'=>"Position"]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('sms', 'SMS', ['class' => '']) !!}
                    {!! Form::text("manager[$index][sms]", $user->phone_number, ['class' => 'form-control required','id'=>'sms','placeholder'=>"SMS"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => '']) !!}
                    {!! Form::text("manager[$index][email]", $user->email , ['class' => 'form-control required','id'=>'email','placeholder'=>"Email"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mot de passe', ['class' => '']) !!}
                    {!! Form::password("manager[$index][password]", ['class' => 'form-control','id'=>'password','placeholder'=>"Mot de passe"]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-body mr-t-10">
                <div class="form-group hidden">
                    <div class="checkbox">
                        <label>
                            <input checked type="checkbox" name="manager[{!! $index !!}][global_manager]" id="global_manager" {!! ($user->pivot->is_global_manager == '1') ? "checked":'' !!} value="1">
                            Compte principal / propriétaire
                        </label>
                    </div>
                </div>
                <div class="form-group hidden">
                    <div class="checkbox">
                        <label>
                            <input checked type="checkbox" name="manager[{!! $index !!}][receive_request]" id="receive_request" {!! ($user->pivot->receive_request == '1') ? "checked":'' !!} value="1">
                            Recevoir une demande d'achat
                        </label>
                    </div>
                </div>
                <div class="form-group hidden">
                    <div class="checkbox">
                        <label>
                            <input checked type="checkbox" name="manager[{!! $index !!}][reply_request]" id="reply_request" {!! ($user->pivot->reply_request == '1') ? "checked":'' !!} value="1">
                            Peut répondre à une demande
                        </label>
                    </div>
                </div>

                <div class="form-group add-user">
                    @if($index > 0)
                        <button type="button" class="btn btn-danger remove_user">Effacer l'utilisateur</button>
                    @else
                        <button type="button" class="btn btn-primary add_user">Ajouter un utilisateur</button>
                    @endif
                </div>
                <input type="hidden" name="manager[{!! $index !!}][manager_id]" id="manager_id" value="{!! $user->user_id !!}">

            </div>
        </div>
    </div>

@endforeach
<input type="hidden" name="old_manager_id" value="{!! implode(',',$user_ids) !!}">


@else
<div class="row master_manager" id="1">
    <div class="col-md-4">
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('last_name', 'Nom', ['class' => '']) !!}
                {!! Form::text('manager[1][last_name]', null , ['class' => 'form-control required','id'=>'last_name','placeholder'=>"Nom"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('first_name', 'Prénom', ['class' => '']) !!}
                {!! Form::text('manager[1][first_name]', null , ['class' => 'form-control required','id'=>'first_name','placeholder'=>"Prénom"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('position', 'Position', ['class' => '']) !!}
                {!! Form::text('manager[1][position]', null , ['class' => 'form-control required','id'=>'position','placeholder'=>"Position"]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('sms', 'SMS', ['class' => '']) !!}
                {!! Form::text('manager[1][sms]', null , ['class' => 'form-control required','id'=>'sms','placeholder'=>"SMS"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => '']) !!}
                {!! Form::text('manager[1][email]', null , ['class' => 'form-control required','id'=>'email','placeholder'=>"Email"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Mot de passe', ['class' => '']) !!}
                {!! Form::password('manager[1][password]', ['class' => 'form-control required','id'=>'password','placeholder'=>"Mot de passe"]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box-body mr-t-10">
            <div class="form-group">
                <div class="checkbox hidden">
                    <label>
                        <input checked type="checkbox" name="manager[1][global_manager]" id="global_manager" value="1">
                        Compte principal / propriétaire
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox hidden">
                    <label>
                        <input checked type="checkbox" name="manager[1][receive_request]" id="receive_request" value="1">
                        Recevoir une demande d'achat
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox hidden">
                    <label>
                        <input checked  type="checkbox" name="manager[1][reply_request]" id="reply_request" value="1">
                        Peut répondre à une demande
                    </label>
                </div>
            </div>

            <div class="form-group add-user">
                <button type="button" class="btn btn-primary add_user">Ajouter un utilisateur</button>
            </div>


        </div>
    </div>
</div>
@endif
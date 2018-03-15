@extends('front.merchant.layout.master')

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
        Résultat promotion
    </h1>
</section>

<section class="content">
    @include('admin.layout.notification')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    
                </div>
                <div class="box-footer">
                    <a href="{!! Url('fr/merchant/promotion') !!}" class="btn btn-primary pull-right">Retour</a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
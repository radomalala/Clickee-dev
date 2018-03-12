@extends('front.merchant.layout.master')
@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('frontend/css/font-awesome.min.css') !!}
    {!! Html::style('backend/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('backend/plugins/select2/select2.css') !!}
    {!! Html::style('backend/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/dist/css/skins/skin-black-light.css') !!}
    {!! Html::style('backend/css/style.css') !!}
     {!! Html::style('backend/plugins/dynatree/src/skin/ui.dynatree.css') !!}
    {!! Html::style('backend/plugins/dropzone/dropzone.css') !!}
    {!! Html::style('backend/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css') !!}
    {!! Html::style('frontend/css/style-clickee.css') !!}
@stop
@section('content')
	<section class="content-header text-center">
        <h1>
            Encaissement
        </h1>
    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="title text-center">
                            <h1>Client</h1>
                        </div>
                        <div class="btn btn-small col-sm-6">
                            <a href="{!! URL::to('merchant/customer') !!}" class="btn btn-block btn-primary">Dejà Client</a>
                        </div>
                        <div class="btn btn-small col-sm-6">
                            <a href="{!! URL::to('merchant/customer/create') !!}" class="btn btn-block btn-primary">Nouveau Client</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('additional-scripts')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
@stop
@section('footer-scripts')
    {!! Html::script('frontend/js/customer.js') !!}
@stop

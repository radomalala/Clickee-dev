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
	<section class="content-header" style="text-align: center;">
        <h1>
            Mon fichier client
        </h1>
        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">
                    <div class="btn btn-small">
                        <!-- <a href="{!! URL::to('merchant/customer/create') !!}" class="btn btn-block btn-primary">Créer un nouveau client</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                            	<th>Adresse</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Naissance</th>
                                <th>Mail</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
	                         <tbody>
	                            @foreach($customers as $customer)
	                                <tr>
	                                    <td>{!! $customer->first_name !!}</td>
	                                    <td>{!! $customer->last_name !!}</td>
	                                    <td>{!! $customer->address !!}</td>
	                                    <td>{!! $customer->postal_code !!}</td>
	                                    <td>{!! $customer->country !!}</td>
	                                    <td>{!! $customer->birthday !!}</td>
	                                    <td>{!! $customer->email !!}</td>
	                                    <td>
	                                        <div class="btn-group">
	                                            <a href="{{ URL::to('merchant/customer/' . $customer->customer_id . '/edit') }}"
	                                               class="btn btn-primary btn-sm" title="Edit">Encaissement</a>&nbsp;
	                                            {!! Form::open(array('url' => route('customer.destroy',['id' => $customer->customer_id]), 'class' => 'pull-right')) !!}
                                                {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm','title'=>'Delete'] ) !!}
                                                {{ Form::close() }}
	                                        </div>
	                                    </td>
	                                </tr>
	                            @endforeach
	                         </tbody>

                        </table>
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

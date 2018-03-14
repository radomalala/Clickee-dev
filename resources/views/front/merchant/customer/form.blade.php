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
    <?php 
        $category_arr = [];
        $attributes = array();
    ?>
    <section class="content-header" style="text-align: center;">
        <h1>
            @if($customer)
                Dejà Client
            @else
                Nouveau Client
            @endif
        </h1>
    </section>
    <section class="content">
        @include('admin.layout.notification')
    	<div class="row">
    		<div class="col-md-12">
    			<div class="nav-tabs-custom">
    				{!! Form::open(['url' => ($customer) ? route('customer.update', ['id' => $customer->customer_id]) : route('customer.store'), 'id' =>'customer_form', 'enctype' => 'multipart/form-data', 'method' => ($customer) ? 'PATCH' : 'POST']) !!}
    					<div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                @include('front.merchant.customer.customer')
                            </div>
                            <div class="tab-pane" id="tab_2">
                                @include('front.merchant.customer.product_encasement')
                            </div>
                            <div class="tab-pane" id="tab_3">
                                @include('front.merchant.customer.payement')
                            </div>
                            
                        </div>
    				{!! Form::close() !!}
    			</div>
    		</div> 
    	</div>
    </section>

@endsection
@section('additional-script')
    <script>
        var product_is_active = [
                        {
                            id : 0,
                            text : "Séléctionner un produit"
                        },
                <?php 
                    $index = 0;
                    foreach ($product_is_active as $product): ?>
                       {
                            id : {!! $product->product_id !!},
                            text : "{!! $product->french->product_name !!}"
                        } {!! ((sizeof($product_is_active) - 1) != $index) ? "," : "" !!}
                                            
                <?php
                    $index++;
                    endforeach ?>
        ];
    </script>
    {!! Html::script('backend/plugins/select2/select2.js') !!}
    {!! Html::script('frontend/js/customer.js') !!}

@stop
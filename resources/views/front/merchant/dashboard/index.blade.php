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
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css') !!}
@stop
@section('content')

	@section('additional-script')		
		{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
		{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js') }}
		{{ HTML::script('frontend/js/dashboard.js') }}
	@stop
<section class="content">
<div class="box box-primary">
    <div class="box-body">

    <div  class="col-sm-12 text-center">
       <h3><label class="label color-text">Statistiques de vente</label></h3>
	   <div id="salesstat"></div>
    

    	<div class="mt-30">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-b">
                    <span class="info-box-icon bg-aqua"><i class="ion-android-cloud-done"></i></span>

                    <div class="info-box-content ">
                        <span class="info-box-text mt-20">En ligne</span>
                        <span class="info-box-number">{{ $product_count }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="info-box bg-b">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text mt-20">Vendus</span>
                        <span class="info-box-number">{{ $sales_count }}</span>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="info-box bg-b">
                    <span class="info-box-icon bg-green"><i class="ion-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text mt-20">CA total</span>
                        <span class="info-box-number">100</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center">
            <h3><label class="label color-text">Ventes en ligne - locales</label></h3>
            <div id="salescamembert"></div>
        </div>
    </div>
    </div>
</div>
</section>
@stop

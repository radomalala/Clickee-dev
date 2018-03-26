@extends('merchant.layout.master')

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
            Tous les produits
        </h1>

        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">
                    <div class="btn btn-small">
                        <a href="{!! route('create_product') !!}" class="btn btn-block btn-primary">Nouveau produit</a>
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
                        <table id="product_list" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Nom Produit</th>
                                <th>Numéro de série</th>
                                <th>Prix ​​d'origine</th>
                                <th>Meilleur prix</th>
                                <th>Créé par</th>
                                <th>Marque</th>
                                <th>Créé le</th>
                                <th>Modifié par</th>
                                <th>Modifié le</th>
                                <th>Note/Question</th>
                                <th>Affiliés</th>
                                <th>Statut</th>                                
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

@stop

@section('additional-script')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('backend/plugins/dropzone/dropzone.js') !!}
    {!! Html::script('backend/js/tableExport.js') !!}
    {!! Html::script('frontend/js/product_merchant.js') !!}
@stop

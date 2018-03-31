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
            Mes codes promo
        </h1>
        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-right">
                    <div class="btn btn-small">
                        <a href="{!! Url('fr/merchant/code_promo/create') !!}" class="btn btn-block btn-primary">Créer un code</a>
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
                                <th width="16%">Code</th>
                                <th width="12%">Début</th>
                                <th width="12%">Fin</th>
                                <th width="50%">Catégorie</th>
                                <th width="10%" class="no-sort">Prolonger/Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($code_promos->data as $code_promo)
	                                <tr>
	                                    <td>{!! $code_promo->code_promo_name !!}</td>
	                                    <td>
                                            {!! Jenssegers\Date\Date::parse($code_promo->date_debut)->format('j F Y')!!}
                                        </td>
	                                    <td>
                                            {!! Jenssegers\Date\Date::parse($code_promo->date_fin)->format('j F Y')!!}
                                        </td>
	                                    <td>
	                                    	@foreach($code_promo->categories as $category)
                                                <span class="badge bg-green mr-5" style="background: #044651 !important;">{!! $category->french->category_name !!}</span>
                                            @endforeach
	                                    </td>
	                                    <td>
	                                        <div class="btn-group">
	                                            <a href="{{ URL::to('fr/merchant/code_promo/' . $code_promo->code_promo_id . '/edit') }}"
	                                               class="btn btn-default btn-sm" style="" title="Edit"><i
	                                                        class="fa fa-fw fa-edit"></i></a>
	                                            {!! Form::open(array('url' => 'fr/merchant/code_promo/' . $code_promo->code_promo_id
	                                            , 'class' => 'pull-right')) !!}
	                                            {!! Form::hidden('_method', 'DELETE') !!}
	                                            {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm'] ) !!}
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
@stop

@section('additional-script')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
@stop

@section('footer-scripts')
    <script>
        if (jQuery('table.table').length > 0) {
            jQuery('table.table').DataTable({
                "responsive": true,
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": false,
                "order": [[2, "desc"]],
                "lengthMenu": [20, 40, 60, 80, 100],
                "pageLength": 20,
                language: {
                        paginate: {
                            first:    'Premier',
                            previous: 'Précédent',
                            next:      'Suivant',
                            last:     'Dernier'
                        },
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "search": "Chercher:",
                        "processing": "En traitement ...",
                        "infoEmpty": "Aucune entrée à afficher",
                        "info": "Afficher la page _PAGE_ de _PAGES_"
                },
                columns: [
                    {searchable: true, sortable: true},
                    {searchable: true, sortable: true},
                    {searchable: true, sortable: true},
                    {searchable: true, sortable: true},
                    {searchable: false, sortable: false}
                ],
                fnDrawCallback: function () {
                    var $paginate = this.siblings('.dataTables_paginate');

                    if (this.api().data().length <= this.fnSettings()._iDisplayLength) {
                        $paginate.hide();
                    }
                    else {
                        $paginate.show();
                    }
                }
            });
        }

        if (jQuery('.dataTables_filter').length > 0) {
            jQuery('.dataTables_filter').find('input').addClass('form-control')
        }

    </script>
@stop
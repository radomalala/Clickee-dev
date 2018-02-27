@extends($layout)

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
@stop
@section('content')
    <section class="content-header">
        <h1>
            All Admin
        </h1>
        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">
                    <div class="btn btn-small">
                        <a href="{!! route('add_administrator') !!}" class="btn btn-block btn-primary">Add New
                            Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( $admins->recordsTotal > 0 )
                                @foreach($admins->data as $admin)
                                    <tr>
                                        <td>{!! $admin->first_name !!}</td>
                                        <td>{!! $admin->last_name !!}</td>
                                        <td>{!! $admin->email !!}</td>
                                        <td>
                                            @if($admin->is_active==0)
                                                <span class="badge bg-light-blue">Inactive</span>
                                            @else
                                                <span class="badge bg-green">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ Url('admin/administrator/edit/' . $admin->admin_id) }}"
                                                   class="btn btn-default btn-sm" title="Edit"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                {!! Form::open(array('url' => 'admin/administrator/'. $admin->admin_id, 'class' => 'pull-right')) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm','title'=>'Delete'] ) !!}
                                                {{ Form::close() }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">{{config('admin.NO_RECORDS_MESSAGE')}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('additional-scripts')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
@stop
@section('footer-scripts')
    {!! Html::script('backend/js/admin_user.js') !!}
@stop

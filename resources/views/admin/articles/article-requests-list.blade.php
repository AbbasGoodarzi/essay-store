@extends('admin.master')

@section('title', 'لیست درخواست ها')

@section('page_style')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست درخواست ها</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table direction table-bordered table-striped datatable">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>تلفن</th>
                        <th>ایمیل</th>
                        <th>تاریخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articleRequests as $articleRequest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $articleRequest->first_name . ' ' . $articleRequest->last_name }}</td>
                        <td>{{ $articleRequest->mobile }}</td>
                        <td>{{ $articleRequest->email }}</td>
                        @php
                            $v = verta($articleRequest->created_at);
                        @endphp
                        <td>{{ $v->formatDate() }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('page_scripts_src')
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/admin/plugins/fastclick/fastclick.js"></script>
@endsection

@section('page_scripts')
    <!-- page script -->
    <script>
        $(function () {
            $(".datatable").DataTable();
        });
    </script>
@endsection

@extends('admin.master')

@section('title', 'لیست مقالات')

@section('page_style')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">مقالات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table direction table-bordered table-striped datatable">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr {!! $article->is_publish ? '' : 'style="background: #f39c12;"' !!}>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ mb_substr($article->description, 0, 20) }} ...</td>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <form action="{{ route('dashboard.articles.destroy', ['article' => $article->id]) }}" method="post" style="font-size: 16px;">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <a href="{{ route('dashboard.articles.edit', ['article' => $article->id]) }}" style="color: #000;margin-left: 10px;"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('آیا مطمئن هستید؟')"><button class="fa fa-times" type="submit" style="color: red; border: none;background: none;padding: 0"></button></a>
                            </form>
                        </td>
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

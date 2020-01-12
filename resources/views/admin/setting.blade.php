@extends('admin.master')

@section('title', 'متن درباره ما')

@section('content')

<div class="row">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">متن درباره ما و ارتباط با ما</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('dashboard.settings.store') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="description">متن ارتباط با ما</label>
                        <textarea name="contact" style="resize: vertical" rows="7" required class="form-control" id="contact" placeholder="متن ارتباط با ما را وارد نمایید">{{ @$contact->value }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">متن درباره ما</label>
                        <textarea name="about" style="resize: vertical" rows="7" required class="form-control" id="about" placeholder="متن درباره ما را وارد نمایید">{{ @$about->value }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="ثبت اطلاعات">
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

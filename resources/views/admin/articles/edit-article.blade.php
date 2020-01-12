@extends('admin.master')

@section('title', 'ویرایش مقاله')

@section('content')

<div class="row">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">ویرایش</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('dashboard.articles.update', ['article' => $article->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input type="text" name="title" value="{{ $article->title }}" required class="form-control" id="title" placeholder="عنوان مقاله را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="code">کد مقاله</label>
                        <input type="text" name="code" value="{{ $article->code }}" required class="form-control" id="code" placeholder="کد مقاله را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="price">قیمت مقاله</label>
                        <input type="number" min="0" name="price" value="{{ $article->price }}" required class="form-control" id="price" placeholder="قیمت مقاله را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <textarea name="description" style="resize: vertical" rows="5" required class="form-control" id="description" placeholder="توضیحات مقاله را وارد نمایید">{{ $article->description }}</textarea>
                    </div>
                    <div class="form-group">
                        @if(filled($article->pic_url))
                            <img src="{{ asset('storage/'.$article->pic_url) }}" class="img-thumbnail" style="margin-bottom: 1em;"  />
                        @endif

                        <label for="pic">آپلود عکس مقاله</label>
                        <input name="image" type="file" id="pic">

                        <p class="help-block">فرمت های قابل قبول: jpg, png</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="is_publish" value="1" {{ $article->is_publish ? 'checked' : '' }} type="checkbox"> نمایش در سایت
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="ثبت اطلاعات">
                    <a href="{{ route('dashboard.articles.index') }}" class="btn btn-default">انصراف</a>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@extends('front.master')

@section('title', $article->title)

@section('content')
    <main class="rtl mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-5 d-flex d-md-block justify-content-center">
                    <div class="d-flex justify-content-center single-img mb-4">
                        <img src="/front/images/p1.jpg" alt="file">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-7">
                    <h1 class="o-font-md font-weight-bold">{{ $article->title }}</h1>
                    کد مقاله:<span class="text-muted d-block mb-2">{{ $article->code }}</span>
                    <strong>قیمت محصول: </strong><span class="d-block text-success">25,000 تومان</span>
                </div>
            </div>
            <hr>
            <article class="o-font-sm text-dark text-justify">
                <p>{!! nl2br($article->description) !!}</p>

                <hr>
                <h5 class="mb-3">فرم ثبت سفارش</h5>
                <form action="{{ route('front.articles.store.request', ['article' => $article->id]) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">نام</label>
                            <input type="text" class="form-control" name="first_name" id="first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobile">شماره همراه</label>
                            <input type="text" class="form-control" name="mobile" id="mobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">ایمیل</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت سفارش</button>
                </form>
            </article>
        </div>
    </main>
@endsection

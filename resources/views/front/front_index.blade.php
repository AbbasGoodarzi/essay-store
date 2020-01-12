@extends('front.master')

@section('title', 'صفحه اصلی')

@section('content')
    <main class="rtl mt-3">
        <div class="d-flex justify-content-center flex-wrap">
            @foreach($articles as $article)
                <div class="card m-2" style="width: 18rem;">
                    <img src="front/images/p1.jpg" class="card-img-top" alt="store">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('front.articles.show', ['article' => $article->id]) }}" class="nav-link p-0 text-dark">{{ $article->title }}</a>
                        </h5>
                        <p class="card-text text-muted o-font-sm">{{ mb_substr($article->description, 0, 70) }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-success text-center">{{ $article->price == 0 ? 'رایگان' : number_format($article->price) . ' تومان' }}</p>
                        <a href="{{ route('front.articles.show', ['article' => $article->id]) }}" class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

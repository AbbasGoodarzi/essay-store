@extends('front.master')

@section('title', 'درباره ما')

@section('content')
    <main class="rtl mt-3">
        <div class="container">
            <h5>درباره ما</h5>
            <article class="o-font-sm text-dark text-justify">
                <p>{{ @$about->value }}</p>
            </article>
        </div>
    </main>
@endsection

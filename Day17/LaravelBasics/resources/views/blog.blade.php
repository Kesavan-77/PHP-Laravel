@extends('layouts.template')

@section('page', 'Blog')

@section('blogs')
    <section class="news-section">
        @for ($i = 1; $i <= 4; $i++)
            <div class="news-item">
                <a href="/blog/News{{$i}}"><h2>News Title {{$i}}</h2></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum
                    tristique.
                </p>
            </div>
        @endfor
    </section>
@endsection

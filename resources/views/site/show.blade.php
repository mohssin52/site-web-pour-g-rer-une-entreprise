@extends('master')
@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  <li><a href=" {{url('/')}}">Accuiel</a></li>
                  <li><a href=" {{url('/blog')}}">blog</a></li>
                  <li class="is-active"><a href="#" aria-current="page">{{$post->title}}</a></li>
                </ul>
              </nav>
            <h1 class="title">
     {{$post->title}} </h1>
            <h4> {{ $post->excerpt}}</h4>
        </div>
      
    </div>
</section>
<div class="container">
<div class="columns  mt-1">
    <div class="column">
        <figure class="image is-5by3">
<img src=" {{ asset('/storage/'.$post->image)}}" alt="">
        </figure>
        {{!! $post->body!!}}
    </div>
</div>

</div>


@endsection
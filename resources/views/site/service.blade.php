@extends('master')
@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  <li><a href=" {{url('/')}}">Accuiel</a></li>
                  <li><a href=" {{url('/services')}}">services</a></li>
                  <li class="is-active"><a href="#" aria-current="page">{{$service->title}}</a></li>
                </ul>
              </nav>
            <h1 class="title">
     {{$service->title}} </h1>
            <h4> {{ $service->description}}</h4>
        </div>
      
    </div>
</section>
<div class="container">
<div class="columns  mt-1">
    <div class="column">
        <figure class="image is-5by3">
<img src=" {{ asset('/storage/'.$service->image)}}" alt="">
        </figure>
        {{!! $service->body!!}}
    </div>
</div>

</div>


@endsection
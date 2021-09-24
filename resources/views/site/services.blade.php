@extends('master')
@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  <li><a href=" {{url('/')}}">Accuiel</a></li>
          
                  <li class="is-active"><a href="#" aria-current="page">services</a></li>
                </ul>
              </nav>
            <p class="title">
     Nos services
            </p>
        </div>
      
    </div>
  </section>
  <div class="container">
      @foreach($services->chunk(3) as $chunk)
<div class="columns mt-1">
    @foreach($chunk as $service)
    <div class="column">
        <div class="card">
            <div class="card-image">
              <figure class="image is-16by9">
                <a href=" {{url('/service/'.$service->id)}} ">

                  <img src="{{ asset('/storage/'.$service->image)}}" alt="Placeholder image">
                </a>
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-left"> 
                  <figure class="image is-48x48">
                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                  </figure>
                </div>
                <div class="media-content">
                  <p class="title is-4">{{$service->title}}</p>
                  <p class="subtitle is-6">@johnsmith</p>
                </div>
              </div>
          
              <div class="content">
                
            {{Str::limit($service->description),40}}
             <time> {{$service->created_at}}</time>
                <br>
             
              </div>
            </div>
          </div>
    </div>
@endforeach 

</div>
@endforeach

@endsection
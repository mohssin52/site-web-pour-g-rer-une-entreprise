@extends('master')
@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  <li><a href=" {{url('/')}}">Accuiel</a></li>
          
                  <li class="is-active"><a href="#" aria-current="page">blog</a></li>
                </ul>
              </nav>
            <p class="title">
              mes dernier post
            </p>
        </div>
      
    </div>
  </section>
  <div class="container">

    <div class="container">
      <div class="columns">
        <div class="column">


          <div class="tabs is-centered is-boxed">
            <ul>
              <li class="is-active">
                <a href=" {{url('/blog')}} ">
                  <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                  <span>All</span>
                </a>
              </li>
@foreach($category as $categore)
              <li class="">
                <a href=" {{url('/post/'.$categore->slug)}} ">
                  <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                  <span> {{$categore->name}} </span>
                </a>
              </li>
         @endforeach
        
            </ul>
          </div>
        </div>

      </div>
    </div>

      @foreach($posts->chunk(2) as $chunk)
<div class="columns mt-1">
    @foreach($chunk as $post)
    <div class="column">
        <div class="card">
            <div class="card-image">
              <figure class="image is-16by9">
                <a href=" {{url('/blog/'.$post->slug)}} ">

                  <img src="{{ asset('/storage/'.$post->image)}}" alt=" {{$post->title}} ">
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
                  <p class="title is-4">{{$post->title}}</p>
                  <p class="subtitle is-6">@johnsmith</p>
                </div>
              </div>
          
              <div class="content">
                
            {{Str::limit($post->excerpt),40}}
             <time> {{$post->created_at}}</time>
                <br>
              
            {{-- <small>
<a href="{{url('/blog/'.$post->category->slug)}}">{{ $post->category->name }}</a>
             </small>  --}}
              
              </div>
            </div>
          </div>
    </div>
@endforeach 

</div>
@endforeach
<div class="is-marginless columns">
    <div class=" column is-half"  align = "left">
        @if(!($posts->currentPage()==1))
    <a href=" {{ $posts->previousPageUrl()}}" class ="button is-dark">
        <span> precedent</span>
    </a>
@endif
</div>
@if($posts->hasMorePages())


<div class=" column is-half"  align = "right">
    <a href=" {{ $posts->nextPageUrl()}}" class ="button is-dark">
        <span> suivant</span>
    </a>

</div>
@endif
  </div>
@endsection
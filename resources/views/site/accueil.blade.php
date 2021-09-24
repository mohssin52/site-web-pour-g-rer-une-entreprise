@extends('master')
@section('content')


    <div id="carousel-demo" class="carousel">
      @foreach($slides as $slide)
      <div class="item-1">
    <img src=" {{asset('/storage/'.$slide->image)}} " alt="" width = "100%" height="100%">
      </div>
     @endforeach
    </div>
    <br>
    <br>
    <br>
    <div class="container">
      <div class="is-divider " data-content="nos service"> </div>
      
      <div class="columns is-marginless">
      
 
      
              @foreach($service as $service)
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
                          
                          </div>
                          <div class="media-content">
                            <p class="title is-6">{{$service->title}}</p>
                           <button class=" button is-warning">voir plus </button>
                          </div>
                        </div>
                    
                    
                      </div>
                    </div>
              </div>
          @endforeach 
        
      </div>
      
    </div>
    <br>
    <br>
    <br>
<div class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <div class="is-divider" data-content="nos actialté"></div>

    
      
      @foreach($post->chunk(2) as $chunk)
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

    </div>


  </div>
</div>

  @endsection


@section('stylesheet')

    <link rel="stylesheet" href="{{asset('css/bulma-caroussel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/divider.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/css/bulma-carousel.min.css">
@endsection

@section('javascript')
<script  src ="{{asset('js/bulma-caroussel.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/js/bulma-carousel.min.js"></script>

<script>
  bulmaCarousel.attach('#carousel-demo', {
    slidesToScroll: 1,
    slidesToShow: 1,
    pagination:true,
    navigation:true,
    loop:true,
  
    autoplay:true
  });
  </script>

  
@endsection
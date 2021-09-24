@extends('master')
@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                  <li><a href=" {{url('/')}}">Accuiel</a></li>
   
                  <li class="is-active"><a href="#" aria-current="page">contactez nous</a></li>
                </ul>
              </nav>
            <h1 class="title">
  contactez nous
            <h4 class="subtitle"> laissez un message</h4>
        </div>
    
    </div>
</section>
<div class="container">
    @if(session('status'))
    <div class="notification is-success">

     {{session('status')}}
    </div>
    @endif

    <div class="columns mt-2">
        <div class="tile is-ancestor">
            <div class="tile is-parent">
              <article class="tile is-child box notification is-warning ">
                <p class="title">télé</p>
                <p class="subtitle"> {{setting('contact.télé')}} </p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box notification is-warning">
                <p class="title">Email</p>
                <p class="subtitle"> {{setting('contact.email')}} </p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box notification is-warning">
                <p class="title">Reseaux sociaux</p>
                <a  href=" {{setting('contact.github')}} ">
                  <i class="fab fa-github"> </i>
                  
                </a>
             
               <a  href=" {{setting('contact.facebook')}}"  >
                  <i class="fab fa-facebook"></i>
                </a>
                <a  href=" {{setting('contact.linkedin')}}"  >
                  <i class="fab fa-linkedin"></i>
                </a>
                <a  href=" {{setting('contact.whatsap')}}"  >
                  <i class="fab fa-whatsapp"></i>
                </a>
              </article>
            </div>
         
          </div>
      
    </div>
    <div class="columns">
        <div class="column is-9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106386.85345506013!2d-7.640413269463536!3d33.56404892250011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!5e0!3m2!1sfr!2sma!4v1632394590007!5m2!1sfr!2sma" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="column is-3">
            <form action="{{url('/contact')}}" method="POST">
             {{csrf_field()}}
                <div class="field">
                    <label    class="label">Name</label>
                    <div class="control">
                      <input class="input @if($errors->has('name')) is-danger  @endif  " value="{{old('name')}}" name ="name"type="text" placeholder="votre nom complet">
                    </div>
                    @if($errors->has('name'))
                    <p class="help is-danger"> {{$errors->first('name')}} </p>
                    @endif

                  </div>
                  
                  <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                      <input class="input @if($errors->has('email')) is-danger  @endif " value= "{{old('email')}}" name ="email"type="email" placeholder="votre email" value="">
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="icon is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                      </span>
                    </div>
              @if($errors->has('email'))
                    <p class="help is-danger"> {{$errors->first('email')}} </p>
                    @endif
                  </div>
                
                  <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                      <textarea class="textarea @if($errors->has('message')) is-danger  @endif " name ="message"placeholder="Textarea">
                        {{old('message')}}
                      </textarea>
                    </div>
                    @if($errors->has('message'))
                    <p class="help is-danger"> {{$errors->first('message')}} </p>
                    @endif
                  </div>
                  
                  <div class="field is-grouped">
                    <div class="control">
                      <button class="button is-link">Envoyer</button>
                    </div>
                    <div class="control">
                      <button class="button is-link is-light">Cancel</button>
                    </div>
                  </div>
            </div>
            </form>
    </div>

</div>
@endsection
@section('stylesheet')
<link rel="stylesheet" href="{{asset('css/font-awsome.min.css')}}">
    
@endsection

@section('javascript')
<script  src ="{{asset('js/fontawsome.min.js')}}"></script>
<script src= "{{asset('/js/brand.min.js')}}"> 
<script src= "{{asset('/js/solid.min.js')}}"> 
    <script src= "{{('/js/fontawsome.min.js')}}"> 
  
    </script>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"  />

  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top"><img width="50" height="" src="{{ asset('public/images')}}/{{ $logo->logo }}" alt=""></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active " href="{{ route('frontend.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('about.show') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('frontend.services.show') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('frontend.works.show') }}">Work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('frontend.blogs.show') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('frontend.contact.show') }}">Contact</a>          
          </li>
        
          
          <li class="nav-item">
            <div class="dropdown-center">
              <a style="background-color: transparent; cursor: pointer;"  class=" nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user())
                {{ Auth::user()->name }}
                @else
                Log In
                @endif

              </a>
              <ul class="dropdown-menu">
                    @if(!Auth::user())
                    <li><a class="dropdown-item " href="{{ route('register') }}">Sign Up</a></li>
                    <li><a class="dropdown-item " href="{{ route('login') }}">Log In</a></li>
                    @elseif(Auth::user())
                    <li><a class="dropdown-item " href="{{ route('logout.index') }}">Log Out</a></li>
                    @endif
              

                
                
              </ul>
            </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
  
  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image " style="background-image: url({{ asset('public/images') }}/{{ $logo->bc_image }});  background-size: 100% 100%" >
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <!-- <div class="container">         CEO AH,Web Developer,Web Designer,Frontend Developer,Graphic Designer -->
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">{{ $logo->title }}</h1>
          <p class="intro-subtitle"><span class="text-slider-items">{{ $logo->sub_title }}</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
   

      {{-- login modal --}}
      {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form method="POST" action="{{ route('register') }}" >
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}:</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email Address') }}:</label>
            <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
              @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}:</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}:</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>


       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> {{ __('Sign Up') }}</button>
      </form>
      </div>
    </div>
  </div>
</div>

 --}}

{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

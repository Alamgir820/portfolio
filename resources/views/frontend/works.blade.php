@extends('layouts.frontend')
@section('frontend_content')
 

<div class="section-counter paralax-mf bg-image" style="background-image: url({{ asset('public/frontend') }}/img/counters-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ App\Models\Work::count() }}</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ App\Models\user::count() }}</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter"> {{ App\Models\work::count() }} </p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">36</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Portfolio Star /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Works
              
            </h3>
            <p class="subtitle-a">
           {{ $logo->sub_title }}
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">

        @foreach ($works as $item)
        <div class="col-md-4 d-block d-lg-flex">
          <div class="work-box">
            <a href="{{ asset('public/works/images') }}/{{ $item->project_image }}" data-lightbox="gallery-mf">
              <div class="work-img">
                <img  src="{{ asset('public/works/images') }}/{{ $item->project_image }}" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  
                  <div class="col-sm-7">
                    
                    <h2 class="w-title">{{ $item->client_name }}</h2>
                    <div class="w-more">
                      <span class="w-ctegory">{{ $item->service->title }}</span> / <span class="w-date">{{ $item->created_at->toFormattedDateString() }}</span>
                    </div>
                  </div>
                  <div class="col-sm-5">
                   @if($item->review_star==1)
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    @elseif($item->review_star==2)
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    @elseif($item->review_star==3)
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    @elseif($item->review_star==4)
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i  class="fa-solid fa-star"></i>
                    @elseif($item->review_star==5)
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                    <i style="color: yellow" class="fa-solid fa-star"></i>
                   @endif
                    <div class="w-like">
                     
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
        
        
                </div>
              </div>
            </a>
          </div>
        </div>
       
     
        
      </div>
    </div>
  </section>
  <!--/ Section Portfolio End /-->

  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url({{ asset('public/frontend') }}/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            @foreach ($works as $item)
                
           
            <div class="testimonial-box">
              
                  
             
              <div class="author-test">
                <img  src="{{ asset('public/works/images') }}/{{ $item->client_image }}" alt="" class="rounded-circle b-shadow-a"> 
                <span class="author">{{ $item->client_name }}</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  {{ $item->client_review }}
                
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
             
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
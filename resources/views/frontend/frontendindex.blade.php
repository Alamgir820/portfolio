@extends('layouts.frontend')
@section('frontend_content')



  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img class="img img-thumbnail" width="50%" style="height: 50%" src="{{ asset('public/images') }}/{{ $about->image }}" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Profile: </span> <span>{{ $about->profile_name }}</span></p>
                      <p><span class="title-s">Name: </span> <span>{{ $about->name }}</span></p>
                      <p><span class="title-s">Email: </span> <span>{{ $about->email }}</span></p>
                      <p><span class="title-s">Phone: </span> <span>{{ $about->phone }}</span></p>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Skill</p>
                  @foreach ($skill as $item)
                  <span>{{ $item->skill_name }}</span> <span class="pull-right">{{ $item->skill_percentage }}%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $item->skill_percentage}}%;" aria-valuenow="{{ $item->skill_percentage }}" aria-valuemin=""
                      aria-valuemax="{{ $item->skill_percentage }}"></div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me & Skills
                    </h5>
                  </div>
                  @foreach ($skill as $item)
                  <p class="lead">
                    @php
                       echo  $item->message ; 
                    @endphp
                  </p>
                  @endforeach
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              {{ $logo->sub_title }}
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($services as $item)
        <div class="col-md-4 d-block d-lg-flex">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="{{ $item->icon }}"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">{{ $item->title }}</h2>
              <p class="s-description text-center">
                @php
                echo $item->description;
                @endphp
              </p>
            </div>
          </div>
        </div>
        @endforeach
       
       
      
  </section>
  <!--/ Section Services End /-->

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

  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              {{ $logo->title }}
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($blog as $item)
            
       
        <div class="col-md-4 d-block d-lg-flex">
          <div class="card card-blog ">
            <div class="card-img">
              <a href="{{ route('blogpost.show',$item->id) }}"><img src="{{ asset('public/blog/images') }}/{{ $item->blog_image }}" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">{{ $item->blog_title }}</h6>
                </div>
              </div>
              <h3 class="card-title"><a href="blog-single.html">{{ $item->blog_subtitle }}</a></h3>
             <div style="height: 100px;overflow:hidden">
              <p class="card-description">
                @php
                echo $item->blog_description;
                @endphp
              </p>
             </div>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="{{ asset('public/images') }}/{{ $about->image }}" alt="" class="avatar rounded-circle">
                  <span class="author">{{ $about->name }}</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline">{{ $item->created_at->diffForHumans() }}</span> 
              </div>
            </div>
          </div>
        </div>

        @endforeach
     
    
    
      </div>
    </div>
  </section>
  <!--/ Section Blog End /-->

  <!--/ Section Contact-Footer Start /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url({{ asset('public/frontend') }}/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message Us
                    </h5>
                  </div>
                  <div>
                      <form action="" method="post" role="form" class="contactForm">
                        @csrf
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                              <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control message" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" id="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem
                      expedita aperiam aliquid at.
                      Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis
                      mollitia inventore?
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> 329 WASHINGTON ST BOSTON, MA 02108</li>
                      <li><span class="ion-ios-telephone"></span> (617) 557-0089</li>
                      <li><span class="ion-email"></span> contact@example.com</li>
                    </ul>
                  </div>
                  
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection
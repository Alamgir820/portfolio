
  <section class="paralax-mf footer-paralax bg-image sect-mt-4 route" style="background-image: url({{ asset('public/frontend') }}/img/overlay-bg.jpg)">
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
                      Quick Links
                    </h5>
                  </div>
                  
                    <a class="btn btn-link" href="{{ route('frontend.index') }}">Home </a>
                    <a class="btn btn-link" href="{{ route('about.show') }}">About</a>
                    <a class="btn btn-link" href="{{ route('frontend.services.show') }}"> Services</a>
                    <a class="btn btn-link" href="{{ route('frontend.works.show') }}">Work</a>
                    <a class="btn btn-link" href="{{ route('frontend.blogs.show') }}">Blog</a>
                    <a class="btn btn-link" href="{{ route('frontend.contact.show') }}">Contact</a>
                  
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Site Links
                
                  </div>
                  <div class="more-info">
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> BOGURA BANGLADESH</li>
                      <li><span class="ion-ios-telephone"></span>{{ $about->phone }}</li>
                      <li><span class="ion-email"></span>{{ $about->email }}</li>
                      @foreach ($footer as $item)
                          @if($item->websiteicon==null)
                    
                      <li><a style="color: blue;text-decoration:underline" href="{{ $item->websitelink }}">{{ $item->websitename }}</a></li>
                   @endif
                      @endforeach
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      @foreach ($footer as $item)
                      @if($item->websiteicon !=null)
                      <li><a href="{{ $item->websitelink }}"><span class="ico-circle"><i class="{{ $item->websiteicon }}"></i></span></a></li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                </div>

              </div> 
                 {{-- ion-social-facebook ion-social-instagram ion-social-twitter ion-social-pinterest --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

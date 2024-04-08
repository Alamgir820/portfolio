@extends('layouts.frontend')
@section('frontend_content')

<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              {{ $logo->sub_title }}
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div  class="row">
        @foreach ($blog as $item)
            
       
        <div  class="col-md-4 d-block d-lg-flex">
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
              <h3 class="card-title"><a href="{{ route('blogpost.show',$item->id) }}">{{ $item->blog_subtitle }}</a></h3>
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

@endsection
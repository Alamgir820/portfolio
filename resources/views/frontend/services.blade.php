@extends('layouts.frontend')
@section('frontend_content')
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

@endsection
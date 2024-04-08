@extends('layouts.frontend')
@section('frontend_content')

    {{-- about section start --}}

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
                      <img src="{{ asset('public/images') }}/{{ $about->image }}" class="img-fluid rounded b-shadow-a" alt="">
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
                  <span>{{ $item->skill_name }}</span> <span class="pull-right">{{ $item->skill_percentage }}</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $item->skill_percentage }}%;" aria-valuenow="{{ $item->skill_percentage }}" aria-valuemin=""
                      aria-valuemax="{{ $item->skill_percentage }}"></div>
                  </div>

                  @endforeach
                  

                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>

                  @foreach ($skill as $item)
                  <p class="lead">
                  @php
                  echo $item->message;
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

@endsection
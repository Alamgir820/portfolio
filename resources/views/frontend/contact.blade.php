
@extends('layouts.frontend')
@section('frontend_content')

<link rel="stylesheet" href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }}">
<link href="{{ asset('public/frontend') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                          <button type="submit" id="submit1" class="button button-a button-big button-rouded">Send Message</button>
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
                     {{ $logo->sub_title }}
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> BOGURA BANGLADESH</li>
                      <li><span class="ion-ios-telephone"></span> {{ $about->phone }}</li>
                      <li><span class="ion-email"></span>{{$about->email}}</li>
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
  <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
  <script src="{{ asset('public/backend') }}/plugins/sweetalert/sweetalert.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>

<script>
  $(document).ready(function () {
    
    $(document).on('click','#submit1',function(){
  
  let name=$('#name').val()
  let email=$('#email').val();
  let subject=$('#subject').val();
  let message=$('.message').val();
  $.ajax({
    type: "post",
    url: "{{ route('contact.storepage') }}",
    data: {name:name,email:email,subject:subject,message:message},
    success: function (res) {
     if(res.status==200){

      $('.contactForm')[0].reset();
      Command: toastr["success"]("Message send successfully!!","success")

                      toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                      }
      
     }
    }
  });
});



  });
 
</script>

  @endsection
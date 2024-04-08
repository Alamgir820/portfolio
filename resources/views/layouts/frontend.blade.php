

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AH</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('public/frontend') }}/img/favicon.png" rel="icon">
  <link href="{{ asset('public/frontend') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('public/frontend') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  
  <link href="{{ asset('public/frontend') }}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
  <link href="{{ asset('public/frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
  <link href="{{ asset('public/frontend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ asset('public/frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('public/frontend') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }}">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('public/frontend') }}/css/style.css" rel="stylesheet">
  <style>
    a{
      text-decoration: none;
      
    }
  </style>

</head>

<body id="page-top">

  <!--/ Nav Star /-->
@include('layouts.frontend_partial.navbar')

@yield('frontend_content')

@include('layouts.frontend_partial.footer')





<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>





<!-- JavaScript Libraries -->
<script src="{{ asset('public/frontend') }}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/popper/popper.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/easing/easing.min.js"></script>

<script src="{{ asset('public/frontend') }}/lib/counterup/jquery.waypoints.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/counterup/jquery.counterup.js"></script>
<script src="{{ asset('public/frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/lightbox/js/lightbox.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/typed/typed.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/sweetalert/sweetalert.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend') }}/js/bootstrap.bundle.min.js"></script>





<!-- Contact Form JavaScript File -->
<script src="{{ asset('public/frontend') }}/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('public/frontend') }}/js/main.js"></script>
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

<script>
  $(document).on('click','#submit',function(){
  
    let name=$('#name').val()
    let email=$('#email').val();
    let subject=$('#subject').val();
    let message=$('.message').val();
    $.ajax({
      type: "post",
      url: "{{ route('contact.store') }}",
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

</script>

<script>  
  $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Safe Data!");
           }
         });
     });
     
</script>
<script>
  
  @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
             toastr.info("{{ Session::get('messege') }}");
             break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
           toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
          }
  @endif
 
 </script>


<script>
  $(document).ready(function () {
   $(document).on('click','.submitcomment',function(e){
    e.preventDefault();
    let user_id=$('#user_id').val();
    let blog_id=$('#bolg_id').val();
    let comment=$('.commentmessage').val();
   $.ajax({
    type: "post",
    url: "{{ route('comment.store') }}",
    data: {user_id:user_id,blog_id:blog_id,comment:comment},
    dataType: "json",
    success: function (res) {
      if(res.status==200){
        $('.blogpost').load(location.href+' .blogpost');
      }

    
    },error:function(error){
      
        $('.append').append('You are not login!');
     
      
    }


   });
   });

        $(document).on('click','.commentdata',function(){

          let comment_id=$(this).data('id');
          $('#comment_id').val(comment_id);
        });
        $(document).on('click','#replymessagesubmit',function(e){
          e.preventDefault();
          let user_id=$('#user_id').val();
          let comment_id=$('#comment_id').val();
          let replymessage=$('.replymessage').val();
          $.ajax({
            type: "post",
            url: "{{ route('reply.store') }}",
            data: {user_id:user_id,comment_id:comment_id,replymessage:replymessage},
            dataType: "json",
            success: function (res) {
              if(res.status==200){
                $('.blogpost').load(location.href+' .blogpost');
                
              }
            },error:function(error){
              $('.append1').append('You are not login!');
            }
          });
        });

    });





   
</script>
<script>
  
  function reply(caller){
             $('.commentdiv').insertAfter($(caller));
             $('.commentdiv').show();

              }
              function reply_close(caller){
             $('.commentdiv').hide();

              }



</script>

</body>
</html>

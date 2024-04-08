@extends('layouts.frontend')
@section('frontend_content')

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4 blogpost" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8"> 
         
              
         

          <div class="post-box">
            <div class="post-thumb">
              <img src="{{ asset('public/blog/images') }}/{{ $blogpost->blog_image }}" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title">{{ $blogpost->blog_subtitle }}</h1>
              <ul>
                <li>
                  <span ><img class=" avatar rounded-circle" width="50"  src="{{ asset('public/images') }}/{{ $about->image }}" alt=""></span>
                  <a href="{{ route('about.show') }}">{{ $about->name }}</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="{{ route('frontend.blogs.show') }}">{{ $blogpost->blog_title }}</a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="">{{$blogpost->comments->count() }}</a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <p>
             @php 
             echo $blogpost->blog_description;
             @endphp
              </p>
              
            </div>
          </div>
       
          <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments ({{ $blogpost->comments->count() }})</h4>
            </div>
            <ul class="list-comments">
              
              @foreach ($comment as $item1)
             @if($blogpost->id==$item1->blog_id)

              <li>
             
                <div class="comment-avatar">
                  <img style="width: 30px; height:30px" class=" avatar rounded-circle" src="{{ Avatar::create($item1->user->name)->toBase64() }}" alt="">
                </div>
                <div class="comment-details">
                  <strong  class="comment-author">{{ $item1->user->name }}</strong><br>
                  <small>{{ $item1->created_at->diffForHumans() }}</small>
                  <p>
                   {{ $item1->comment }}
                    
                  </p>

                   </div>
                  
                 @endif
                   @foreach ($replies as $item)
                   @if($item->comment_id==$item1->id && $blogpost->id==$item1->blog_id)
                   
                   <div>
                    <div class="comment-avatar ">
                      <img style="width:30px; height:30px" class=" avatar rounded-circle" src="{{ Avatar::create($item->user->name)->toBase64() }}" alt="">
                    </div>
                  <div class="comment-details">

                    <h6  class="">{{ $item->user->name }}</h6>
                    <small>{{ $item1->created_at->diffForHumans() }}</small>
                    <p>
                   {{ $item->reply }}
                  
                    </p>
                    
                     </div>
                     
                    </div>
                     @endif
             
                    @endforeach
                    @if($item1->count()>0  && $blogpost->id==$item1->blog_id)
                    <a class="commentdata" data-id="{{ $item1->id }}" style="margin-left: 65px;" href="javascript::void(0)" onclick="reply(this)">Reply</a>
                    <div style="color: red;background-color: aquamarine;margin-left: 65px;" class="append">

                    </div>
                    @endif
                   @endforeach 
                 
                
                   {{ $comment->links() }}
                   <div class="commentdiv" style="margin-left: 65px ;display:none;margin-top:10px">
                    <div style="color: red;background-color: aquamarine;" class="append1">

                    </div>
                    <form action="" method="post" role="form" class="contactForm">
                     
                      @csrf
                        <div class="form-group">
                          <input type="hidden" id="user_id" name="user_id" @if(Auth::check()) value="{{ Auth::user()->id }}" @endif  >
                          <input type="hidden" id="comment_id" name="comment_id" value="">
                          <textarea class="form-control message replymessage " name="replymessage" rows="5" data-rule="required" data-msg="Please write something for us" autofocus placeholder="Write comment....."></textarea>
                          <div class="validation"></div>
                        </div>
                        <button type="submit" id="replymessagesubmit"  class="button button-a button-small button-rouded ">Reply</button>
                        <a href="javascript::void(0)" style="color: white" class="button button-a button-small button-rouded" onclick="reply_close(this)">Close </a>
                      </form>
                    </div>
                 

            
                <div style="margin-left: 65px;margin-top:20px">
                  <form action="" method="post" role="form" class="contactForm">
                    @csrf
                      <div class="form-group">
                        <input type="hidden" id="user_id" name="user_id" @if(Auth::check()) value="{{ Auth::user()->id }}" @endif >
                        <input type="hidden" id="bolg_id" name="bolg_id" value="{{ $blogpost->id }}">
                        <textarea class="form-control message commentmessage" name="comment" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Write comment....."></textarea>
                        <div class="validation"></div>
                      </div>
                      <button type="submit" id="submitcomment" class="button button-a button-small button-rouded submitcomment">Comment</button>
                    </form>
                  </div>
          
           



            </ul>
          </div>


        </div>
        <div class="col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="button">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                @foreach ($blog as $item)
                <li>
                  <strong >  <a style="color: blue" href="{{ route('blogpost.show',$item->id) }}">{{ $item->blog_title }}</a> </strong><br>
                  <small>{{ $item->blog_subtitle }}</small>
                </li>
                @endforeach
              
              </ul>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Archives</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <li>
                  <a href=" {{ route('blogpost.show',$item->id) }}">{{ $blogpost->created_at->toFormattedDatestring() }}</a>
                </li>
                <li>
                  <a href="{{ route('about.show') }} ">{{ $about->updated_at->toFormattedDatestring()}}</a>
                </li>
              
                </li>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
                @foreach ($services as $item)
                <li>
                  <a href="{{ route('frontend.services.show') }}">{{ $item->title }}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

@endsection
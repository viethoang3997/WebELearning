@extends('master')
@section('title','trang chủ')
@section('main')

<div class="banner container-fluid">
    <div class="hapo-banner d-flex flex-column">
        <div class="banner-learn">
            Learn Anytime, Anywhere
        </div>
        <div class="banner-title">
            at E-Learning <img alt="#" src="{{ asset('storage/image/Group%206.png') }}"> !
        </div>
        <div class="banner-des">
            Interactive lessons, "on-the-go"<br>
            practice, peer support.
        </div><a href="#">
        <div class="btn btn-start">
            Start Learning Now!
        </div></a>
    </div>
</div>
<!-- //banner -->
<div class="hapo-banner-space"></div>
<!-- //space -->
<div class="hapo-subject container d-flex justify-content-center">
    <div class="hapolearn-courses d-md-flex flex-column flex-md-row justify-content-center">
        @foreach($courses as $key => $value) 
        @if ($key <= 2) 
            <div class="card subject-courses col-md-4 col-12">
                <img alt="Html Css" class="card-img-top hapolearn-subject subject-html img-fluid" src="{{ asset('storage/image/Rectangle%207.png') }}">
                <div class="card-body hapolearn-card-body">
                    <div class="card-title hapolearn-card-title text-center py-md-0">
                        {{ $value->name }}
                    </div>
                    <div class="card-text hapolearn-card-text text-center px-xl-3 py-xl-1 m-auto">
                        {{ $value->description }}
                    </div><a class="d-flex justify-content-center text-decoration-none" href="#"><button class="btn hapolearn-courses-btn mb-3 m-md-0 pl-md-4 pr-md-4 mt-md-3 mt-xl-3 mb-xl-3">Take This Course</button></a>
                </div>
            </div>
        @endif
        @endforeach
    </div>
</div>
<!-- //subject -->
<div class="hapo-other-subject container">
    <div class="hapo-title text-center w-100">
        <span class="underline">Other courses</span>
    </div>
    <div class="hapolearn-othercourses mt-5 d-flex flex-column flex-md-row justify-content-center">
        @foreach($courses as $key => $value) 
        @if($key > 2)
            <div class="card subject-courses col-md-4 col-12">
                <img alt="CSS" class="card-img-top hapolearn-subject subject-css img-fluid" src="{{ asset('storage/image/CSS.png') }}">
                <div class="card-body hapolearn-card-body">
                    <div class="card-title hapolearn-card-title text-center py-xl-0">
                    {{ $value->name }}
                    </div>
                    <div class="card-text hapolearn-card-text text-center px-xl-3 py-xl-1 m-auto">
                        {{ $value->description }}
                    </div><a class="d-flex justify-content-center text-decoration-none mb-5" href="#"><button class="btn hapolearn-courses-btn mb-3 m-md-0 pl-md-4 pr-md-4 mt-md-3 mt-xl-3 mb-xl-3">Take This Course</button></a>
                </div>
            </div>
        @endif
        @endforeach
    </div><a class="hapo-all-courses text center my-md-5 d-flex align-items-center justify-content-center text-center text-decoration-none" href="">View All Our Courses <img class="img-fluid" src="{{ asset('storage/image/muiten.png') }}"></a>
</div>
<!-- //othercourse -->
<div class="hapo-question container-fluid">
    <div class="row">
        <img src="{{ asset('storage/image/mb%201.png') }}" class="question-logo col-xl-4 col-md-4 col-5 img-fluid">
        <div class="hapo-question-why col-xl-8 col-6 d-xl-none d-block">Why HapoLearn ?</div>
        <div class="w-100"></div>
        <div class="hapo-question-body col-xl-6 col-md-7 col-12 d-flex flex-column justify-content-center">
            <div class="hapo-question-why d-xl-block d-none">Why HapoLearn ?</div>
            <p><img src="{{ asset('storage/image/tichv.png') }}" class="mr-2">Interactive lessons, "on-the-go" practice, peer support.</p>
            <p><img src="{{ asset('storage/image/tichv.png') }}" class="mr-2">Interactive lessons, "on-the-go" practice, peer support.</p>
            <p><img src="{{ asset('storage/image/tichv.png') }}" class="mr-2">Interactive lessons, "on-the-go" practice, peer support.</p>
            <p><img src="{{ asset('storage/image/tichv.png') }}" class="mr-2">Interactive lessons, "on-the-go" practice, peer support.</p>
            <p><img src="{{ asset('storage/image/tichv.png') }}" class="mr-2">Interactive lessons, "on-the-go" practice, peer support.</p>
        </div>
        <img src="{{ asset('storage/image/transparent-1911160_1280.png') }}" class="question-why-right col-xl-6 col-md-5 justify-content-center img-fluid">
    </div>
</div>
<!-- //question -->
<div class="hapo-feedback container">
    <div class="hapo-title text-center w-100">
        <span class="underline">Feedback</span>
    </div>
    <div class="hapo-feedback-des text-center">
        What other students turned professionals have to say about us after learning with us and reaching their goals
    </div>
    <div class="feedback-detail d-flex justify-content-center row">
        <div class="feedback-des d-flex flex-column justify-content-center">
            <div class="feedback-comment d-flex">
                <div class="comment-content">
                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.Thank you Eddie Bryan.”</p>
                </div>
            </div>
            <div class="feedback-user d-flex">
                <img alt="#" class="img-fluid" src="{{ asset('storage/image/Ellipse%201.png') }}">
                <div class="user-information d-flex flex-column">
                    <span class="user-name">Tran Viet Hoang</span>
                    <h4>PHP</h4>
                    <div class="rate">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="feedback-des d-flex flex-column justify-content-center">
            <div class="feedback-comment d-flex">
                <div class="comment-content">
                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.Thank you Eddie Bryan.”</p>
                </div>
            </div>
            <div class="feedback-user d-flex">
                <img alt="#" class="img-fluid" src="{{ asset('storage/image/Ellipse%201.png') }}">
                <div class="user-information d-flex flex-column">
                    <span class="user-name">Tuan Tran Hoang</span>
                    <h4>Python</h4>
                    <div class="rate">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="feedback-des d-flex flex-column justify-content-center">
            <div class="feedback-comment d-flex">
                <div class="comment-content">
                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.Thank you Eddie Bryan.”</p>
                </div>
            </div>
            <div class="feedback-user d-flex">
                <img alt="#" class="img-fluid" src="{{ asset('storage/image/Ellipse%201.png') }}">
                <div class="user-information d-flex flex-column">
                    <span class="user-name">Hoang Anh Nguyen</span>
                    <h4>Python</h4>
                    <div class="rate">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="control-next d-flex justify-content-between position-relative">
        <a class="next-left"><i class="fas fa-angle-left"></i></a> <a class="next-right"><i class="fas fa-angle-right"></i></a>
    </div>
</div>
<!-- //feedback -->
<div class="banner-second d-flex flex-column justify-content-center align-items-center text-center container-fluid">
    <span class="become-title">Become a member of our<br>growing community!</span> 
    <a href="#"><button class="btn btn-start-learn">Start Learning Now!</button></a>
</div>
<!-- //banner-second -->
<div class="statistic container text-center my-xl-2 py-xl-1 my-md-2 py-md-2 mt-3 pt-2">
    <div class="hapo-title text-center w-100">
        <span class="underline">Statistic</span>
    </div>
    <div class="statistic-body row mt-5 text-center">
        <div class="statistic-learn col-md-4 col-4 mb-5">
            <span>Courses</span>
            <p class="mt-3">1,586</p>
        </div>
        <div class="statistic-learn col-md-4 col-4 mb-5">
            <span>Lessons</span>
            <p class="mt-3">2,689</p>
        </div>
        <div class="statistic-learn col-md-4 col-4 mb-5">
            <span>Learners</span>
            <p class="mt-3">16,882</p>
        </div>
    </div>
</div>
<!-- //statistic -->
<div class="hapolearn-message row">
    <div class="message-boxchat p-2 col-12" id="boxchat">
        <div class="hapo-message-user col-9 m-auto pt-1">
            Hapo Learn
        </div>
        <div class="hapolearn-message-detail row">
            <img alt="" class="mess-icon col m-auto" src="{{ asset('storage/image/Ellipse%207.png') }}">
            <p class="col-8">HapoLearn xin chào bạn.<br>
            Bạn có cần chúng tôi hỗ trợ gì không?</p><i class="fas fa-times-circle col-2" onclick="closeMes('boxchat')"></i>
        </div>
        <div class="hapolearn-login-user col-10 m-auto pt-3">
            <button class="btn btn-info w-100 py-2 hapo-message-btnlogin"><img class="mr-1" src="{{ asset('storage/image/Messenger.png') }}">Đăng nhập vào Messenger</button>
            <p class="mt-2">Chat với HapoLearn trong Messenger</p>
        </div>
    </div>
    <div class="col-12 pr-0"><img class="float-right message-open" onclick="showMes('boxchat')" src="{{ asset('storage/image/Group%208.png') }}"></div>
</div>
<!-- //message -->

@endsection

@section('script')
<script> 
    function closeMes(id) {
      var closeBoxchat = document.getElementById(id);
      closeBoxchat.style.display = "none";
    }

    function showMes(id) {
      var boxchat = document.getElementById(id);
      if(boxchat.style.display == "block") {
          boxchat.style.display = "none";
      } else {
          boxchat.style.display = "block";
      }
    }
</script>
@endsection

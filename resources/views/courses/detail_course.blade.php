@extends('master')
@section('title','Detail course')
@section('main')
<div class="detail-course-index container">
    <div class="row mt-5">
        <div class="course-detail-image d-flex justify-content-center col-7">
            <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
        </div>
        <div class="ml-1 course-desc p-3 col-4 ml-5">
            <div class="course-desc-title">Descriptions course</div>
            <div class="course-desc-body">{{ $courses->description }}</div>
        </div>
    </div>
    <div class="course-lesson-name row mb-5">
        <div class="col-7 px-0">
            <div class="course-detail d-flex flex-column justify-content-center">
                <div class="course-detail-lesson p-3">
                    <div class="course-lesson-top d-flex mb-4">
                        <nav>
                            <div class="nav" id="" role="tablist">
                                <a class="course-detail-title text-decoration-none pb-3 active" id="nav-lessons-tab" data-toggle="tab" href="#nav-lessons" role="tab" aria-controls="nav-lessons" aria-selected="true">Lessons</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                            </div>
                        </nav>
                    </div>
                    <div class="filter-find mb-3 row">
                        <div class="d-flex align-items-center">
                            <form action="{{ Route('lesson.search', $courses->id) }}" method="GET">
                                <input type="text" placeholder="Search..." class="find-input" name="search" value="{{ request('search') }}">
                                <i class="fas fa-search search-icon"></i>
                                <input type ="submit" value="Tìm kiếm" class="btn-search">
                            </form>    
                        </div>
                        <div class="">
                            @if ($courses->check_user)
                                <form action="{{ route('leave.course', $courses->id) }}" method="post">
                                    @csrf
                                    <input type ="submit" value="Kết thúc khóa học" class="btn-join">
                                </form>
                            @else
                            @if (Auth::check())
                                <form action="{{ route('join.course', $courses->id) }}" method="post">
                                    @csrf
                                    <input type ="submit" value="Tham gia khóa học" class="btn-join">
                                </form>
                                @else
                                    <a data-target="#loginRegister" data-toggle="modal" href="#" class="btn btn-join px-4">Tham gia khóa học</a>
                                @endif
                            @endif    
                        </div>
                    </div>
                    <div class="course-detail-lesson-detail">
                        @if (count($lessons) > 0)
                            @foreach ($lessons as $key => $lesson)
                                <div class="d-flex justify-content-between align-items-center p-3 but-learn">
                                    <p class="my-auto @if ($lesson->check_user_learn) lesson-change @endif">{{ ++$key }} . {{ $lesson->name }}</p>
                                    @if($courses->check_user)
                                        @if ($lesson->check_user_learn)
                                        <button class="btn btn-learn" onclick="location.href='{{ Route('lesson.show', $lesson->id) }}'">Learn</button>
                                        @else
                                        <form action="{{ route('join.lesson', $lesson->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $courses->id}}" name="course_id">
                                            <button class="btn btn-learn-lesson">Learn</button>
                                        </form>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                            <div class="mt-4">
                                <div class="pagination d-flex justify-content-end">
                                    {{ $lessons->appends($_GET)->links() }}
                                </div>
                            </div>
                        @else
                            <h1 class="text-center mt-3">No lessons have been uploaded yet</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-4 h-50 ml-5 px-0">
            <div class="course-info">
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: {{ $courses->number_user }}
                </div>
                <div class="course-info-text">
                    <i class="far fa-list-alt"></i> Lessons: {{ $courses->number_lesson }} lessons
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times: {{ $courses->time_course }} 
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: <a class="text-decoration-none" href="#">#{{ $courses->tag_course }}</a>
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> Price: {{ $courses->price }}.000 VNĐ
                </div>
            </div>
            <div class="course-info mt-3 mb-5">
                <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                <div class="other-list">
                    @foreach ($otherCourses as $key => $otherCourse)
                    <div class="other-list-item py-3 row mx-0 ">
                        <a href="{{ route('course.show', $otherCourse->id) }}" class="text-decoration-none ml-3">{{ ++$key }}. {{ $otherCourse->name }}</a>
                    </div>
                    @endforeach
                    <div class="text-center p-4">
                        <button class="btn btn-view p-2 px-4" onclick="location.href='{{ Route('course.index') }}'">View all ours courses</button>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection

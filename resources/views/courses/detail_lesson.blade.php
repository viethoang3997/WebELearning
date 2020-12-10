@extends('master')
@section('title','Detail lesson')
@section('main')
<div class="detail-lesson-index container">
    <div class="row mb-5">
        <div class="col-8">
            <div class="course-detail-image d-flex justify-content-center mr-0 mt-4">
                <img src="{{ asset('storage/image/Rectangle 7.png') }}" class="img-fluid">
            </div>
            <div class="course-detail">
                <div class="course-detail-lesson p-3 mb-5">
                    <div class="course-lesson-top d-flex mb-4">
                        <nav>
                            <div class="nav" id="nav-tab" role="tablist">
                                <a class="course-detail-title text-decoration-none pb-3 active" id="nav-descriptions-tab" data-toggle="tab" href="#nav-descriptions" role="tab" aria-controls="nav-descriptions" aria-selected="true">Descriptions</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-program-tab" data-toggle="tab" href="#nav-program" role="tab" aria-controls="nav-program" aria-selected="false">Program</a>
                                <a class="course-detail-title text-decoration-none pb-3" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-descriptions" role="tabpanel" aria-labelledby="nav-descriptions-tab">
                            <div class="lesson-detail">
                                <div class="lesson-detail-title">Descriptions lesson</div>
                                <div class="lesson-detail-text">
                                    {{ $lesson->description }}
                                </div>
                                <div class="lesson-detail-title">Requirements</div>
                                <div class="lesson-detail-text">
                                    {{ $lesson->requirement }}
                                </div>
                                <div class="lesson-detail-text d-flex align-items-center">
                                    <div class="lesson-detail-title pr-4">Tag:</div> <a class="text-decoration-none" href="#">{{ $lesson->course->tag_course }}</a>
                                </div>
                            </div>
                        </div>        
                        <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
                            <div class="lesson-detail-title">Main Teacher</div>
                            @foreach ($teachers as $teacher)
                            <div class="mt-4">
                                <div class="teacher-info d-flex align-items-center my-4">
                                    <img src="{{ asset('storage/image/'. $teacher->avatar) }}" class="teacher-info-img rounded-circle">
                                    <div class="d-flex flex-column ml-4">
                                        <div class="teacher-info-name">{{ $teacher->name }}</div>
                                        <div class="teacher-info-exp">Second Year Teacher</div>
                                        <div class="d-flex mt-2">
                                            <div class="teacher-info-plus"><i class="fab fa-google-plus-g"></i></div>
                                            <div class="teacher-info-fb"><i class="fab fa-facebook-f"></i></i></div>
                                            <div class="teacher-info-slack"><i class="fab fa-slack"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-text">
                                    Vivamus volutpat eros pulvinar velit laoreet,
                                    sit amet egestas erat dignissim. Sed quis rutrum tellus,
                                    sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                                    Nam nulla ipsum, venenatis malesuada felis quis,
                                    ultricies convallis neque. Pellentesque tristique
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="nav-program" role="tabpanel" aria-labelledby="nav-program-tab">
                            <div class="lesson-detail-title py-3">Program</div>
                            <div class="lesson-program d-flex flex-column">
                                <div class="porgram-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-word col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">Lesson</div>
                                            <div class="col-9">Program learn HTML/CSS</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                                <div class="program-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-pdf col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">PDF</div>
                                            <div class="col-9 ml-1">Download course slides</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                                <div class="porgram-list py-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <i class="far fa-file-video col-1"></i>
                                            <div class="program-type col-2 p-0 ml-2">Video</div>
                                            <div class="col-9 ml-1">Download course videos</div>
                                        </div>
                                        <button class="btn btn-learn">Preview</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-review-tab">
                            <div class="lesson-detail-title py-3">{{ $lesson->number_lesson_review }} Reviews</div>
                            <div class="review-top px-3 d-flex">
                                <div class="hapo-review-left d-flex flex-column justify-content-center align-items-center">
                                   <p class="hapo-review-star m-0">{{ $lesson->lesson_rating }}</p>
                                   <span>
                                    @for ($i = 0; $i < $rating['five_star']; $i++)
                                        @if ($i < $lesson->lesson_rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    </span>
                                    <p class="hapo-review-rating">{{ $lesson->number_lesson_review }} Ratings</p>
                                </div>
                                <div class="hapo-review-right ml-4">
                                   <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                        <div class="">5 star</div>
                                        <div class="progress w-75">
                                            <input type="text" value="{{ $lesson->getLessonPrecentRating($rating['five_star']) }}" hidden id="fiveStarVal">
                                            <div class="progress-bar bg-success" id="fiveStar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5"></div>
                                        </div>
                                        <div class="">{{ $lesson->getLessonRatingCount($rating['five_star']) }}</div>
                                   </div>
                                   <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                        <div class="">4 star</div>
                                        <div class="progress w-75">
                                            <input type="text" value="{{ $lesson->getLessonPrecentRating($rating['four_star']) }}" hidden id="fourStarVal">
                                            <div class="progress-bar bg-primary" id="fourStar" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5"></div>
                                        </div>
                                        <div class="">{{ $lesson->getLessonRatingCount($rating['four_star']) }}</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                        <div class="">3 star</div>
                                        <div class="progress w-75">
                                            <input type="text" value="{{ $lesson->getLessonPrecentRating($rating['three_star']) }}" hidden id="threeStarVal">
                                            <div class="progress-bar bg-info" id="threeStar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5"></div>
                                        </div>
                                        <div class="">{{ $lesson->getLessonRatingCount($rating['three_star']) }}</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                        <div class="">2 star</div>
                                        <div class="progress w-75">
                                            <input type="text" value="{{ $lesson->getLessonPrecentRating($rating['two_star']) }}" hidden id="twoStarVal">
                                            <div class="progress-bar bg-warning" id="twoStar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5"></div>
                                        </div>
                                        <div class="">{{ $lesson->getLessonRatingCount($rating['two_star']) }}</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between px-3 py-2">
                                        <div class="">1 star</div>
                                        <div class="progress w-75">
                                            <input type="text" value="{{ $lesson->getLessonPrecentRating($rating['one_star']) }}" hidden id="oneStarVal">
                                            <div class="progress-bar bg-danger" id="oneStar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5"></div>
                                        </div>
                                        <div class="">{{ $lesson->getLessonRatingCount($rating['one_star']) }}</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="hapo-review-des">
                                <div class="hapo-review-all">Show all review <i class="fas fa-sort-down"></i></div>
                                @foreach ($lessonReviews as $lessonReview)
                                <div class="hapo-review-user">
                                    <div class="hapo-review-content d-flex justify-content-between mt-5">
                                       <div class="d-flex justify-content-start align-items-center">
                                            <div class="hapo-review-avatar mr-3">
                                                <img class="" src="{{ asset('storage/image/avatarDog.png') }} ">
                                            </div>
                                            <div class="hapo-review-name mr-3">
                                                <p class="m-0 p-0">{{ $lessonReview->user->name }} </p>
                                            </div>
                                            <?php $star = $lessonReview->rating ?>
                                            <div class="review-content-rating mr-3">
                                                @for ($i = 0; $i < $rating['five_star']; $i++)
                                                    @if ($i < $star)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="hapo-review-time">
                                                <p class="m-0 p-0">{{ date('d-m-Y G:i', strtotime($lessonReview->created_at)) }} </p>
                                            </div>
                                            <div class="btn-group ml-auto">
                                                <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- Edit a review --}}
                                                    {{-- <form method="GET" action="{{ route('review.edit', $lessonReview->id)}}"> --}}
                                                    <form method="GET">    
                                                        <button type="button" class="btn btn-light dropdown-item" id="{{ $lessonReview->id }}" data-toggle="modal" data-target="#editReview">
                                                            Edit
                                                        </button>
                                                    </form>
                                                    {{-- Delete a review --}}
                                                    <form method="post" action="{{ route('review.destroy', $lessonReview->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light dropdown-item" 
                                                                onclick="return confirm('Are You Sure?')">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hapo-review-body">
                                        <div class="hapo-review">
                                            <p class="text-justify">
                                                {{ $lessonReview->content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            {{-- tạo form Create a Review --}}
                            <div class="leave-commnent">
                                <div class="lesson-detail-title mb-3">Leave a Review</div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" hidden name="lesson_id" id="lessonId" value="{{ $lesson->id }} " data-id=" {{ $lesson->id }} ">
                                    <textarea name="content" id="content" cols="30" rows="3" class="form-control mb-3" placeholder="Message"></textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                   <div class="d-flex align-items-center justify-content-between">
                                       <div class="d-flex align-items-center">
                                            <div class="lesson-detail-title mr-3">Vote:</div>
                                            <div class="rating">
                                                <input type="radio" class="rating" id="starFive" name="rating" value="5" /><label for="starFive" title="Rocks!">5 stars</label>
                                                <input type="radio" class="rating" id="starFour" name="rating" value="4" /><label for="starFour" title="Pretty good">4 stars</label>
                                                <input type="radio" class="rating" id="starThree" name="rating" value="3" /><label for="starThree" title="Meh">3 stars</label>
                                                <input type="radio" class="rating" id="starTwo" name="rating" value="2" /><label for="starTwo" title="Kinda bad">2 stars</label>
                                                <input type="radio" class="rating" id="starOne" name="rating" value="1" /><label for="starOne" title="Sucks big time">1 star</label>
                                            </div>
                                       </div>
                                        <button type="submit" id="submitLesson" class="btn btn-learn px-3" data-id=" {{ $lesson->id }} ">Send</button>
                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="course-info">
                <div class="course-info-text">
                    <i class="fas fa-desktop"></i> Course: {{ $lesson->course->name }}
                </div>
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: {{ $lesson->course->number_user }}
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times:  {{ $lesson->time }} minutes
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: <a class="text-decoration-none" href="#">#{{ $lesson->course->tag_course }}</a>
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> Price: {{ $lesson->course->price }}.000 VNĐ
                </div>
                <div class="course-info-text">
                    <div class="btn-leave text-center">
                        <form action="{{ route('join.course', $lesson->course->id) }}" method="post">
                            @csrf
                            <button class="btn btn-leave-lesson px-4">Kết thúc khóa học</button>
                        </form>
                    </div>
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
{{-- tạo form edit review --}}
<div class="modal" id="editReview">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('review.update', $lessonReview->id) }}" method="post">
                @method('PUT') 
                @csrf 
                <div class="modal-header">
                    <h4 class="modal-title">Edit Review</h4><button class="close" data-dismiss="modal" type="button">&times;</button>
                </div>
                <div class="modal-body">
                    <textarea name="update_review" class="form-control mb-3" id="content" cols="30" name="content" placeholder="Message" rows="3">{{ $lessonReview->content }}</textarea>
                    <div class="d-flex align-items-center">
                        <div class="lesson-detail-title mr-3">
                            Vote:
                        </div>
                        <div class="rating">
                            <input class="rating" id="starFive" name="update_rating" type="radio" value="5"><label for="starFive" title="Rocks!">5 stars</label> 
                            <input class="rating" id="starFour" name="update_rating" type="radio" value="4"><label for="starFour" title="Pretty good">4 stars</label> 
                            <input class="rating" id="starThree" name="update_rating" type="radio" value="3"><label for="starThree" title="Meh">3 stars</label> 
                            <input class="rating" id="starTwo" name="update_rating" type="radio" value="2"><label for="starTwo" title="Kinda bad">2 stars</label> 
                            <input class="rating" id="starOne" name="update_rating" type="radio" value="1"><label for="starOne" title="Sucks big time">1 star</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal" type="button">Cancel</button> 
                    <button class="btn btn-sm btn-outline-success text-uppercase" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

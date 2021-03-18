@extends('master')
@section('title','List course')
@section('main')
<div class="main-all-course contain-fluid">
    <div class="main-body mt-5 container">
        <div class="filter-find row my-3">
            <div class="d-flex align-items-center mt-3">
                <button class="btn filter-btn mr-2 py-2" id="filterBtn"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                <form action="{{ route('course.search') }}" method="GET">
                    <input type="text" placeholder="Search..." class="find-input p-2" name="name_course" value="{{ request('name_course') }}">
                    <i class="fas fa-search search-icon"></i>
                    <input type="submit" class="btn-search" value="Tìm kiếm">
            </div>
        </div>            
                <div class="course-filter row mt-3 mb-3" id="filterTable">
                    <div class="d-flex">
                        <div class="col-1 filter-title p-3">Filter</div>
                        <div class="col-10 d-flex flex-wrap">
                            <div class="order-by-time">
                                <input type="radio" name="order_by_time" id="newest" hidden value="1">
                                <label for="newest" class="px-4 py-2">Newest</label>
                            </div>
                            <div class="order-by-time">
                                <input type="radio" name="order_by_time" id="oldest" hidden value="2">
                                <label for="oldest" class="px-4 py-2">Oldest</label>
                            </div>
                            {{-- <input type="text" value="{{ request('order_by_time') }}" hidden id="order"> --}}
                            <div class="filter-select">
                                <select name="tags" class="custom-select">
                                    <option value="0">Tag</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="filter-select">
                                <select name="students" class="custom-select">
                                    <option value="">Number Students</option>
                                    <option value="1">Most Students</option>
                                    <option value="2">Least Students</option>
                                </select>
                            </div>
                            <div class="filter-select">
                                <select name="lessons" class="custom-select">
                                    <option value="">Number Lessons</option>
                                    <option value="1">Most Lessons</option>
                                    <option value="2">Least Lessons</option>
                                </select>
                            </div>
                            <div class="filter-select">
                                <select name="reviews" class="custom-select">
                                    <option value="">Reviews</option>
                                    <option value="1">Most Reviews</option>
                                    <option value="2">Least Reviews</option>
                                </select>
                            </div>
                            <div class="filter-select">
                                <select name="times" class="custom-select">
                                    <option value="">Times</option>
                                    <option value="1">Longest Time</option>
                                    <option value="2">Shortest Time</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
    
        <div class="all-course row">
            @if (count($courses) > 0)
                @foreach ($courses as $course)
                    <div class="course-program col-xl-6 row mb-4">
                        <div class="card mx-2">
                            <div class="card-body">
                                <div class="course-body">
                                    <img class="float-left mr-4" src="{{ asset('./storage/image/'. $course['image']) }}" width="89px" height="89px" style="border-radius:50%" alt="HTML">
                                    <div class="course-content col-xl-9  offset-3">
                                        <h5 class="card-title">{{ $course['name'] }}</h5>
                                        <p class="card-text mb-0 text-justify">{{ $course['description'] }}</p>
                                        <a href="{{ Route('course.show',$course->id) }}" class="card-link-more col-4 offset-8 d-block text-center text-decoration-none py-xl-2 my-xl-3">More</a>
                                    </div>
                                </div>
                                <div class="course-link row">
                                    <div class="course-learners col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Learners</a>
                                        <p class="card-number mb-0">{{ $course->number_user }}</p>
                                    </div>
                                    <div class="course-lessons col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Lessons</a>
                                        <p class="card-number mb-0">{{ $course->number_lesson }}</p>
                                    </div>
                                    <div class="course-quizes col-xl-4 text-center">
                                        <a href="#" class="card-link mb-2 d-block">Times</a>
                                        <p class="card-number mb-0">{{ $course->time_course }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                @endforeach
            @else
                <h1>No course found!</h1>
            @endif
        </div>
        <div class="pagination d-flex justify-content-end">
            {{ $courses->appends($_GET)->links() }}
        </div>
    </div>
</div>    
@endsection

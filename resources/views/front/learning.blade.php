@extends('front.layouts.main')

@section('content')
<div class="lg:relative max-w-[1200px] mx-auto">
    <div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}')" id="hero-section" class="max-w-[1200px] mx-auto w-full lg:h-[393px] flex flex-col gap-10 lg:pb-[50px] bg-center bg-no-repeat bg-cover md:rounded-[32px] overflow-hidden lg:absolute">
        @include('front.layouts.components.navbar')
    </div>
</div>
<section id="video-content" class="max-w-[1100px] w-full mx-auto mt-10 lg:mt-[130px] px-5 md:px-0">
    <!-- drawer init and show -->
    <div class="mb-5 text-right">
        <button class="text-white lg:hidden rounded-[30px] px-4 py-2 bg-[#FF6129] hover:shadow-[0_10px_20px_0_#FF612980] transition-all duration-300 focus:ring-4 focus:ring-blue-300 font-medium text-sm  focus:outline-none" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
            Show Lessons List
        </button>
    </div>

    <!-- Video & those list -->
    <div class="video-player relative flex flex-nowrap gap-5">
        <!-- Video -->
        <div class="plyr__video-embed w-full overflow-hidden relative rounded-[20px]" id="player">
            <iframe src="https://www.youtube.com/embed/{{$video->path_video}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
        </div>
        <div class="hidden lg:flex video-player-sidebar flex-col shrink-0 w-[330px] h-[470px] bg-[#F5F8FA] rounded-[20px] p-5 gap-5 pb-0 overflow-y-scroll no-scrollbar">
            <p class="font-bold text-lg text-black">{{ $course->course_videos->count() }} Lessons</p>
            <!-- List video -->
            <div class="flex flex-col gap-3">

                <a href="{{ route('front.details', $course) }}">
                    <div class="group p-[12px_16px] flex items-center gap-[10px] bg-[#E9EFF3] rounded-full hover:bg-[#3525B3] transition-all duration-300">
                        <div class="text-black group-hover:text-white transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor" />
                            </svg>
                        </div>
                        <p class="font-semibold group-hover:text-white transition-all duration-300">Course Trailer</p>

                    </div>
                </a>

                @forelse ($course->course_videos as $video)

                @php
                $currentVideoId = Route::current()->parameter('courseVideoId');
                $isActive = $currentVideoId == $video->id;
                @endphp

                <a href="{{ route('front.learning', [$course, 'courseVideoId' => $video->id]) }}">
                    <div class="group p-[12px_16px] flex items-center gap-[10px]  {{ $isActive ? 'bg-[#3525B3] hover:bg-[#E9EFF3] text-white hover:text-black' : 'bg-[#E9EFF3] hover:bg-[#3525B3] text-black hover:text-white' }}  rounded-full transition-all duration-300">
                        <div class="transition-all duration-300">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor" />
                            </svg>
                        </div>
                        <p class="font-semibold transition-all duration-300">{{ $video->name }}</p>

                    </div>
                </a>

                @empty
                <p>Belum ada video</p>
                @endforelse

            </div>
        </div>
    </div>
</section>

<section id="Video-Resources" class="flex flex-col my-5 px-5">
    <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-3">
        <h1 class="title font-extrabold text-[30px] md:text-[40px] leading-[45px]">{{ $course->name }}</h1>
        <div class="flex flex-col md:flex-row md:items-center gap-5">
            <div class="flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/crown.svg')}}" alt="icon">
                </div>
                <p class="font-semibold">{{ $course->category->name }}</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/award-outline.svg')}}" alt="icon">
                </div>
                <p class="font-semibold">Certificate</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/profile-2user.svg')}}" alt="icon">
                </div>
                <p class="font-semibold">{{ $course->students->count() }} students</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/brifecase-tick.svg')}}" alt="icon">
                </div>
                <p class="font-semibold">Job-Guarantee</p>
            </div>
        </div>
    </div>
    <div class="max-w-[1100px] w-full mx-auto mt-10 tablink-container flex gap-6 px-4 sm:p-0 no-scrollbar overflow-x-scroll">
        <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('About', this)" id="defaultOpen">About</div>
        <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Resources', this)">Resources</div>
        <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Reviews', this)">Reviews</div>
        <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Discussions', this)">Discussions</div>
        <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#FF6129]" onclick="openPage('Rewards', this)">Rewards</div>
    </div>

    <div class="bg-[#eefff0] py-[50px] px-8 rounded-lg w-full max-w-[1200px] mx-auto">
        <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-[70px]">
            <div class="lg:flex gap-[30px]">
                <!-- Course information -->
                <div class="tabs-container lg:w-[640px] xl:w-[700px] flex shrink-0">
                    <div id="About" class="tabcontent hidden">
                        <div class="flex flex-col gap-5 lg:w-[640px] xl:w-[700px] shrink-0">
                            <h3 class="font-bold text-2xl">Grow Your Career</h3>
                            <p class="font-medium leading-[30px] text-justify">
                                {{ $course->about }}
                            </p>

                            <div class="grid lg:grid-cols-2 gap-x-[30px] gap-y-5">
                                @forelse ($course->course_keypoints as $keypoint)
                                <div class="benefit-card flex items-center gap-3">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{asset('assets/icon/tick-circle.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium leading-[30px]">{{ $keypoint->name }}</p>
                                </div>

                                @empty
                                <p>Tidak ada keypoint</p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div id="Resources" class="tabcontent hidden">
                        <div class="flex flex-col gap-5 lg:w-[640px] xl:w-[700px] shrink-0">
                            <h3 class="font-bold text-2xl">Resources</h3>
                            <p class="font-medium leading-[30px]">
                                No data
                            </p>
                        </div>
                    </div>
                    <div id="Reviews" class="tabcontent hidden">
                        <div class="flex flex-col gap-5 lg:w-[640px] xl:w-[700px] shrink-0">
                            <h3 class="font-bold text-2xl">Reviews</h3>
                            <p class="font-medium leading-[30px]">
                                No data
                            </p>
                        </div>
                    </div>
                    <div id="Discussions" class="tabcontent hidden">
                        <div class="flex flex-col gap-5 lg:w-[640px] xl:w-[700px] shrink-0">
                            <h3 class="font-bold text-2xl">Discussions</h3>
                            <p class="font-medium leading-[30px]">
                                No data
                            </p>
                        </div>
                    </div>
                    <div id="Rewards" class="tabcontent hidden">
                        <div class="flex flex-col gap-5 lg:w-[640px] xl:w-[700px] shrink-0">
                            <h3 class="font-bold text-2xl">Rewards</h3>
                            <p class="font-medium leading-[30px]">
                                No data
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mentor sidebar -->
                <div class="mentor-sidebar mt-10 lg:mt-0 flex flex-col gap-[30px] w-full">
                    <div class="mentor-info bg-white flex flex-col gap-4 rounded-2xl p-5">
                        <p class="font-bold text-lg text-left w-full">Teacher</p>
                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-3">
                                <a href="" class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="photo">
                                </a>
                                <div class="flex flex-col gap-[2px]">
                                    <a href="" class="font-semibold">{{ $course->teacher->user->name }}</a>
                                    <p class="text-sm text-[#6D7786]">{{ $course->teacher->user->occupation }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bg-white flex flex-col gap-5 rounded-2xl p-5">
                        <p class="font-bold text-lg text-left w-full">Unlock Badges</p>

                        <div class="flex items-center gap-3">
                            <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets/icon/Group 7.svg')}}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <div class="font-semibold">Spirit of Learning</div>
                                <p class="text-sm text-[#6D7786]">18,393 earned</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets/icon/Group 7-1.svg')}}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <div class="font-semibold">Everyday New</div>
                                <p class="text-sm text-[#6D7786]">6,392 earned</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets/icon/Group 7-2.svg')}}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <div class="font-semibold">Quick Learner Pro</div>
                                <p class="text-sm text-[#6D7786]">44 earned</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div id="Screenshots" class="flex flex-col gap-3">
                <h3 class="title-section font-bold text-xl leading-[30px] ">Students Portfolio</h3>
                <div class="grid grid-cols-4 gap-5">
                    <div class="rounded-[20px] overflow-hidden w-full h-[200px] hover:shadow-[0_10px_20px_0_#0D051D20] transition-all duration-300" data-src="{{asset('assets/thumbnail/image.png')}}" data-fancybox="gallery" data-caption="Caption #1">
                        <img src="{{asset('assets/thumbnail/image.png')}}" class="object-cover h-full w-full" alt="image">
                    </div>
                    <div class="rounded-[20px] overflow-hidden w-full h-[200px] hover:shadow-[0_10px_20px_0_#0D051D20] transition-all duration-300" data-src="{{asset('assets/thumbnail/image-1.png')}}" data-fancybox="gallery" data-caption="Caption #1">
                        <img src="{{asset('assets/thumbnail/image-1.png')}}" class="object-cover h-full w-full" alt="image">
                    </div>
                    <div class="rounded-[20px] overflow-hidden w-full h-[200px] hover:shadow-[0_10px_20px_0_#0D051D20] transition-all duration-300" data-src="{{asset('assets/thumbnail/image-2.png')}}" data-fancybox="gallery" data-caption="Caption #1">
                        <img src="{{asset('assets/thumbnail/image-2.png')}}" class="object-cover h-full w-full" alt="image">
                    </div>
                    <div class="rounded-[20px] overflow-hidden w-full h-[200px] hover:shadow-[0_10px_20px_0_#0D051D20] transition-all duration-300" data-src="{{asset('assets/thumbnail/image-3.png')}}" data-fancybox="gallery" data-caption="Caption #1">
                        <img src="{{asset('assets/thumbnail/image-3.png')}}" class="object-cover h-full w-full" alt="image">
                    </div>
                </div>
            </div> -->
        </div>
    </div>

</section>

<!-- Testimony -->
@include('front.layouts.components.testimony')

<!-- FAQ -->
@include('front.layouts.components.faq')

<!-- Footer -->
@include('front.layouts.components.footer')

<section>
    <!-- drawer component -->
    <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white" tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">{{ $course->course_videos->count() }} Lessons</h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('front.details', $course) }}">
                        <div class="group p-[12px_16px] flex items-center gap-[10px] bg-[#E9EFF3] rounded-full hover:bg-[#3525B3] transition-all duration-300">
                            <div class="text-black group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor" />
                                </svg>
                            </div>
                            <p class="font-semibold group-hover:text-white transition-all duration-300">Course Trailer</p>

                        </div>
                    </a>
                </li>
                @forelse ($course->course_videos as $video)

                @php
                $currentVideoId = Route::current()->parameter('courseVideoId');
                $isActive = $currentVideoId == $video->id;
                @endphp

                <li>
                    <a href="{{ route('front.learning', [$course, 'courseVideoId' => $video->id]) }}">
                        <div class="group p-[12px_16px] flex items-center gap-[10px]  {{ $isActive ? 'bg-[#3525B3] hover:bg-[#E9EFF3] text-white hover:text-black' : 'bg-[#E9EFF3] hover:bg-[#3525B3] text-black hover:text-white' }}  rounded-full transition-all duration-300">
                            <div class="transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor" />
                                </svg>
                            </div>
                            <p class="font-semibold transition-all duration-300">{{ $video->name }}</p>

                        </div>

                </li>
                @empty
                <li>Belum ada video</li>
                @endforelse

            </ul>
        </div>
    </div>

</section>



@endsection
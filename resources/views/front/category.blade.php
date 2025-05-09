@extends('front.layouts.main')

@section('content')
<div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}')" id="hero-section"
    class="max-w-[1200px] mx-auto w-full flex flex-col bg-center bg-no-repeat bg-cover md:rounded-[32px] ">
    @include('front.layouts.components.navbar')
</div>

<section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[40px] gap-[30px]">
    <div class="flex flex-col gap-[30px]">
        <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
        </div>
        <div class="flex flex-col">
            <h2 class="font-bold text-3xl md:text-[40px] leading-[60px]">{{ $category->name }}</h2>
            <p class="text-[#6D7786] md:text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
        </div>
        <div class="grid gap-[20px] sm:grid-cols-2 md:gap-[30px] lg:grid-cols-3 w-full">

            @forelse ($courses as $course)
            <div class="course-card">
                <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                    <a href="{{ route('front.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                        <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                    </a>
                    <div class="flex flex-col px-4 gap-[32px]">
                        <div class="flex flex-col gap-[10px]">
                            <a href="{{ route('front.details', $course->slug) }}" class="font-semibold text-2xl line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                    <div>
                                        <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->students->count() }} students</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold">{{ $course->teacher->user->name }}</p>
                                <p class="text-[#6D7786]">{{ $course->teacher->user->occupation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <p>Belum ada kelas di Kategori ini</p>
            @endforelse

        </div>
    </div>

</section>

<!-- Testimony -->
@include('front.layouts.components.testimony')

<!-- FAQ -->
@include('front.layouts.components.faq')

<!-- Footer -->
@include('front.layouts.components.footer')

@endsection
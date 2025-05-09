<section id="Popular-Courses" class="max-w-[1200px] mx-auto flex flex-col p-[70px_55px_0px] gap-[30px] bg-[#f0f4f5] rounded-[32px]">

    <!-- Title - subtitle content -->
    <div class="flex flex-col gap-[30px] items-center text-center">
        <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Popular Courses</p>
        </div>
        <div class="flex flex-col">
            <h2 class="font-bold text-3xl md:text-[40px] md:leading-[60px]">Don't Missed It, Learn Now</h2>
            <p class="text-[#6D7786] md:text-lg -tracking-[2%] mt-6 md:mt-0">Catching up the on demand skills and high paying career this year</p>
        </div>
    </div>

    <!-- List of course -->
    <div class="relative">
        <button class="btn-prev absolute rotate-90 -left-[52px] top-[216px]">
            <img src="{{ asset('assets/icon/arrow-right.svg') }}" alt="icon">
        </button>
        <button class="btn-next absolute -right-[52px] top-[216px]">
            <img src="{{ asset('assets/icon/arrow-right.svg') }}" alt="icon">
        </button>


        <div id="course-slider" class="w-full">
            @forelse ($courses as $course)

            <div class="course-card w-full md:w-1/2 lg:w-1/3 px-3 pb-[70px] mt-[2px]">
                <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                    <a href="{{ route('front.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                        <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                    </a>
                    <div class="flex flex-col px-4 gap-[10px]">
                        <a href="{{ route('front.details', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}</a>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-[2px]">
                                <div>
                                    <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                </div>
                                <div>
                                    <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                </div>
                                <div>
                                    <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                </div>
                                <div>
                                    <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                </div>
                                <div>
                                    <img src="{{ asset('assets/icon/star.svg') }}" alt="star">
                                </div>
                            </div>
                            <p class="text-right text-[#6D7786]">{{ $course->students->count() }} students</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url($course->teacher->user->avatar) }}" class="w-full h-full object-cover" alt="icon">
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
            <div class="text-center w-full pb-10">Belum ada kelas</div>
            @endforelse

        </div>
    </div>
</section>
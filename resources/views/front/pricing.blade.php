@extends('front.layouts.main')

@section('content')
<div class="lg:relative max-w-[1200px] mx-auto">
    <div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}')" id="hero-section" class="max-w-[1200px] mx-auto w-full lg:h-[393px] flex flex-col gap-10 lg:pb-[50px] bg-center bg-no-repeat bg-cover md:rounded-[32px] overflow-hidden lg:absolute">
        <div class="">
            @include('front.layouts.components.navbar')
        </div>
    </div>
</div>
<section class="max-w-[1100px] w-full mx-auto mt-10 lg:mt-[130px] px-5 md:px-0 relative z-10">
    <div class="flex flex-col gap-[30px] items-center">
        <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Better Pricing For You</p>
        </div>
        <div class="flex flex-col lg:text-white text-center">
            <h2 class="font-bold text-[40px] lg:leading-[60px]">Invest & Get Bigger Return</h2>
            <p class="text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
        </div>
        <div class="max-w-[1000px] w-full flex flex-col md:flex-row gap-[30px] md:px-7">
            <div class="flex flex-col order-2 md:order-1 rounded-3xl p-8 gap-[30px] lg:bg-white border-2 border-green-600 lg:border-none h-fit">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col gap-4">
                        <p class="font-semibold text-4xl leading-[54px]">Scholarship</p>
                        <p class="text-[#475466] text-lg">Access to few online courses that helps you to jump started your new career path</p>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-4xl leading-[54px]">Rp 0</p>
                        <p class="text-[#475466] text-lg">Forever Free</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Access all course materials including videos, docs, career guidance, etc</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="text-[#475466]">Unlock all course badges to enhance career profile to apply a job after completed</p>
                        </div>
                    </div>
                </div>
                <a href="https://wa.link/8njc5y" target="_blank" class="p-[20px_32px] rounded-full text-center font-semibold text-xl ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Request for Access</a>
            </div>
            <div class="flex flex-col order-1 md:order-2 rounded-3xl p-8 gap-[30px] text-white lg:text-black lg:bg-white bg-green-600 h-fit">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col gap-4">
                        <p class="font-semibold text-4xl leading-[54px]">Premium</p>
                        <p class="lg:text-[#475466] text-lg">All access to more than 100 online courses to grow your future career easily</p>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-4xl leading-[54px]">Rp 100.000</p>
                        <p class="lg:text-[#475466] text-lg">Monthly</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/white-tick.png') }}" class="lg:hidden w-full h-full object-cover" alt="icon">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="hidden lg:block w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="lg:text-[#475466]">Access all course materials including videos, docs, career guidance, etc</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/white-tick.png') }}" class="lg:hidden w-full h-full object-cover" alt="icon">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="hidden lg:block w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="lg:text-[#475466]">Unlock all course badges to enhance career profile to apply a job after completed</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/white-tick.png') }}" class="lg:hidden w-full h-full object-cover" alt="icon">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="hidden lg:block w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="lg:text-[#475466]">Receive premium rewards such as templates</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/white-tick.png') }}" class="lg:hidden w-full h-full object-cover" alt="icon">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="hidden lg:block w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="lg:text-[#475466]">Access jobs portal and exclusive interview</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icon/white-tick.png') }}" class="lg:hidden w-full h-full object-cover" alt="icon">
                                <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="hidden lg:block w-full h-full object-cover" alt="icon">
                            </div>
                            <p class="lg:text-[#475466]">Unlock all course badges to enhance career profile to apply a job after completed</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('front.checkout') }}" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold text-xl transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Subscribe Now</a>
            </div>
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
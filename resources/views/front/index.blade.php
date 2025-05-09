@extends('front.layouts.main')

@section('content')


<!-- Hero Section -->
<div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}')" id="hero-section"
    class="max-w-[1200px] mx-auto w-full flex flex-col gap-6 pb-[50px] bg-center bg-no-repeat bg-cover md:rounded-[32px] overflow-hidden">

    <!-- Navbar -->
    @include('front.layouts.components.navbar')

    <div class="flex flex-col items-center gap-[30px]">

        <!-- Mini card -->
        <div class="w-fit flex items-center p-2 pr-6 rounded-full bg-[#ffffff47] border border-[#3477FF24]">
            <div class="w-[100px] h-[48px] flex shrink-0">
                <img src="{{ asset('assets/icon/first-edutech2.png') }}" class="object-contain rounded-full" alt="icon">
            </div>
            <p class="font-semibold text-sm text-white">First Edutech in Tegal</p>
        </div>

        <!-- Copyrighting -->
        <div class="flex flex-col gap-[10px]">
            <h1 class="font-semibold text-[45px] sm:text-[60px] md:text-[80px] leading-[50px] md:leading-[100px] text-center gradient-text-hero">Master Digital Skills.</h1>
            <p class="w-10/12 md:w-4/5 lg:w-3/5 text-center mx-auto md:text-xl md:leading-[36px] text-[#F5F8FA]">Techade Edutech provides high quality online courses for you to grow your skills and build outstanding portfolio to tackle job interviews</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-x-6 gap-y-3 w-fit">
            <a href="#Top-Categories" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Explore Courses</a>
            <a href="{{ route('front.pricing') }}" target="_blank" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Subscribe</a>
        </div>
    </div>

    <!-- Partner Logo -->
    <!-- <div class="flex gap-[70px] items-center justify-center">
        <div>
            <img src="assets/icon/logo-55.svg" alt="icon">
        </div>
        <div>
            <img src="assets/icon/logo.svg" alt="icon">
        </div>
        <div>
            <img src="assets/icon/logo-54.svg" alt="icon">
        </div>
        <div>
            <img src="assets/icon/logo.svg" alt="icon">
        </div>
        <div>
            <img src="assets/icon/logo-52.svg" alt="icon">
        </div>
    </div> -->
</div>

<!-- Categories -->
@include('front.layouts.components.categories')

<!-- Popular Couses -->
@include('front.layouts.components.popular-course')

<!-- Check Pricing -->
@include('front.layouts.components.check-pricing')

<!-- Testimony -->
@include('front.layouts.components.testimony')

<!-- FAQ -->
@include('front.layouts.components.faq')

<!-- Footer -->
@include('front.layouts.components.footer')

@endsection
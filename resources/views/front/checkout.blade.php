@extends('front.layouts.main')

@section('content')
<div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}')" id="checkout-section" class="max-w-[1200px] mx-auto w-full h-screen flex flex-col gap-[30px] bg-center bg-no-repeat bg-cover md:rounded-[32px]">
    @include('front.layouts.components.navbar')

    <div class="flex flex-col gap-[10px] items-center">
        <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Invest In Yourself Today</p>
        </div>
        <h2 class="font-bold text-[40px] leading-[60px] text-white">Checkout Subscription</h2>
    </div>
    <div class="flex flex-col lg:flex-row gap-10 px-[30px] relative z-10 pb-14">
        <div class="w-full lg:w-[450px] flex shrink-0 flex-col bg-white rounded-2xl p-5 gap-4 h-fit shadow-2xl">
            <p class="font-bold text-lg">Package</p>
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-3">
                    <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/icon/Web Development 1.svg') }}" class="w-full h-full object-cover" alt="photo">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-semibold">Premium</p>
                        <p class="text-sm text-[#6D7786]">30 days access</p>
                    </div>
                </div>
                <p class="p-[4px_12px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">Popular</p>
            </div>
            <hr>
            <div class="flex flex-col gap-5">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Access all course materials</p>
                </div>
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Unlock all course badges for jobs</p>
                </div>
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Receive premium rewards</p>
                </div>
            </div>
            <p class="font-semibold text-[28px] leading-[42px]">Rp 100.000</p>
        </div>

        <form action="{{ route('front.checkout.store') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col bg-white rounded-2xl p-5 gap-5 shadow-2xl">
            @csrf
            <p class="font-bold text-lg">Send Payment</p>
            <div class="flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Bank Name</p>
                    </div>
                    <p class="font-semibold">Bank Mandiri</p>
                    <input type="hidden" name="bankName" value="">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Account Number</p>
                    </div>
                    <p class="font-semibold">139-00-2884911-9</p>
                    <input type="hidden" name="accountNumber" value="">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Account Name</p>
                    </div>
                    <p class="font-semibold">PT Tekadkan Mimpi Indonesia</p>
                    <input type="hidden" name="accountName" value="">
                </div>
                <!-- <div class="flex items-center justify-between">
                    <div class="flex gap-3">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Code Swift</p>
                    </div>
                    <p class="font-semibold">ACEFIRSTBANK</p>
                    <input type="hidden" name="swift" value="ACEFIRSTBANK">
                </div> -->
            </div>
            <hr>
            <p class="font-bold text-lg">Confirm Your Payment</p>
            <div class="relative">
                <button type="button" class="p-4 rounded-full flex gap-3 w-full ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]" onclick="document.getElementById('file').click()">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/note-add.svg') }}" alt="icon">
                    </div>
                    <p id="fileLabel">Add a file attachment</p>
                </button>
                <input id="file" type="file" name="proof" class="hidden" onchange="updateFileName(this)">
            </div>
            <button class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">I've Made The Payment</button>
        </form>
    </div>
</div>


@endsection
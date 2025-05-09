<section id="Pricing" class="max-w-[1200px] mx-auto flex flex-col md:flex-row gap-8 justify-between lg:justify-center items-center p-[150px_50px_50px_50px]">

    <div class="relative mb-10 hidden md:block">
        <div class="w-[355px] h-[488px] md:w-[300px] md:h-[450px] ">
            <img src="{{ asset('assets/background/benefit_illustration.png')}}" alt="icon">
        </div>
        <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[140px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
            <p class="font-semibold">Materials</p>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/video-play.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Videos</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/note-favorite.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Handbook</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/3dcube.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Assets</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/award.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Certificates</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/book.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Documentations</p>
            </div>
        </div>
    </div>

    <div class="md:ml-14 flex flex-col text-left gap-[30px]">
        <h2 class="font-bold text-[30px] md:leading-[39px] lg:text-[36px] lg:leading-[52px]">Learn From Anywhere,<br>Anytime You Want</h2>
        <div class="md:hidden bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
            <p class="font-semibold">Materials</p>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/video-play.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Videos</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/note-favorite.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Handbook</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/3dcube.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Assets</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/award.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Certificates</p>
            </div>
            <div class="flex gap-2 items-center">
                <div>
                    <img src="{{ asset('assets/icon/book.svg')}}" alt="icon">
                </div>
                <p class="font-medium">Documentations</p>
            </div>
        </div>
        <p class="text-[#475466] lg:text-lg leading-[34px]">Growing new skills would be more flexible without limit <br> We help you to access all course materials.</p>
        <a href="{{ route('front.pricing') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Check Pricing</a>
    </div>
</section>
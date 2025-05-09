<section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_20px] gap-[30px]">

    <!-- Title - subtitle content -->
    <div class="flex flex-col gap-[30px]">
        <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
            <div>
                <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
        </div>
        <div class="flex flex-col">
            <h2 class="font-bold text-3xl md:text-[40px] leading-[60px]">Browse Courses</h2>
            <p class="text-[#6D7786] md:text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
        </div>
    </div>

    <!-- List of category -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[20px] gap-y-[10px] sm:gap-y-[20px]">
        @forelse ($categories as $category)
        <a href="{{ route('front.category', $category->slug) }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
            <div class="w-[50px] h-[50px] flex shrink-0">
                <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="icon">
            </div>
            <p class="font-bold text-md">{{ $category->name }}</p>
        </a>

        @empty
        <p>Belum ada kategori</p>
        @endforelse
    </div>
</section>
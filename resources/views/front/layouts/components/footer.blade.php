<footer class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[40px] gap-[50px] bg-[#f0f4f5] rounded-[32px]">
    <div class="flex flex-col sm:flex-row gap-y-10 justify-between">
        <a href="/" class="sm:hidden md:inline">
            <div>
                <img src="{{ asset('assets/logo/Logo-Techade-1.png') }}" alt="logo" class="h-14 md:h-10 lg:h-16">
            </div>
        </a>
        <div class="flex flex-col gap-3">
            <p class="font-semibold text-lg">Products</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a class="text-[#6D7786] hover:text-slate-400">Edutech</a>
                </li>
                <li>
                    <a class="text-[#6D7786] hover:text-slate-400">Digital Solution</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-3">
            <p class="font-semibold text-lg">Company</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="https://techade.id" target="_blank" class="text-[#6D7786] hover:text-slate-400">About Us</a>
                </li>
                <li>
                    <a href="https://techade.id" target="_blank" class="text-[#6D7786] hover:text-slate-400">Techade.id</a>
                </li>
                <!-- <li class="flex items-center gap-[10px]">
                    <a class="text-[#6D7786] hover:text-slate-400">Careers</a>
                    <div class="gradient-badge w-fit p-[6px_10px] rounded-full border border-[#FED6AD] flex items-center">
                        <p class="font-medium text-xs text-[#FF6129]">We're Hiring</p>
                    </div>
                </li> -->
            </ul>
        </div>
        <div class="flex flex-col gap-3">
            <p class="font-semibold text-lg">Contact</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a class="text-[#6D7786] hover:text-slate-400">contact@techade.id</a>
                </li>
                <li>
                    <a href="https://wa.me/6287812066967" class="text-[#6D7786] hover:text-slate-400" target="_blank">WhatsApp</a>
                </li>
                <li>
                    <a href="https://instagram.com/techade.id" class="text-[#6D7786] hover:text-slate-400" target="_blank">Instagram</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
        <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved &copy; Techade.id {{ date('Y') }}</p>
    </div>
</footer>
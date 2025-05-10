<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Student Subscription') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($transactions as $transaction)
                <div class="item-card grid grid-cols-4 sm:grid-cols-5 md:grid-cols-10 lg:grid-cols-9">
                    <div class="hidden lg:block lg:col-span-1 ">
                        <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#292D32" />
                            <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#292D32" />
                            <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#292D32" />
                            <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#292D32" />
                            <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#292D32" />
                        </svg>
                    </div>
                    <div class="col-span-2 md:col-span-2 lg:col-span-2 ">
                        <p class="text-slate-500 text-sm">Name</p>
                        <h3 class="text-indigo-950 font-bold">{{ $transaction->user->name }}</h3>
                    </div>
                    <div class="hidden sm:block md:col-span-2 lg:col-span-2 ">
                        <p class="text-slate-500 text-sm">Total Amount</p>
                        <h3 class="text-indigo-950 font-bold">Rp {{ number_format($transaction->total_amount, 0 , ',' , '.') }}</h3>
                    </div>
                    @if ($transaction->is_paid)
                    <div class="hidden md:block md:col-span-3 lg:col-span-2 ">
                        <p class="text-slate-500 text-sm">Subscription End Date</p>
                        <h3 class="text-indigo-950 font-bold">{{ \Carbon\Carbon::parse($transaction->subscribe_transactions)->addMonth(1)->format('d M Y - G:i') }}</h3>
                    </div>
                    @else
                    <div class="hidden md:block md:col-span-3 lg:col-span-2 ">
                        <p class="text-slate-500 text-sm">Checkout Date</p>
                        <h3 class="text-indigo-950 font-bold">{{ $transaction->created_at->format('d M Y - G:i') }}</h3>
                    </div>
                    @endif
                    <div class="content-center text-center mx-auto lg:mx-auto md:col-span-2 lg:col-span-1  ">
                        @if ($transaction->is_paid)
                        <div class="text-white text-[10px] px-3 py-1 rounded-full bg-green-500 font-bold w-20 italic">ACTIVE</div>
                        @else
                        <div class="text-white text-[10px] px-3 py-1 rounded-full bg-orange-500 font-bold w-20 italic">PENDING</div>
                        @endif
                    </div>
                    <div class="content-center ml-auto md:col-span-1 lg:col-span-1 ">
                        <a href=" {{ route('admin.student-subscription.show', $transaction) }} " class="font-bold text-sm md:text-base py-2 px-4 bg-indigo-700 hover:bg-indigo-500 text-white rounded-full">
                            Detail
                        </a>
                    </div>
                </div>
                @if ($transaction->is_paid)
                <hr>
                <div class="flex items-center gap-4">
                    <p>Langganan sudah aktif, yuk mulai belajar!</p>
                    <a href="{{route('front.index')}}" class="w-fit font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                        Explore Catalog
                    </a>
                </div>
                @endif

                @empty
                <p>Belum ada data</p>
                @endforelse
            </div>
        </div>
    </div>

</x-app-layout>
<x-frontend.layout>
    @section('title', $event->name )
 
 
    <section class="container max-w-screen-xl pt-4 lg:pt-10 pb-[100px] overflow-hidden relative bg-white">
        <div class="xl:px-[60px]">
            <!-- Breadcrumb -->
            <ul class="inline-flex mb-5">
                <li class="first:before:content-none before:content-['/'] before:mx-6">
                    <a href="{{ url('/') }}" class="text-lg text-slate-600">
                        Home
                    </a>
                </li>
                <li class="first:before:content-none before:content-['/'] before:mx-6 text-lg text-slate-800">
                    <a href="#!" class="text-lg text-slate-600">
                        Browse
                    </a>
                </li>
                <li class="first:before:content-none before:content-['/'] before:mx-6 text-lg text-slate-800">
                    <a href="#!" class="text-lg text-slate-600">
                        Checkout
                    </a>
                </li>
            </ul>
 
 
            <div class="flex flex-wrap items-center justify-center gap-y-[30px] lg:justify-between lg:items-start ">
                <div class="max-w-[500px]">
                    <img src="{{ $event->thumbnail }}" class="w-[280px] h-[200px] rounded-2xl" alt="tickety-assets">
                    <h1 class="text-[32px] font-bold mt-5 mb-[30px] text-black">
                        {{ $event->name }}
                    </h1>
 
 
                    <!-- Visible input fields -->
                    <div class="flex flex-col gap-5 mb-[30px]">
                        <div class="flex flex-col gap-[10px]">
                            <label for="name" class="text-lg font-medium text-black">Complete Name</label>
                            <input type="text" name="name" placeholder="Write your complete name"
                                class="px-5 py-[13px] placeholder:text-slate-600 placeholder:font-normal font-semibold text-base rounded-[50px] bg-black border-2 border-transparent border-solid focus:border-red-500 focus:outline-none"
                                value="" id="visibleNameField">
                        </div>
                        <div class="flex flex-col gap-[10px]">
                            <label for="email" class="text-lg font-medium text-black">Email Address</label>
                            <input type="email" name="email" placeholder="Write your email address"
                                class="px-5 py-[13px] placeholder:text-slate-600 placeholder:font-normal font-semibold text-base rounded-[50px] bg-black border-2 border-transparent border-solid focus:border-red-500 focus:outline-none"
                                value="" id="visibleEmailField">
                        </div>
                    </div>
 
 
                    <!-- Payment details -->
                    <div class="flex flex-col gap-4">
                        <h6 class="text-xl font-semibold text-slate-800">
                            Payment Details
                        </h6>
                        @foreach ($tickets as $ticket)
                            <!-- ticket -->
                        <div class="inline-flex items-center justify-between gap-4 text-slate-700">
                            <p class="text-base font-medium">
                                {{ $ticket->name }} x <small>{{ $ticket->quantity }}</small>
                            </p>
                            <p class="text-base font-semibold text-slate-700">
                                ${{ number_format($ticket->price) }}
                            </p>
                        </div>
                        @endforeach
                        <!-- Unique code -->
                        <div class="inline-flex items-center justify-between gap-4 text-red-400">
                            <p class="text-base font-medium">
                              - Unique code
                            </p>
                            <p class="text-base font-semibold">
                                ${{ number_format($uniquePrice) }}
                            </p>
                        </div>
                        <!-- Tax -->
                        <div class="inline-flex items-center justify-between gap-4 text-red-600">
                            <p class="text-base font-medium">
                               + Tax 22%
                            </p>
                            <p class="text-base font-semibold">
                                ${{ number_format($tax) }}
                            </p>
                        </div>
                        <!-- Grand total -->
                        <div class="inline-flex items-center justify-between gap-4 text-slate-950">
                            <p class="text-base font-medium">
                                Grand total
                            </p>
                            <p class="text-[32px] text-red-800 font-bold underline underline-offset-4">
                                ${{ number_format($totalPrice) }}
                            </p>
                        </div>
                    </div>
                </div>
 
 
                <form action="{{ route('checkoutPay') }}" method="POST"
                    class="bg-slate-800 p-5 rounded-2xl flex flex-col gap-5 max-w-[380px] w-full" id="paymentForm">
                    @csrf
                    @method('POST')
                    <p class="text-xl font-semibold">
                        Payment method
                    </p>
                    <!-- Manual Transfer -->
                    <div
                        class="relative px-5 py-6 cursor-pointer bg-slate-700 rounded-2xl">
                        <div class="inline-flex items-center justify-between w-full">
                            <label for="manualTransfer" class="relative z-10 block w-full text-base font-semibold cursor-pointer">
                                Manual Transfer
                            </label>
                            <input type="radio" value="manual_transfer" id="manualTransfer" name="payment_method"
                                class="absolute inset-0 z-10 invisible peer/manual-transfer" checked>
                            <div class="check-appearance"></div>
 
 
                        </div>
                        <!-- Bank Accounts -->
                        <div class="flex flex-col gap-4 mt-4">
                            <!-- Mandiri Account -->
                            <div class="flex items-center gap-5">
                                <img src="{{ asset('assets/svgs/logo-mandiri.svg') }}" alt="tickety-assets">
                                <div>
                                    <p class="text-xs font-medium mb-[2px]">
                                        Bagas Fauzan Nafi'
                                    </p>
                                    <p class="text-lg font-semibold text-red-500">
                                        0709 1209 2007
                                    </p>
                                </div>
                            </div>
                            <!-- BCA Account -->
                            <div class="flex items-center gap-5">
                                <img src="{{ asset('assets/svgs/logo-bca.svg') }}" alt="tickety-assets">
                                <div>
                                    <p class="text-xs font-medium mb-[2px]">
                                        Bagas Fauzan Nafi'
                                    </p>
                                    <p class="text-lg font-semibold text-red-500">
                                        0709 1209 2007
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Virtual Account -->
                    <div
                        class="relative px-5 py-6 cursor-pointer bg-slate-700 rounded-2xl">
                        <div class="inline-flex items-center justify-between w-full">
                            <label for="virtualAccount" class="relative z-10 block w-full text-base font-semibold cursor-pointer">
                                Virtual Account
                            </label>
                            <input type="radio" value="virtual_account" id="virtualAccount" name="payment_method"
                                class="absolute inset-0 z-10 invisible peer/virtual-account">
                            <div class="check-appearance"></div>
                        </div>
                    </div>
                    <!-- Credit Card -->
                    <div
                        class="relative px-5 py-6 cursor-pointer bg-slate-700 rounded-2xl">
                        <div class="inline-flex items-center justify-between w-full">
                            <label for="creditCard" class="relative z-10 block w-full text-base font-semibold cursor-pointer">
                                Credit Card
                            </label>
                            <input type="radio" value="credit_card" id="creditCard" name="payment_method"
                                class="absolute inset-0 z-10 invisible peer/credit-card">
                            <div class="check-appearance"></div>
                        </div>
                    </div>
                    <!-- MyWallet -->
                    <div
                        class="relative px-5 py-6 cursor-pointer bg-slate-700 rounded-2xl">
                        <div class="inline-flex items-center justify-between w-full">
                            <label for="myWallet" class="relative z-10 block w-full text-base font-semibold cursor-pointer">
                                MyWallet
                            </label>
                            <input type="radio" value="my_wallet" id="myWallet" name="payment_method"
                                class="absolute inset-0 z-10 invisible peer/my-wallet">
                            <div class="check-appearance"></div>
                        </div>
                    </div>
 
 
                    <!-- Hidden name & email input field -->
                    <input type="text" name="name" id="completeName" placeholder="name" value="" class="text-black" hidden>
                    <input type="email" name="email" id="emailAddress" placeholder="email" value="" class="text-black" hidden>
                    {{-- <a href="{{ url ('/checkout-success') }}" class="btn-secondary">
                        <img src="{{ asset ('assets/svgs/ic-secure-payment.svg') }}" alt="tickety-assets">
                        Make Payment Now
                    </a> --}}
               <button type="submit" class="btn btn-neutral text-white">
                        <img src="{{ asset('assets/svgs/ic-secure-payment.svg') }}" alt="tickety-assets">
                        Make Payment Now
                    </button>
                </form>
            </div>
        </div>
    </section>
 
 
    @push('js')
       
    @endpush
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            {{-- stack --}}
            @stack('js')
        <script type="text/javascript">
            $(() => {
                $('#navbarToggler').on('click', function (e) {
                    let navigationMenu = $(this).attr('data-target')
                    $(navigationMenu).toggleClass('hidden')
                })
               
                // Copy values from visible inputs to hidden inputs before form submission
                $('#paymentForm').on('submit', function(e) {
                    $('#completeName').val($('#visibleNameField').val());
                    $('#emailAddress').val($('#visibleEmailField').val());
                });
            })
        </script>
 
 
 </x-frontend.layout>
 
 
 
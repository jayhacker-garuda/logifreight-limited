<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans antialiased leading-none bg-blue-900">
    <div class="flex flex-col">
        <div class="container mx-auto mt-4 mb-2 shadow-lg navbar bg-neutral text-neutral-content rounded-box">
            <div class="flex-none px-2 mx-2">
                <span class="text-lg font-bold">
                    LOGO
                </span>
            </div>
            <div class="flex-1 px-2 mx-2">
                <div class="items-stretch hidden lg:flex">
                    {{-- <a class="btn btn-ghost btn-sm rounded-btn">
                        Home
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn">
                        Portfolio
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn">
                        About
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn">
                        Contact
                    </a> --}}
                </div>
            </div>
            <div class="flex-none">
                <a href="{{ route('member.auth.login') }}">
                    <button class="btn btn-ghost">
                    Login
                </button>
                </a>
            </div>
        </div>
        <div class="container flex items-center p-4 pt-10 mx-auto justify-items-center">
            <div class="flex flex-row w-full text-white">
                <div class="grid flex-grow w-6/12 h-32 px-4 py-4 pt-10">
                    <h1 class="pb-2 text-6xl font-black ">Ship With Us</h1>
                    <h2 class="pt-1 font-mono font-bold ">Logifrieght-limited</h2>
                    <p class="pt-4 break-words">We offer fast, convenient & reliable shipping and personal US based
                        shipping
                        address</p>

                    <div class="pt-10">
                        <a href="{{ route('member.auth.register') }}">
                            <button class="btn glass">Sign Up For FREE!</button>
                        </a>
                    </div>
                </div>
                <div class="divider divider-vertical"></div>
                <div class="flex-grow w-6/12 p-10 fgrid">

                    <div class="container mx-auto ml-5 ">
                        <div class="">
                            <video playsinline="" autoplay="autoplay" muted="muted" loop="loop"
                                poster="https://assets6.lottiefiles.com/render/kay14a0y.png"
                                class="transition duration-300 transform hover:translate-y-2 hover:shadow-xl w-80 mask mask-pentagon"
                                __idm_id__="1311219717">
                                <source type="video/mp4" src="https://assets1.lottiefiles.com/render/kay14a0y.mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container flex flex-col items-center p-4 pt-5 mx-auto space-x-4 justify-items-center">
            <h1 class="pt-10 mb-10 text-6xl font-black text-center text-white">How It Works</h1>
            <div class="container flex flex-row mx-auto space-x-4">
                <div class="h-auto shadow-xl card image-full w-80">

                <figure><iframe src="https://embed.lottiefiles.com/animation/78126"></iframe></figure>
                <div class="justify-end text-center card-body">
                    <h2 class="pt-10 text-6xl font-black card-title">3</h2>
                    <p class="font-black">Sign Up</p>
                    <div class="card-actions">
                        <p>
                            Sign up with Logifreight-Limited for free and get your personalized US mailbox
                        </p>
                    </div>
                </div>
            </div>
            <div class="h-auto shadow-xl card image-full w-80">

                <figure><iframe src="https://embed.lottiefiles.com/animation/36605"></iframe></figure>
                <div class="justify-end text-center card-body">
                    <h2 class="pt-10 text-6xl font-black card-title">2</h2>
                    <p class="font-black">Shop</p>
                    <div class="card-actions">
                        <p>
                            Shop at your favourite stores world-wide and send item(s) to your Logifreight-Limited
                            mailbox
                            OR have family/friends send packages to your Logifreight-Limited mailbox.
                        </p>
                    </div>
                </div>
            </div>
            <div class="h-auto shadow-xl card image-full w-80">

                <figure><iframe src="https://embed.lottiefiles.com/animation/27519"></iframe></figure>
                <div class="justify-end text-center card-body">
                    <h2 class="pt-10 text-6xl font-black card-title">1</h2>
                    <p class="font-black">Ship</p>
                    <div class="card-actions">
                        <p>
                            Logifreight-Limited receives your package(s) at our US warehouse and notifies you, at which
                            point you
                            upload your invoice.
                        </p>
                    </div>
                </div>
            </div>
            <div class="h-auto shadow-xl card image-full w-80">

                <figure><iframe src="https://embed.lottiefiles.com/animation/75701"></iframe></figure>
                <div class="justify-end text-center card-body">
                    <p class="pt-10 font-black">Delivery</p>
                    <div class="card-actions">
                        <p>
                            You will receive a second notification when package(s) are ready for delivery. Click the
                            link in the email to see your deliver.
                        </p>
                    </div>
                </div>
            </div>
            </div>

        </div>
        <footer class="container items-center p-4 mx-auto footer bg-neutral text-neutral-content rounded-box">
            <div class="items-center grid-flow-col">
                <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                    clip-rule="evenodd" class="fill-current">
                    <path
                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                    </path>
                </svg>
                <p>Copyright © 2021 - All right reserved</p>
            </div>
            <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </footer>
    </div>



</body>

</html>

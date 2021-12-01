<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container fixed z-50 mx-10 mt-5 mb-2 shadow-lg navbar bg-neutral text-neutral-content rounded-box">
        <div class="flex-none hidden lg:flex">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
        <div class="flex-1 hidden px-2 mx-2 lg:flex">
            <span class="text-lg font-bold">
                LOGO
            </span>
        </div>
        <div class="flex-1 lg:flex-none">
            <div class="flex-1 hidden px-2 mx-2 lg:flex">
                <span class="text-lg font-bold">
                    @if(session()->has('member_name'))
                        {{ session('member_name') }}
                    @endif
                </span>
            </div>
            <a href="javascript:void(0)" class="btn btn-error" wire:click='logout'>Logout</a>
        </div>
    </div>
</div>

<div>
    {{-- Success is as dangerous as failure. --}}
    @if ($response)
        @if ($response['errors'])
            @foreach ($response['errors'] as $error => $data)
                <div class="absolute z-50 flex flex-wrap float-right space-y-4 mt-15">
                    <div class="mx-2 w-80 alert alert-error">
                        <div class="flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-6 h-6 mx-2 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                </path>
                            </svg>
                            <label>{{ $data[0] }}</label>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
    <div class="flex flex-col mt-10">
        {{-- {{ dd($response) }} --}}
        <figure class="absolute z-40 md:flex inset-20">
            <iframe class="hidden mt-48 md:flex h-80" src="https://embed.lottiefiles.com/animation/75062"></iframe>
        </figure>
        <div class="flex items-center justify-center min-h-screen">
            <div class="container w-6/12 px-10 py-2 card bg-base-200">
                <div class="z-50 flex flex-col justify-center space-y-4 form-control">
                    <div class="flex flex-col justify-between md:space-x-4 md:flex-row">
                        <div class="flex flex-col">
                            <x-input wire:model='full_name' placeholder="Full Name" type="text"
                                :errors="$errors->first('full_name')" />
                        </div>
                        <div class="flex flex-col">
                            <x-input wire:model='trn' placeholder="TRN [000000]" type="number"
                                :errors="$errors->first('trn')" />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <x-input class="w-full" wire:model='email' placeholder="Email" type="email"
                            :errors="$errors->first('email')" />
                    </div>
                    <div class="flex flex-col">
                        <textarea
                            class="textarea textarea-ghost @error('address') input input-secondary input-bordered @enderror"
                            wire:model='address' placeholder="Address" cols="20" rows="5"></textarea>

                        @error('address')
                            <span class="m-1 font-thin text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-between md:flex-row md:space-x-4">
                        <div class="flex flex-col">
                            <x-input wire:model='password' placeholder="Password" type="password"
                                :errors="$errors->first('password')" />
                        </div>
                        <div class="flex flex-col">
                            <x-input wire:model='confirm_password' placeholder="Confirm Password" type="password"
                                :errors="$errors->first('confirm_password')" />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <button wire:click='register' class="btn btn-secondary">Register</button>
                    </div>
                    <div class="flex flex-col">
                        <p>Already have an account? <a class="mx-auto text-lg font-black btn btn-ghost" href="{{ route('member.auth.login') }}">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

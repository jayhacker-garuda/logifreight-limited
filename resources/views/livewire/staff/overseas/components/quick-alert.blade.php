<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="container px-2 mx-auto md:p-4">
        <div class="flex flex-col">
            <h1
                class="px-2 text-2xl font-black text-center text-white duration-200 transform border-2 border-yellow-300 shadow-md bg-base-100 hover:translate-y-4 rounded-btn">
                Quick-Alerts</h1>
            <div class="container p-4 mx-auto">
                <div class="flex items-center justify-items-center">
                    <div class="flex justify-around min-w-full space-x-4">
                        <div class="form-control">
                            <x-select :errors="$errors->first('status-filter')">
                                <x-option title="In Transit" value="in_transit" />
                            </x-select>
                        </div>
                        <div class="form-control">
                        <div class="flex space-x-2">
                            <x-input type="text" placeholder="Search Quick-Alert" class="w-full input input-primary input-bordered" :errors="$errors->first('quick_alert')" />
                            <button class="btn btn-primary">go</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

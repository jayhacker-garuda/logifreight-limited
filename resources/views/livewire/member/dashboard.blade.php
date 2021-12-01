<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- {{ session('umi') }} --}}
    <div class="flex flex-col">
        <div class="container px-4 mx-auto">
            <div class="container flex flex-col items-center p-4 pt-20 mx-auto space-x-4 justify-items-center">
                <div class="container flex justify-between mx-auto space-x-4">
                    <div class="h-auto shadow-xl card image-full w-80">

                        <div class="justify-end text-center card-body">
                            <h2 class="pt-10 text-6xl font-black card-title">
                                @if (isset($packages['all_packages']))
                                    {{ $packages['all_packages'] }}
                                @else
                                    0
                                @endif

                            </h2>
                            <p class="font-black">Total Packages</p>
                        </div>
                    </div>
                    <div class="h-auto shadow-xl card image-full w-80">

                        <div class="justify-end text-center card-body">
                            <h2 class="pt-10 text-6xl font-black card-title">
                                @if (isset($packages['in_transit']))
                                    {{ $packages['in_transit'] }}
                                @else
                                    0
                                @endif
                            </h2>
                            <p class="font-black">In_Transit</p>
                        </div>
                    </div>
                    <div class="h-auto shadow-xl card image-full w-80">

                        <div class="justify-end text-center card-body">
                            <h2 class="pt-10 text-6xl font-black card-title">
                                @if (isset($packages['delivered']))
                                    {{ $packages['delivered'] }}
                                @else
                                    0
                                @endif
                            </h2>
                            <p class="font-black">Delivered</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="z-10 flex flex-row h-screen">
            <div class="flex flex-col w-4/6">
                <div class="container mx-auto">
                    <div class="mt-5 image-full card lg:card-side bordered">
                        <div class="card-body">
                            <h2 class="card-title">My Packages</h2>
                            <div class="">
                                <div class="container ">
                                    @if ($packages)
                                        @if (isset($packages['error']))
                                            <div class="alert">
                                                <div class="flex-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="#009688"
                                                        class="flex-shrink-0 w-6 h-6 mx-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                                        </path>
                                                    </svg>
                                                    <label>
                                                        <h4>{{ $packages['error'] }}</h4>
                                                        <p class="text-sm text-base-content text-opacity-60">
                                                            Please add your item by clicking the dots
                                                        </p>
                                                    </label>
                                                </div>
                                                <div class="flex-none">
                                                    <button class="btn btn-sm btn-ghost btn-square"
                                                        wire:click='quickAlert'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" class="w-6 h-6 stroke-current">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>


                                        @endif
                                        @if (isset($packages['packages']))
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Package Type</th>
                                                        <th>Tracking # [From Shipper]</th>
                                                        <th>Tracking # [From LogiFrieght ltd.]</th>
                                                        <th>Shipping Company</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($packages["packages"] as $package)
                                                    {{-- {{ dd($package['data']) }} --}}
                                                    <tr class="rounded-t hover">
                                                        <td>{{ $package['member']['full_name'] }}</td>
                                                        <td>{{ $package['package_type'] }}</td>
                                                        <td>{{ $package['tracking_number'] }}</td>
                                                        <td>{{ $package['company_tracking_number'] }}</td>
                                                        <td>{{ $package['shipping_company'] }}</td>
                                                    </tr>
                                                    @endforeach
                                                    <tfoot>

                                                        {{-- {{ $packages["packages"] }} --}}
                                                    </tfoot>
                                                </tbody>
                                            </table>
                                        @endif

                                    @endif
                                </div>
                            </div>
                            <div class="card-actions">
                                @if (!isset($packages['error']))
                                    <button wire:click='quickAlert' class="btn btn-primary">
                                        Add Item
                                    </button>
                                @endif
                                {{-- <button class="btn btn-ghost">More info</button> --}}
                                {{-- {{ dd(session()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="z-30 w-2/6 mt-5 bg-gray-200 border-t-2 border-l-4 border-yellow-300 rounded-tl-lg shadow-md md:flex-col md:flex">


            </div>
        </div>
        @if ($showForm)
            <div x-data="{ showForm: false }" x-on:show-form-open.window="showForm = true"
                x-on:show-form-close.window="showForm = false">
                <div
                    class="fixed inset-0 z-50 flex items-center justify-center py-4 text-base bg-black bg-opacity-75 md:px-0">

                    <div
                        class="flex flex-col w-5/6 h-full p-4 m-auto overflow-y-scroll text-base border border-t-8 border-b-8 border-blue-400 rounded-lg shadow bg-base-200 md:w-1/2 lg:w-1/3">
                        <div class="flex flex-col p-4 space-y-4">
                            <div class="flex flex-col">
                                <input class="input input-ghost" disabled type="text"
                                    value="{{ session('member_name') }}" />
                            </div>
                            <div class="flex flex-row space-x-2">
                                <div class="flex flex-col">
                                    <x-select wire:model='package_type' :errors="$errors->first('package_type')">
                                        <x-option selected="selected" title="-- Choose Package Type --" />
                                        <x-option value="electronics" title="Electronics" />
                                        <x-option value="clothing" title="Clothing" />
                                        <x-option value="art" title="Art" />
                                    </x-select>
                                </div>
                                <div class="flex flex-col">
                                    <x-select wire:model='purchased_location'
                                        :errors="$errors->first('purchased_location')">
                                        <x-option selected="selected" title="-- Choose Location of Purchase --" />
                                        <x-option value="amazon" title="Amazon" />
                                        <x-option value="ebay" title="Ebay" />
                                        <x-option value="shein" title="Shein" />
                                        <x-option value="other" title="Other" />

                                    </x-select>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <x-input wire:model='cost' placeholder="Cost" type="number"
                                    :errors="$errors->first('cost')" />
                            </div>
                            <div class="flex flex-col">
                                <x-input wire:model='weight' placeholder="Weight" type="number"
                                    :errors="$errors->first('weight')" />
                            </div>
                            <div class="flex flex-col">
                                <x-input wire:model='tracking_number' placeholder="Tracking Number" type="number"
                                    :errors="$errors->first('tracking_number')" />
                            </div>
                            <div class="flex flex-col">
                                <x-select wire:model='shipping_company' :errors="$errors->first('shipping_company')">
                                    <x-option selected="selected" title="-- Choose Shipping Company --" />
                                    <x-option value="FedEx" title="FedEx" />
                                    <x-option value="DHL" title="DHL" />
                                    <x-option value="UPS" title="UPS" />
                                    <x-option disabled="disabled" value="other" title="Other (unavailable)" />

                                </x-select>
                            </div>
                            <div class="flex flex-row space-x-4">
                                <button class="btn btn-outline btn-accent" wire:click='addQuickAlerts'>
                                    Add Item
                                </button>
                                <button class="btn btn-outline btn-secondary" wire:click='cancelForm'>
                                    Cancle
                                </button>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if ($readyToUse)
            <div x-data="{ showMessage: false }" x-on:success-modal-open.window="showMessage = true"
                x-on:success-modal-close.window="showMessage = false">
                <div
                class="fixed inset-0 z-50 flex items-center justify-center py-4 text-base bg-black bg-opacity-75 md:px-0">

                <div class="inline-block p-5 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle lg:p-16 sm:max-w-xl sm:w-full">
                    {{ $readyToUse }}
                </div>
                </div>
            </div>
        @endif
    </div>
</div>

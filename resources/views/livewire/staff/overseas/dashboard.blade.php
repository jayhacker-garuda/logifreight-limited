<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="flex flex-row h-full space-x-6">
        <div class="flex flex-col">
            @livewire('nav-bar.staff-side-bar')
        </div>
        <div class="flex flex-col w-full space-y-8">

            @if($showDashboard)
                @livewire('staff.overseas.components.dashboard')
            @endif

            @if($showQuickAlerts)
                @livewire('staff.overseas.components.quick-alert')
            @endif

            @if($showPackageDetails)
                @livewire('staff.overseas.components.package-details')
            @endif



        </div>
    </div>

</div>

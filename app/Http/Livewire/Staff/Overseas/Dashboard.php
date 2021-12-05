<?php

namespace App\Http\Livewire\Staff\Overseas;

use Livewire\Component;

class Dashboard extends Component
{
    public
    $showDashboard = true,
    $showQuickAlerts = false,
    $showPackageDetails = false;

    protected $listeners = [
        'show_dashboard',
        'show_quick_alerts',
        'show_package_details'
    ];

    public function show_dashboard()
    {
        // dd('dashboard');
        $this->showDashboard = true;
        $this->showQuickAlerts = false;
        $this->showPackageDetails = false;
        $this->dispatchBrowserEvent('show-dashbord');
    }

    public function show_quick_alerts()
    {
        // dd('show_quick_alert');
        $this->showQuickAlerts = true;
        $this->showPackageDetails = false;
        $this->showDashboard = false;
        $this->dispatchBrowserEvent('show-quick-alert');
    }

    public function show_package_details()
    {
        // dd('package_details');
        $this->showPackageDetails = true;
        $this->showDashboard = false;
        $this->showQuickAlerts = false;
        $this->dispatchBrowserEvent('show-package-details');
    }

    public function render()
    {
        return view('livewire.staff.overseas.dashboard');
    }
}
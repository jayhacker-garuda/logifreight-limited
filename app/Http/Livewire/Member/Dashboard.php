<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class Dashboard extends Component
{
    public $showForm;
    public $package_type;
    public $purchased_location;
    public $cost;
    public $weight;
    public $shipping_company;
    public $tracking_number;

    public $response;

    public $packages;

    public $readyToUse;

    protected $rules = [
        'package_type' => 'required',
        'purchased_location' => 'required',
        'cost' => 'required',
        'weight' => 'required',
        'shipping_company' => 'required',
        'tracking_number' => 'required',
    ];

    public function reset_input()
    {
        $this->package_type = "";
        $this->purchased_location = "";
        $this->cost = "";
        $this->weight = "";
        $this->shipping_company = "";
        $this->tracking_number = "";
    }

    public function quickAlert()
    {
        $this->showForm = true;
        $this->dispatchBrowserEvent('show-form-open');
    }

    public function cancelForm()
    {
        $this->showForm = false;
        $this->reset_input();
        $this->dispatchBrowserEvent('show-form-close');
    }

    public function updated($param)
    {
        $this->validateOnly($param);
    }

    public function addQuickAlerts()
    {
        $data = $this->validate();

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'http://10.47.12.172:8080/api/member/quick-alert',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer '.session('access_token')
            ),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'member_umi' => session('umi'),
                'package_type' => $data["package_type"],
                'purchased_location' => $data["purchased_location"],
                'cost' => $data["cost"],
                'weight' => $data["weight"],
                'shipping_company' => $data["shipping_company"],
                'tracking_number' => $data["tracking_number"],

            )

        ));

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        if (isset($response["error"])) {

            dd($response["error"]);
        }


        if (isset($response["message"])) {

            // dd($response["message"]);
            $this->showForm = false;
            $this->reset_input();
            $this->dispatchBrowserEvent('show-form-close');

            $this->readyToUse = $response["message"];
            $this->dispatchBrowserEvent('success-modal-open');
            // $this->response = $response;

        }

    }

    public function cancelMessage()
    {
        $this->readyToUse = false;
        $this->dispatchBrowserEvent('success-modal-close');
    }

    public function mount()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://10.47.12.172:8080/api/member/packages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer '.session('access_token')
        ),
        ));

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        // dd($response);
        $this->packages = $response;
    }
    public function render()
    {
        return view('livewire.member.dashboard');
    }
}
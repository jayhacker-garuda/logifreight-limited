<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class MailBoxAddress extends Component
{
    public $mailBox;

    public function mount()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://10.47.12.172:8080/api/member/info',
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

        if (isset($response["mail_box"])) {

           $this->mailBox = $response["mail_box"];
        }
    }
    public function render()
    {
        return view('livewire.member.mail-box-address');
    }
}
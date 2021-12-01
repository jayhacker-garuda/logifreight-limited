<?php

namespace App\Http\Livewire\NavBar;

use Livewire\Component;

class MemberNavBar extends Component
{
    public function logout()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://10.47.12.172:8080/api/member/logout',
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

        $response = curl_exec($curl);

        curl_close($curl);


        session()->flush();
        return redirect(route('member.auth.login'));
    }
    public function render()
    {
        return view('livewire.nav-bar.member-nav-bar');
    }
}
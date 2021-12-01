<?php

namespace App\Http\Livewire\Member\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public $response;


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }
    public function login()
    {
        $data = $this->validate();

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'http://10.47.12.172:8080/api/member/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'email' => $data['email'],
                'password' => $data['password'],
            )

        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $this->response = json_decode($response, true);

        if (isset($this->response["errors"])) {

            return $this->response["errors"];

        }

        // dd($this->response);


            // dd($memberToken);
            session([
                'access_token' => $this->response["token"],
                'umi' => $this->response["umi"],
                'member_name' => $this->response["member_name"]
            ]);




        $this->email = '';
        $this->password = '';


        if (session()->has('access_token')){

            return redirect()->route('member.dashboard');
        }

    }
    public function render()
    {
        return view('livewire.member.auth.login');
    }
}
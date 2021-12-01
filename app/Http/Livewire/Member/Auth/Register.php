<?php

namespace App\Http\Livewire\Member\Auth;

use Livewire\Component;

class Register extends Component
{
    public $full_name;
    public $trn;
    public $email;
    public $address;
    public $password;
    public $confirm_password;

    public $response;


    protected $rules = [
        'full_name' => 'required|string|min:6',
        'email' => 'required|email',
        'trn' => 'required|min:6|max:6',
        'address' => 'required|string',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password|min:8'
    ];

    public function updated($param)
    {
        $this->validateOnly($param);
    }
    public function register()
    {
        $data = $this->validate();

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'http://10.47.12.172:8080/api/member/register',
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
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'trn' => $data['trn'],
                'address' => $data['address'],
                'password' => $data['password'],
                'confirm_password' => $data['confirm_password']
            )

        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $this->response = json_decode($response, true);

        if (isset($this->response["errors"])) {

            return $this->response["errors"];

        }




        $this->full_name = '';
        $this->email = '';
        $this->trn = '';
        $this->address = '';
        $this->password = '';
        $this->confirm_password = '';


        return redirect(route('member.auth.login'));
    }
    public function render()
    {
        return view('livewire.member.auth.register');
    }
}

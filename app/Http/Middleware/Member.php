<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!session()->has('access_token'))
        {
            return redirect(url('/'));
        }


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

        if(isset($response["umi"])){

            if ($response["umi"] === session('umi')) {
                return $next($request);
            }
        }

        if(isset($response["message"])){

            session()->flush();

            return redirect(route('member.auth.login'));
        }




    }
}
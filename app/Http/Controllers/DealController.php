<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use GuzzleHttp\Client;



class DealController extends Controller {
    //POST
    public function store(Request $request)
    {
        $requestUrl =$this->restURL.'crm.deal.add.json';
            
        $queryData = http_build_query(array(
            'fields' => array(
            "ORIGIN_ID" => $request['cnpj'],
            "TITLE" => $request['nome_negocio'],
            "OPPORTUNITY" => $request['ganho'],
            )
            ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL =>  $requestUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);

        if (array_key_exists('error', $result)){
            echo "Error saving Lead: ".$result."";
        } else{
        return redirect()->route('dealsIndex');  
        }
 
    }


    //GET
    public function index(Request $request)
    {
         
        $requestUrl =$this->restURL.'crm.deal.list';

        $client = new Client();

        


        $response = $client->get($requestUrl);

        return view('Negocio', [
            'deal' =>  json_decode($response->getBody())
        ]);

    }

    //DELETE
    public function destroy($deal)
    {
       $requestUrl = $this->restURL.'crm.deal.delete?ID='.$deal;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL =>  $requestUrl,
            CURLOPT_POSTFIELDS => 0,
        ));
        curl_exec($curl);
        curl_close($curl);

        return redirect()->route('dealsIndex');

    }
}
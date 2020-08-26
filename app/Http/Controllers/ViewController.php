<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ViewController extends Controller
{

    public function viewUpdateContact($idcontact)
    {
        $requestUrl = $this->restURL . 'crm.contact.get';
        $requestData = http_build_query(array(
            "ID" => $idcontact,
        ));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => $requestData,
        ));
        $result = json_decode(curl_exec($curl));
        curl_close($curl);




        $requestUrl = $this->restURL . 'crm.company.list';

        $client = new Client();

        $response = $client->get($requestUrl);
    
        return view('editarContato', [
            'contact' => $result,
            'company' => json_decode($response->getBody()),
        ]);
    }

    public function viewUpdateCompany($idcompany)
    {
        $requestUrl = $this->restURL . 'crm.company.get';

        $requestData = http_build_query(array(
            "ID" => $idcompany,
        ));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => $requestData,
        ));
        $result = json_decode(curl_exec($curl));
        curl_close($curl);
        return view('editarEmpresa', [
            'company' => $result,
        ]);
    }

    public function viewStoreCompany()
    {
        return view('registrarEmpresa');
    }

    public function viewStoreContact()
    {
        $requestUrl = $this->restURL . 'crm.company.list';

        $client = new Client();

        $response = $client->get($requestUrl);

        return view('registrarContato', [
            'company' => json_decode($response->getBody()),
        ]);

    }

    public function viewStoreDeal()
    {

        $requestUrl = $this->restURL . 'crm.company.list';

        $client = new Client();

        $response = $client->get($requestUrl);

        return view('registrarNegocio', [
            'company' => json_decode($response->getBody()),
        ]);

    }

}

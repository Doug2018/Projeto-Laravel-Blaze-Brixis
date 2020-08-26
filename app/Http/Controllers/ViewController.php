<?php
namespace App\Http\Controllers;
use App\Aluno;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ViewController extends Controller {

    public function formEditcontact($contact)
    {
    //     $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.get';
    //     $data = http_build_query(array(
    //         "ID" => $contact,
    //     ));
    //     $ch = curl_init();
    //     curl_setopt_array($ch, array(
    //         CURLOPT_SSL_VERIFYPEER => 0,
    //         CURLOPT_POST => 0,
    //         CURLOPT_HEADER => 0,
    //         CURLOPT_RETURNTRANSFER => 1,
    //         CURLOPT_URL => $url,
    //         CURLOPT_POSTFIELDS => $data,
    //     ));
    //     $resultado = json_decode(curl_exec($ch));
    //     curl_close($ch);

    //    return view('editContact', [
    //         'contact' => $resultado
    //     ]);
    }

    public function formEditCompany($company)
    {
        // $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.get';
        // $data = http_build_query(array(
        //     "ID" => $company,
        // ));
        // $ch = curl_init();
        // curl_setopt_array($ch, array(
        //     CURLOPT_SSL_VERIFYPEER => 0,
        //     CURLOPT_POST => 0,
        //     CURLOPT_HEADER => 0,
        //     CURLOPT_RETURNTRANSFER => 1,
        //     CURLOPT_URL => $url,
        //     CURLOPT_POSTFIELDS => $data,
        // ));

        // $resultado = json_decode(curl_exec($ch));
        // curl_close($ch);

        // return view('editCompany', [
        //     'company' => $resultado
        // ]);
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
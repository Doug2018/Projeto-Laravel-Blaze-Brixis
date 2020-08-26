<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    //GET
    public function index(Request $request)
    {
        $requestUrl = $this->restURL . 'crm.contact.list';

        $client = new Client();

        $response = $client->get($requestUrl);

        return view('Contatos', [
            'contact' => json_decode($response->getBody()),
        ]);

    }

    //POST
    public function store(Request $request)
    {
        $requestUrl = $this->restURL . 'crm.contact.add.json';
        $requestBody = http_build_query(array(
            'fields' => array(
                "ORIGIN_ID" => $request['cpf'],
                "NAME" => $request['nome'],
                "SOURCE_DESCRIPTION" => $request['cnpj_empresa'],
                "PHONE" => array(array("VALUE" => $request['telefone'], "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $request['email'], "VALUE_TYPE" => "WORK" )),
            ),
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => $requestBody,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);
        if (array_key_exists('error', $result)) {
            echo "Erro ao salvar: " . $result . "";
        } else {
            return redirect()->route('contactsIndex');
        }
    }

    //UPDATE
    public function update(Request $request)
    {
        $requestUrl = $this->restURL . 'crm.contact.update';
        $requestBody = http_build_query(array(
            "ID" => $request['id_contato'],
            'fields' => array(
                "ORIGIN_ID" => $request['cpf'],
                "NAME" => $request['nome'],
                "COMPANY_ID" => $request['cnpj_empresa'],
                "PHONE" => array(array("VALUE" => $request['telefone'], "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $request['email'], "VALUE_TYPE" => "WORK" )),
            ),
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => $requestBody,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);
        if (array_key_exists('error', $result)) {
            echo "Erro ao salvar: " . $result . "";
        } else {
            return redirect()->route('contactsIndex');
        } 
    }

    //DELETE
    public function destroy($contact)
    {
        $requestUrl = $this->restURL . 'crm.contact.delete?ID=' . $contact;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => 0,
        ));
        curl_exec($curl);
        curl_close($curl);

        return redirect()->route('contactsIndex');

    }

}

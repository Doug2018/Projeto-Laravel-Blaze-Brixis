<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //POST
    public function store(Request $request)
    {
        $requestUrl = $this->restURL . 'crm.company.add.json';

        $requestBody = http_build_query(array(
            'fields' => array(
                "ORIGIN_ID" => $request['cnpj'],
                "TITLE" => $request['nome_empresa'],
                "HAS_EMAIL" => 'S',
                "HAS_PHONE" => 'S',
                "PHONE" => $request['telefone'],
                "EMAIL" => $request['email'],
                "ORIGINATOR_ID" => $request['nome'],
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
            return redirect()->route('companiesIndex');
        }

    }

    //GET
    public function index(Request $request)
    {

        $requestUrl = $this->restURL . 'crm.company.list';

        $client = new Client();

        $response = $client->get($requestUrl);

        return view('Empresas', [
            'company' => json_decode($response->getBody()),
        ]);

    }

    //DELETE
    public function destroy($company)
    {
        $requestUrl = $this->restURL . 'crm.company.delete?ID=' . $company;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestUrl,
            CURLOPT_POSTFIELDS => 0,
        ));
        curl_exec($curl);
        curl_close($curl);

        return redirect()->route('companiesIndex');

    }

    public function update($company)
    {

    }
}

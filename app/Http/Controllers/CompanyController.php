<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
               "PHONE" => array(array("VALUE" => $request['telefone'], "VALUE_TYPE" => "WORK" )),
               "EMAIL" => array(array("VALUE" => $request['email'], "VALUE_TYPE" => "WORK" )),
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
    public function destroy($idcompany)
    {
        $requestUrl = $this->restURL . 'crm.company.delete?ID=' . $idcompany;

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
    //UPDATE
    public function update(Request $request)
    {
        $requestUrl = $this->restURL . 'crm.company.update';

        $requestBody = http_build_query(array(
            "ID" => $request['id_empresa'],
            'fields' => array(
                "ORIGIN_ID" => $request['cnpj'],
                "TITLE" => $request['nome_empresa'],
                "PHONE" => array(array("VALUE" => $request['telefone'], "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $request['email'], "VALUE_TYPE" => "WORK" )),
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
}

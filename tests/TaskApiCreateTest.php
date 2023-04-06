<?php

use PHPUnit\Framework\TestCase;

//require_once "./config.php";

class TaskApiCreateTest extends TestCase
{

    public function test_create_user_api()
    {
        //(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");

        $payload = [
                'id_user' => 27,
                'name' => 'Comprare i grissini',
                'due_date' => '2023-04-4',
                'done' => true,
        ];

        $response = $this->post("http://localhost/corsoPhpTss/form_in_php/rest_api/tasks.php", $payload);
        //fwrite(STDERR, print_r($response, TRUE));
        //$this->assertNull($response);
        $this->assertJson($response);
        
    }

    public function post(string $url, array $body)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "Content-Type: application/json",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}

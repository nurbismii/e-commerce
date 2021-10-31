<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rajaongkir extends CI_Controller
{
    private $api_key = "e63ffc7679c4241346c5f8985b0270b0";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
    }

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            #echo $response;
            $array_response = json_decode($response, true);
            $provinces = $array_response['rajaongkir']['results'];
            echo "<option value=''>--Pilih Provinsi--</option>";
            foreach ($provinces as $provinsi) {
                echo "<option value='" . $provinsi['province'] . "'  id_provinsi ='" .
                    $provinsi['province_id'] . "' >" . $provinsi['province'] . "</option>";
            }
        }
    }

    public function kota()
    {
        $provinsi_terpilih = $this->input->post('id_provinsi');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $provinsi_terpilih,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            #echo $response;
            $array_response = json_decode($response, true);
            $city = $array_response['rajaongkir']['results'];
            echo "<option>--Pilih Kota--</option>";
            foreach ($city as $kota) {
                echo "<option value='" . $kota['city_name'] . "' id_kota='" . $kota['city_id'] .
                    "'>" . $kota['city_name'] . "</option>";
            }
        }
    }
    public function ekspedisi()
    {
        echo '<option value="">--Pilih Ekspedisi--</option>';
        echo '<option value="jne">JNE</option>';
        echo '<option value="tiki">TIKI</option>';
        echo '<option value="pos">POS INDONESIA</option>';
    }

    public function paket()
    {
        $id_kota_asal = $this->m_setting->getLokasi()->lokasi;

        $ekspedisi = $this->input->post('ekspedisi');
        $id_kota = $this->input->post('id_kota');
        $berat = $this->input->post('berat');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota . "&weight=" . $berat . "&courier=" . $ekspedisi,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            //echo '<pre>';
            //print_r($array_response['rajaongkir']['results'][0]['costs']);
            //echo '</pre>';
            $data_paket = $array_response['rajaongkir']['results'][0]['costs'];
            echo "<option value=''>--Pilih Paket--</option>";
            foreach ($data_paket as $paket) {
                echo "<option value='" . $paket['service'] . "' ongkir='" . $paket['cost'][0]['value'] . "' 
                estimasi=" . $paket['cost'][0]['etd'] . " Hari" . ">";
                echo $paket['service'] . " | Rp." . $paket['cost'][0]['value'] . " | " . $paket['cost'][0]['etd'] . " Hari";
                echo "</option>";
            }
        }
    }
}

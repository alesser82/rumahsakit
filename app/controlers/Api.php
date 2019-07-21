<?php

class Api extends Controler
{

    public function index()
    {
        // GET REQUEST
        $method = $_SERVER['REQUEST_METHOD'];

        // REQUEST GET
        $data_url = explode('?',$_SERVER['REQUEST_URI']);
        $count_data_url = count($data_url);
        if (($count_data_url > 1) && ($method == 'GET')) {
            $data_get = explode('&',$data_url[1]);
            $count_data_get = count($data_get);
            if ($count_data_get == 1) {
                $data_get = explode('=',$data_get[0]);
                $key = $data_get[0];
                if ($key == 'data') {
                    $value = $data_get[1];
                    if ($value == 'dokter') {
                        $this->getDokter();
                    }else{
                        $arr = [];
                        $arr['info'] = 'error';
                        echo json_encode($arr);
                    }
                }else {
                    $arr = [];
                    $arr['info'] = 'error';
                    echo json_encode($arr);
                }
            }else{
                $arr = [];
                $arr['info'] = 'error';
                echo json_encode($arr);
            }

        //REQUEST POST
        }else if ($method == 'POST'){
            $data = htmlspecialchars($_POST['data']);
            $data_spesialis = htmlspecialchars($_POST['spesialis']);
            if ($data == 'dokter') {
                if ($data_spesialis != '') {
                    $this->postDokter($data_spesialis);
                }else{
                    $arr = [];
                    $arr['info'] = 'error';
                    echo json_encode($arr);
                }
            }else{
                $arr = [];
                $arr['info'] = 'error';
                echo json_encode($arr);
            }

        // REQUEST PUT
        }elseif ($method == 'PUT') {
            parse_str(file_get_contents('php://input'), $_PUT);
            $nama = isset($_PUT['nama']) ? $_PUT['nama'] : 0;
            $tipe = isset($_PUT['tipe']) ? $_PUT['tipe'] : 0;
            $isi = isset($_PUT['isi']) ? $_PUT['isi'] : 0;
            if ($nama !== 0) {
                if ($tipe !== 0) {
                    if ($isi !== 0) {
                        $this->putDokter($nama,$tipe,$isi);
                    }else{
                        $arr = [];
                        $arr['info'] = 'error';
                        echo json_encode($arr);
                    }
                }else {
                    $arr = [];
                    $arr['info'] = 'error';
                    echo json_encode($arr);
                }
            }else {
                $arr = [];
                $arr['info'] = 'error';
                echo json_encode($arr);
            }
        }
    }

    public function getDokter()
    {
        $dokter = $this->model('Dokter_model')->getDataDokter();
        $spesialis = $this->model('Spesialis_model')->getDataSpesialis();
        foreach ($dokter as $key => $value) {
            foreach ($spesialis as $key2 => $value2) {
                if ($value['id_spesialis'] == $value2['id_spesialis']) {
                    $dokter[$key]['nama_spesialis'] = $value2['nama_spesialis'];
                    $dokter[$key]['keterangan_spesialis'] = $value2['keterangan_spesialis'];
                }
            }
        }

        $data_dokter = [];
        foreach ($dokter as $key => $value) {
            $data_dokter[] = 
            [
                'nama_dokter' => $value['nama_dokter'],
                'biaya_dokter' => $value['biaya_dokter'],
                'nama_spesialis' => $value['nama_spesialis'],
                'keterangan_spesialis' => $value['keterangan_spesialis'],
            ];
        }

        $arr = array();
        $arr['info'] = 'success';
        $arr['num'] = count($data_dokter);
        $arr['result'] = $data_dokter;

        echo json_encode($arr);
    }

    public function postDokter($data_spesialis)
    {
        $dokter = $this->model('Dokter_model')->getDataDokter();
        $spesialis = $this->model('Spesialis_model')->getDataSpesialis();
        foreach ($dokter as $key => $value) {
            foreach ($spesialis as $key2 => $value2) {
                if ($value['id_spesialis'] == $value2['id_spesialis']) {
                    $dokter[$key]['nama_spesialis'] = $value2['nama_spesialis'];
                    $dokter[$key]['keterangan_spesialis'] = $value2['keterangan_spesialis'];
                }
            }
        }

        $data_dokter = [];
        foreach ($dokter as $key => $value) {
            $data_dokter[] = 
            [
                'nama_dokter' => $value['nama_dokter'],
                'biaya_dokter' => $value['biaya_dokter'],
                'nama_spesialis' => $value['nama_spesialis'],
                'keterangan_spesialis' => $value['keterangan_spesialis'],
            ];
        }
        $data_filter_dokter = array_filter($data_dokter,function($v) use ($data_spesialis)
        {
            return strtolower($v['nama_spesialis']) == $data_spesialis;
        });

        $arr = array();
        $arr['info'] = 'success';
        $arr['num'] = count($data_filter_dokter);
        $arr['result'] = $data_filter_dokter;

        echo json_encode($arr);

    }
    
    public function putDokter($nama,$tipe,$isi)
    {
        $all_dokter = $this->model('Dokter_model')->getDataDokter();
        $dokter = array_filter($all_dokter,function ($v) use ($nama)
        {
            return $v['nama_dokter'] == $nama;
        });
        foreach ($dokter as $key => $value) {
            $id_dokter = $value['id_dokter'];
            $nama_dokter = $value['nama_dokter'];
            $id_spesialis = $value['id_spesialis'];
            $biaya_dokter = $value['biaya_dokter'];
        }
        if ($tipe == 'nama') {
            $data = 
            [
                'id_dokter' => $id_dokter,
                'nama_dokter' => $isi,
                'id_spesialis' => $id_spesialis,
                'biaya_dokter' => $biaya_dokter
            ];
            $update = $this->model('Dokter_model')->updateDokter($data);
            if($update > 0){
                $arr = array();
                $arr['info'] = 'success';
                echo json_encode($arr);
            }else{
                $arr = array();
                $arr['info'] = 'failed';
                echo json_encode($arr);
            }
        }elseif ($tipe == 'biaya') {
            $data = 
            [
                'id_dokter' => $id_dokter,
                'nama_dokter' => $nama_dokter,
                'id_spesialus' => $id_spesialis,
                'biaya_dokter' => $isi
            ];
            $update = $this->model('Dokter_model')->updateDokter($data);
            if($update > 0){
                $arr = array();
                $arr['info'] = 'success';
                echo json_encode($arr);
            }else{
                $arr = array();
                $arr['info'] = 'failed';
                echo json_encode($arr);
            }
        }else{
            $arr = [];
            $arr['info'] = 'error';
            echo json_encode($arr);
        }
    }

}


?>
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PerijinanController extends Controller
{
    public function dashboard()
    {
        $_total_dosen = file_get_contents("http://api-ijin.mmhp.tech/user/dosen/total/");
        $_total_dosen = json_decode($_total_dosen);
        $total_dosen = array_key_exists("total", $_total_dosen->data) ? $_total_dosen->data->total : 0;

        $_total_mahasiswa = file_get_contents("http://api-ijin.mmhp.tech/user/mahasiswa/total/");
        $_total_mahasiswa = json_decode($_total_mahasiswa);
        $total_mahasiswa = array_key_exists("total", $_total_mahasiswa->data) ? $_total_mahasiswa->data->total : 0;

        $_total_approved_request = file_get_contents("http://api-ijin.mmhp.tech/request/total/?status=accepted");
        $_total_approved_request = json_decode($_total_approved_request);
        $total_approved_request = array_key_exists("total", $_total_approved_request->data) ? $_total_approved_request->data->total : 0;

        $_total_declined_request = file_get_contents("http://api-ijin.mmhp.tech/request/total/?status=accepted");
        $_total_declined_request = json_decode($_total_declined_request);
        $total_declined_request = array_key_exists("total", $_total_declined_request->data) ? $_total_declined_request->data->total : 0;

        $_approved_request = file_get_contents("http://api-ijin.mmhp.tech/request/?status=accepted&limit=5");
        $_approved_request = json_decode($_approved_request);
        $approved_request = $_approved_request->data;

        $_declined_request = file_get_contents("http://api-ijin.mmhp.tech/request/?status=rejected&limit=5");
        $_declined_request = json_decode($_declined_request);
        $declined_request = $_declined_request->data;

        return view('dashboard', [
            "title" => "Dashboard",
            "total_dosen" => $total_dosen,
            "total_mahasiswa" => $total_mahasiswa,
            "total_approved_request" => $total_approved_request,
            "total_declined_request" => $total_declined_request,
            "approved_request" => $approved_request,
            "declined_request" => $declined_request,
        ]);
    }
}

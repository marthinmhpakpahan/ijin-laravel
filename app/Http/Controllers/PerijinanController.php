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
            "page" => "dashboard",
            "title" => "Dashboard",
            "total_dosen" => $total_dosen,
            "total_mahasiswa" => $total_mahasiswa,
            "total_approved_request" => $total_approved_request,
            "total_declined_request" => $total_declined_request,
            "approved_request" => $approved_request,
            "declined_request" => $declined_request,
        ]);
    }

    public function dosen()
    {
        $_active_dosens = file_get_contents("http://api-ijin.mmhp.tech/user/dosen/?status=active");
        $_active_dosens = json_decode($_active_dosens);
        $active_dosens = $_active_dosens->data;

        $_inactive_dosens = file_get_contents("http://api-ijin.mmhp.tech/user/dosen/?status=deleted");
        $_inactive_dosens = json_decode($_inactive_dosens);
        $inactive_dosens = $_inactive_dosens->data;

        return view('dosen', [
            "page" => "dosen",
            "title" => "Daftar Dosen",
            "active_dosen" => $active_dosens,
            "inactive_dosen" => $inactive_dosens,
            "total_active" => count($active_dosens),
            "total_inactive" => count($inactive_dosens),
        ]);
    }

    public function mahasiswa()
    {
        $_active_mahasiswas = file_get_contents("http://api-ijin.mmhp.tech/user/mahasiswa/?status=active");
        $_active_mahasiswas = json_decode($_active_mahasiswas);
        $active_mahasiswas = $_active_mahasiswas->data;

        $_inactive_mahasiswas = file_get_contents("http://api-ijin.mmhp.tech/user/mahasiswa/?status=deleted");
        $_inactive_mahasiswas = json_decode($_inactive_mahasiswas);
        $inactive_mahasiswas = $_inactive_mahasiswas->data;

        return view('mahasiswa', [
            "page" => "mahasiswa",
            "title" => "Daftar Mahasiswa",
            "active_mahasiswa" => $active_mahasiswas,
            "inactive_mahasiswa" => $inactive_mahasiswas,
            "total_active" => count($active_mahasiswas),
            "total_inactive" => count($inactive_mahasiswas),
        ]);
    }

    public function request()
    {
        $_pending_requests = file_get_contents("http://api-ijin.mmhp.tech/request/?status=pending");
        $_pending_requests = json_decode($_pending_requests);
        $pending_requests = $_pending_requests->data;

        $_accepted_requests = file_get_contents("http://api-ijin.mmhp.tech/request/?status=accepted");
        $_accepted_requests = json_decode($_accepted_requests);
        $accepted_requests = $_accepted_requests->data;

        $_rejected_requests = file_get_contents("http://api-ijin.mmhp.tech/request/?status=rejected");
        $_rejected_requests = json_decode($_rejected_requests);
        $rejected_requests = $_rejected_requests->data;

        return view('request', [
            "page" => "request",
            "title" => "Daftar Request / Permohonan",
            "pending_request" => $pending_requests,
            "accepted_request" => $accepted_requests,
            "rejected_request" => $rejected_requests,
            "total_pending" => count($pending_requests),
            "total_accepted" => count($accepted_requests),
            "total_rejected" => count($rejected_requests),
        ]);
    }

    public function calendar()
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

        return view('calendar', [
            "page" => "calendar",
            "title" => "Kalender"
        ]);
    }
}

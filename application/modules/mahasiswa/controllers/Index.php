<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        $this->isLoggedIn();
        $this->output->delete_cache();
    }
    function isLoggedIn(){
        if($this->session->userdata('loggedin') == false){
            header("location:".base_url('mahasiswa/login'));
        }
    }
    function index(){
        $data['dataDosen'] = $this->Gmodel->rawQuery("select
                                tt_kelas.kd_tt_kelas,
                                tt_matkul.kd_tt_matkul,
                                tm_matkul.matkul,
                                tm_dosen.nama_dosen,
                                tt_matkul.semester,
                                tt_matkul.tahun_ajaran
                                from tt_kelas
                                inner join tt_jadwal on tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                inner join tm_mahasiswa on tm_mahasiswa.kd_mahasiswa = tt_kelas.kd_mahasiswa
                                where tm_mahasiswa.nim = '".$this->session->userdata('nim')."'
                                group by tt_matkul.kd_tt_matkul;");
        $data['view'] = 'main_html/content/dashboard';
        $this->load->view('main_html/content', $data);
    }
    function getDetailPertanyaan($kd_pertanyaan = null){
        if($kd_pertanyaan != null){
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $getData = $this->Gmodel->select($data, 'tm_pertanyaan');
            return $getData;
        }else{
            return "false";
        }
    }
    function cetak(){
        $this->load->view('main_html/content/print');
    }
    function pertanyaan($kd_tt_matkul = 0, $kd_tt_kelas = 0){
        // $data['availPertanyaan'] = $this->Gmodel->get('tm_pertanyaan');
        $data['availPertanyaan'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pertanyaan
                                                                                    WHERE kd_pertanyaan NOT IN (SELECT kd_pertanyaan
                                                                                                                                    FROM tt_rating
                                                                                                                                    WHERE kd_mahasiswa_kelas = '".$kd_tt_kelas."'
                                                                                                                                    AND kd_tt_matkul = '".$kd_tt_matkul."')");
        // $dataSelectTTMatkul['kd_tt_matkul'] = $kd_tt_matkul;
        $data['kd_matkul'] = $kd_tt_matkul;
        $data['dataKelas'] = $this->Gmodel->rawQuery("SELECT * FROM `tt_matkul`
                                                                                INNER JOIN tm_dosen ON tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                INNER JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                                WHERE `kd_tt_matkul` = ".$kd_tt_matkul." ");
        $data['kd_tt_kelas'] = $kd_tt_kelas;
        $data['view'] = 'main_html/content/pertanyaan';
        $this->load->view('main_html/content', $data);
    }
    function jawab($kd_tt_matkul = 0, $kd_tt_kelas = 0, $kd_pertanyaan = 0){

    }
    function testReturn(){
        print_r($this->checkPertanyaan('1', array('1','2','3','4','5','6'), '77de68daecd823babbb58edb1c8e14d7106e83bb'));
    }
    function parsePertanyaan($kd_tt_matkul, $data_pertanyaan = null){
        return $this->checkPertanyaan($kd_tt_matkul, $data_pertanyaan);;
    }
    function checkPertanyaan($kd_tt_matkul, $data_pertanyaan = null){
        $return = null;
        $data['kd_tt_matkul'] = $kd_tt_matkul;
        $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($this->session->userdata('kd_mahasiswa'));
        $getData = $this->Gmodel->haveIn('kd_pertanyaan', $data_pertanyaan, $data, 'tt_rating');
        if($getData->num_rows() > 0){
            $return = "true";
        }else{
            $return = "false";
        }
        return $return;
    }
    function checkRating($kd_pertanyaan = null, $kd_mahasiswa_kelas = null){
        if($kd_pertanyaan != null && $kd_mahasiswa_kelas != null){
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($kd_mahasiswa_kelas);
            $getData = $this->Gmodel->select($data, 'tt_rating');
            if($getData->num_rows() > 0){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo 'false';
        }
    }
    function getKdMahasiswa($kd_mahasiswa){
        $data['sha1(kd_mahasiswa)'] = $kd_mahasiswa;
        $selectData = $this->Gmodel->select($data, 'tm_mahasiswa');
        return $selectData->row()->kd_mahasiswa;
    }
    function giveRating($kd_tt_matkul = null, $kd_mahasiswa_kelas = null, $nilai = null, $kd_pertanyaan = null){
        if($kd_tt_matkul != null && $kd_mahasiswa_kelas != null && $nilai != null && $kd_pertanyaan !=null){
            $data['kd_tt_matkul'] = $kd_tt_matkul;
            $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($kd_mahasiswa_kelas);
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $data['nilai'] = $nilai;

            $insertData = $this->Gmodel->insert($data, 'tt_rating');
            if($insertData){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function kritikSaran($mode="dosenFav", $kd_tt_matkul = null, $isi = null){
        if($kd_tt_matkul != null && $isi !=null){
            $cekdata['kd_jadwal'] = $kd_tt_matkul;
            $conditiondata['kd_jadwal'] = $kd_tt_matkul;
            $data['kd_jadwal'] = $kd_tt_matkul;
            $data['kd_mahasiswa'] = $this->getKdMahasiswa($this->session->userdata('kd_mahasiswa'));
            switch ($mode) {
                case 'dosenFav':
                    $data['dosen_favorit'] = $isi;
                    $updatedata['dosen_favorit'] = $isi;
                    # code...
                    break;
                case 'KritikSaranDosen':
                    $data['kritiksarandosen'] = $isi;
                    $updatedata['kritiksarandosen'] = $isi;
                    # code...
                    break;
                case 'KritikSaranOffice':
                    $data['kritiksaranoffice'] = $isi;
                    $updatedata['kritiksaranoffice'] = $isi;
                    # code...
                    break;

                default:
                    # code...
                    $data['dosen_favorit'] = "NO ISI";
                    break;
            }
            $checkData = $this->Gmodel->select($cekdata, 'tt_kritik_saran');
            if($checkData->num_rows() > 0){
                $updateData = $this->Gmodel->update($conditiondata, $updatedata, 'tt_kritik_saran');
                if($updatedata){
                    echo "true";
                }else{
                    echo "false";
                }
            }else{
                $insertData = $this->Gmodel->insert($data, 'tt_kritik_saran');
                if($insertData){
                    echo "true";
                }else{
                    echo "false";
                }
            }
        }else{
            echo "false";
        }
    }
    function checkKritikSaran($kode_jadwal, $tujuan){
        $data['kd_jadwal'] = $kode_jadwal;
        $data['kd_mahasiswa'] = $this->getKdMahasiswa($this->session->userdata('kd_mahasiswa'));
        $getData = $this->Gmodel->select($data, 'tt_kritik_saran');
        $return = "null";
        if($getData->num_rows() > 0){
            switch ($tujuan) {
                case 'ksdosen':
                    $return = $getData->row()->kritiksarandosen==null?"null":$getData->row()->kritiksarandosen;
                    break;

                case 'ksoffice':
                    $return = $getData->row()->kritiksaranoffice==nulll?"null":$getData->row()->kritiksaranoffice;
                    break;

                case 'fdosen':
                    $return = $getData->row()->dosen_favorit==null?"null":$getData->row()->dosen_favorit;
                    break;

                case 'rekomendasi':
                    $return = $getData->row()->rekomendasi==null?"null":$getData->row()->rekomendasi;
                    break;

                default:
                    $return = $getData->row()->kritiksarandosen==null?"null":$getData->row()->kritiksarandosen;
                    break;
            }
        }
        echo $return;
    }
    function logout(){
        $this->session->sess_destroy();
        header('location:'.base_url('mahasiswa/login'));
    }
}
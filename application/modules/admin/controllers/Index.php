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
        if($this->session->userdata('loggedin_admin') == false){
            header("location:".base_url('admin/login'));
        }
    }
    function index(){
        $data['dataDosen'] = $this->Gmodel->rawQuery("select tt_kelas.kd_tt_kelas, tt_matkul.kd_tt_matkul, tm_matkul.matkul, tm_dosen.nama_dosen from tt_kelas
                                inner join tt_jadwal on tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                inner join tm_mahasiswa on tm_mahasiswa.kd_mahasiswa = tt_kelas.kd_mahasiswa
                                where tm_mahasiswa.nim = '".$this->session->userdata('nim')."';");
        $data['view'] = 'main_html_admin/content/dashboard';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_get($data = 'matkul', $kode){
        $response = array();
        switch ($data) {
            case 'matkul':
                $dataSelect['kd_matkul'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tm_matkul');
                if($query->num_rows() > 0){
                    $response['kode_matkul'] = $query->row()->kd_matkul;
                    $response['matkul'] = $query->row()->matkul;
                }
                break;
            case 'dosen' :
                $dataSelect['kd_dosen'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tm_dosen');
                if($query->num_rows() > 0){
                    $response['kode_dosen'] = $query->row()->kd_dosen;
                    $response['dosen'] = $query->row()->nama_dosen;
                }
                break;
            case 'mahasiswa' :
                $dataSelect['kd_mahasiswa'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tm_mahasiswa');
                if($query->num_rows() > 0){
                    $response['kode_mahasiswa'] = $query->row()->kd_mahasiswa;
                    $response['nama_mahasiswa'] = $query->row()->nama;
                    $response['nim_mahasiswa'] = $query->row()->nim;
                }
                break;
            case 'pertanyaan' :
                $dataSelect['kd_pertanyaan'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tm_pertanyaan');
                if($query->num_rows() > 0){
                    $response['kd_pertanyaan'] = $query->row()->kd_pertanyaan;
                    $response['pertanyaan'] = $query->row()->pertanyaan;
                    $response['nilai'] = $query->row()->nilai;
                }
                break;
            case 'kelas' :
                $dataSelect['kd_kelas'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tm_kelas');
                if($query->num_rows() > 0){
                    $response['kd_kelas'] = $query->row()->kd_kelas;
                    $response['nama_kelas'] = $query->row()->nama_kelas;
                }
                break;
            case 'matkulDosen' :
                $dataSelect['kd_tt_matkul'] = $kode;
                $query = $this->Gmodel->select($dataSelect, 'tt_matkul');
                if($query->num_rows() > 0){
                    $response['kd_tt_matkul'] = $query->row()->kd_tt_matkul;
                    $response['kd_dosen'] = $query->row()->kd_dosen;
                    $response['kd_matkul'] = $query->row()->kd_matkul;
                    $response['semester'] = $query->row()->semester;
                    $response['tahun_ajaran'] = $query->row()->tahun_ajaran;
                }
                break;
            default:
                $response['status'] = 'false';
                break;
        }
        echo json_encode($response);
    }
    function matkul(){
        $data['dataMatkul'] = $this->Gmodel->get("tm_matkul");
        $data['view'] = 'main_html_admin/content/data_matkul';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_matkul($type = 'create', $kode=0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['matkul'] = $params['nama_matkul'];
                $query = $this->Gmodel->insert($dataInsert, 'tm_matkul');
                break;
            case 'update':
                $dataCondition['kd_matkul'] = $params['kode_matkul'];
                $dataUpdate['matkul'] = $params['nama_matkul'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_matkul');
                break;
            case 'delete':
                $dataCondition['sha1(kd_matkul)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tm_matkul');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function dosen(){
        $data['dataDosen'] = $this->Gmodel->get("tm_dosen");
        $data['view'] = 'main_html_admin/content/data_dosen';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_dosen($type = 'create', $kode =0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['nama_dosen'] = $params['nama_dosen'];
                $query = $this->Gmodel->insert($dataInsert, 'tm_dosen');
                break;
            case 'update':
                $dataCondition['kd_dosen'] = $params['kode_dosen'];
                $dataUpdate['nama_dosen'] = $params['nama_dosen'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_dosen');
                break;
            case 'delete':
                $dataCondition['sha1(kd_dosen)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tm_dosen');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function mahasiswa(){
        $data['dataMahasiswa'] = $this->Gmodel->get("tm_mahasiswa");
        $data['view'] = 'main_html_admin/content/data_mahasiswa';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_mahasiswa($type = 'create', $kode=0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['nama'] = $params['nama_mahasiswa'];
                $dataInsert['nim'] = $params['nim_mahasiswa'];
                $query = $this->Gmodel->insert($dataInsert, 'tm_mahasiswa');
                break;
            case 'update':
                $dataCondition['kd_mahasiswa'] = $params['kode_mahasiswa'];
                $dataUpdate['nama'] = $params['nama_mahasiswa'];
                $dataUpdate['nim'] = $params['nim_mahasiswa'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_mahasiswa');
                break;
            case 'delete':
                $dataCondition['sha1(kd_mahasiswa)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tm_mahasiswa');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function pertanyaan(){
        $data['dataPertanyaan'] = $this->Gmodel->get("tm_pertanyaan");
        $data['view'] = 'main_html_admin/content/data_pertanyaan';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_pertanyaan($type = 'create', $kode = 0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['pertanyaan'] = $params['pertanyaan'];
                $dataInsert['nilai'] = $params['nilai'];
                $query = $this->Gmodel->insert($dataInsert, 'tm_pertanyaan');
                break;
            case 'update':
                $dataCondition['kd_pertanyaan'] = $params['kd_pertanyaan'];
                $dataUpdate['pertanyaan'] = $params['pertanyaan'];
                $dataUpdate['nilai'] = $params['nilai'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_pertanyaan');
                break;
            case 'delete':
                $dataCondition['sha1(kd_pertanyaan)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tm_pertanyaan');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function kelas(){
        $data['dataKelas'] = $this->Gmodel->get("tm_kelas");
        $data['dataMahasiswa'] = $this->Gmodel->get("tm_mahasiswa");
        $data['view'] = 'main_html_admin/content/data_kelas';
        $this->load->view('main_html_admin/content', $data);
    }
    function addMahasiswaKelas(){
        $params = $this->input->post();
        if($params != null){
            $data['kd_kelas'] = $params['kd_add'];
            $data['kd_mahasiswa'] = $params['mahasiswadd'];
            $check = $this->Gmodel->select($data, 'tt_kelas');
            if($check->num_rows() < 1){
                $insert = $this->Gmodel->insert($data, 'tt_kelas');
                if($insert){
                    echo "true";
                }else{
                    echo "false";
                }
            }else{
                echo "false";
            }
        }
    }
    function detailMahasiswaKelas($kd_kelas = null){
        if($kd_kelas != null){
            $query = $this->Gmodel->rawQuery("select * from tt_kelas
                                                                        inner join tm_mahasiswa on tm_mahasiswa.kd_mahasiswa = tt_kelas.kd_mahasiswa
                                                                        inner join tm_kelas on tm_kelas.kd_kelas = tt_kelas.kd_kelas
                                                                        where tt_kelas.kd_kelas = '".$kd_kelas."'");
            $data['query'] = $query;
            $data['kelas'] = $query->row()->nama_kelas;
            $this->load->view('main_html_admin/content/data_mahasiswa_kelas', $data);
        }
    }
    function post_kelas($type = 'create', $kode=0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['nama_kelas'] = $params['nama_kelas'];
                $query = $this->Gmodel->insert($dataInsert, 'tm_kelas');
                break;
            case 'update':
                $dataCondition['kd_kelas'] = $params['kode_kelas'];
                $dataUpdate['nama_kelas'] = $params['nama_kelas'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_kelas');
                break;
            case 'delete':
                $dataCondition['sha1(kd_kelas)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tm_kelas');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function matkul_dosen(){
        $data['dataMatkulDosen'] = $this->Gmodel->rawQuery("SELECT * FROM tt_matkul
                                                                                                                        INNER JOIN tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                                                        INNER JOIN tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul");
        $data['dataDosen'] = $this->Gmodel->get('tm_dosen');
        $data['dataMatkul'] = $this->Gmodel->get('tm_matkul');
        $data['view'] = 'main_html_admin/content/matkul_dosen';
        $this->load->view('main_html_admin/content', $data);
    }
    function post_matkul_dosen($type = 'create', $kode=0){
        $params = $this->input->post();
        $query = null;
        switch ($type) {
            case 'create':
                $dataInsert['semester'] = $params['semester'];
                $dataInsert['tahun_ajaran'] = $params['tahun_ajaran'];
                $dataInsert['kd_dosen'] = $params['dosen'];
                $dataInsert['kd_matkul'] = $params['matkul'];
                $query = $this->Gmodel->insert($dataInsert, 'tt_matkul');
                break;
            case 'update':
                $dataCondition['kd_tt_matkul'] = $params['kd_tt_matkul'];
                $dataUpdate['semester'] = $params['semester'];
                $dataUpdate['tahun_ajaran'] = $params['tahun_ajaran'];
                $dataUpdate['kd_dosen'] = $params['dosen'];
                $dataUpdate['kd_matkul'] = $params['matkul'];
                $query = $this->Gmodel->update($dataCondition, $dataUpdate, 'tt_matkul');
                break;
            case 'delete':
                $dataCondition['sha1(kd_tt_matkul)'] = $kode;
                $query = $this->Gmodel->delete($dataCondition, 'tt_matkul');
                break;
        }
        if($query != null){
            if($query){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function jadwal(){
        $data['dataKelas'] = $this->Gmodel->get('tm_kelas');
        $data['dataMatkulDosen'] = $this->Gmodel->rawQuery("  SELECT * FROM tt_jadwal
                                                                                                                        INNER JOIN tt_kelas ON tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                                                                                                        INNER JOIN tt_matkul ON tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                                                                                                        LEFT JOIN tm_kelas ON tm_kelas.kd_kelas = tt_kelas.kd_kelas
                                                                                                                        LEFT JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul");
        $data['view'] = 'main_html_admin/content/jadwal';
        $this->load->view('main_html_admin/content', $data);
        /*
        SELECT * FROM tt_jadwal
                                                                                                                        INNER JOIN tt_kelas ON tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                                                                                                        INNER JOIN tt_matkul ON tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                                                                                                        LEFT JOIN tm_kelas ON tm_kelas.kd_kelas = tt_kelas.kd_kelas
                                                                                                                        LEFT JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul

         */
    }
    function jadwal_kelas($kd_kelas = null){
        // code of jadwal kelas
        if ($kd_kelas != null) {
            $data['kd_kelas'] = $kd_kelas;
            $data['tt_matkul'] = $this->Gmodel->rawQuery('select * from tt_matkul
                                                                                        inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                        inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul');
            $data['tahun_ajaran'] = $this->Gmodel->rawQuery("SELECT * FROM tt_jadwal
                                                                                                                INNER JOIN tt_kelas ON tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                                                                                                INNER JOIN tt_matkul ON tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                                                                                                LEFT JOIN tm_kelas ON tm_kelas.kd_kelas = tt_kelas.kd_kelas
                                                                                                                LEFT JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                                                                WHERE sha1(tm_kelas.kd_kelas) = '".$kd_kelas."'
                                                                                                                GROUP BY tt_matkul.tahun_ajaran");
            $data['view'] = 'main_html_admin/content/tahun_ajaran_kelas';
            $this->load->view('main_html_admin/content', $data);
        }
    }
    function addMatkulKelas(){
        $params = $this->input->post();
        $return = null;
        if($params != null){
            // $dataKelas['sha1(kd_kelas)'] = $params['kode_kelas'];
            // $getDataKelas = $this->Gmodel->select($dataKelas, 'tm_kelas');

            $dataKelas['sha1(kd_kelas)'] = $params['kode_kelas'];
            $getDataKelas = $this->Gmodel->select($dataKelas, 'tt_kelas');
            if ($getDataKelas->num_rows() > 0) {
                foreach ($getDataKelas->result_array() as $rowDataKelas) {
                    // $data['kd_tt_kelas'] = $getDataKelas->row()->kd_kelas;
                    $data['kd_tt_kelas'] = $rowDataKelas['kd_tt_kelas'];
                    $data['kd_tt_matkul'] = $params['matkuladd'];
                    $checkData = $this->Gmodel->select($data, 'tt_jadwal');
                    if($checkData->num_rows() < 1){
                        $insert = $this->Gmodel->insert($data, 'tt_jadwal');
                        if($insert){
                            $return = "true";
                        }else{
                            $return = "false";
                        }
                    }else{
                        $return = "false";
                    }
                }
            }else{
                $return = "false";
            }
            echo $return;
        }
    }
    function detail_matkul($kd_kelas = null, $tahun_ajaran = null){
        if($kd_kelas != null && $tahun_ajaran != null){
            $data['dataMatkul'] = $this->Gmodel->rawQuery("SELECT * FROM tt_jadwal
                                                                                            INNER JOIN tt_kelas ON tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                                                                            INNER JOIN tt_matkul ON tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                                                                            INNER JOIN tm_dosen ON tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                            LEFT JOIN tm_kelas ON tm_kelas.kd_kelas = tt_kelas.kd_kelas
                                                                                            LEFT JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                                            WHERE sha1(tm_kelas.kd_kelas) = '".$kd_kelas."'
                                                                                            AND sha1(tt_matkul.tahun_ajaran) = '".$tahun_ajaran."'
                                                                                            GROUP BY tt_jadwal.kd_tt_matkul");
            $this->load->view('main_html_admin/content/detail_matkul', $data);
        }
    }
    function tambah_tt_matkul(){

    }
    function laporan(){
        $data['dataDosen'] = $this->Gmodel->get('tm_dosen');
        $data['view'] = 'main_html_admin/content/kuesioner_result';
        $this->load->view('main_html_admin/content', $data);
    }
    function get_tahun_ajaran($kd_dosen){
        $data['dataTahunAjaran'] = $this->Gmodel->rawQuery("  select * from tt_matkul
                                                                                                    inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                                    where tm_dosen.kd_dosen = '".$kd_dosen."'
                                                                                                    group by tt_matkul.tahun_ajaran");
            // $data['view'] = 'main_html_admin/content/tahun_ajar_dosen';
            $this->load->view('main_html_admin/content/tahun_ajar_dosen', $data);
    }
    function detail_tahun_ajar($kd_dosen, $tahun_ajaran){
        // $data['detailTahunAjar'] = $this->Gmodel->rawQuery("select *,sum(nilai) as total from tt_rating
        //                                                                                         inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_rating.kd_tt_matkul
        //                                                                                         inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
        //                                                                                         inner join tt_kelas on tt_kelas.kd_tt_kelas = tt_rating.kd_mahasiswa_kelas
        //                                                                                         where tt_matkul.kd_dosen = '".$kd_dosen."'
        //                                                                                         and tt_matkul.tahun_ajaran = '".$tahun_ajaran."'
        //                                                                                         group by tt_kelas.kd_mahasiswa");
        $data['detailTahunAjar'] = $this->Gmodel->rawQuery("select *,sum(nilai) as total from tt_rating
                                                                                                inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_rating.kd_tt_matkul
                                                                                                inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                                                where tt_matkul.kd_dosen = '".$kd_dosen."'
                                                                                                and tt_matkul.tahun_ajaran = '".$tahun_ajaran."'
                                                                                                group by tt_rating.kd_mahasiswa_kelas");
        $this->load->view('main_html_admin/content/detail_matkul_result', $data);
    }
    function kritiksaran(){
        $data['dataKritik'] = $this->Gmodel->rawQuery("select * from tt_kritik_saran
                                                                                    inner join tm_mahasiswa on tm_mahasiswa.kd_mahasiswa = tt_kritik_saran.kd_mahasiswa
                                                                                    inner join tt_kelas on tt_kelas.kd_tt_kelas = tt_kritik_saran.kd_jadwal
                                                                                    inner join tt_jadwal on tt_jadwal.kd_tt_kelas = tt_kelas.kd_tt_kelas
                                                                                    inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                                                                    inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                    group by tt_kritik_saran.kd_kritik_saran;");
        $data['view'] = 'main_html_admin/content/data_kritik_saran';
        $this->load->view('main_html_admin/content', $data);
    }
    function grafik(){
        $data['dataMatkul'] = $this->Gmodel->get('tm_matkul');
        $data['view'] = 'main_html_admin/content/grafik';
        $this->load->view('main_html_admin/content', $data);
    }
    function view_grafik($kd_matkul){
        $data['grafik'] = $this->getDataGrafik($kd_matkul);
        $this->load->view('main_html_admin/content/graph_bar', $data);
    }
    function getDataGrafik($kd_matkul = null){
        $response = array();
        if($kd_matkul != null){
            $query = $this->Gmodel->rawQuery("select tm_dosen.nama_dosen, sum(tt_rating.nilai) as total from tt_rating
                                                                        inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_rating.kd_tt_matkul
                                                                        inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                        inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                        where tm_matkul.kd_matkul = '".$kd_matkul."'
                                                                        group by tm_dosen.nama_dosen");
            if($query->num_rows() > 0){
                foreach ($query->result_array() as $row) {
                    $item = array();
                    $item['Dosen'] = $row['nama_dosen'];
                    $item['Vote Counted'] = $row['total'];
                    array_push($response, $item);
                }
            }
        }
        echo json_encode($response);
    }
    function logout(){
        $this->session->sess_destroy();
        header('location:'.base_url('admin/login'));
    }
}
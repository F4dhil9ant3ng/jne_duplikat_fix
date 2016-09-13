<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tracking_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tracking = $this->Tracking_model->get_all();

        $data = array(
            'tracking_data' => $tracking
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Perekaman Barang';
        $data['assign_js'] = 'tracking/js/index.js';
        load_view('tracking/tb_tracking_list', $data);
    }

    public function read($id)
    {
        $row = $this->Tracking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tracking' => $row->id_tracking,
		'id_exp' => $row->id_exp,
		'id_barang' => $row->id_barang,
		'status' => $row->status,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Perekaman Barang';
      $data['assign_js'] = 'tracking/js/index.js';
            load_view('tracking/tb_tracking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tracking/create_action'),
	    'id_tracking' => set_value('id_tracking'),
	    'id_exp' => set_value('id_exp'),
	    'id_barang' => set_value('id_barang'),
	    'status' => set_value('status'),
	);
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Perekaman Barang';
        $data['assign_js'] = 'tracking/js/index.js';
        load_view('tracking/tb_tracking_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_exp' => $this->input->post('id_exp',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tracking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tracking'));
        }
    }

    public function update($id)
    {
        $row = $this->Tracking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tracking/update_action'),
		'id_tracking' => set_value('id_tracking', $row->id_tracking),
		'id_exp' => set_value('id_exp', $row->id_exp),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'status' => set_value('status', $row->status),
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Perekaman Barang';
      $data['assign_js'] = 'tracking/js/index.js';
            load_view('tracking/tb_tracking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tracking', TRUE));
        } else {
            $data = array(
		'id_exp' => $this->input->post('id_exp',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tracking_model->update($this->input->post('id_tracking', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tracking'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tracking_model->get_by_id($id);

        if ($row) {
            $this->Tracking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tracking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_exp', 'id exp', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_tracking', 'id_tracking', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_tracking.xls";
        $judul = "tb_tracking";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Exp");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Tracking_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_exp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function getExp(){
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $kode_exp = $this->App_model->get_query("SELECT * FROM view_exp")->result();
      }
      else {
        $kode_exp = $this->App_model->get_query("SELECT * FROM view_exp WHERE kode_expedisi LIKE '%".$cari."%' OR (tujuan LIKE '%".$cari."%' AND asal LIKE '%".$cari."%')")->result();
      }
      $temps = array();
      //$kode_exp = $this->mata_kuliah->get_all();
      foreach ($kode_exp as $key) {
        $temps[] = array(
          'id_antar' => $key->id_antar,
          'kode_expedisi' => $key->kode_expedisi,
          'tujuan' => $key->tujuan,
          'asal' => $key->asal
        );
      }
      echo json_encode($temps);
    }

    public function getBarang(){
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $kode_exp = $this->App_model->get_query("SELECT * FROM tb_barang")->result();
      }
      else {
        $kode_exp = $this->App_model->get_query("SELECT * FROM tb_barang WHERE awb LIKE '%".$cari."%'")->result();
      }
      $temps = array();
      //$kode_exp = $this->mata_kuliah->get_all();
      foreach ($kode_exp as $key) {
        $temps[] = array(
          'id_barang' => $key->id_barang,
          'awb' => $key->awb,
          'nama_barang' => $key->nama_barang
        );
      }
      echo json_encode($temps);
    }
}

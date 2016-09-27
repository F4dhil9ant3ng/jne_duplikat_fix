<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Harga_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $harga = $this->App_model->get_query("SELECT * FROM view_harga")->result();

        $data = array(
            'harga_data' => $harga
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Harga';
        $data['assign_js'] = 'harga/js/index.js';
        load_view('harga/tb_harga_list', $data);
    }

    public function read($id)
    {
        $row = $this->Harga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_harga' => $row->id_harga,
		'id_asal' => $row->id_asal,
		'id_tujuan' => $row->id_tujuan,
		'harga' => $row->harga,
		'paket' => $row->paket,
		'estimasi' => $row->estimasi,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Harga';
      $data['assign_js'] = 'harga/js/index.js';
            load_view('harga/tb_harga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function create()
    {
      $cab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
        $data = array(
            'button' => 'Create',
            'action' => site_url('harga/create_action'),
      	    'id_harga' => set_value('id_harga'),
      	    'id_asal' => set_value('id_asal'),
      	    'id_tujuan' => set_value('id_tujuan'),
      	    'harga' => set_value('harga'),
      	    'paket' => set_value('paket'),
      	    'estimasi' => set_value('estimasi'),
      	);
        $cab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
        $data['cabang'] = $cab;
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Harga';
        $data['assign_js'] = 'harga/js/index.js';
        load_view('harga/tb_harga_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_asal' => $this->input->post('id_asal',TRUE),
		'id_tujuan' => $this->input->post('id_tujuan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'paket' => $this->input->post('paket',TRUE),
		'estimasi' => $this->input->post('estimasi',TRUE),
	    );

            $this->Harga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('harga'));
        }
    }

    public function update($id)
    {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('harga/update_action'),
        		'id_harga' => set_value('id_harga', $row->id_harga),
        		'id_asal' => set_value('id_asal', $row->id_asal),
        		'id_tujuan' => set_value('id_tujuan', $row->id_tujuan),
        		'harga' => set_value('harga', $row->harga),
        		'paket' => set_value('paket', $row->paket),
        		'estimasi' => set_value('estimasi', $row->estimasi),
      	    );
            $cab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
            $data['cabang'] = $cab;
            $data['site_title'] = 'Marco';
            $data['title_page'] = 'Olah Data Harga';
            $data['assign_js'] = 'harga/js/index.js';
            load_view('harga/tb_harga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_harga', TRUE));
        } else {
            $data = array(
		'id_asal' => $this->input->post('id_asal',TRUE),
		'id_tujuan' => $this->input->post('id_tujuan',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'paket' => $this->input->post('paket',TRUE),
		'estimasi' => $this->input->post('estimasi',TRUE),
	    );

            $this->Harga_model->update($this->input->post('id_harga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('harga'));
        }
    }

    public function delete($id)
    {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $this->Harga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('harga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_asal', 'id asal', 'trim|required');
	$this->form_validation->set_rules('id_tujuan', 'id tujuan', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('paket', 'paket', 'trim|required');
	$this->form_validation->set_rules('estimasi', 'estimasi', 'trim|required');

	$this->form_validation->set_rules('id_harga', 'id_harga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_harga.xls";
        $judul = "tb_harga";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Paket");
	xlsWriteLabel($tablehead, $kolomhead++, "Estimasi");

	foreach ($this->Harga_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_asal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->paket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->estimasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Harga.php */
/* Location: ./application/controllers/Harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-27 13:13:10 */
/* http://harviacode.com */

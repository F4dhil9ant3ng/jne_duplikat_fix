<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $cabang = $this->Cabang_model->get_all();

        $data = array(
            'cabang_data' => $cabang
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Cabang';
        $data['assign_js'] = 'cabang/js/index.js';
        load_view('cabang/tb_cab_list', $data);
    }

    public function read($id)
    {
        $row = $this->Cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_cabang' => $row->id_cabang,
		'kota' => $row->kota,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Cabang';
      $data['assign_js'] = 'cabang/js/index.js';
            load_view('cabang/tb_cab_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cabang/create_action'),
	    'id' => set_value('id'),
	    'id_cabang' => set_value('id_cabang'),
	    'kota' => set_value('kota'),
	);
  $data['site_title'] = 'Marco';
  $data['title_page'] = 'Olah Data Cabang';
  $data['assign_js'] = 'cabang/js/index.js';
        load_view('cabang/tb_cab_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_cabang' => $this->input->post('id_cabang',TRUE),
		'kota' => $this->input->post('kota',TRUE),
	    );

            $this->Cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cabang'));
        }
    }

    public function update($id)
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cabang/update_action'),
		'id' => set_value('id', $row->id),
		'id_cabang' => set_value('id_cabang', $row->id_cabang),
		'kota' => set_value('kota', $row->kota),
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Cabang';
      $data['assign_js'] = 'cabang/js/index.js';
            load_view('cabang/tb_cab_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_cabang' => $this->input->post('id_cabang',TRUE),
		'kota' => $this->input->post('kota',TRUE),
	    );

            $this->Cabang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cabang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $this->Cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cabang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_cabang', 'id cabang', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_cab.xls";
        $judul = "tb_cab";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Cabang");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");

	foreach ($this->Cabang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_cabang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-13 17:09:51 */
/* http://harviacode.com */

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expedisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Expedisi_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $expedisi = $this->Expedisi_model->get_all();

        $data = array(
            'expedisi_data' => $expedisi
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data expedisi';
        $data['assign_js'] = 'expedisi/js/index.js';
        load_view('expedisi/tb_expedisi_list', $data);
    }

    public function read($id)
    {
        $row = $this->Expedisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_expedisi' => $row->id_expedisi,
		'id_exp' => $row->id_exp,
		'id_mobil' => $row->id_mobil,
		'tgl_berangkat' => $row->tgl_berangkat,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data expedisi';
      $data['assign_js'] = 'expedisi/js/index.js';
            load_view('expedisi/tb_expedisi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('expedisi/create_action'),
	    'id_expedisi' => set_value('id_expedisi'),
	    'id_exp' => set_value('id_exp'),
	    'id_mobil' => set_value('id_mobil'),
	    'tgl_berangkat' => set_value('tgl_berangkat'),
	);
  $dataMobilExp = $this->App_model->get_query("SELECT * FROM view_exp")->result();
  $data['dataMobilExp'] = $dataMobilExp;
  $data['site_title'] = 'Marco';
  $data['title_page'] = 'Olah Data expedisi';
  $data['assign_js'] = 'expedisi/js/index.js';
        load_view('expedisi/tb_expedisi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_exp' => $this->input->post('id_exp',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
		'tgl_berangkat' => $this->input->post('tgl_berangkat',TRUE),
	    );

            $this->Expedisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expedisi'));
        }
    }

    public function update($id)
    {
        $row = $this->Expedisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('expedisi/update_action'),
		'id_expedisi' => set_value('id_expedisi', $row->id_expedisi),
		'id_exp' => set_value('id_exp', $row->id_exp),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
		'tgl_berangkat' => set_value('tgl_berangkat', $row->tgl_berangkat),
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data expedisi';
      $data['assign_js'] = 'expedisi/js/index.js';
            load_view('expedisi/tb_expedisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_expedisi', TRUE));
        } else {
            $data = array(
		'id_exp' => $this->input->post('id_exp',TRUE),
		'id_mobil' => $this->input->post('id_mobil',TRUE),
		'tgl_berangkat' => $this->input->post('tgl_berangkat',TRUE),
	    );

            $this->Expedisi_model->update($this->input->post('id_expedisi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expedisi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Expedisi_model->get_by_id($id);

        if ($row) {
            $this->Expedisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expedisi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_exp', 'id exp', 'trim|required');
	$this->form_validation->set_rules('id_mobil', 'id mobil', 'trim|required');
	$this->form_validation->set_rules('tgl_berangkat', 'tgl berangkat', 'trim|required');

	$this->form_validation->set_rules('id_expedisi', 'id_expedisi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_expedisi.xls";
        $judul = "tb_expedisi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mobil");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Berangkat");

	foreach ($this->Expedisi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_exp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mobil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_berangkat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Expedisi.php */
/* Location: ./application/controllers/Expedisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-13 15:25:32 */
/* http://harviacode.com */

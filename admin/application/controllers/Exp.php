<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exp_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $exp = $this->App_model->get_all_view("view_exp");

        $data = array(
            'exp_data' => $exp
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Arah Expedisi';
        $data['assign_js'] = 'exp/js/index.js';
        load_view('exp/tb_exp_list', $data);
    }

    public function read($id)
    {
        $row = $this->Exp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_antar' => $row->id_antar,
		'asal' => $row->asal,
		'tujuan' => $row->tujuan,
		'kode_expedisi' => $row->kode_expedisi,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Arah Expedisi';
      $data['assign_js'] = 'exp/js/index.js';
            load_view('exp/tb_exp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('exp'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('exp/create_action'),
      	    'id_antar' => set_value('id_antar'),
      	    'asal' => set_value('asal'),
      	    'tujuan' => set_value('tujuan'),
      	    'kode_expedisi' => set_value('kode_expedisi'),
      	);
        $cab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
        $data['cabang'] = $cab;
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Arah Expedisi';
        $data['assign_js'] = 'exp/js/index.js';
        load_view('exp/tb_exp_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'asal' => $this->input->post('asal',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'kode_expedisi' => $this->input->post('kode_expedisi',TRUE),
	    );

            $this->Exp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('exp'));
        }
    }

    public function update($id)
    {
        $row = $this->Exp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('exp/update_action'),
            		'id_antar' => set_value('id_antar', $row->id_antar),
            		'asal' => set_value('asal', $row->asal),
            		'tujuan' => set_value('tujuan', $row->tujuan),
            		'kode_expedisi' => set_value('kode_expedisi', $row->kode_expedisi),
          	    );
                $cab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
                $data['cabang'] = $cab;
                $data['site_title'] = 'Marco';
                $data['title_page'] = 'Olah Data Arah Expedisi';
                $data['assign_js'] = 'exp/js/index.js';
            load_view('exp/tb_exp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('exp'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_antar', TRUE));
        } else {
            $data = array(
		'asal' => $this->input->post('asal',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'kode_expedisi' => $this->input->post('kode_expedisi',TRUE),
	    );

            $this->Exp_model->update($this->input->post('id_antar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('exp'));
        }
    }

    public function delete($id)
    {
        $row = $this->Exp_model->get_by_id($id);

        if ($row) {
            $this->Exp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('exp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('exp'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('kode_expedisi', 'kode expedisi', 'trim|required');

	$this->form_validation->set_rules('id_antar', 'id_antar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_exp.xls";
        $judul = "tb_exp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Expedisi");

	foreach ($this->Exp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->asal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_expedisi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

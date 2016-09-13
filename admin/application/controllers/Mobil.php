<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mobil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $mobil = $this->Mobil_model->get_all();

        $data = array(
            'mobil_data' => $mobil
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Mobil Expedisi';
        $data['assign_js'] = 'mobil/js/index.js';
        load_view('mobil/tb_mobil_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mobil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mobil' => $row->id_mobil,
		'id_nopol' => $row->id_nopol,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'jenis' => $row->jenis,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Mobil Expedisi';
      $data['assign_js'] = 'mobil/js/index.js';
            load_view('mobil/tb_mobil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mobil/create_action'),
	    'id_mobil' => set_value('id_mobil'),
	    'id_nopol' => set_value('id_nopol'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'jenis' => set_value('jenis'),
	);
  $data['site_title'] = 'Marco';
  $data['title_page'] = 'Olah Data Mobil Expedisi';
  $data['assign_js'] = 'mobil/js/index.js';
        load_view('mobil/tb_mobil_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_nopol' => $this->input->post('id_nopol',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
	    );

            $this->Mobil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mobil'));
        }
    }

    public function update($id)
    {
        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mobil/update_action'),
		'id_mobil' => set_value('id_mobil', $row->id_mobil),
		'id_nopol' => set_value('id_nopol', $row->id_nopol),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'jenis' => set_value('jenis', $row->jenis),
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Mobil Expedisi';
      $data['assign_js'] = 'mobil/js/index.js';
            load_view('mobil/tb_mobil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mobil', TRUE));
        } else {
            $data = array(
		'id_nopol' => $this->input->post('id_nopol',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
	    );

            $this->Mobil_model->update($this->input->post('id_mobil', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mobil'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mobil_model->get_by_id($id);

        if ($row) {
            $this->Mobil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_nopol', 'id nopol', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

	$this->form_validation->set_rules('id_mobil', 'id_mobil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mobil.xls";
        $judul = "tb_mobil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Nopol");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");

	foreach ($this->Mobil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_nopol);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

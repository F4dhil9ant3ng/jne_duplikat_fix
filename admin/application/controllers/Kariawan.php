<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kariawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kariawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kariawan = $this->Kariawan_model->get_all();

        $data = array(
            'kariawan_data' => $kariawan
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Karyawan';
        $data['assign_js'] = 'kariawan/js/index.js';
        load_view('kariawan/tb_kariawan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kariawan' => $row->id_kariawan,
		'nama' => $row->nama,
		'jabatan' => $row->jabatan,
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Karyawan';
      $data['assign_js'] = 'kariawan/js/index.js';
            load_view('kariawan/tb_kariawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kariawan/create_action'),
	    'id_kariawan' => set_value('id_kariawan'),
	    'nama' => set_value('nama'),
	    'jabatan' => set_value('jabatan'),
	);
  $data['site_title'] = 'Marco';
  $data['title_page'] = 'Olah Data Karyawan';
  $data['assign_js'] = 'kariawan/js/index.js';
        load_view('kariawan/tb_kariawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Kariawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kariawan'));
        }
    }

    public function update($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kariawan/update_action'),
		'id_kariawan' => set_value('id_kariawan', $row->id_kariawan),
		'nama' => set_value('nama', $row->nama),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Karyawan';
      $data['assign_js'] = 'kariawan/js/index.js';
            load_view('kariawan/tb_kariawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kariawan', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Kariawan_model->update($this->input->post('id_kariawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kariawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);

        if ($row) {
            $this->Kariawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kariawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id_kariawan', 'id_kariawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kariawan.xls";
        $judul = "tb_kariawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");

	foreach ($this->Kariawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kariawan.php */
/* Location: ./application/controllers/Kariawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-13 15:25:57 */
/* http://harviacode.com */

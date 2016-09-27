<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $barang = $this->App_model->get_query("SELECT * FROM view_barang")->result();

        $data = array(
            'barang_data' => $barang
        );
        $data['site_title'] = 'Marco';
        $data['title_page'] = 'Olah Data Barang';
        $data['assign_js'] = 'barang/js/index.js';
        load_view('barang/tb_barang_list', $data);
    }

    public function read($id)
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
      		'id_barang' => $row->id_barang,
      		'awb' => $row->awb,
      		'id_expedisi' => $row->id_expedisi,
      		'nama_barang' => $row->nama_barang,
      		'pengirim' => $row->pengirim,
          'tujuan' => $row->tujuan,
      		'asal' => $row->asal,
      		'penerima' => $row->penerima,
      		'alamat_penerima' => $row->alamat_penerima,
      		'jenis' => $row->jenis,
      		'Berat' => $row->Berat,
      		'colly' => $row->colly,
      		'tgl_kirim' => $row->tgl_kirim,
      		'deskripsi' => $row->deskripsi,
      		'harga' => $row->harga,
      	    );
            $data['site_title'] = 'Marco';
            $data['title_page'] = 'Olah Data Barang';
            $data['assign_js'] = 'barang/js/index.js';
            load_view('barang/tb_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'awb' => set_value('awb'),
	    'id_expedisi' => set_value('id_expedisi'),
	    'nama_barang' => set_value('nama_barang'),
	    'pengirim' => set_value('pengirim'),
      'tujuan' => set_value('tujuan'),
	    'asal' => set_value('asal'),
	    'penerima' => set_value('penerima'),
	    'alamat_penerima' => set_value('alamat_penerima'),
	    'jenis' => set_value('jenis'),
	    'Berat' => set_value('Berat'),
	    'colly' => set_value('colly'),
	    'tgl_kirim' => set_value('tgl_kirim'),
	    'deskripsi' => set_value('deskripsi'),
	    'harga' => set_value('harga'),
	);
  $dataCab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
  $data['data_cabang'] = $dataCab;

  $dataMobilExp = $this->App_model->get_query("SELECT * FROM tb_expedisi")->result();
  $data['dataMobilExp'] = $dataMobilExp;

  $data['site_title'] = 'Marco';
  $data['title_page'] = 'Olah Data Barang';
  $data['assign_js'] = 'barang/js/index.js';
        load_view('barang/tb_barang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'awb' => $this->input->post('awb',TRUE),
		'id_expedisi' => $this->input->post('id_expedisi',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'pengirim' => $this->input->post('pengirim',TRUE),
    'tujuan' => $this->input->post('tujuan',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'Berat' => $this->input->post('Berat',TRUE),
		'colly' => $this->input->post('colly',TRUE),
		'tgl_kirim' => $this->input->post('tgl_kirim',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }

    public function update($id)
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'awb' => set_value('awb', $row->awb),
		'id_expedisi' => set_value('id_expedisi', $row->id_expedisi),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'pengirim' => set_value('pengirim', $row->pengirim),
    'tujuan' => set_value('tujuan', $row->tujuan),
		'asal' => set_value('asal', $row->asal),
		'penerima' => set_value('penerima', $row->penerima),
		'alamat_penerima' => set_value('alamat_penerima', $row->alamat_penerima),
		'jenis' => set_value('jenis', $row->jenis),
		'Berat' => set_value('Berat', $row->Berat),
		'colly' => set_value('colly', $row->colly),
		'tgl_kirim' => set_value('tgl_kirim', $row->tgl_kirim),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'harga' => set_value('harga', $row->harga),
	    );
      $dataCab = $this->App_model->get_query("SELECT * FROM tb_cab")->result();
      $data['data_cabang'] = $dataCab;

      $dataMobilExp = $this->App_model->get_query("SELECT * FROM tb_expedisi")->result();
      $data['dataMobilExp'] = $dataMobilExp;
      $data['site_title'] = 'Marco';
      $data['title_page'] = 'Olah Data Barang';
      $data['assign_js'] = 'barang/js/index.js';
            load_view('barang/tb_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'awb' => $this->input->post('awb',TRUE),
		'id_expedisi' => $this->input->post('id_expedisi',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'pengirim' => $this->input->post('pengirim',TRUE),
    'tujuan' => $this->input->post('tujuan',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'Berat' => $this->input->post('Berat',TRUE),
		'colly' => $this->input->post('colly',TRUE),
		'tgl_kirim' => $this->input->post('tgl_kirim',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('awb', 'awb', 'trim|required');
	$this->form_validation->set_rules('id_expedisi', 'id expedisi', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('pengirim', 'pengirim', 'trim|required');
  $this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
	$this->form_validation->set_rules('alamat_penerima', 'alamat penerima', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('Berat', 'berat', 'trim|required');
	$this->form_validation->set_rules('colly', 'colly', 'trim|required');
	$this->form_validation->set_rules('tgl_kirim', 'tgl kirim', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_barang.xls";
        $judul = "tb_barang";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Awb");
      	xlsWriteLabel($tablehead, $kolomhead++, "Id Expedisi");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
      	xlsWriteLabel($tablehead, $kolomhead++, "Pengirim");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan");
      	xlsWriteLabel($tablehead, $kolomhead++, "Penerima");
      	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penerima");
      	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
      	xlsWriteLabel($tablehead, $kolomhead++, "Berat");
      	xlsWriteLabel($tablehead, $kolomhead++, "Colly");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kirim");
      	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
      	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->Barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->awb);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_expedisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pengirim);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Berat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->colly);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function cetak_nota($id_barang)
    {
      $this->load->library('fpdf_gen');
      $row = $this->App_model->get_query("SELECT * FROM view_barang WHERE id_barang='".$id_barang."'")->row();
      $data['site_title'] = 'Marco';
      $data['data'] = $row;
      $data['title_page'] = 'Nota Barang';
      $data['assign_js'] = 'barang/js/index.js';
      $data['assign_css'] = 'barang/css/app.css';
      load_pdf('barang/nota_barang', $data);

      $html = $this->output->get_output();
  		$this->dompdf->set_paper(array(0,0,684.00,297.00), 'potrait');
  		$this->dompdf->load_html($html);
  		$this->dompdf->render();
  		$this->dompdf->stream("".$row->awb."-".date('D-M-Y').".pdf",array('Attachment'=>0));
    }

    public function getHarga($a,$b,$br,$p)
    {
      $harga = $this->App_model->get_query("SELECT * FROM view_harga WHERE (id_kota_asal='".$a."' AND id_kota_tujuan='".$b."') AND paket='".$p."'")->row();
      $total = $harga->harga * $br;
      echo $total;
      //echo json_encode($harga);
    }
}

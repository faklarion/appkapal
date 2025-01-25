<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sertifikat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_model');
        $this->load->model('Tbl_sertifikat_model');
        $this->load->model('Tbl_pembaruan_model');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Makassar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_sertifikat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_sertifikat/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_sertifikat/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_sertifikat_model->total_rows($q);
        $tbl_sertifikat = $this->Tbl_sertifikat_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_sertifikat_data' => $tbl_sertifikat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_sertifikat/tbl_sertifikat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_sertifikat_model->get_by_id($id);
        if ($row) {
            $data = array(
                'row' => $row,
	    );
            $this->load->view('tbl_sertifikat/tbl_sertifikat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sertifikat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_sertifikat/create_action'),
                'id_sertifikat' => set_value('id_sertifikat'),
                'id_kapal' => set_value('id_kapal'),
                'tempat_pendaftaran' => set_value('tempat_pendaftaran'),
                'tanda_pendaftaran' => set_value('tanda_pendaftaran'),
                'tanggal_terbit' => set_value('tanggal_terbit'),
                'pembaruan_terakhir' => set_value('pembaruan_terakhir'),
                'tanggal_expired' => set_value('tanggal_expired'),
	);
        $this->template->load('template','tbl_sertifikat/tbl_sertifikat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_kapal' => $this->input->post('id_kapal',TRUE),
                'tempat_pendaftaran' => $this->input->post('tempat_pendaftaran',TRUE),
                'tanda_pendaftaran' => $this->input->post('tanda_pendaftaran',TRUE),
                'tanggal_terbit' => $this->input->post('tanggal_terbit',TRUE),
                'pembaruan_terakhir' => date('Y-m-d'),
                'tanggal_expired' => date('Y-m-d', strtotime('+1 year', strtotime($this->input->post('tanggal_terbit')))),
	    );

            $dataKapal = array(
                'status' => 1,
            );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal',TRUE), $dataKapal);
            $this->Tbl_sertifikat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_sertifikat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_sertifikat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_sertifikat/update_action'),
                'id_sertifikat' => set_value('id_sertifikat', $row->id_sertifikat),
                'id_kapal' => set_value('id_kapal', $row->id_kapal),
                'tempat_pendaftaran' => set_value('tempat_pendaftaran', $row->tempat_pendaftaran),
                'tanda_pendaftaran' => set_value('tanda_pendaftaran', $row->tanda_pendaftaran),
                'tanggal_terbit' => set_value('tanggal_terbit', $row->tanggal_terbit),
                'pembaruan_terakhir' => set_value('pembaruan_terakhir', $row->pembaruan_terakhir),
                'tanggal_expired' => set_value('tanggal_expired', $row->tanggal_expired),
	    );
            $this->template->load('template','tbl_sertifikat/tbl_sertifikat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sertifikat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sertifikat', TRUE));
        } else {
            $data = array(
                'id_kapal' => $this->input->post('id_kapal',TRUE),
                'tempat_pendaftaran' => $this->input->post('tempat_pendaftaran',TRUE),
                'tanda_pendaftaran' => $this->input->post('tanda_pendaftaran',TRUE),
                'tanggal_terbit' => $this->input->post('tanggal_terbit',TRUE),
                'tanggal_expired' => date('Y-m-d', strtotime('+1 year', strtotime($this->input->post('tanggal_terbit')))),
	    );

            $this->Tbl_sertifikat_model->update($this->input->post('id_sertifikat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_sertifikat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_sertifikat_model->get_by_id($id);

        $idKapal = $row->id_kapal;

        $dataKapal = array(
            'status' => 0,
        );

        if ($row) {
            $this->Tbl_kapal_model->update($idKapal, $dataKapal);
            $this->Tbl_sertifikat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_sertifikat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sertifikat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tempat_pendaftaran', 'tempat pendaftaran', 'trim|required');
	$this->form_validation->set_rules('tanda_pendaftaran', 'tanda pendaftaran', 'trim|required');
	$this->form_validation->set_rules('tanggal_terbit', 'tanggal terbit', 'trim|required');
	//$this->form_validation->set_rules('pembaruan_terakhir', 'pembaruan terakhir', 'trim|required');
	//$this->form_validation->set_rules('tanggal_expired', 'tanggal expired', 'trim|required');

	$this->form_validation->set_rules('id_sertifikat', 'id_sertifikat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_sertifikat.doc");

        $data = array(
            'tbl_sertifikat_data' => $this->Tbl_sertifikat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_sertifikat/tbl_sertifikat_doc',$data);
    }


    public function filter()
    {
        $status = $this->input->get('status');

        if($status == 0) {
            $dataSertifikat = $this->Tbl_sertifikat_model->get_all_expired();
            $deskripsi = 'Sertifikat Expired';
        } elseif($status == 1) {
            $dataSertifikat = $this->Tbl_sertifikat_model->get_all_belum();
            $deskripsi = 'Sertifikat Belum Expired';
        }

        $data = array(
            'tbl_sertifikat_data' => $dataSertifikat,
            'start' => 0,
            'title' => 'Laporan Data Sertifikat',
            'deskripsi' => $deskripsi,
        );
        
        $this->load->view('tbl_sertifikat/tbl_sertifikat_doc',$data);
    }

    public function pengukuhan($id)
    {

        $data = array(
            'data' => $this->Tbl_pembaruan_model->get_all_by_kapal($id),
            'start' => 0,
            'title' => 'Halaman Pengukuhan',
        );
        
        $this->load->view('tbl_sertifikat/halaman_pengukuhan',$data);
    }

    public function grafik()
    {

        $data = array(
            'expired' => $this->Tbl_sertifikat_model->count_expired(),
            'belum' => $this->Tbl_sertifikat_model->count_belum(),
        );
        
        $this->load->view('tbl_sertifikat/grafik',$data);
    }

}

/* End of file Tbl_sertifikat.php */
/* Location: ./application/controllers/Tbl_sertifikat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-24 06:59:26 */
/* http://harviacode.com */
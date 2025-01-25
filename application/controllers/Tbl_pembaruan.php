<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pembaruan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_pembaruan_model');
        $this->load->model('Tbl_sertifikat_model');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Makassar');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_pembaruan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_pembaruan/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_pembaruan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_pembaruan_model->total_rows($q);
        $tbl_pembaruan = $this->Tbl_pembaruan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_pembaruan_data' => $tbl_pembaruan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_pembaruan/tbl_pembaruan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pembaruan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembaruan' => $row->id_pembaruan,
		'id_sertifikat' => $row->id_sertifikat,
		'tempat_pembaruan' => $row->tempat_pembaruan,
		'tanda_pembaruan' => $row->tanda_pembaruan,
		'tanggal_pembaruan' => $row->tanggal_pembaruan,
	    );
            $this->template->load('template','tbl_pembaruan/tbl_pembaruan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pembaruan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_pembaruan/create_action'),
	    'id_pembaruan' => set_value('id_pembaruan'),
	    'id_sertifikat' => set_value('id_sertifikat'),
	    'tempat_pembaruan' => set_value('tempat_pembaruan'),
	    'tanda_pembaruan' => set_value('tanda_pembaruan'),
	    'tanggal_pembaruan' => set_value('tanggal_pembaruan'),
	);
        $this->template->load('template','tbl_pembaruan/tbl_pembaruan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_sertifikat' => $this->input->post('id_sertifikat',TRUE),
		'tempat_pembaruan' => $this->input->post('tempat_pembaruan',TRUE),
		'tanda_pembaruan' => $this->input->post('tanda_pembaruan',TRUE),
		'tanggal_pembaruan' => $this->input->post('tanggal_pembaruan',TRUE),
	    );

            $this->Tbl_pembaruan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_pembaruan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pembaruan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_pembaruan/update_action'),
                'id_pembaruan' => set_value('id_pembaruan', $row->id_pembaruan),
                'id_sertifikat' => set_value('id_sertifikat', $row->id_sertifikat),
                'tempat_pembaruan' => set_value('tempat_pembaruan', $row->tempat_pembaruan),
                'tanda_pembaruan' => set_value('tanda_pembaruan', $row->tanda_pembaruan),
                'tanggal_pembaruan' => set_value('tanggal_pembaruan', $row->tanggal_pembaruan),
	    );
            $this->template->load('template','tbl_pembaruan/tbl_pembaruan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pembaruan'));
        }
    }

   
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembaruan', TRUE));
        } else {
            $data = array(
		'id_sertifikat' => $this->input->post('id_sertifikat',TRUE),
		'tempat_pembaruan' => $this->input->post('tempat_pembaruan',TRUE),
		'tanda_pembaruan' => $this->input->post('tanda_pembaruan',TRUE),
		'tanggal_pembaruan' => $this->input->post('tanggal_pembaruan',TRUE),
	    );

            $this->Tbl_pembaruan_model->update($this->input->post('id_pembaruan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_pembaruan'));
        }
    }

    public function update_sertifikat($id) 
    {
        $row = $this->Tbl_sertifikat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Submit',
                'action' => site_url('tbl_pembaruan/update_sertifikat_action'),
                'id_sertifikat' => set_value('id_sertifikat', $row->id_sertifikat),
                'id_pembaruan' => set_value('id_pembaruan'),
                'tempat_pembaruan' => set_value('tempat_pembaruan'),
                'tanda_pembaruan' => set_value('tanda_pembaruan'),
                'tanggal_pembaruan' => set_value('tanggal_pembaruan'),
	    );
            $this->template->load('template','tbl_pembaruan/tbl_pembaruan_sertifikat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sertifikat'));
        }
    }

    public function update_sertifikat_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_sertifikat' => $this->input->post('id_sertifikat',TRUE),
                'tempat_pembaruan' => $this->input->post('tempat_pembaruan',TRUE),
                'tanda_pembaruan' => $this->input->post('tanda_pembaruan',TRUE),
                'tanggal_pembaruan' => date('Y-m-d'),
	        );

            $dataSertifikat = array(
                'pembaruan_terakhir' => date('Y-m-d'),
                'tanggal_expired' => date('Y-m-d', strtotime('+1 year', strtotime(date('Y-m-d')))),
	        );

            $this->Tbl_sertifikat_model->update($this->input->post('id_sertifikat',TRUE), $dataSertifikat);
            $this->Tbl_pembaruan_model->insert($data);
            $this->session->set_flashdata('message', 'Pembaruan Success !');
            redirect(site_url('tbl_sertifikat'));
        }
    }
    
    
    public function delete($id) 
    {
        $row = $this->Tbl_pembaruan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pembaruan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_pembaruan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pembaruan'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('id_sertifikat', 'id sertifikat', 'trim|required');
	$this->form_validation->set_rules('tempat_pembaruan', 'tempat pembaruan', 'trim|required');
	$this->form_validation->set_rules('tanda_pembaruan', 'tanda pembaruan', 'trim|required');
	//$this->form_validation->set_rules('tanggal_pembaruan', 'tanggal pembaruan', 'trim|required');

	$this->form_validation->set_rules('id_pembaruan', 'id_pembaruan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pembaruan.doc");

        $data = array(
            'tbl_pembaruan_data' => $this->Tbl_pembaruan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_pembaruan/tbl_pembaruan_doc',$data);
    }

}

/* End of file Tbl_pembaruan.php */
/* Location: ./application/controllers/Tbl_pembaruan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-24 07:45:20 */
/* http://harviacode.com */
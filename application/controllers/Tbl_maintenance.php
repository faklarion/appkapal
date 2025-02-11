<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_maintenance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_maintenance_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_maintenance/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_maintenance/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_maintenance/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_maintenance_model->total_rows($q);
        $tbl_maintenance = $this->Tbl_maintenance_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_maintenance_data' => $tbl_maintenance,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_maintenance/tbl_maintenance_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_maintenance_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bagian_maintenance' => $row->bagian_maintenance,
		'biaya' => $row->biaya,
		'id_kapal' => $row->id_kapal,
		'id_maintenance' => $row->id_maintenance,
		'tanggal_maintenance' => $row->tanggal_maintenance,
		'tanggal_selesai' => $row->tanggal_selesai,
	    );
            $this->template->load('template','tbl_maintenance/tbl_maintenance_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_maintenance'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_maintenance/create_action'),
	    'bagian_maintenance' => set_value('bagian_maintenance'),
	    'biaya' => set_value('biaya'),
	    'id_kapal' => set_value('id_kapal'),
	    'id_maintenance' => set_value('id_maintenance'),
	    'tanggal_maintenance' => set_value('tanggal_maintenance'),
	    'tanggal_selesai' => set_value('tanggal_selesai'),
	);
        $this->template->load('template','tbl_maintenance/tbl_maintenance_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bagian_maintenance' => $this->input->post('bagian_maintenance',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_maintenance' => $this->input->post('tanggal_maintenance',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
	    );

            $this->Tbl_maintenance_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_maintenance'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_maintenance_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_maintenance/update_action'),
		'bagian_maintenance' => set_value('bagian_maintenance', $row->bagian_maintenance),
		'biaya' => set_value('biaya', $row->biaya),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'id_maintenance' => set_value('id_maintenance', $row->id_maintenance),
		'tanggal_maintenance' => set_value('tanggal_maintenance', $row->tanggal_maintenance),
		'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
	    );
            $this->template->load('template','tbl_maintenance/tbl_maintenance_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_maintenance'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_maintenance', TRUE));
        } else {
            $data = array(
		'bagian_maintenance' => $this->input->post('bagian_maintenance',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'tanggal_maintenance' => $this->input->post('tanggal_maintenance',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
	    );

            $this->Tbl_maintenance_model->update($this->input->post('id_maintenance', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_maintenance'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_maintenance_model->get_by_id($id);

        if ($row) {
            $this->Tbl_maintenance_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_maintenance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_maintenance'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bagian_maintenance', 'bagian maintenance', 'trim|required');
	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('tanggal_maintenance', 'tanggal maintenance', 'trim|required');
	$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');

	$this->form_validation->set_rules('id_maintenance', 'id_maintenance', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        $tanggal_awal   = $this->input->get('tanggal_awal');
        $tanggal_akhir  = $this->input->get('tanggal_akhir');

        $data = array(
            'tbl_maintenance_data' => $this->Tbl_maintenance_model->get_tanggal($tanggal_awal, $tanggal_akhir),
            'start' => 0,
            'label' => 'Filter Tanggal Maintenance Antara '.tgl_indo($tanggal_awal).' - '.tgl_indo($tanggal_akhir).''
        );
        
        $this->load->view('tbl_maintenance/tbl_maintenance_doc',$data);
    }

}

/* End of file Tbl_maintenance.php */
/* Location: ./application/controllers/Tbl_maintenance.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-02-11 13:44:11 */
/* http://harviacode.com */
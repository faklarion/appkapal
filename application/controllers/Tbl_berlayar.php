<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_berlayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_berlayar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_berlayar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_berlayar/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_berlayar/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_berlayar_model->total_rows($q);
        $tbl_berlayar = $this->Tbl_berlayar_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_berlayar_data' => $tbl_berlayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_berlayar/tbl_berlayar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_berlayar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_berlayar' => $row->id_berlayar,
		'id_kapal' => $row->id_kapal,
		'pelabuhan_asal' => $row->pelabuhan_asal,
		'pelabuhan_tujuan' => $row->pelabuhan_tujuan,
		'tanggal_berlayar' => $row->tanggal_berlayar,
		'tanggal_sampai' => $row->tanggal_sampai,
	    );
            $this->template->load('template','tbl_berlayar/tbl_berlayar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berlayar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_berlayar/create_action'),
	    'id_berlayar' => set_value('id_berlayar'),
	    'id_kapal' => set_value('id_kapal'),
	    'pelabuhan_asal' => set_value('pelabuhan_asal'),
	    'pelabuhan_tujuan' => set_value('pelabuhan_tujuan'),
	    'tanggal_berlayar' => set_value('tanggal_berlayar'),
	    'tanggal_sampai' => set_value('tanggal_sampai'),
	);
        $this->template->load('template','tbl_berlayar/tbl_berlayar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'tanggal_berlayar' => $this->input->post('tanggal_berlayar',TRUE),
		'tanggal_sampai' => $this->input->post('tanggal_sampai',TRUE),
	    );

            $this->Tbl_berlayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success !');
            redirect(site_url('tbl_berlayar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_berlayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_berlayar/update_action'),
		'id_berlayar' => set_value('id_berlayar', $row->id_berlayar),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'pelabuhan_asal' => set_value('pelabuhan_asal', $row->pelabuhan_asal),
		'pelabuhan_tujuan' => set_value('pelabuhan_tujuan', $row->pelabuhan_tujuan),
		'tanggal_berlayar' => set_value('tanggal_berlayar', $row->tanggal_berlayar),
		'tanggal_sampai' => set_value('tanggal_sampai', $row->tanggal_sampai),
	    );
            $this->template->load('template','tbl_berlayar/tbl_berlayar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berlayar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_berlayar', TRUE));
        } else {
            $data = array(
		'id_kapal' => $this->input->post('id_kapal',TRUE),
		'pelabuhan_asal' => $this->input->post('pelabuhan_asal',TRUE),
		'pelabuhan_tujuan' => $this->input->post('pelabuhan_tujuan',TRUE),
		'tanggal_berlayar' => $this->input->post('tanggal_berlayar',TRUE),
		'tanggal_sampai' => $this->input->post('tanggal_sampai',TRUE),
	    );

            $this->Tbl_berlayar_model->update($this->input->post('id_berlayar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_berlayar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_berlayar_model->get_by_id($id);

        if ($row) {
            $this->Tbl_berlayar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_berlayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_berlayar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kapal', 'id kapal', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_asal', 'pelabuhan asal', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_tujuan', 'pelabuhan tujuan', 'trim|required');
	$this->form_validation->set_rules('tanggal_berlayar', 'tanggal berlayar', 'trim|required');
	$this->form_validation->set_rules('tanggal_sampai', 'tanggal sampai', 'trim|required');

	$this->form_validation->set_rules('id_berlayar', 'id_berlayar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       $tanggal_awal    = $this->input->get('tanggal_awal');
       $tanggal_akhir   = $this->input->get('tanggal_akhir');

        $data = array(
            'tbl_berlayar_data' => $this->Tbl_berlayar_model->get_tanggal($tanggal_awal,$tanggal_akhir),
            'start' => 0,
            'label' => "Filter Tanggal Berlayar Antara ".tgl_indo($tanggal_awal)." - ".tgl_indo($tanggal_akhir).""
        );
        
        $this->load->view('tbl_berlayar/tbl_berlayar_doc',$data);
    }

}

/* End of file Tbl_berlayar.php */
/* Location: ./application/controllers/Tbl_berlayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-02-11 13:12:44 */
/* http://harviacode.com */
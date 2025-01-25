<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Tbl_kapal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kapal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kapal/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kapal/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kapal_model->total_rows($q);
        $tbl_kapal = $this->Tbl_kapal_model->get_all();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kapal_data' => $tbl_kapal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kapal/tbl_kapal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kapal' => $row->id_kapal,
		'nama_kapal' => $row->nama_kapal,
		'tanda_panggilan' => $row->tanda_panggilan,
		'panjang' => $row->panjang,
		'lebar' => $row->lebar,
		'dimensi' => $row->dimensi,
		'tonase_kotor' => $row->tonase_kotor,
		'tonase_bersih' => $row->tonase_bersih,
		'tahun' => $row->tahun,
		'nomer_imo' => $row->nomer_imo,
		'penggerak_utama' => $row->penggerak_utama,
		'merek_tk' => $row->merek_tk,
		'bahan_utama' => $row->bahan_utama,
		'jumlah_geladak' => $row->jumlah_geladak,
		'jumlah_baling' => $row->jumlah_baling,
	    );
            $this->template->load('template','tbl_kapal/tbl_kapal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kapal/create_action'),
	    'id_kapal' => set_value('id_kapal'),
	    'nama_kapal' => set_value('nama_kapal'),
	    'tanda_panggilan' => set_value('tanda_panggilan'),
	    'panjang' => set_value('panjang'),
	    'lebar' => set_value('lebar'),
	    'dimensi' => set_value('dimensi'),
	    'tonase_kotor' => set_value('tonase_kotor'),
	    'tonase_bersih' => set_value('tonase_bersih'),
	    'tahun' => set_value('tahun'),
	    'nomer_imo' => set_value('nomer_imo'),
	    'penggerak_utama' => set_value('penggerak_utama'),
	    'merek_tk' => set_value('merek_tk'),
	    'bahan_utama' => set_value('bahan_utama'),
	    'jumlah_geladak' => set_value('jumlah_geladak'),
	    'jumlah_baling' => set_value('jumlah_baling'),
	);
        $this->template->load('template','tbl_kapal/tbl_kapal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kapal' => $this->input->post('nama_kapal',TRUE),
		'tanda_panggilan' => $this->input->post('tanda_panggilan',TRUE),
		'panjang' => $this->input->post('panjang',TRUE),
		'lebar' => $this->input->post('lebar',TRUE),
		'dimensi' => $this->input->post('dimensi',TRUE),
		'tonase_kotor' => $this->input->post('tonase_kotor',TRUE),
		'tonase_bersih' => $this->input->post('tonase_bersih',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'nomer_imo' => $this->input->post('nomer_imo',TRUE),
		'penggerak_utama' => $this->input->post('penggerak_utama',TRUE),
		'merek_tk' => $this->input->post('merek_tk',TRUE),
		'bahan_utama' => $this->input->post('bahan_utama',TRUE),
		'jumlah_geladak' => $this->input->post('jumlah_geladak',TRUE),
		'jumlah_baling' => $this->input->post('jumlah_baling',TRUE),
	    );

            $this->Tbl_kapal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kapal/update_action'),
		'id_kapal' => set_value('id_kapal', $row->id_kapal),
		'nama_kapal' => set_value('nama_kapal', $row->nama_kapal),
		'tanda_panggilan' => set_value('tanda_panggilan', $row->tanda_panggilan),
		'panjang' => set_value('panjang', $row->panjang),
		'lebar' => set_value('lebar', $row->lebar),
		'dimensi' => set_value('dimensi', $row->dimensi),
		'tonase_kotor' => set_value('tonase_kotor', $row->tonase_kotor),
		'tonase_bersih' => set_value('tonase_bersih', $row->tonase_bersih),
		'tahun' => set_value('tahun', $row->tahun),
		'nomer_imo' => set_value('nomer_imo', $row->nomer_imo),
		'penggerak_utama' => set_value('penggerak_utama', $row->penggerak_utama),
		'merek_tk' => set_value('merek_tk', $row->merek_tk),
		'bahan_utama' => set_value('bahan_utama', $row->bahan_utama),
		'jumlah_geladak' => set_value('jumlah_geladak', $row->jumlah_geladak),
		'jumlah_baling' => set_value('jumlah_baling', $row->jumlah_baling),
	    );
            $this->template->load('template','tbl_kapal/tbl_kapal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kapal', TRUE));
        } else {
            $data = array(
		'nama_kapal' => $this->input->post('nama_kapal',TRUE),
		'tanda_panggilan' => $this->input->post('tanda_panggilan',TRUE),
		'panjang' => $this->input->post('panjang',TRUE),
		'lebar' => $this->input->post('lebar',TRUE),
		'dimensi' => $this->input->post('dimensi',TRUE),
		'tonase_kotor' => $this->input->post('tonase_kotor',TRUE),
		'tonase_bersih' => $this->input->post('tonase_bersih',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'nomer_imo' => $this->input->post('nomer_imo',TRUE),
		'penggerak_utama' => $this->input->post('penggerak_utama',TRUE),
		'merek_tk' => $this->input->post('merek_tk',TRUE),
		'bahan_utama' => $this->input->post('bahan_utama',TRUE),
		'jumlah_geladak' => $this->input->post('jumlah_geladak',TRUE),
		'jumlah_baling' => $this->input->post('jumlah_baling',TRUE),
	    );

            $this->Tbl_kapal_model->update($this->input->post('id_kapal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kapal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kapal_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kapal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kapal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kapal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kapal', 'nama kapal', 'trim|required');
	$this->form_validation->set_rules('tanda_panggilan', 'tanda panggilan', 'trim|required');
	$this->form_validation->set_rules('panjang', 'panjang', 'trim|required');
	$this->form_validation->set_rules('lebar', 'lebar', 'trim|required');
	$this->form_validation->set_rules('dimensi', 'dimensi', 'trim|required');
	$this->form_validation->set_rules('tonase_kotor', 'tonase kotor', 'trim|required');
	$this->form_validation->set_rules('tonase_bersih', 'tonase bersih', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('nomer_imo', 'nomer imo', 'trim|required');
	$this->form_validation->set_rules('penggerak_utama', 'penggerak utama', 'trim|required');
	$this->form_validation->set_rules('merek_tk', 'merek tk', 'trim|required');
	$this->form_validation->set_rules('bahan_utama', 'bahan utama', 'trim|required');
	$this->form_validation->set_rules('jumlah_geladak', 'jumlah geladak', 'trim|required');
	$this->form_validation->set_rules('jumlah_baling', 'jumlah baling', 'trim|required');

	$this->form_validation->set_rules('id_kapal', 'id_kapal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {

        $data = array(
            'tbl_kapal_data' => $this->Tbl_kapal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kapal/tbl_kapal_doc',$data);
    }

}

/* End of file Tbl_kapal.php */
/* Location: ./application/controllers/Tbl_kapal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-24 06:30:51 */
/* http://harviacode.com */
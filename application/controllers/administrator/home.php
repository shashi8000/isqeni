<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->setting->changeAdminLang();
    $setting = $this->setting->get();
    $this->load->model('administrator/data');
    $this->load->helper('administrator/lang');
    $this->load->helper('administrator/get');
    if ($this->session->userdata('admin_lang') == FALSE) {
      $data['admin_lang'] = $setting['admin_lang'];
      $this->session->set_userdata($data);
    }

    $this->lang->load("admin", $this->setting->getLang($this->session->userdata('admin_lang')));
    $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
    if ($this->session->userdata('logged_in_admin') != TRUE) {
      redirect(site_url("administrator/login"));
    }
  }

  public function index() {

    $data['data'] = $this->data->get("contact", FALSE, FALSE, FALSE, FALSE, array("id" => "desc"));
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/global/home', $data);
    $this->load->view('administrator/global/footer');
  }

  public function jobs() {

    $data['data'] = $this->data->get("jobs", FALSE, FALSE, FALSE, FALSE, array("id" => "desc"));

    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/global/jobs', $data);
    $this->load->view('administrator/global/footer');
  }

  public function read() {
    $data['data'] = $this->data->get("contact", FALSE, array('id' => $this->uri->segment(4)));
    $data['table'] = "contact";
    $data['title'] = "Messages";
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/read', $data);
    $this->load->view('administrator/global/footer');
  }

  public function readCO() {
    $data['data'] = $this->data->get("jobs", FALSE, array('id' => $this->uri->segment(4)));
    $data['table'] = "jobs";
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/readc', $data);
    $this->load->view('administrator/global/footer');
  }

  public function deleteM($slug) {

    if ($slug > 0) {
      $this->data->delete("contact", $slug);
    }
    redirect('administrator/home', 'refresh');
  }

  public function deleteJ($slug) {
    if ($slug > 0) {
      $this->data->delete("jobs", $slug);
    }
    redirect('administrator/home/jobs', 'refresh');
  }

  public function status($table, $slug, $status) {
    if ($this->data->setStatus($table, $status, $slug)) {
      redirect('administrator/home/' . $table, 'refresh');
    }
  }
}

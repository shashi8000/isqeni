<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vouchers extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->setting->changeAdminLang();
    $setting = $this->setting->get();
    $this->load->model('administrator/data');
    $this->load->helper('administrator/lang');
    $this->load->helper('administrator/get');
    $this->load->library("pagination");
    if ($this->session->userdata('admin_lang') == FALSE) {
      $data['admin_lang'] = $setting['admin_lang'];
      $this->session->set_userdata($data);
    }
    $this->lang->load("admin", $this->setting->getLang($this->session->userdata('admin_lang')));
    $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
    if ($this->session->userdata('logged_in_admin') != TRUE) {
      redirect(site_url("administrator/login"));
    }
    if (!in_array("1", $this->session->userdata('permi'))) {
      if (!in_array("5", $this->session->userdata('permi'))) {
        redirect(site_url("administrator/home"));
      }
    }
  }

  public function index() {
    $data['langId'] = FALSE;
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $checks = $this->input->post('check');
      if ($checks !== FALSE) {
        foreach ($checks AS $check) {
          if (!($this->data->delete("products", $check))) {
            echo "<script>alert('" . lang("NonDelete") . "');</script>";
          }
        }
      } else {
        echo "<script>alert('" . lang("NonSelect") . "');</script>";
      }
    }
    $data['setting']['data_in_page'] = 15;
    $index_Page = $this->config->item('index_page');
    if ($index_Page == "index.php") {
      $index_Page = $index_Page . "/";
    }
    $paging["base_url"] = base_url() . $index_Page . "administrator/products/index";
    $paging["first_url"] = base_url() . $index_Page . "administrator/products/index" . $this->config->item('url_suffix');
    $paging["suffix"] = $this->config->item('url_suffix');
    ;
    $paging["total_rows"] = $this->data->countTable("products");
    $paging["per_page"] = $data['setting']['data_in_page'];
    $paging["uri_segment"] = 4;
    $paging['num_links'] = 7;
    $paging['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
    $paging['full_tag_close'] = '</ul></div>';
    $paging['first_link'] = '[«]';
    $paging['first_tag_open'] = '<li class="first">';
    $paging['next_tag_open'] = '<li class="next">';
    $paging['prev_tag_open'] = '<li class="prev">';
    $paging['first_tag_close'] = '</li>';
    $paging['next_tag_close'] = '</li>';
    $paging['prev_tag_close'] = '</li>';
    $paging['last_link'] = '[»]';
    $paging['last_tag_open'] = '<li class="last">';
    $paging['last_tag_close'] = '</li>';
    $paging['next_link'] = 'التالي »';
    $paging['prev_link'] = '« السابق';
    $paging['num_tag_open'] = '<li class="pager-item">';
    $paging['num_tag_close'] = '</li>';
    $paging['cur_tag_open'] = '<li class="active"><a href="javascript:">';
    $paging['cur_tag_close'] = '</a></li>';
    $this->pagination->initialize($paging);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data'] = $this->data->get("products", FALSE, array("id >" => 0), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
    $data["links"] = $this->pagination->create_links();
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/products_table', $data);
    $this->load->view('administrator/global/footer');
  }

 

  public function add() {
   
    $data['langId']        = FALSE ;

        $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Vouchers" ;
        $data['Title']         = "عن التطبيق" ;
        $this->load->library('form_validation');
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/vouchers_add_view',$data);
    $this->load->view('administrator/global/footer');
  }

  public function delete($slug) {
    if ($slug > 0) {
      $this->data->delete("products", $slug);
    }
    redirect('administrator/products', 'refresh');
  }
  
  public function show()
  {
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/products2_form', $data);
    $this->load->view('administrator/global/footer');
  }
  
 

}

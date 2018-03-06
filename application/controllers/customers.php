<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class customers extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->setting->changeAdminLang();
    $setting = $this->setting->get();
    $this->load->model('administrator/data');
    $this->load->helper(['administrator/lang', 'administrator/get_helper']);
    if ($this->session->userdata('admin_lang') == FALSE) {
      $data['admin_lang'] = $setting['admin_lang'];
      $this->session->set_userdata($data);
    }
    $this->lang->load("admin", $this->setting->getLang($this->session->userdata('admin_lang')));
    $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
  }

  public function index()
  {
      $customersData = [];
      $sessiondata = [];
      $sessiondata = $this->session->userdata('logged_in_customer');
      if ($sessiondata)
          redirect(site_url("dashboard"));
      if (!$sessiondata) {
          $customersData['message'] = lang("Pleasecustomers");
          $customersData['txtUserName'] = $this->input->post('txtUserName');
          if (isset($_POST['txtUserName'])) {
              $userName = $this->input->post('txtUserName');
              $password = $this->input->post('txtPassword');
              if (($this->data->setcustomers("cats", $userName, $password) == TRUE)) {
                  $userData = $this->data->getUserByUsername($userName, "cats");
                  // set session
                  $this->session->set_userdata('logged_in_customer', $userData);
                  if ($this->session->userdata('logged_in_customer'))
                      //redirect(site_url("products"));

                      redirect(site_url("dashboard"));
                  } else {
                      $customersData['message'] = lang("errorUserName");
                  }
              }
          }
          $this->load->view('administrator/user/login', $customersData);
      }


  public function dashbord() {
    $sessiondata = $this->session->userdata('logged_in_customer');
    if (!$sessiondata) {
      
    }
  }

  function logout() {
    $this->session->sess_destroy();
    redirect(site_url("customers"));
  }

  //Edit orders by customer
  public function edit() {
    $data['langId'] = FALSE;
    if ($this->uri->segment(3)) {
      $data['data'] = $this->data->get("orders", $data['langId'], array("id" => $this->uri->segment(3)));
      $data['id'] = $this->uri->segment(3);
    } else {
      $data['id'] = 0;
    }
    if ($this->input->post('table')) {
      $this->db->set('status', $this->input->post('status'));
      $this->db->where('id', $data['id']);
      $this->db->update('orders');
      redirect('orders');
    }
    $data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
    $data['branchs'] = $this->data->get("branchs", FALSE, array("id >" => 0), FALSE, TRUE);
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/edit_orders', $data);
    $this->load->view('customer/global/footer');
  }

  //Delete order by client
  public function delete($slug) {
    if ($slug > 0) {
      $this->data->delete("orders", $slug);
      $this->data->delete("cart", FALSE, array("order_id" => $slug));
    }
    redirect('orders/', 'refresh');
  }

  public function printD() {

    $data['title'] = " - " . " تقرير مبيعات ";
    $data['langId'] = $this->session->userdata('admin_lang');
    $data['setting'] = $this->data->get("setting", FALSE, FALSE, 1);
    //********************* Search *********************************
    $arraySearch = array("id >" => 0);

    $from = $this->input->get('from');
    $to = $this->input->get('to');
    $branch = $this->input->get('branch');

    if ($from != FALSE && !empty($from)) {
      $arraySearch['odate >='] = $from;
    }
    if ($to != FALSE && !empty($to)) {
      $arraySearch['odate <='] = $to;
    }
    if ($branch != FALSE && !empty($branch)) {
      $arraySearch['branch_id'] = $branch;
    }
    //****************************************
    $cat = $this->session->userdata('logged_in_customer')['id'];
    $quy1 = $this->db->select('*')->join('cart', 'products.id = cart.prod_id', 'left')
                    ->where('products.cat_id', $cat)->get('products')->result_array();
    $data['CountSearch'] = $orders_id = [];
    foreach ($quy1 as $vals) {
      $orders_id[] = $data['CountSearch'][] = $vals['order_id'];
    }

    $data['data'] = $this->db->order_by('id', 'desc')->where_in('id', $orders_id)->get('orders')->result_array();
    $this->load->view('customer/pages/order2_table', $data);
  }
public function changestatus($vid,$status){

          $sqlData = "update cats set vendor_offline = ".$status." where id=".$vid;
          $query=$this->db->query($sqlData);
          exit();

  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
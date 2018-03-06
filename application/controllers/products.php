<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

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
    $sessiondata = $this->session->userdata('logged_in_customer');
    if (!$sessiondata) {
      redirect(site_url("customers"));
    }
  }

  public function index() {
    $sessiondata = $this->session->userdata('logged_in_customer');
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
    $paging["base_url"] = base_url() . $index_Page . "products/index";
    $paging["first_url"] = base_url() . $index_Page . "products/index" . $this->config->item('url_suffix');
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
    $data['data'] = $this->data->get("products", FALSE, array("id >" => 0,"customer_del ="=> 1, 'cat_id' => $sessiondata['id']), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
    $data["links"] = $this->pagination->create_links();
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/products_table', $data);
    $this->load->view('customer/global/footer');
  }

  public function offers() {
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
    $paging["base_url"] = base_url() . $index_Page . "products/offers";
    $paging["first_url"] = base_url() . $index_Page . "products/offers" . $this->config->item('url_suffix');
    $paging["suffix"] = $this->config->item('url_suffix');
    ;
    $paging["total_rows"] = $this->data->countTable("products", array("discount >" => 0));
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
    $data['data'] = $this->data->get("products", FALSE, array("discount >" => 0), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
    $data["links"] = $this->pagination->create_links();
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/products2_table', $data);
    $this->load->view('customer/global/footer');
  }

  public function add() {
    $data['langId'] = FALSE;

    if ($this->uri->segment(3)) {
      $data['data'] = $this->data->get("products", $data['langId'], array("id" => $this->uri->segment(3)));
      $data['id'] = $this->uri->segment(3);
    } else {
      $data['id'] = 0;
    }

    $this->load->library('form_validation');
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $required_fields = array(
          'prod_num' => "رقم المنتج",
          'name' => "الاسم بالعربي",
          'name_en' => "الاسم بالأنجليزي",
          'price' => "السعر",
          'cat_id' => "القسم",
          'min_charge' => "الحد الأدنى للتوصيل"
              // 'text2'=>"الوصف بالعربي",
              // 'text2_en'=>"الوصف بالانجليزي"
      );
      foreach ($required_fields as $key => $value) {
        $this->form_validation->set_rules("Cform[" . $key . "]", $value, 'required');
      }
      $this->form_validation->set_rules("Cform[discount]", "نسبة الخصم", 'numeric');
      if ((isset($_FILES['photo_to_up']['name']) && empty($_FILES['photo_to_up']['name'])) && empty($data['data']['photo'])) {
        $this->form_validation->set_rules("photo", "الصوره", 'required');
      }
      $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
      if ($this->form_validation->run() === FALSE) {
        $data['data'] = $this->input->post('Cform');
        $this->data->save_product($data['data']);
      } else {
        if ($this->data->save()) {
          $data['message'] = '<div class="alert alert-success">' . lang("SuccessSave") . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data'] = $this->data->get("products", $data['langId'], array("id" => $this->uri->segment(3)));
        } else {
          $data['message'] = '<div class="alert alert-error">' . lang("UploadError") . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data'] = $this->input->post('Cform');
        }
      }
    }
    $vendor_id=$this->session->userdata('logged_in_customer');
    $vendor=$vendor_id['id'];
    $data['coupon']=$this->data->get_coupon($vendor);
    $data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
    $data['branchs'] = $this->data->get("branchs", FALSE, array("id >" => 0), FALSE, TRUE);
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/products_form', $data);
    $this->load->view('customer/global/footer');
  }
    public function add_product()
    {
        $data= $this->input->post('Cform');
        $data['photo']=$_FILES['photo_to_up']['name'];
        $photo = $_FILES['photo_to_up']['name'];
            if (!empty($photo)) {
                $this->upload->initialize($this->set_photoupload_options1());
                $this->upload->do_upload('photo_to_up');
                $filedata = $this->upload->data();
                $path = base_url().'download/products/'.$filedata['file_name'];
                $data['photo']=$path;
                $product_id = $this->data->save_product($data);
                if (!empty($_REQUEST)) {
                    foreach ($_REQUEST['x'] as $keys => $values) {
                        $chemicalName = $values['chemical_name'];
                        $chemicalValue = $values['chemical_value'];
                        $chemicalNameEn = $values['chemical_name_en'];
                        $chemicalValueEn = $values['chemical_value_en'];
                        $sql = "insert into product_chemical_composition (product_id, chemical_name, chemical_value, chemical_name_en, chemical_value_en) values ('$product_id', '$chemicalName', '$chemicalValue', '$chemicalNameEn', '$chemicalValueEn')";
                        $this->db->query($sql);
                    }
                    $couponID = $_REQUEST['couponcodeSelId'];
                    $status = '1';
                    $sqlcoupon = "insert into coupon_products (product_id, coupon_id, status) values ('$product_id', '$couponID', '$status')";
                    $this->db->query($sqlcoupon);
                }
                redirect('products/add');
            }
    }
public function deleteProductComposition($id=NULL,$productId=NULL){

    $sqlDelete = "select id from product_chemical_composition where product_id=".$productId;
    $query = $this->db->query($sqlDelete);
    $val = $query->result();
    if(count($val)>1){
    $sqlDelete = "delete from product_chemical_composition where id=".$id;
    $this->db->query($sqlDelete);
    }else{
        $this->session->set_flashdata("msg","There should be one composition");
    }
    redirect('products/edit_product/'.$productId);

}
  public function discount($id) {
    $data['langId'] = FALSE;
    if ($this->data->check("products", FALSE, array("id" => $id)) == FALSE) {
      redirect('products', 'refresh');
    }
    $data['data'] = $this->data->get("products", $data['langId'], array("id" => $id));
    $this->load->library('form_validation');
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $this->form_validation->set_rules("Cform[discount]", "نسبة الخصم", 'numeric');
      $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
      if ($this->form_validation->run() === FALSE) {
        $data['data'] = $this->input->post('Cform');
      } else {
        if ($this->data->save()) {
          $data['message'] = '<div class="alert alert-success">' . lang("SuccessSave") . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data'] = $this->data->get("products", $data['langId'], array("id" => $this->uri->segment(3)));
        } else {
          $data['message'] = '<div class="alert alert-error">' . lang("UploadError") . '<button data-dismiss="alert" class="close" type="button">×</button></div>';
          $data['data'] = $this->input->post('Cform');
        }
      }
    }
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/products2_form', $data);
    $this->load->view('customer/global/footer');
  }

//*****************************************************************
  public function delete($slug) {

    /*
    if ($slug > 0) {
      $this->data->delete("products", $slug);
    }
    */
    $data=array('customer_del'=>'0');
    $this->db->where('id',$slug);
    $this->db->update('products',$data);
    redirect('products', 'refresh');
  }
  
  public function edit_product_confirm($id)
  {
      $data=$this->input->post('Cform');
      $m=$this->data->get_product($id);
      $pic=$m[0]['photo'];
      $photo = $_FILES['photo_to_up']['name'];
      	$path='';
		  if(!empty($photo)){
		      try {
                  $this->upload->initialize($this->set_photoupload_options());
                  if (!$this->upload->do_upload('photo_to_up')) {
                  } else {
                      $filedata = $this->upload->data();
                      //$path = $filedata['file_name'];
                      $path = base_url().'download/products/'.$filedata['file_name'];
                  }
              }catch(Exception $e){
		          echo $e;
              }
			}else{
				$path = $pic;
			}
		   	$data['photo']=$path;

      if (!empty($_REQUEST)) {
          $productIDs=$_REQUEST['productid'];
          $query = $this->db->query("SELECT * FROM product_chemical_composition WHERE product_id=$productIDs");
          $query->result();

          if($query->result_object[0]->product_id !='') {

              $sqldel ="DELETE FROM `product_chemical_composition` WHERE `product_id` =$productIDs";
              $this->db->query($sqldel);

              foreach ($_REQUEST['x'] as $keys => $values) {
                  $chemicalName = $values['chemical_name'];
                  $chemicalValue = $values['chemical_value'];
                  $chemicalNameEn = $values['chemical_name_en'];
                  $chemicalValueEn = $values['chemical_value_en'];
                  $sql ="INSERT INTO `product_chemical_composition` (`product_id`, `chemical_name`, `chemical_value`, `chemical_name_en`, `chemical_value_en`, `status`) VALUES ('$productIDs', '$chemicalName', '$chemicalValue', '$chemicalNameEn', '$chemicalValueEn', '1')";
                  $this->db->query($sql);
              }

              $query2 = $this->db->query("SELECT * FROM coupon_products WHERE product_id=$productIDs");
              $query2->result();
                if($query2->result_object[0]->product_id !=''){
                    $sqlprocou = "DELETE FROM `coupon_products` WHERE `product_id` =$productIDs";
                    $this->db->query($sqlprocou);

                    $couponID = $_REQUEST['couponcodeSelId'];
                    $status = '1';
                    $sqlcoupon = "insert into coupon_products (product_id, coupon_id, status) values ('$productIDs', '$couponID', '$status')";
                    $this->db->query($sqlcoupon);
                }
          }
      }
	  $this->data->update_product($id,$data);
      redirect('products','refresh');
  }
  
  
  
	private function set_photoupload_options1()
	{   
		//upload an image options
		$conf = array();
		$config['upload_path'] = '././download/products/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}

    private function set_photoupload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = '././download/products/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        return $config;
    }

  public function edit_product($id)
  {
    $vendor_id=$this->session->userdata('logged_in_customer');
    $vendor=$vendor_id['id'];
    $data['coupon']=$this->data->get_coupon($vendor);

    $data['productchemicalcomposition']=$this->data->edit_product_ch_composition($id);

    $data['product']=$this->data->get_product($id);
	$this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/edit_product', $data);
    $this->load->view('customer/global/footer');
  }

}
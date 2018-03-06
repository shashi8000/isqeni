<?php if (!defined('BASEPATH')) exit('.');

class Coupon extends CI_Controller {

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
          if (!($this->data->delete("coupon", $check))) {
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
    $paging["base_url"] = base_url() . $index_Page . "administrator/coupon/index";
    $paging["first_url"] = base_url() . $index_Page . "administrator/coupon/index" . $this->config->item('url_suffix');
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
    $data['coupon'] = $this->data->get("vouchers", FALSE, array("id >" => 0), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
    $data["links"] = $this->pagination->create_links();
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/coupon_table', $data);
    $this->load->view('administrator/global/footer');

	}


    public function add() {
        $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Vouchers" ;
        $data['Title']         = "عن التطبيق" ;
		$data['vouchers'] = $this->data->get("vouchers", FALSE, array("id_admin" => 1), FALSE, TRUE);
		$data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
        $this->load->library('form_validation');
        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/vouchers_add',$data);
        $this->load->view('administrator/global/footer');
    }

	 public function addadmin() {
        $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Vouchers" ;
        $data['Title']         = "عن التطبيق" ;
		$data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
        $this->load->library('form_validation');
        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/vouchers_addadmin',$data);
        $this->load->view('administrator/global/footer');
    }

	public function random_number($size = 7)
	{
		$random_number='';
		$count=0;
		while ($count < $size ) 
			{
				$random_digit = mt_rand(0, 9);
				$random_number .= $random_digit;
				$count++;
			}
		return $random_number;  
	}


	public function addadmin_voucher(){
		$randomvalue=$this->random_number();
		$vouchervalue='ISQ'.$randomvalue;
		$data = $this->input->post('Cform');
			if($data !=''){
			$this->data = array(
				'coupon_title' => $data['coupon_title'],
				'start_date' => $data['start_date'],
				'end_date' =>$data['end_date'],
				'status' => $data['status'],
				'type' => $data['type'],
				'value' =>$data['value'],
				'coupon_code' =>$vouchervalue,
				'id_admin' =>'1'
			); 
			$this->db->insert('vouchers', $this->data); 
		    redirect('administrator/coupon/addadmin');
		}
	}


 

    public function add_voucher(){

		$data = $this->input->post('Cform');
        	if($data !=''){
				$couponID = $_REQUEST['Cform']['coupon'];
				$companyid = $_REQUEST['Cform']['cat_id'];
				$this->db->select('*');
				$this->db->from('products');
				$this->db->where('cat_id',$companyid);
				$query = $this->db->get();
				$rows = $query->result();
                foreach($rows as $row){
                    $productID=$row->id;
                    $sqlDelete = "delete from coupon_products where product_id='".$productID."' AND coupon_id='".$couponID."'";
                    $this->db->query($sqlDelete);
                }
				foreach($_REQUEST['Cform']['productcheck'] as $val){
					    $status = '1';
						$sqlcoupon = "insert into coupon_products (product_id, coupon_id, status) values ('$val', '$couponID', '$status')";
						$this->db->query($sqlcoupon);
				}
		}
		redirect('administrator/coupon/add');
    }

    function delete_coupon($id)
    {
        $this->data->delete_coupon($id);
        redirect('administrator/coupon/coupon','refresh');

    }

function edit_coupon($id)
  {
      $data['coupon_data']=$this->data->get_single_coupon($id);
      $this->load->library('form_validation');
        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/edit_coupon',$data);
        $this->load->view('administrator/global/footer');  

      /*
      $this->load->view('customer/global/header');
      $this->load->view('customer/global/topbar');
      $this->load->view('customer/global/menu');
      $this->load->view('customer/pages/edit_coupon',$data);
      $this->load->view('customer/global/footer');
      */ 
  }

  function edit_coupon_confirm($id)
  {
      $data=$this->input->post('Cform');
      $this->data->update_coupon($id,$data);
      redirect('administrator/coupon/index');
  }

	public function emailpush(){

		$userEmail='amit.sinha02@techconlabs.com';
        $subject='Customer Registration';
        $config = Array(       
            'mailtype' => 'html',
             'charset' => 'utf-8',
             'priority' => '1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
   
        $this->email->from('amit.sinha02@techconlabs.com', 'isqeni');
        $data = array(
             'userName'=> 'Amit Kumar'
                 );
        $this->email->to($userEmail);   
        $this->email->subject($subject);  
   
        $body = $this->load->view('administrator/emails/emailpush.php',$data,TRUE);
        $this->email->message($body);  
        $this->email->send();
    }

    /*
    public function couponcode()
    {
        //$sqlcoupon = "SELECT p.id as pid, p.prod_num_en as productname_en, p.name as name_ar,cp.product_id as cpid from products as p left join coupon_products as cp on cp.product_id = p.id left join vouchers as v ON cp.coupon_id=v.id  WHERE p.cat_id=".$_REQUEST['com'];
        $sqlcoupon = "SELECT * from products as p WHERE p.cat_id=".$_REQUEST['com'];
        $query=$this->db->query($sqlcoupon);
        $rows = $query->result();

        $sqlcop = "SELECT * from coupon_products as cop WHERE cop.coupon_id=".$_REQUEST['cop'];
        $querycop=$this->db->query($sqlcop);
        $rowscops = $querycop->result();

        ?>
        <div>
            <table class="table table-striped table-bordered bootstrap-datatable">
                <tbody>
                <tr>
                    <th>Check Product</th>
                    <?php if($this->config->config['language'] =='english'):?>
                    <th>Product Name</th>
                    <?php else : ?>
                    <th>Product Name AR</th>
                    <?php endif; ?>

                </tr>
                </tbody>

               <?php foreach($rows as $index =>$row ){ ?>
                <tr>
                    <td><input type="checkbox" name="Cform[productcheck][]" value="<?php echo $row->id; ?>" <?php if($rowscops[$index] !=''){ echo 'checked'; }else{ echo '';} ?> class="required"/></td>
                   <?php if($this->config->config['language'] =='english'):?>
                    <td><?php echo $row->name_en;?></td>
                   <?php else : ?>
                    <td><?php echo $row->name;?></td>
                   <?php endif; ?>
                </tr>
                <?php } ?>
            </table>
        </div>



        <?php
        //echo '<pre>';
       //print_r($rows);exit();


    }
    */
    public function couponcode()
    {
        //$sqlcoupon = "SELECT p.id as pid, p.prod_num_en as productname_en, p.name as name_ar,cp.product_id as cpid from products as p left join coupon_products as cp on cp.product_id = p.id left join vouchers as v ON cp.coupon_id=v.id  WHERE p.cat_id=".$_REQUEST['com'];
        $sqlcoupon = "SELECT * from products as p WHERE p.cat_id=".$_REQUEST['com'];
        $query=$this->db->query($sqlcoupon);
        $rows = $query->result();
        ?>
        <div>
            <table class="table table-striped table-bordered bootstrap-datatable">
                <tbody>
                <tr>
                    <th>Check Product</th>
                    <?php if($this->config->config['language'] =='english'):?>
                        <th>Product Name</th>
                    <?php else : ?>
                        <th>Product Name AR</th>
                    <?php endif; ?>
                </tr>
                </tbody>
                <?php
                foreach($rows as $index =>$row ){
                    $sqlcop = "SELECT * from coupon_products as cop WHERE product_id=".$row->id." and  cop.coupon_id=".$_REQUEST['cop'];
                    $querycop=$this->db->query($sqlcop);
                    $rowscops = $querycop->result();
                    ?>
                    <tr>
                        <td><input type="checkbox" name="Cform[productcheck][]" value="<?php echo $row->id; ?>"  <?php if( !empty($rowscops)){ echo 'checked'; }else{ echo '';} ?> class="required <?php //echo $rowscops[$index];?>"/></td>
                        <?php if($this->config->config['language'] =='english'):?>
                            <td><?php echo $row->name_en;?></td>
                        <?php else : ?>
                            <td><?php echo $row->name;?></td>
                        <?php endif; ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php
    }

 

 
}
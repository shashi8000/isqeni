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
      $sessiondata = $this->session->userdata('logged_in_customer');
      if (!$sessiondata) {
          redirect(site_url("customers"));
      }

       //$sessiondata=$this->session->userdata('logged_in_customer');
       // echo $sessiondata['id'];

       //echo $vendor_id;
           $sqldriver = "SELECT * from vendor_permission_managemrnt where setting_type =6 and  vendor_id=".$sessiondata['id']." ";
            $query=$this->db->query($sqldriver);
            $valPer = $query->result_array();
         
            if(empty($valPer)){
                redirect(site_url("dashboard"));
            }
           

  }

  
  public function add() {
    $data['langId']        = FALSE ;
    $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
    $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
    $data['method']        = "Vouchers" ;
    $data['Title']         = "عن التطبيق" ;
    $this->load->library('form_validation');
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/vouchers_add_view',$data);
    $this->load->view('customer/global/footer');
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

  public function add_voucher()
  {
	 $data = $this->input->post('Cform');
     $companyname=strtoupper(substr($this->session->userdata['logged_in_customer']['name_en'], 0, 3));
     $randomvalue=$this->random_number();
     $vouchervalue=$companyname.$randomvalue;
     $vendor_id=$this->session->userdata('logged_in_customer');
	 $vendor=$vendor_id['id'];
	 $data['vendor_id']=$vendor;
	 $data['coupon_code']=$vouchervalue;
	 $this->data->save_voucher($data);	 
     redirect('coupon/add');
  }

  function edit_coupon($id)
  {
	  $data['coupon_data']=$this->data->get_single_coupon($id);
      $this->load->view('customer/global/header');
      $this->load->view('customer/global/topbar');
      $this->load->view('customer/global/menu');
      $this->load->view('customer/pages/edit_coupon',$data);
      $this->load->view('customer/global/footer'); 
  }
  
  
  function edit_coupon_confirm($id)
  {
	  $data=$this->input->post('Cform');
	  $this->data->update_coupon($id,$data);
	  redirect('coupon/view_coupon','refresh');
  }
  
  function delete_coupon($id)
  {
	$this->data->delete_coupon($id);
	redirect('coupon/view_coupon','refresh');  
	  
  }
  
  function view_coupon()
  {
	$vendor_id=$this->session->userdata('logged_in_customer');
	$vendor=$vendor_id['id'];
	$data['coupon']=$this->data->get_coupon($vendor);
	$this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/view_coupon',$data);
    $this->load->view('customer/global/footer'); 
  }

    public function adds() {
        $vendor_id=$this->session->userdata('logged_in_customer');
        $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Vouchers" ;
        $data['Title']         = "عن التطبيق" ;
        $data['vouchers']      = $this->data->get("vouchers", FALSE, array("vendor_id" => $vendor_id, "id_admin" => '0'), FALSE, TRUE);
        $data['cats']          = $this->data->get("cats", FALSE, array("id" => $vendor_id), FALSE, TRUE);

        $this->load->library('form_validation');
        $this->load->view('customer/global/header');
        $this->load->view('customer/global/topbar');
        $this->load->view('customer/global/menu');
        $this->load->view('customer/pages/vouchers_add',$data);
        $this->load->view('customer/global/footer');
    }

	public function add_vouchercustomer(){

        $data = $this->input->post('Cform');
        if($data !=''){
            $couponID = $_REQUEST['Cform']['coupon'];
            $companyid = $_REQUEST['Cform']['cat_id'];
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where('cat_id', $companyid);
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
        redirect('coupon/view_coupon');
    }

    public function couponcode()
    {
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
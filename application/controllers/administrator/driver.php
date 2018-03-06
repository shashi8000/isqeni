<?php defined('BASEPATH') or exit('.');

class Driver extends CI_Controller{
  
  public function __construct()
	{
		 parent::__construct();
         $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
         $this->load->library("pagination");
         if($this->session->userdata('admin_lang') == FALSE)
         {
           $data['admin_lang'] = $setting['admin_lang'] ;
           $this->session->set_userdata($data);
         }
          $this->lang->load("admin",$this->setting->getLang($this->session->userdata('admin_lang')))  ;
          $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
      if($this->session->userdata('logged_in_admin') != TRUE )
        {
          redirect(site_url("administrator/login"));
        }
        if (!in_array("1",$this->session->userdata('permi')))
        {
          if(!in_array("7",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
  






  public function add()
  {
    $data['langId']        = FALSE ;
      if($this->uri->segment(3))
      {
        $data['data']          = $this->data->get("products",$data['langId'],array("id"=>$this->uri->segment(3))) ;
        $data['id']            = $this->uri->segment(3) ;
      }
      else
      {
        $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'prod_num'=>"رقم المنتج",
    	'name'=>"الاسم بالعربي",
    	'name_en'=>"الاسم بالأنجليزي",
    	'price'=>"السعر",
    	'cat_id'=>"القسم",
      'min_charge'=>"الحد الأدنى للتوصيل"
    	// 'text2'=>"الوصف بالعربي",
    	// 'text2_en'=>"الوصف بالانجليزي"
    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_rules("Cform[discount]", "نسبة الخصم", 'numeric');
        if((isset($_FILES['photo_to_up']['name']) && empty($_FILES['photo_to_up']['name'])) &&  empty($data['data']['photo']))
        {
           $this->form_validation->set_rules("photo", "الصوره", 'required');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("products",$data['langId'],array("id"=>$this->uri->segment(3))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }
    	}
      }
       $data['cats']        = $this->data->get("cats",FALSE,array("parent"=>0),FALSE,TRUE) ;
       $data['branchs']     = $this->data->get("branchs",FALSE,array("id >"=>0),FALSE,TRUE) ;
       $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/add_driver',$data);
       $this->load->view('administrator/global/footer');
    
  }
  
  
  public function view_all()
  {
	  //$vendor_id=$this->session->userdata('logged_in_customer');
	  $vendor=$this->input->post('vandor');
	  
	  
	  
	  
	  $searchbyname = $this->input->post('searchbyname');
if(isset($_REQUEST['vendor']) && isset($_REQUEST['searchbyname']) && ($_REQUEST['vendor']!='' && $_REQUEST['searchbyname']!='')){

            $sqldriver = "SELECT * from drivers where deleted_at IS  NULL and vendor_id=".$_REQUEST['vendor']." and ( name_en like '%".$_REQUEST['searchbyname']."%' or name_ar like '%".$_REQUEST['searchbyname']."%' or mobile like '%".$_REQUEST['searchbyname']."%' or car_type_en like '%".$_REQUEST['searchbyname']."%' or car_type_ar like '%".$_REQUEST['searchbyname']."%' or car_number like '%".$_REQUEST['searchbyname']."%'  or driver_licence_number like '%".$_REQUEST['searchbyname']."%' or driver_email like '%".$_REQUEST['searchbyname']."%')";
            $query=$this->db->query($sqldriver);
            $data['driver_list'] = $query->result_array();
        }else if(isset($_REQUEST['vendor']) && isset($_REQUEST['searchbyname']) && ($_REQUEST['vendor']=='' && $_REQUEST['searchbyname']!='')){
            $sqldriver = "SELECT * from drivers where deleted_at IS  NULL and  (name_en like '%".$_REQUEST['searchbyname']."%' or name_ar like '%".$_REQUEST['searchbyname']."%' or mobile like '%".$_REQUEST['searchbyname']."%' or car_type_en like '%".$_REQUEST['searchbyname']."%' or car_type_ar like '%".$_REQUEST['searchbyname']."%' or car_number like '%".$_REQUEST['searchbyname']."%'  or driver_licence_number like '%".$_REQUEST['searchbyname']."%' or driver_email like '%".$_REQUEST['searchbyname']."%')";
            $query=$this->db->query($sqldriver);
            $data['driver_list'] = $query->result_array();
        }else if(isset($_REQUEST['vendor']) && isset($_REQUEST['searchbyname']) && ($_REQUEST['vendor']=='' && $_REQUEST['searchbyname']=='')){
            $data['driver_list'] = $this->data->driver_data_all();
        }else if(isset($_REQUEST['vendor']) && isset($_REQUEST['searchbyname']) && ($_REQUEST['vendor']!='' && $_REQUEST['searchbyname']=='')){
            $sqldriver = "SELECT * from drivers where deleted_at IS  NULL and vendor_id=".$_REQUEST['vendor']." ";

           
            $query=$this->db->query($sqldriver);
            $data['driver_list'] = $query->result_array();
        }else{
            $data['driver_list'] = $this->data->driver_data_all();
        }
      $data['cats'] = $this->data->get("cats",FALSE,array()) ;  
     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/view_all',$data);
     $this->load->view('administrator/global/footer');
	
	
	
  }
  
public function exportExcelData($records)
{
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }

public function fetchDataFromTable()
{
     
//////////////////////////////
 // echo $_REQUEST['cat_id'];
   
       $query = $this->db->query("select * from drivers ");
       $data['data']=$query->result_array();

     

     $dataToExports = [];
     foreach ($data['data'] as $data) {
 
        $dataVal = $this->comany_name($data['vendor_id']);
        $arrangeData[lang("Companies")] = $dataVal;
        $arrangeData[lang('Name_In_English')] = $data['name_en'];
        $arrangeData[lang('Name_In_Arabic')] = $data['name_ar'];
        $arrangeData[lang("Car_Type_English")] = $data['car_type_en'];
        $arrangeData[lang("Car_Type_Arabic")] = $data['car_type_ar'];
         $arrangeData[lang("Car_Color_English")] = $data['car_color_en'];
        $arrangeData[lang("Car_Color_Arabic")] = $data['car_color_ar'];
        $arrangeData[lang("Car_Plate_Number")] = $data['car_number'];
        $arrangeData[lang("Driving_licence")] = $data['driver_licence_number'];
        $arrangeData[lang("Mobile")] = $data['mobile'];
        $arrangeData[lang("driver_email")] = $data['driver_email'];

        $dataToExports[] = $arrangeData;
      
  }

  //echo '<pre>';
  //print_r($dataToExports);
  //exit();
 $filename = "driver-".date('Y-m-d').".xls";
// header( 'Content-Type: text/csv; charset=utf-8; encoding=UTF-8' ); 
 header('Content-Transfer-Encoding: binary');
 header("Content-type:text/html; charset=utf-8");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
  exit(); 
 }


public function comany_name($id){

       $query = $this->db->query("select * from cats where id=".$id);
       $data =$query->result_array();  
      //echo $data[0]['name'].' '.$data[0]['name_en'];
       return $data[0]['name'].' '.$data[0]['name_en'];

}


  public function add_driver()
  {

    $data = $this->input->post();
	$data['image']=$_FILES['photo']['name'];
	$photo = $_FILES['photo']['name'];
		if(!empty($photo)){
					$this->upload->initialize($this->set_photoupload_options());
							$this->upload->do_upload('photo');
							$filedata = $this->upload->data();
							$path = base_url().'download/driver/'.$filedata['file_name'];
							$data['image']=$path;
							$data['created_at']=date('d.m.y');
							$data['status']='1';
							//$vendor_id=$this->session->userdata('logged_in_customer');
							//$vendor=$vendor_id['id'];
							$data['driver_email']=$data['driver_email'];
							$data['password']=md5($data['password']);
							//$data['vendor_id']=$vendor;
					$this->db->insert('drivers',$data);
					redirect('administrator/driver/view_all');
			}
  }
  
 	
	private function set_photoupload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = '././download/driver/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}
	
	public function delete_driver($id)
	{
		
		
		
$this->data->delete_driver($id);
redirect('administrator/driver/view_all','refresh');

		/* $this->load->view('customer/global/header');
       $this->load->view('customer/global/topbar');
       $this->load->view('customer/global/menu');
       $this->load->view('customer/pages/edit_driver',$data);
       $this->load->view('customer/global/footer');  */
	}
	
	
	
	
	public function edit_driver($id)
	{
		
		
		$data['driverm']=$this->data->driver($id);
		
		
	 $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/edit_driver',$data);
       $this->load->view('customer/global/footer'); 
    
	}
	
	public function edit_driver_confirm($id)
	{
	$m=$this->data->driver($id);
	$pic=$m[0]['image'];
		   $data = $this->input->post();
		   $photo = $_FILES['photo']['name'];
		  $path='';
		  if(!empty($photo)){
				$this->upload->initialize($this->set_photoupload_options());
				//$this->upload->do_upload();
				if ( ! $this->upload->do_upload('photo')){
					
					
				}
				else{
					$filedata = $this->upload->data();
					$path = $filedata['file_name'];
				}
			}else{
				$path = $pic;
			}
		 
		   	$data['image']=$path;
		   
		
		$this->data->update_driver($id,$data);
		redirect('driver/view_all','refresh');
	}
  
}
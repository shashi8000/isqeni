<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rec extends CI_Controller {

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
          if(!in_array("4",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {
      $data['langId']        = FALSE ;
      $setting = $this->setting->get();
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');

        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if($check > 3) {
               if(! ($this->data->delete("rec",$check)))
               {
                 echo "<script>alert('".lang("NonDelete")."');</script>";
               }
             }
           }
        }
        else
        {
          echo "<script>alert('".lang("NonSelect")."');</script>";
        }
      }
      //********************* Search *********************************
       $arraySearch = array("id >"=>0) ;
       $queryString = "";
      $clinic_id  = $this->input->get('clinic_id') ;
      $doctor_id  = $this->input->get('doctor_id') ;
      $client_id  = $this->input->get('client_id') ;
      $cat_id   = $this->input->get('cat_id') ;
      if($doctor_id != FALSE && !empty($doctor_id))
         {
           $arraySearch['doctor_id'] = $doctor_id ;
         }
       if($clinic_id != FALSE && !empty($clinic_id))
       {
         $arraySearch['clinic_id'] = $clinic_id ;
       }
       if($client_id != FALSE && !empty($client_id))
       {
         $arraySearch['client_id'] = $client_id ;
       }
       if($cat_id != FALSE && !empty($cat_id))
       {
         $arraySearch['cat_id'] = $cat_id ;
       }

      if($this->input->get("page"))
        {
           $QUERY_STRING = "&doctor_id=".$this->input->get("doctor_id")."&clinic_id=".$this->input->get("clinic_id")."&cat_id=".$this->input->get("cat_id")."&client_id=".$this->input->get("client_id");
        }
        else
        {
           $QUERY_STRING = "?".$_SERVER['QUERY_STRING'] ;
        }


       //***********************************************************
        $data['setting']['data_in_page'] = 10 ;
        $index_Page = $this->config->item('index_page');
        if($index_Page == "index.php"){$index_Page = $index_Page."/";}
        $paging["base_url"] = base_url().$index_Page."administrator/rec/index";
        $paging["first_url"] = base_url().$index_Page."administrator/rec/index".$this->config->item('url_suffix').$queryString;
        $paging["suffix"] = $this->config->item('url_suffix').$queryString;;
        $paging["total_rows"] = $this->data->countTable("rec",$arraySearch);
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['data']   = $this->data->get("rec",FALSE,$arraySearch,FALSE,TRUE,array("id"=>"desc"),array($data['setting']['data_in_page']=>$page));
        $data["links"] = $this->pagination->create_links() ;

        $data['cats']     = $this->data->get("cats");
        $data['clinics']  = $this->data->get("clinic");
        $data['doctors']  = $this->data->get("doctors");
        $data['clients']  = $this->data->get("clients",FALSE,array("utype"=>"user"),FALSE,TRUE);

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/rec_table',$data);
     $this->load->view('administrator/global/footer');
   }
   public function add()
   {
      $data['langId']        = FALSE ;
      if($this->uri->segment(4) && $this->uri->segment(4) > 3 && $this->uri->segment(5) == FALSE )
      {
        $data['data']          = $this->data->get("section",FALSE,array("id"=>$this->uri->segment(4))) ;
        $data['id']            = $this->uri->segment(4) ;
        $data['parent']         = $data['data']['parent'] ;
      }
      else if($this->uri->segment(4) && $this->uri->segment(5) && $this->uri->segment(5) == 1)
      {
        $data['id'] = 0 ;
        $data['parent']         = $this->uri->segment(4) ;
      }
      else
      {
        redirect('administrator/sections', 'refresh');
      }

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {

         $this->form_validation->set_rules("Cform[name]","الأسم", 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("section",FALSE,array("id"=>$data['id'])) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }

    	}
      }
       $data['sections'] = $this->data->get("section",FALSE,array("id !="=>$data['id']),FALSE,TRUE);
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/section_form',$data);
       $this->load->view('administrator/global/footer');
   }


//*****************************************************************
   public function delete($slug)
	{
		if($slug > 3)
		{
		  	$this->data->delete("rec",$slug);
		}
    	redirect('administrator/rec', 'refresh');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
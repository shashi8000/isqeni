<?php
class Setting extends CI_Model
{

	public function get()
	{
          $this->db->select('admin_lang');
          $this->db->from("setting");
          $query = $this->db->get();
          $setting =  $query->row_array();

          $this->db->select('*');
          $this->db->from("setting");
          $lang   = $setting['admin_lang'] ;
          if($this->db->table_exists("setting_lang"))
          {
            $this->db->join("setting_lang", 'id = parent_id AND lang_id='.$lang.'');
          }
    	  $query = $this->db->get();
          return $query->row_array();
	}
    public function getLang($lang)
    {
       $this->db->select('name');
       $this->db->from("lang");
       $this->db->where("id",$lang);
       $query = $this->db->get();

       $result = $query->row_array();

       return $result['name'];

    }
	/*****************************************************/
	public function save()
	{
	$this->load->helper('url');
	$data = $this->input->post('Cform');

      if($this->db->update("setting", $data))
      {
         return TRUE;
      }
      return FALSE;
	}
    function changeAdminLang()
    {
        if($this->input->post('lang_submit'))
        {
          $data['admin_lang'] = $this->input->post('lang_submit') ;
          $this->session->set_userdata($data);
        }

    }
    function changeLang()
    {
        if($this->input->post('lang_submit'))
        {
          $data['site_lang'] = $this->input->post('lang_submit') ;
          $this->session->set_userdata($data);
          //$this->db->update("setting", $data);
        }

    }



}
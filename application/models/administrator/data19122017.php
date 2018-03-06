<?php
class Data extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	/************************************************/
	public function get($table,$lang = FALSE,$array = FALSE,$limit = FALSE,$multi = FALSE,$order_by = FALSE,$paging = FALSE,$select = FALSE)
	{
    	  if($select == FALSE)
            {
               $this->db->select('*');
            }
            else
            {
              foreach($select AS $name=>$alias)
              {
                  $this->db->select(''.$name.' AS '.$alias.'');
              }
            }
          $this->db->from($table);
          if($lang !== FALSE)
          {
            $this->db->join("".$table."_lang", 'id = parent_id AND lang_id='.$lang.'');
          }
          if($array !== FALSE)
          {
            foreach($array  as $field=>$slug)
            {
              if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                if($field == "searchName")
                {
                  $this->db->like("name",$slug);
                }else if($field == "searchTitle")
                {
                  $this->db->like("title",$slug);
                  $this->db->or_like("text2",$slug);
                }
                else if($field == "searchText")
                {
                  //$this->db->or_like("text2",$slug);
                  $this->db->where("( name LIKE '%".$slug."%' OR text2 LIKE '%".$slug."%' OR name_en LIKE '%".$slug."%' OR text2_en LIKE '%".$slug."%' )");
                }
                else if($field == "cats")
                {
                  $this->db->where("FIND_IN_SET('".$slug."',".$field.") !=", 0);
                }
                else
                {
                  $this->db->where($field,$slug);
                }
              }
            }
          }
          if($limit !== FALSE)
          {
            if($order_by !== FALSE)
            {
               foreach($order_by  as $field=>$slug)
                {
                  $this->db->order_by($field,$slug);
                }
            }
            else
            {
              $this->db->order_by('id','asc');
            }
            $this->db->limit($limit);
          }
          else
          {
            if($order_by !== FALSE)
            {
               foreach($order_by  as $field=>$slug)
                {
                  $this->db->order_by($field,$slug);
                }
            }
            else
            {
              $this->db->order_by('id','desc');
            }
          }
          if($paging !== FALSE)
          {
            foreach($paging  as $limi=>$start)
            {
               $this->db->limit($limi,$start);
            }
          }
    	    $query = $this->db->get();
            if($array === FALSE)
            {
              if($limit !== FALSE && $limit == 1)
              {
               return $query->row_array();
              }
              return $query->result_array();
            }
            if($multi !== FALSE)
            {
              return $query->result_array();
            }
            if($query->num_rows() == 1)
            {
              return $query->row_array();
            }
            return $query->result_array();
	}
	/*****************************************************/
    public function check($table,$lang = FALSE,$array)
      {
        $this->db->select('*');
        $this->db->from($table);
        if($lang !== FALSE)
          {
            $this->db->join("".$table."_lang", 'id = parent_id AND lang_id='.$lang.'');
          }
        foreach($array  as $field=>$slug)
          {
            if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                 $this->db->where($field,$slug);
              }
          }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return TRUE ;
          }
          return FALSE ;
      }
      public function check2($table,$lang = FALSE,$array)
      {
        $this->db->select('*');
        $this->db->from($table);
        if($lang !== FALSE)
          {
            $this->db->join("".$table."_lang", 'id = parent_id AND lang_id='.$lang.'');
          }
        foreach($array  as $field=>$slug)
          {
            if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                 $this->db->where($field,$slug);
              }
          }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return 1 ;
          }
          return 0 ;
      }
    //*****************************************************
    public function search($table,$lang = FALSE,$array)
    {
      $this->db->select('*');
        $this->db->from($table);
        if($lang !== FALSE)
          {
            $this->db->join("".$table."_lang", 'id = parent_id AND lang_id='.$lang.'');
          }
        foreach($array  as $field=>$slug)
          {
            $this->db->like($field,$slug);
          }
        $query = $this->db->get();
        return $query->result_array();
    }
    //*****************************************************
    public function upload($path,$fname,$types,$w = FALSE,$h = FALSE,$watermark = FALSE,$isThumb = FALSE,$Tw = FALSE,$Th = FALSE)
	{
		$config['upload_path'] = $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = '99999999999';
		$config['max_width'] = '999999';
		$config['max_height'] = '999999';
        $ext = pathinfo($_FILES[''.$fname.'']['name'], PATHINFO_EXTENSION);
        sleep(1);
		$new_file_name = time().".".$ext;
	  //	$new_file_name = str_replace(" ","_",$new_file_name) ;
		$config['file_name'] = $new_file_name;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload($fname)){
          return FALSE ;
		}
		else {
		    $fInfo = $this->upload->data();
		}
        $this->load->library('image_lib');
        if($isThumb !== FALSE && (($Tw !== FALSE && $Th !== FALSE )||( !empty($Tw) && !empty($Th))))
        {
          $resize['source_image'] = $path.$new_file_name;
          $resize['create_thumb'] = TRUE;
          $resize['maintain_ratio'] = FALSE;
          $resize['width'] = $Tw;
          $resize['height'] = $Th;
          $this->image_lib->initialize($resize);
          $this->image_lib->resize();
        }
       if(($w !== FALSE && $h !== FALSE ))
        {
          $resize['source_image'] = $path.$new_file_name;
          $resize['create_thumb'] = FALSE;
          $resize['maintain_ratio'] = FALSE;
          $resize['width'] = $w;
          $resize['height'] = $h;
          $this->image_lib->initialize($resize);
          $this->image_lib->resize();
        }
        if($watermark !== FALSE)
        {
          $setting = $this->data->get("setting",FALSE,FALSE,1) ;
          $config2['source_image'] = $path.$new_file_name;
          $config2['new_image'] = $path.$new_file_name;
          $config2['wm_overlay_path'] = "./download/".$setting['watermark'];
          $config2['wm_type'] = 'overlay';
          $config2['wm_vrt_alignment'] = 'bottom';
          $config2['wm_hor_alignment'] = 'left';
          $this->image_lib->initialize($config2);
          $this->image_lib->watermark();
        }
        if($watermark !== FALSE && $isThumb !== FALSE)
        {
          $ph = explode(".",$new_file_name) ;
          $count = count($ph) ;
          $ph[$count-2] = $ph[$count-2]."_thumb";
          $new_file_name2 = implode(".",$ph) ;
          $setting = $this->data->get("setting",FALSE,FALSE,1) ;
          $config3['source_image'] = $path.$new_file_name2;
          $config3['new_image'] = $path.$new_file_name2;
          $config3['wm_overlay_path'] = "./download/".$setting['watermark'];
          $config3['wm_type'] = 'overlay';
          $config3['wm_vrt_alignment'] = 'bottom';
          $config3['wm_hor_alignment'] = 'left';
          $this->image_lib->initialize($config3);
          $this->image_lib->watermark();
        }
			return $new_file_name;
	  }
    //******************
	public function save()
	{
	$row_id         = $this->input->post('id');
	$lan_id         = $this->input->post('lang_id');
	$table          = $this->input->post('table');
	$data           = $this->input->post('Cform');
	$Ldata          = $this->input->post('LCform');
    $path           = $this->input->post('path');
    $types          = $this->input->post('types');
    $width          = $this->input->post('width');
    $height         = $this->input->post('height');
    $watermark      = $this->input->post('watermark');
    $isThumb        = $this->input->post('isthumb');
    $ThumbWidth     = $this->input->post('twidth');
    $ThumbHeight    = $this->input->post('theight');
    $must_upload    = $this->input->post('must_upload');
    $photo_lang     = $this->input->post('photo_lang');
    $file_lang      = $this->input->post('file_lang');
    if($width == FALSE){$width = '';}
    if($height == FALSE){$height = '';}
    $permission = $this->input->post('permission');
    $cats = $this->input->post('cats');
    $tags = $this->input->post('tags');
    $related = $this->input->post('related');
    $target = $this->input->post('target');
    if(isset($tags) && $tags !== FALSE)
    {
      $data['tags'] = implode(",",$tags) ;
    }
    if(isset($related) && $related !== FALSE)
    {
      $data['related'] = implode(",",$related) ;
    }
    if(isset($permission) && $permission !== FALSE)
    {
      $data['permission'] = implode(",",$permission) ;
    }
    if(isset($cats) && $cats !== FALSE)
    {
      $data['cats'] = implode(",",$cats) ;
    }
    //var_dump($data['cats']);die;
    if(isset($_FILES['photo_to_up']['name']) && trim($_FILES['photo_to_up']['name'])!='')
        {
            if($table == "products"){
                $width = 400 ;
                $heaight = 222 ;
            }
           $file_name = $this->data->upload($path,"photo_to_up",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo'] = $file_name ;
            }
            else
            {
              $data['photo'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['photo_to_up1']['name']) && trim($_FILES['photo_to_up1']['name'])!='')
        {
            if($table == "products"){
                $width = 400 ;
                $heaight = 222 ;
            }
           $file_name = $this->data->upload($path,"photo_to_up1",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo1'] = $file_name ;
            }
            else
            {
              $data['photo1'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['photo_to_up2']['name']) && trim($_FILES['photo_to_up2']['name'])!='')
        {
            if($table == "products"){
                $width = 400 ;
                $heaight = 222 ;
            }
           $file_name = $this->data->upload($path,"photo_to_up2",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo2'] = $file_name ;
            }
            else
            {
              $data['photo2'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['photo_to_up3']['name']) && trim($_FILES['photo_to_up3']['name'])!='')
        {
            if($table == "products"){
                $width = 400 ;
                $heaight = 222 ;
            }
           $file_name = $this->data->upload($path,"photo_to_up3",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo3'] = $file_name ;
            }
            else
            {
              $data['photo3'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['photo_to_up4']['name']) && trim($_FILES['photo_to_up4']['name'])!='')
        {
           $file_name = $this->data->upload($path,"photo_to_up4",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo4'] = $file_name ;
            }
            else
            {
              $data['photo4'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['photo_to_up5']['name']) && trim($_FILES['photo_to_up5']['name'])!='')
        {
           $file_name = $this->data->upload($path,"photo_to_up5",$types,$width,$height,$watermark,$isThumb,$ThumbWidth,$ThumbHeight);
           if($file_name !== FALSE)
           {
             if($table == "ads")
             {
               $file_name = base_url()."download/adss/".$file_name ;
             }
             else
             {
               $file_name = base_url()."download/".$table."/".$file_name ;
             }
             if(isset($photo_lang) && $photo_lang == 1)
            {
              $Ldata['photo5'] = $file_name ;
            }
            else
            {
              $data['photo5'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['water_to_up']['name']) && trim($_FILES['water_to_up']['name'])!='')
        {
           $file_name = $this->data->upload($path,"water_to_up",$types,400,222,FALSE);
           if($file_name !== FALSE)
           {
             $file_name = base_url()."download/".$table."/".$file_name ;
             $data['watermark'] = $file_name ;
           }
           else
           {
             return FALSE ;
           }
        }
    if(isset($_FILES['file_to_up']['name']) && trim($_FILES['file_to_up']['name'])!='')
        {
           $file_name = $this->data->upload($path,"file_to_up",$types);
           if($file_name !== FALSE)
           {
             if(isset($file_lang) && $file_lang == 1)
            {
              $file_name = base_url()."download/".$table."/".$file_name ;
              $Ldata['file'] = $file_name ;
            }
            else
            {
              $file_name = base_url()."download/".$table."/".$file_name ;
              $data['file'] = $file_name ;
            }
           }
           else
           {
             return FALSE ;
           }
        }
        if(isset($must_upload) && $must_upload == 1 && !isset($file_name))
        {
          return FALSE ;
        }
    if($table == "products")
        {
          $city = $this->get("area",FALSE,array("id"=>$data['area_id']));
          if(isset($city['id']))
          {
            $data['branch_id']  = $city['branch_id'] ;
          }
        }
    if($table == "times"){
        $d = new DateTime($data['ctime1']);
        $data['ctime1'] = $d->format('H:i:s') ;
        $d2 = new DateTime($data['ctime2']);
        $data['ctime2'] = $d2->format('H:i:s') ;
    }
	if($row_id > 0)
	{
	$this->db->where('id', $row_id);
    $this->db->update($table, $data);
    if(isset($Ldata) && $Ldata !== FALSE)
    {
       $this->db->where('parent_id', $row_id);
       $this->db->where('lang_id', $lan_id);
       $this->db->update("".$table."_lang", $Ldata);
    }
	}
	else
	{
		$this->db->insert($table, $data);
        if($table == "products"){
          if (!file_exists('download/products/product'.$this->db->insert_id().'')) {
              mkdir('download/products/product'.$this->db->insert_id().'', 0777, true);
            }
        }
        if(isset($Ldata) && $Ldata !== FALSE)
        {
            $Ldata['parent_id'] =  $this->db->insert_id() ;
            $table = $table."_lang";
             $query = $this->db->get("lang");
            $reslts = $query->result_array() ;
            foreach($reslts AS $reslt)
            {
              $Ldata['lang_id'] = $reslt['id'] ;
               $this->db->insert($table, $Ldata);
            }
        }
	}
	return true;
	}
    //*****************************************************
	/******************************************/
	public function delete($table,$slug = FALSE,$array=FALSE)
	{
	  if($slug !== FALSE)
      {
        $this->db->where("id",$slug);
      }
	  if($array !== FALSE)
      {
        foreach($array  as $field=>$slug)
          {
            $this->db->where($field,$slug);
          }
      }
      if(!($this->db->delete($table))){return FALSE ;}
        $table = $table."_lang";
        if ($this->db->table_exists($table))
        {
          if($slug !== FALSE)
          {
            $this->db->where("parent_id",$slug);
          }
          if($array !== FALSE)
          {
            foreach($array  as $field=>$slug)
              {
                $this->db->where("parent_id",$slug);
              }
          }
          if(!($this->db->delete($table))){return FALSE ;}
        }
        return TRUE ;
	}
    public function read($id,$table)
    {
      if($id !== FALSE)
      {
        $this->db->where('id', $id);
        $data = array(
               'read' => 1
            );
        $this->db->update($table, $data);
      }
    }
    public function countTable($table,$array = FALSE)
    {
      if ($array !== FALSE)
      {
         foreach($array  as $field=>$slug)
          {
            if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                 if($field == "searchName")
                {
                  $this->db->like("name",$slug);
                }else if($field == "searchTitle")
                {
                  $this->db->like("title",$slug);
                }
                else if($field == "searchText")
                {
                  $this->db->like("text2",$slug);
                }
                else if($field == "searchFather")
                {
                  $this->db->like("father",$slug);
                }
                else if($field == "searchGrand")
                {
                  $this->db->like("grand_father",$slug);
                }
                else
                {
                  $this->db->where($field,$slug);
                }
              }
          }
      }
      $query = $this->db->get($table);
      return $query->num_rows();
    }
    public function setLogin($table,$userName,$password)
	{
      $this->db->where("username",$userName);
      $this->db->where("password",$password);
      $this->db->where('status', 1);
     // $where = "(group_id = '3')";
     // $this->db->where($where);
      $query = $this->db->get($table);
      if($query->num_rows())
      {
        return TRUE ;
      }
      return FALSE ;
	}
   public function setcustomers($table,$userName,$password)
  {
      $this->db->where("username",$userName);
      $this->db->where("password",$password);
     // $where = "(group_id = '3')";
     // $this->db->where($where);
      $query = $this->db->get($table);
      if($query->num_rows())
      {
        return TRUE ;
      }
      return FALSE ;
  }
    function setLogin2($posted,$table)
	{
		$this->db->where('username', $posted['txtUserName']);
		$this->db->where('password', MD5($posted['txtPassword']));
		$this->db->where('status', 1);
		$query = $this->db->get($table);
		return $query->row_array();
	}
    public function setLogin3($table,$userName,$password,$utype)
	{
      $this->db->where("mobile",$userName);
      $this->db->where("password",$password);
      $this->db->where("utype",$utype);
      $this->db->where('active', 1);
      $query = $this->db->get($table);
      if($query->num_rows())
      {
        return TRUE ;
      }
      return FALSE ;
	}
    public function getPermi($groupId)
	{
	  $this->db->select("permission");
	  $this->db->from("users_group");
      $this->db->where("id",$groupId);
      $query = $this->db->get();
      $resutls =  $query->row_array() ;
      $back = explode(",",$resutls['permission'])  ;
      return $back ;
	}
    public function getUserByUsername($userName,$table)
	{
      $this->db->where("username",$userName);
      $query = $this->db->get($table);
      if($query->num_rows())
      {
        return $query->row_array() ;
      }
       return FALSE ;
	}
	/*****************************************/
    public function setStatus($table,$status = FALSE,$slug,$field = FALSE,$Nstatus = FALSE,$ID = FALSE)
    {
      if($field == FALSE)
      {
        $field = "status"  ;
      }
      if($ID == FALSE)
      {
        $slugId = "id"  ;
      }
      else
      {
        $slugId = $ID  ;
      }
      $this->db->where($slugId,$slug);
      if($Nstatus == FALSE)
      {
        if($status == 1)
        {
          $data = array(
                 $field => 0
              );
        }
        else
        {
          $data = array(
                 $field => 1
              );
        }
      }
      else
      {
        $data = array(
               $field => $Nstatus
            );
      }
        $this->db->update($table, $data);
        return TRUE ;
    }
  public function addview($table,$id)
    {
         $query = "UPDATE ".$table." SET views=views+1 WHERE id=".$id;
         $this->db->query($query);
    }
  public function newPassword($email,$table)
    {
      $newPass = random_string('alnum', 10);
       $data = array(
               'password' => MD5($newPass)
            );
      $this->db->where('email', $email);
      $this->db->update($table, $data);
      return $newPass;
    }
  public function updateAds($table , $id , $start = FALSE)
    {
      if($start == FALSE){$from = 3;}else {$from = $start;}
      if($id > $from){
      $query = "UPDATE ".$table." SET clicks=clicks+1 ,valid_clicks=valid_clicks-1 WHERE id=".$id;
      $this->db->query($query) ;
      }
    }
   public function insert($table , $data,$insert = FALSE)
    {
      if($this->db->insert($table, $data))
      {
        if($insert == TRUE)
        {
          return "".$this->db->insert_id()."" ;
        }
        return true ;
      }
      return false ;
    }
    public function getSections($var,$dash = 1,$id = FALSE,$lang = FALSE)
    {
        $Var = "";
		$cats = $this->get("section",$lang,array("parent"=>$var),FALSE,TRUE,array("id"=>"asc"));
        if($dash == 1){$Var = " - ";}else {
          $dashs = " ";
           for($i = 1 ; $i <= $dash ; $i++)
           {
              $dashs .=" - ";
           }
          $Var .= $dashs;
          }
        if(count($cats) >0){$dash++;}
        foreach($cats AS $cat)
        {
          if($cat['id'] == $id){$sel = "selected";}else{$sel = "";}
          echo "<option value='".$cat['id']."' ".$sel.">".$Var." ".$cat['name']."</option>";
          $this->getSections($cat['id'],$dash,$id,$lang);
        }
    }
    public function update($table , $data,$fe,$slug)
    {
      $this->db->where($fe, $slug);
      if($this->db->update($table, $data))
      {
        return TRUE ;
      }
      return FALSE ;
    }
    public function update2($table , $data,$array)
    {
      foreach($array  as $field=>$slug)
          {
            if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                 $this->db->where($field,$slug);
              }
          }
      if($this->db->update($table, $data))
      {
        return TRUE ;
      }
      return FALSE ;
    }
    public function getCats($var)
    {
        $rels = explode(",",$var) ;
        $results = array();
        $cats        = $this->data->get("cats") ;
        foreach($cats AS $cat)
        {
          if(in_array($cat['id'],$rels))
          {
              $dd = $this->data->get("cats",FALSE,array("id"=>$cat),1) ;
              $results[] = isset($dd['name'])?$dd['name'] : "لا يوجد" ;
          }
        }
        $result = implode(" , ",$results) ;
        return $result;
    }
    
    public function s_data($table,$select,$where)
    {
      $query = $this->db->select($select)->get_where($table,$where);
      return $query->result_array();
    }
	
    public function g_data($table)
    {
      $query = $this->db->get($table);
      return $query->result_array();
    }
    public function getSum($table,$fie,$array)
      {
        $this->db->select_sum($fie);
        $this->db->from($table);
        foreach($array  as $field=>$slug)
          {
            if(is_array($slug)){
                 $this->db->where_in($field,$slug);
              }
              else {
                $expFie = explode('**',$field);
                if(is_array($expFie) && isset($expFie[1]))
                {
                  if($expFie[1] == "like")
                  {
                    if(isset($expFie[2]))
                    {
                      $this->db->like($expFie[0],$slug,$expFie[2]);
                    }
                    else
                    {
                      $this->db->like($expFie[0],$slug);
                    }
                  }
                }
                else
                {
                  $this->db->where($field,$slug);
                }
              }
          }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $res =  $query->row_array() ;
            if(! isset($res[''.$fie.'']) || $res[''.$fie.''] == NULL)
            {
              return 0 ;
            }
            return $res[''.$fie.''] ;
          }
          return "0" ;
      }
    public function addAds($table,$id,$ads)
    {
         $query = "UPDATE ".$table." SET paidads=paidads+".$ads." WHERE id=".$id;
         $this->db->query($query);
    }
    public function addVisitors()
    {
         $query = "UPDATE setting SET counter=counter+1 WHERE id=1";
         $this->db->query($query);
    }
    public function setProductCount($number,$id)
    {
         $query = "UPDATE products SET amount=amount-".$number." WHERE id=".$id;
         $this->db->query($query);
    }
     public function setAdsPais($number,$id)
    {
         $query = "UPDATE clients SET paidads=paidads-".$number." WHERE id=".$id;
         $this->db->query($query);
    }
	
	 public function driver_data($id)
    {
      $this->db->select('*');
	  $this->db->from('drivers');
	  $this->db->where('vendor_id',$id);
    //$this->db->where('deleted_at is null');
    $this->db->where('deleted_at IS  NULL', null, false);
		$query = $this->db->get();
		
      return $query->result_array();
    }
	

	public function driver_datafilter_old($search, $id)
    {
        $this->db->select('*');
        $this->db->from('drivers');
        $this->db->where('vendor_id',$id);
        $this->db->or_where('name_en',$search);
        $this->db->or_where('name_ar',$search);
        $this->db->or_where('car_type_en',$search);
        $this->db->or_where('car_type_ar',$search);
        $this->db->or_where('car_color_en',$search);
        $this->db->or_where('car_color_ar',$search);
        $this->db->or_where('car_number',$search);
        $this->db->or_where('driver_licence_number',$search);
        $query = $this->db->get();
        return $query->result_array();
    }


	public function driver_datafilter($search=NULL, $id=NULL)
    {
  
        $this->db->select('*');
        $this->db->from('drivers');
        $this->db->where('vendor_id',$id);
  if($search!=''){
   
 $this->db->group_start();
         $this->db->where('name_en',$search);
        $this->db->or_where('name_ar',$search);
        $this->db->or_where('car_type_en',$search);
        $this->db->or_where('car_type_ar',$search);
        $this->db->or_where('car_color_en',$search);
        $this->db->or_where('car_color_ar',$search);
        $this->db->or_where('car_number',$search);
  $this->db->or_where('driver_email',$search);
        $this->db->or_where('driver_licence_number',$search);
     $this->db->group_end();
   
   
       
  }
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_single_coupon($id)
	{
		
	$this->db->select('*');
	  $this->db->from('vouchers');
	  $this->db->where('id',$id);
		$query = $this->db->get();
		
      return $query->result_array();	
	}
	public function get_coupon($id)
    {
      $this->db->select('*');
	  $this->db->from('vouchers');
	  $this->db->where('vendor_id',$id);
      $this->db->where('status','1');
      $this->db->order_by('id','desc');
	  $query = $this->db->get();
		
      return $query->result_array();
    } 
	public function update_coupon($id,$data)
	{
			$this->db->where('id', $id);
		$this->db->update('vouchers', $data); 
		return $this->db->affected_rows();
	}
	
	public function delete_coupon($id)
	{
		
		 $this->db->where('id', $id);
      $this->db->delete('vouchers'); 
	}
	
	public function driver($id)
    {
      $this->db->select('*');
	  $this->db->from('drivers');
	  $this->db->where('id',$id);
		$query = $this->db->get();
		
      return $query->result_array();
    }
	
	public function update_driver($id,$data)
	{
		
		
		$this->db->where('id', $id);
		$this->db->update('drivers', $data); 
		return $this->db->affected_rows();
	}
    
	
	
	
	public function delete_driver($id)
	{

      $data['deleted_at']=date('Y-m-d H:i:s');
      $this->db->where('id', $id);
    $this->db->update('drivers', $data); 
    return $this->db->affected_rows();
		
		// $this->db->where('id', $id);
     // $this->db->delete('drivers'); 
	}
	public function save_voucher($data)
	{
		
		$this->db->insert('vouchers', $data);
	}
	
	public function get_product($id)
	{
	  $this->db->select('*');
	  $this->db->from('products');
	  $this->db->where('id',$id);
	  $query = $this->db->get();
      return $query->result_array();
		
	}
	public function update_product($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('products', $data); 
		return $this->db->affected_rows();
	}

	public function save_product($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    public function edit_product_ch_composition($id){

        $this->db->select('*');
        $this->db->from('product_chemical_composition');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function couponid_display($id){
        $this->db->select('*');
        $this->db->from('coupon_products');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }


	public function getcompany_name($id){
	  $this->db->select('*');
	  $this->db->from('cats');
	  $this->db->where('id',$id);
	  $query = $this->db->get();
	  return $query->result_array();
	}


	public function driver_data_all()
    {
      $this->db->select('*');
      $this->db->from('drivers');
      //$this->db->where('vendor_id',$id);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function vendor_permission_check($id){
        $this->db->select('t1.*, t2.name, t2.name_en');
        $this->db->from('vendor_permission_managemrnt as t1');
        $this->db->where('t1.vendor_id', $id);
        $this->db->join('vendor_permission_type as t2', 't1.setting_type = t2.id', 'LEFT');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function order_vendel_totla($vid,$orderid){

        $this->db->select('t1.order_id, t1.product_id, t1.price, t1.qty, t1.sub_total, t1.coupon_code, t1.discount, t1.discount, t1.total_amount, t2.id as pid, t2.cat_id,t3.id');
        $this->db->from('order_item as t1');
        $this->db->join('products as t2', 't1.product_id = t2.id', 'LEFT');
        $this->db->join('cats as t3', 't2.cat_id = t3.id', 'LEFT');
        $this->db->where('t1.order_id', $orderid);
        $this->db->where('t3.id', $vid);
        $query = $this->db->get();
        $row=$query->result_array();
        return $row;
    }

    public function getproductbyid($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $row=$query->result_array();
        return $row[0];
    }

    public function getorderid($id){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $rows = $query->result_array();
        return $rows[0];
    }

    public function checkPermissions($vid){
        $this->db->select('t1.name,t1.id,t2.status as statusper, t2.setting_type,t2.vendor_id,t2.status');
        $this->db->from('vendor_permission_type as t1');
        $this->db->join('vendor_permission_managemrnt as t2', 't1.id = t2.setting_type', 'LEFT');
        $this->db->where('t2.vendor_id', $vid);
        $this->db->where('t2.status', '1');
        $this->db->where('t1.status', '1');
        $query = $this->db->get();
        $row=$query->result_array();
        return $row;
    }


    public function getAllorderbyvendor($vid){

            $this->db->select('t1.order_id, t1.product_id, t1.price, t1.qty, t1.sub_total, t1.coupon_code, t1.discount, t1.discount, t1.total_amount, t2.id as pid, t2.cat_id,t3.id');
            $this->db->from('order_item as t1');
            $this->db->join('products as t2', 't1.product_id = t2.id', 'LEFT');
            $this->db->join('cats as t3', 't2.cat_id = t3.id', 'LEFT');
            //$this->db->where('t1.order_id', $orderid);
            $this->db->where('t3.id', $vid);
            $query = $this->db->get();
            $row=$query->result_array();
            return $row;
    }


    public function order_vendel_totlaorderall($orderid){

        $this->db->select('t1.order_id, t1.product_id, t1.price, t1.qty, t1.sub_total, t1.coupon_code, t1.discount, t1.total_amount, t2.id as pid, t2.cat_id,t3.id, t4.client_id, t4.shipping_id,t4.order_status,t3.name,t3.name_en');
        //$this->db->select('*');
        $this->db->from('order_item as t1');
        $this->db->join('products as t2', 't1.product_id = t2.id', 'LEFT');
        $this->db->join('cats as t3', 't2.cat_id = t3.id', 'LEFT');
        $this->db->join('orders as t4', 't1.order_id = t4.id', 'LEFT');
        $this->db->where('t1.order_id', $orderid);
        $query = $this->db->get();
        $row=$query->result_array();
        return $row;
    }

     public function getclientdetails($id, $shippingid){

         $this->db->select('*');
         $this->db->from('clients as t1');
         $this->db->join('shipping_address as t2', 't1.id = t2.client_id', 'LEFT');
         $this->db->where('t1.id', $id);
         $this->db->where('t2.id', $shippingid);
         $query = $this->db->get();
         $row=$query->result_array();
         return $row;
     }

     public function getdriverdetails($orderid){
         $this->db->select('*');
         $this->db->from('order_vendor_driver as t1');
         $this->db->join('drivers as t2', 't1.driver_id = t2.id', 'LEFT');
         $this->db->where('t1.order_id', $orderid);
         $query = $this->db->get();
         $row=$query->result_array();
         return $row;
     }

	 public function getclientshipdetails($client_id, $shipping_id){
         $this->db->select('*');
         $this->db->from('shipping_address as t1');
         $this->db->join('clients as t2', 't1.client_id = t2.id', 'LEFT');
         $this->db->where('t2.id', $client_id);
         $this->db->where('t1.id', $shipping_id);
         $query = $this->db->get();
         $row=$query->result_array();
         return $row;
     }


  
  }
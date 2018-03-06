<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();

         $this->load->model('administrator/data');
         $this->load->helper('administrator/get');
         ini_set('memory_limit', "750M"); 
	}

    public function index()
	{
        $data['langId']        = $this->session->userdata('site_lang') ;
        $langId                 = $data['langId'];
        $data['setting']       = $this->data->get("setting",$data['langId'],FALSE,1) ;
        $setting               = $data['setting'];

        //*******************************************************


       // $this->load->view('templates/'.$data['setting']['template'].'/global/header',$data);
   	   //	$this->load->view('templates/'.$data['setting']['template'].'/global/menu_home',$data);
      //  $this->load->view('templates/'.$data['setting']['template'].'/global/home',$data);
	   //	$this->load->view('templates/'.$data['setting']['template'].'/global/footer-top',$data);
	   //	$this->load->view('templates/'.$data['setting']['template'].'/global/footer-bottom',$data);
	}

	public function buyAds($client_id , $adsNumber)
	{
        $data['langId']        = $this->session->userdata('site_lang') ;
        $langId                = $data['langId'];
        $data['setting']       = $this->data->get("setting",$data['langId'],FALSE,1) ;
        $setting               = $data['setting'];
        //*******************************************************
         $template = $data['setting']['template'];
		 $t = $setting['price'];
		 $t2 = $setting['dinar'];

           $data['client_id']  = $client_id ;
           $data['price']  = $adsNumber * $t * $t2 ;
           $data['adsNumber']  = $adsNumber ;
           $this->load->view('templates/'.$template.'/pages/donate',$data);

	}

    public function buyAds2($client_id , $adsNumber)
	{
        $data['langId']        = $this->session->userdata('site_lang') ;
        $langId                = $data['langId'];
        $data['setting']       = $this->data->get("setting",$data['langId'],FALSE,1) ;
        $setting               = $data['setting'];
        //*******************************************************
         $template = $data['setting']['template'];
		 $data['adsNumber']  = $adsNumber ;
		 
           $this->data->addAds("clients",$client_id,$adsNumber) ;
           $this->load->view('templates/'.$template.'/pages/donate_done',$data);

	}
    public function getSearch()  //
    {
       header('Content-Type: application/json; charset=utf-8');

       $search1 = $this->input->post("title");
       $search2 = $this->input->post("cat");
       $search4 = $this->input->post("from");
       $search5 = $this->input->post("to");

       $arraySearch = array();

       if($search1)
       {
         $arraySearch['searchText'] = trim($search1) ;
       }

       if($search2)
       {
         $arraySearch['cat_id'] = trim($search2) ;
       }
       if($search4)
       {
         $arraySearch['price >='] = trim($search4) ;
       }
       if($search5)
       {
         $arraySearch['price <='] = trim($search5) ;
       }
       $text = $this->data->get("products",FALSE,$arraySearch,FALSE,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
       echo(json_encode($text));
    }
    public function getTimes($branch_id = 0)
    {
       header('Content-Type: application/json; charset=utf-8');
        $week     = $this->input->post("week");
        $date     = $this->input->post("date");
        $currdate = $this->input->post("currdate");
        $currtime = $this->input->post("currtime");

        $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
        $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

        $week = str_replace($eastern_arabic, $western_arabic, $week);
        $date = str_replace($eastern_arabic, $western_arabic, $date);
        $currdate = str_replace($eastern_arabic, $western_arabic, $currdate);
        $currtime = str_replace($eastern_arabic, $western_arabic, $currtime);

      /*  $d = new DateTime($currtime);
        $d->modify('+2 Hours');
        $currtime =  $d->format('H:i:s'); */
       if($date == $currdate){
           if($branch_id == 0){
              $arrayRes = array("weeknum"=>$week,"ctime1 >"=>$currtime) ;
           }else{
             $arrayRes = array("weeknum"=>$week,"ctime1 >"=>$currtime,"branch_id"=>$branch_id) ;
           }
       }else{
          if($branch_id == 0){
              $arrayRes = array("weeknum"=>$week) ;
           }else{
             $arrayRes = array("weeknum"=>$week,"branch_id"=>$branch_id) ;
           }
       }
       $t = $this->data->get("times",FALSE,$arrayRes,FALSE,TRUE,array("id"=>"asc"));
        $text = array();
        foreach($t AS $T){
            $T['check'] = "0";
            $d = new DateTime($T['ctime1']);
            $T['ctime1']  =  str_replace(":AM"," صباحا",$d->format('g:i:A'));
            $T['ctime1']  =  str_replace(":PM"," مساءا",$T['ctime1']);
             $d2 = new DateTime($T['ctime2']);
            $T['ctime2']  =  str_replace(":AM"," صباحا",$d2->format('g:i:A'));
            $T['ctime2']  =  str_replace(":PM"," مساءا",$T['ctime2']);


            $text[] = $T;
        }
       echo(json_encode($text));
    }

    public function getMyProducts($userid , $area = 0) //  عرض المناطق من خلال الدولة
    {
       header('Content-Type: application/json; charset=utf-8');

       if($area == 0){
         $text = $this->data->get("products",FALSE,array("client_id"=>$userid),FALSE,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
        } else{
         $text = $this->data->get("products",FALSE,array("client_id"=>$userid,"branch_id"=>$area),FALSE,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
        }
       echo(json_encode($text));
    }
    public function getCatProducts($catid , $area = 0) //  عرض المناطق من خلال الدولة
    {
       header('Content-Type: application/json; charset=utf-8');
        if($area == 0){
         $text = $this->data->get("products",FALSE,array("cat_id"=>$catid),FALSE,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
        } else{
         $text = $this->data->get("products",FALSE,array("cat_id"=>$catid,"branch_id"=>$area),FALSE,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
        }

       echo(json_encode($text));
    }
    public function getProduct($id,$userid) //  عرض المناطق من خلال الدولة
    {
       header('Content-Type: application/json; charset=utf-8');

           $text = $this->data->get("products",FALSE,array("id"=>$id),FALSE,FALSE,FALSE,FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","photo"=>"photo","text2"=>"FeedData","text2_en"=>"FeedData_en","amount"=>"amount","price"=>"price","cat_id"=>"cat_id","active"=>"active","offer"=>"offer"));
           $text['FeedData'] = strip_tags($text['FeedData']);
           $text['FeedData'] = str_replace("&nbsp;"," ",$text['FeedData']);

           $text['FeedData_en'] = strip_tags($text['FeedData_en']);
           $text['FeedData_en'] = str_replace("&nbsp;"," ",$text['FeedData_en']);
           $text['favChecked'] = $this->data->check2("fave",FALSE,array("prod_id"=>$text['id'],"client_id"=>$userid));
           if (!file_exists('download/products/product'.$id.'')) {
             mkdir('download/products/product'.$id.'', 0777, true);
           }
		   $images_arr  = scandir("download/products/product".$id);
		   $x = 1;
		   for($i = 2 ; $i < count($images_arr) ; $i++){
		   $text['photo'.$x] = base_url()."download/products/product".$id."/".$images_arr[$i] ;
		   $x++;
		   }
       echo(json_encode($text));
    }
    public function getCats($parent = 0) //      عرض التخصصات
    {
       header('Content-Type: application/json; charset=utf-8');
        $text = $this->data->get("cats",FALSE,array("parent"=>$parent),FALSE,TRUE,array("id"=>"asc"));
        $text = array();
        foreach($t AS $T){
            if($T['special'] == 0){$T['special'] = "false";}
            elseif($T['special'] == 1){$T['special'] = "false";}
            $text[] = $T;
        }


       echo(json_encode($text));
    }

    public function getAreasWitbSub() //      عرض التخصصات
    {
       header('Content-Type: application/json; charset=utf-8');

       $t = $this->data->get("branchs",FALSE,array("id >"=>0),FALSE,TRUE,array("id"=>"asc"));
       $text = array();
       foreach($t AS $T){
           $T['child'] = $this->data->get("area",FALSE,array("branch_id"=>$T['id']),FALSE,TRUE,array("id"=>"asc"));
            $text[] = $T;
        }
       echo(json_encode($text));
    }
    public function getCatsWitbSub() //      عرض التخصصات
    {
       header('Content-Type: application/json; charset=utf-8');

       $t = $this->data->get("cats",FALSE,array("parent"=>0),FALSE,TRUE,array("id"=>"asc"));
       $text = array();
       foreach($t AS $T){
           $T['child'] = $this->data->get("cats",FALSE,array("parent"=>$T['id']),FALSE,TRUE,array("id"=>"asc"));
            $text[] = $T;
        }
       echo(json_encode($text));
    }

    public function getSubCats($catid,$area = 0) //      عرض التخصصات
    {
       header('Content-Type: application/json; charset=utf-8');

       $t = $this->data->get("cats",FALSE,array("parent"=>$catid),FALSE,TRUE,array("id"=>"asc"));
       $text = array();
       foreach($t AS $T){
           if($area == 0){
             $T['products'] = $this->data->get("products",FALSE,array("cat_id"=>$T['id']),10,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
            } else{
             $T['products'] = $this->data->get("products",FALSE,array("cat_id"=>$T['id'],"branch_id"=>$area),10,TRUE,array("id"=>"asc"),FALSE,array("id"=>"id","name"=>"name","name_en"=>"name_en","price"=>"price","photo"=>"photo"));
            }
             $text[] = $T;
       }
       echo(json_encode($text));
    }
    public function getSubCatsProduct($userid) //      عرض التخصصات
    {
       header('Content-Type: application/json; charset=utf-8');

       $comp = $this->data->get("companies",FALSE,array("client_id"=>$userid));
       $cats = explode(",",$comp['cats']) ;

       $text = $this->data->get("cats",FALSE,array("id"=>$cats,"parent > "=>0),FALSE,TRUE,array("id"=>"asc"));

       echo(json_encode($text));
    }

    public function getAdsSlider() //     عرض الإعلانات
    {
       header('Content-Type: application/json; charset=utf-8');

       $text = $this->data->get("ads",FALSE,array("atype"=>0),FALSE,TRUE,FALSE,FALSE,array("id"=>"id","name"=>"name","photo"=>"photo","text2"=>"FeedData","link"=>"link","link_type"=>"link_type"));
       echo(json_encode($text));
    }
    public function getFooterAd() //     عرض الإعلانات
    {
       header('Content-Type: application/json; charset=utf-8');
       $text = $this->data->get("ads",FALSE,array("atype"=>1),FALSE,TRUE,FALSE,FALSE,array("id"=>"id","name"=>"name","photo"=>"photo","text2"=>"FeedData","link"=>"link","link_type"=>"link_type"));

       echo(json_encode($text));
    }
    public function getFirstAd() //     عرض الإعلانات
    {
       header('Content-Type: application/json; charset=utf-8');

       $t = $this->data->get("ads",FALSE,array("atype"=>2),FALSE,TRUE,FALSE,FALSE,array("id"=>"id","name"=>"name","photo"=>"photo","text2"=>"FeedData","link"=>"link","link_type"=>"link_type"));
        $text = array();
        shuffle($t);
       if(isset($t[0])){
           $text = $t[0];
       }

       echo(json_encode($text));
    }

    public function addFavorite ($ios = 0) // اتصل بنا
    {
       header('Content-Type: application/json; charset=utf-8');

           $client      = $this->input->post("client_id");
           $case        = $this->input->post("prod_id");

           if($this->data->check("fave",FALSE,array("client_id"=>$client,"prod_id"=>$case)) == TRUE)
           {
                $this->data->delete("fave",FALSE,array("client_id"=>$client,"prod_id"=>$case));
                if($ios == 1)
               {
                  $text = array("res"=>"2") ;
               }else {
                 $text = 2 ;
               }
           }else{
             $userData = array(
               "client_id"=>$client,
               "prod_id"=>$case
               );

             if($this->data->insert("fave",$userData))
             {
               if($ios == 1)
               {
                  $text = array("res"=>"1") ;
               }else {
                 $text = 1 ;
               }
             }else{
               $text = array() ;
             }
           }



       echo(json_encode($text));
    }
    public function getMyFav($userid) // عرض حجوزات المستخدم العادي
    {
       header('Content-Type: application/json; charset=utf-8');
       $t = $this->data->get("fave",FALSE,array("client_id"=>$userid),FALSE,TRUE);
       $text = array();
       foreach($t AS $T)
       {
           $N = array();
           $a = $this->data->get("products",FALSE,array("id"=>$T['prod_id'])) ;
           if(isset($a['id'])){
           $N['name'] = $a['name'] ;
           $N['name_en'] = $a['name_en'] ;
           $N['prod_id'] = $a['id'] ;
           $N['photo'] = $a['photo'] ;
           $N['price'] = $a['price'] ;
           $N['id'] = $T['id'] ;

                $text[] = $N;
           }

       }

       echo(json_encode($text));
    }

    public function addCart($ios = 0) // اضافة حجز عيادة
    {
       header('Content-Type: application/json; charset=utf-8');
           $prod_id    = $this->input->post("prod_id");
           $count      = $this->input->post("count");
           $client     = $this->input->post("client");
           $address    = $this->input->post("address_id");
           $price      = $this->input->post("price");
           $deliveryD  = $this->input->post("delivery_date");
           $deliveryT  = $this->input->post("delivery_time");
           $card_from  = $this->input->post("card_from");
           $card_to    = $this->input->post("card_to");
           $card_msg   = $this->input->post("card_msg");


          $userData = array(
           "address_id"=>$address,
           "prod_id"=>$prod_id,
           "count"=>$count,
           "client_id"=>$client,
           "delivery_date"=>$deliveryD,
           "delivery_time"=>$deliveryT,
           "price"=>$price,
           "total_price"=>($count * $price),
           "card_from"=>$card_from,
           "card_to"=>$card_to,
           "card_msg"=>$card_msg,
           "status"=>1 ,
           "start_date"=>date('Y-m-d H:i:s')
           );
           if($this->data->check("cart",FALSE,array("prod_id"=>$prod_id,"status"=>1,"client_id"=>$client))== FALSE){
             $this->data->insert("cart",$userData)  ;
           }else{
               $cc = $this->data->get("cart",FALSE,array("prod_id"=>$prod_id,"status"=>1,"client_id"=>$client),1);

               $co = $count + $cc['count'] ;
               $userData = array(
                   "count"=>$co,
                   "total_price"=>($co * $price)
                   );
               $this->data->update("cart",$userData,"id",$cc['id']);
           }
           if($ios == 0)
              {
                  $text = 1 ;
              }else
              {
                 $text = array("res"=>1);
              }
       echo(json_encode($text));
    }
    public function getAddresses($userid,$areaid = 0)   //
    {
      header('Content-Type: application/json; charset=utf-8');

      if($areaid !=0){
         $t = $this->data->get("address",FALSE,array("client_id"=>$userid,"area_id"=>$areaid),FALSE,TRUE,array("id"=>"asc")) ;
      }else {
         $t = $this->data->get("address",FALSE,array("client_id"=>$userid),FALSE,TRUE,array("id"=>"asc")) ;
      }
      $text = array();
      foreach($t AS $T){
          $area = $this->data->get("area",FALSE,array("id"=>$T['area_id']),1);
          $T['area'] = isset($area['name'])?$area['name']:"" ;
          $text[] = $T;
      }

       echo(json_encode($text));
    }

    public function getAddress($id)   //
    {
      header('Content-Type: application/json; charset=utf-8');

      $text = $this->data->get("address",FALSE,array("id"=>$id),1) ;
      $area = $this->data->get("area",FALSE,array("id"=>$text['area_id']),1);
      $text['area'] = isset($area['name'])?$area['name']:"" ;

       echo(json_encode($text));
    }

    public function addAddress($ios = 0) // اتصل بنا
    {
       header('Content-Type: application/json; charset=utf-8');

           $name        = $this->input->post("name");
           $street      = $this->input->post("street");
           $block       = $this->input->post("block");
           $house       = $this->input->post("house");
           $gada        = $this->input->post("gada");
           $mobile      = $this->input->post("mobile");
           $desc        = $this->input->post("desc");
           $client      = $this->input->post("client");
           $area        = $this->input->post("area");
           $floor       = $this->input->post("floor");
           $room        = $this->input->post("room");

           $userData = array(
           "client_id"=>$client,
           "name"=>$name,
           "area_id"=>$area,
           "street"=>$street,
           "house"=>$house,
           "mobile"=>$mobile,
           "gada"=>$gada,
           "floor"=>$floor,
           "room"=>$room,
           "notes"=>$desc,
           "block"=>$block
           );
           $x = $this->data->insert("address",$userData,TRUE) ;
         if($x)
         {
           if($ios == 1)
           {
              $text = array("res"=>$x) ;
           }else {
             $text = $x ;
           }
         }else{
           $text = array() ;
         }



       echo(json_encode($text));
    }

    public function EditAddress($ios = 0) // اتصل بنا
    {
       header('Content-Type: application/json; charset=utf-8');

           $name        = $this->input->post("name");
           $street      = $this->input->post("street");
           $block       = $this->input->post("block");
           $house       = $this->input->post("house");
           $gada        = $this->input->post("gada");
           $mobile      = $this->input->post("mobile");
           $desc        = $this->input->post("desc");
           $client      = $this->input->post("client");
           $area        = $this->input->post("area");
           $floor       = $this->input->post("floor");
           $room        = $this->input->post("room");
           $id          = $this->input->post("id");

           $userData = array(
           "client_id"=>$client,
           "name"=>$name,
           "area_id"=>$area,
           "street"=>$street,
           "house"=>$house,
           "mobile"=>$mobile,
           "gada"=>$gada,
           "floor"=>$floor,
           "room"=>$room,
           "notes"=>$desc,
           "block"=>$block
           );
         if($this->data->update("address",$userData,"id",$id))
         {
           if($ios == 1)
           {
              $text = array("res"=>"1") ;
           }else {
             $text = 1 ;
           }
         }else{
           $text = array() ;
         }



       echo(json_encode($text));
    }

     public function getLastItem($table , $user_id)  // غير مهم
    {
      header('Content-Type: application/json; charset=utf-8');
       $array = array("client_id"=>array("0",$user_id));
       $text = $this->data->get("notifications",FALSE,$array,1,FALSE,array("id"=>"asc")) ;
       $text2['lastId'] = $text['id'];
       $setting = $this->setting->get();
       $text2['limit'] = $setting['data_in_page'];
       //var_dump($text);
       echo(json_encode($text2));
    }

//******************************************************************************************
   public function updateUserToken($id,$token)  // حفظ معرف الجهاز لارسال تنبيه خاص لكل جهاز على حدي
    {
       header('Content-Type: application/json; charset=utf-8');
       if($id > 0){
        $this->data->update("clients",array("device_token"=>$token),"id",$id);
       }
       if($this->data->check("tokens",FALSE,array("device_token"=>$token)) == FALSE){
	  $this->data->insert("tokens",array("device_token"=>$token));
       }
       echo(json_encode(array("res"=>"1")));
    }
    public function updateUserToken2($device,$token)  // حفظ معرف الجهاز لارسال تنبيه خاص لكل جهاز على حدي
    {
       header('Content-Type: application/json; charset=utf-8');
       if($this->data->check("tokens",FALSE,array("device"=>$device)) == FALSE)  {
         $this->data->insert("tokens",array("device_token"=>$token,"device"=>$device))  ;
       } else{
         $this->data->update("tokens",array("device_token"=>$token),"device",$device);
       }

       echo(json_encode(array("res"=>"1")));
    }
//******************************************************************************************
    public function getCarts($userid)   //
    {
      header('Content-Type: application/json; charset=utf-8');

        $t = $this->data->get("cart",FALSE,array("client_id"=>$userid,"status"=>1),FALSE,TRUE,FALSE,FALSE,array('id'=>'id','prod_id'=>'prod_id','count'=>'count','price'=>'price','total_price'=>'total_price')) ;
        $text = array();
       foreach($t AS $T){
          $Prod = $this->data->get("products",FALSE,array("id"=>$T['prod_id']),1,FALSE,FALSE,FALSE,array("name"=>"name","name_en"=>"name_en","photo"=>"photo"));
         $T['prod_name'] = isset($Prod['name'])?$Prod['name']:"" ;
         $T['prod_name_en'] = isset($Prod['name_en'])?$Prod['name_en']:"" ;
         $T['photo'] = isset($Prod['photo'])?$Prod['photo']:"" ;
          $text[] = $T ;
       }
       echo(json_encode($text));
    }
    public function getMyOrders($userid)   //
    {
      header('Content-Type: application/json; charset=utf-8');

        $t = $this->data->get("cart",FALSE,array("client_id"=>$userid,"status"=>2),FALSE,TRUE,array("order_id"=>"desc","id"=>"asc"),FALSE,array('id'=>'id','prod_id'=>'prod_id','count'=>'count','price'=>'price','total_price'=>'total_price','order_id'=>'order_id')) ;
        $text = array();
       foreach($t AS $T){
          $Prod = $this->data->get("products",FALSE,array("id"=>$T['prod_id']),1,FALSE,FALSE,FALSE,array("name"=>"name","name_en"=>"name_en","photo"=>"photo"));
         $T['prod_name'] = isset($Prod['name'])?$Prod['name']:"" ;
         $T['prod_name_en'] = isset($Prod['name_en'])?$Prod['name_en']:"" ;
         $T['photo'] = isset($Prod['photo'])?$Prod['photo']:"" ;
          $text[] = $T ;
       }
       echo(json_encode($text));
    }
    public function deleteCart($id) // delete item from cart
    {
      header('Content-Type: application/json; charset=utf-8');

       $this->data->delete("cart",$id);
       echo(json_encode(array()));
    }
    public function startOrder($userId , $payment, $t = 0) // delete item from cart
    {
      header('Content-Type: application/json; charset=utf-8');
      $name        = $this->input->post("name");
      $email       = $this->input->post("email");
      $address     = $this->input->post("address");
      $mobile      = $this->input->post("mobile");
      $lat         = $this->input->post("lat");
      $lng         = $this->input->post("lng");

      if(!empty($name) || !empty($email) || !empty($address) || !empty($mobile) || !empty($lat) || !empty($lng)){
       $arrData = array(
      "name"=>$name,
      "mobile"=>$mobile,
      "email"=>$email,
      "address"=>$address,
      "lat"=>$lat,
      "lng"=>$lng,
      "odate"=>date('Y-m-d'),
      "otime"=>date('H:i:s'),
      "pay"=>$payment,
      "client_id"=>$userId
      );
      $OrderID = $this->data->insert("orders",$arrData,TRUE);
      $Carts = $this->data->get("cart",FALSE,array("client_id"=>$userId,"order_id"=>0,"status"=>1),FALSE,TRUE);
      $this->data->update2("cart",array("status"=>2,"order_id"=>$OrderID),array("client_id"=>$userId,"order_id"=>0,"status"=>1));
      foreach($Carts AS $Cart){
        $this->data->setProductCount($Cart['count'],$Cart['prod_id']);
      }
       if($t == 0){
             $text = $OrderID ;
       }else{
           $text = array("res"=>$OrderID) ;
       }
      }else{
        $text = array() ;
      }

       echo(json_encode($text));
   }
    
    public function getOrder($id)   //
    {
      header('Content-Type: application/json; charset=utf-8');

         $text = $this->data->get("orders",FALSE,array("id"=>$id),1) ;
         if($text['pay'] == 1){ $text['pay'] = "ماستر كارد";}
         elseif($text['pay'] == 2){ $text['pay'] = "فيزا";}
         elseif($text['pay'] == 3){ $text['pay'] = "نقدا";}
         
       echo(json_encode($text));
    }
    

    public function getOrders($userid)   //
    {
      header('Content-Type: application/json; charset=utf-8');

         $branches = $this->data->get("branchs",FALSE,array("client_id"=>$userid),FALSE,TRUE,FALSE,FALSE,array("id"=>"id")) ;
         $br = array(0);
         foreach($branches AS $b){
            $br[] = $b['id'];
         }
         $t = $this->data->get("orders",FALSE,array("branch_id"=>$br),FALSE,TRUE,array("neworder"=>"desc","id"=>"asc")) ;
         $text = array();
         foreach($t AS $T){
           if($T['pay'] == 1){ $T['pay'] = "ماستر كارد";}
           elseif($T['pay'] == 2){ $T['pay'] = "فيزا";}
           elseif($T['pay'] == 3){ $T['pay'] = "نقدا";}
           $T['count'] = $this->data->countTable("cart",array("order_id"=>$T['id']));
           $T['amount'] = $this->data->getSum("cart","total_price",array("order_id"=>$T['id']));

           $text[] = $T;
         }

       echo(json_encode($text));
    }
    public function readOrder($id) //   تأكيد حجز العيادة من قبل مستخدم الادارة
    {
       header('Content-Type: application/json; charset=utf-8');

               $userData = array(
               "neworder"=>0
               );
               $r = $this->data->update("orders",$userData,"id",$id)  ;

       echo(json_encode(array("res"=>1)));
    }
    public function addContact($ios = 0) // اتصل بنا
    {
       header('Content-Type: application/json; charset=utf-8');

           $name        = $this->input->post("name");
           $phone       = $this->input->post("mobile");
           $email       = $this->input->post("email");
           $message     = $this->input->post("text");

           $userData = array(
           "cname"=>$name,
           "cphone"=>$phone,
           "cemail"=>$email,
           "cmessage"=>$message,
           "cdate"=>date('Y-m-d H:i:s')
           );

         if($this->data->insert("contact",$userData))
         {
           if($ios == 1)
           {
              $text = array("res"=>"1") ;
           }else {
             $text = 1 ;
           }
         }else{
           $text = array() ;
         }



       echo(json_encode($text));
    }
    public function getContact()  // عن التطبيق
    {
      header('Content-Type: application/json; charset=utf-8');

       $text = array();
       $setting = $this->setting->get();
       $text['mobile'] = $setting['mobile'];
       $text['email'] = $setting['site_email'];
       echo(json_encode($text));
    }

    public function addAccount($ios = 0) // تسجيل حساب جديد ثم تسجيل دخول تلقائي
    {
        header('Content-Type: application/json; charset=utf-8');
        $setting = $this->setting->get();

           $name        = $this->input->post("name");
           $mobile      = $this->input->post("mobile");
           $pass        = $this->input->post("password");
           $email       = $this->input->post("email");
           $device      = $this->input->post("device");

           if($this->data->check("clients",FALSE,array("email"=>$email)))
           {

           if($ios == 1)
            {
              $text = array("res"=>"b") ;
            }else {
             $text = "b" ;// Exist Email ;
            }
           }
           else if($this->data->check("clients",FALSE,array("mobile"=>$mobile)))
           {

           if($ios == 1)
            {
              $text = array("res"=>"a") ;
            }else {
             $text = "a" ;// Exist Mobile ;
            }
           }
           else
           {
               $setting = $this->setting->get();
           $userData = array(
           "name"=>$name,
           "mobile"=>$mobile,
           "password"=>MD5($pass),
           "email"=>$email,
           "rdate"=>date('Y-m-d'),
           "active"=>1
           );

            $r = $this->data->insert("clients",$userData);
            if($r == true)
            {
                $u = $this->data->get("clients",FALSE,array("mobile"=>$mobile));
                $this->data->update2("cart",array("client_id"=>$u['id']),array("client_id"=>$device,"status"=>1));
                if($ios == 1)
                {
                   $text = array("id"=>$u['id']);
                }else
                {
                  $text = $u['id'] ;
                }
            }
            else
            {
              if($ios == 1)
              {
                $text = array("res"=>"c") ;
              }else {
               $text = "c" ;// Error ;
              }
            }
           }

       echo(json_encode($text));
    }

    public function updateAccount($id,$ios = 0) // تعديل بيانات الحساب
    {
       header('Content-Type: application/json; charset=utf-8');
           $setting = $this->setting->get();

           $name        = $this->input->post("name");
           $mobile      = $this->input->post("mobile");
           $pass        = $this->input->post("password");
           $email       = $this->input->post("email");

           $UU = $this->data->get("clients",FALSE,array("id"=>$id));

           if($this->data->check("clients",FALSE,array("email"=>$email)) && $UU['email'] != $email)
           {
             if($ios == 1)
             {
               $text = array("res"=>"b") ;// Exist Email ;
             }else {
               $text = "b" ;// Exist Email ;
             }

           }
           else if($this->data->check("clients",FALSE,array("mobile"=>$mobile)) && $UU['mobile'] != $mobile)
           {
             if($ios == 1)
             {
               $text = array("res"=>"a") ;// Exist Mobile ;
             }else {
               $text = "a" ;// Exist Mobile ;
             }

           }
           else
           {
             if(empty($pass))
             {
               $P = $UU['password'] ;
             }
             else {
                 $P = MD5($pass) ;
             }

               $userData = array(
               "name"=>$name,
               "mobile"=>$mobile,
               "password"=>$P,
               "email"=>$email
               );

            $r = $this->data->update("clients",$userData,"id",$id);
            if($r == true)
            {
                $u = $this->data->get("clients",FALSE,array("mobile"=>$mobile));
                if($ios == 1)
                {
                   $text = array("id"=>$u['id']);
                }else
                {
                  $text = $u['id'];
                }

            }
            else
            {

              if($ios == 1)
             {
               $text = array("res"=>"c") ;// Exist Email ;
             }else {
               $text = "c"; // Unknown error ;
             }
            }
           }

       echo(json_encode($text));
    }
    public function addProduct($userid,$ios = 0)  // تعديل بيانات عيادة
    {
       header('Content-Type: application/json; charset=utf-8');
           $name        = $this->input->post("name");
           $mobile      = $this->input->post("mobile");
           $price       = $this->input->post("price");
           $offer       = $this->input->post("offer");
           $text        = $this->input->post("text");
           $cat         = $this->input->post("cat");
           $area        = $this->input->post("area");

          if(isset($_FILES['photo']['name']))
           {
             $i = $this->data->upload("./download/products/","photo","gif|jpg|jpeg|png",400,222);
             $photo = base_url()."download/products/".$i;
           }
           else
           {
             $photo = "";
           }

           if(isset($_FILES['photo1']['name']))
           {
             $i = $this->data->upload("./download/products/","photo1","gif|jpg|jpeg|png",400,222);
             $photo1 = base_url()."download/products/".$i;
           }
           else
           {
             $photo1 = "";
           }

           if(isset($_FILES['photo2']['name']))
           {
             $i = $this->data->upload("./download/products/","photo2","gif|jpg|jpeg|png",400,222);
             $photo2 = base_url()."download/products/".$i;
           }
           else
           {
             $photo2 = "";
           }

           if(isset($_FILES['photo3']['name']))
           {
             $i = $this->data->upload("./download/products/","photo3","gif|jpg|jpeg|png",400,222);
             $photo3 = base_url()."download/products/".$i;
           }
           else
           {
             $photo3 = "";
           }
		   if(!empty($name) && $name != "0" && !empty($mobile) && $mobile != "0" && !empty($text) && $text != "0"){
               $pinDate = "00:00:00 00:00:00";
               $Client = $this->data->get("clients",FALSE,array("id"=>$userid));
               $free = $Client['freeads'] ;
               $paid = $Client['paidads'] ;
               if($free >= 1){
                   $this->data->setAdsFree(1,$userid);
                   $free = $free - 1 ;
               }else{
                 $this->data->setAdsPais(1,$userid);
                 $paid = $paid - 1 ;
               }
               if($offer == 1){
                  if($free >= 1){
                   $this->data->setAdsFree(1,$userid);
                   $free = $free - 1 ;
                   }else{
                     $this->data->setAdsPais(1,$userid);
                     $paid = $paid - 1 ;
                   }
                   $pinDate = date('Y-m-d H:i:s');
               }

               $country = $this->data->get("area",FALSE,array("id"=>$area));
               $userData = array(
               "name"=>$name,
               "mobile"=>$mobile,
               "text2"=>$text,
               "cat_id"=>$cat,
               "area_id"=>$area,
               "country_id"=>isset($country['country_id'])?$country['country_id']:0,
               "offer"=>$offer,
               "price"=>$price,
               "photo"=>$photo,
               "photo1"=>$photo1,
               "photo2"=>$photo2,
               "photo3"=>$photo3,
               "client_id"=>$userid,
               "pin_date"=>$pinDate,
               "active"=>1,
               "views"=>0,
               "pdate"=>date('Y-m-d')
               );
               $r = $this->data->insert("products",$userData,true);
                if($ios == 0){
                    $text = $r ;
                }else {
                    $text = array("res"=>$r);
                }
            }else{
               if($ios == 0){
                    $text = 0 ;
                }else {
                    $text = array("res"=>0);
                }
            }  
       echo(json_encode($text));
    }

    public function updateProduct($id,$ios = 0)  // تعديل بيانات عيادة
    {
       header('Content-Type: application/json; charset=utf-8');

           $name        = $this->input->post("name");
           $mobile      = $this->input->post("mobile");
           $price       = $this->input->post("price");
           $offer       = $this->input->post("offer");
           $text        = $this->input->post("text");
           $cat         = $this->input->post("cat");
           $area        = $this->input->post("area");

          if(isset($_FILES['photo']['name']))
           {
             $i = $this->data->upload("./download/products/","photo","gif|jpg|jpeg|png",400,222);
             $photo = base_url()."download/products/".$i;
           }
           else
           {
             $UU = $this->data->get("products",FALSE,array("id"=>$id));
             $photo = $UU['photo'];
           }

           if(isset($_FILES['photo1']['name']))
           {
             $i = $this->data->upload("./download/products/","photo1","gif|jpg|jpeg|png",400,222);
             $photo1 = base_url()."download/products/".$i;
           }
           else
           {
             $UU = $this->data->get("products",FALSE,array("id"=>$id));
             $photo1 = $UU['photo1'];
           }

           if(isset($_FILES['photo2']['name']))
           {
             $i = $this->data->upload("./download/products/","photo2","gif|jpg|jpeg|png",400,222);
             $photo2 = base_url()."download/products/".$i;
           }
           else
           {
             $UU = $this->data->get("products",FALSE,array("id"=>$id));
             $photo2 = $UU['photo2'];
           }

           if(isset($_FILES['photo3']['name']))
           {
             $i = $this->data->upload("./download/products/","photo3","gif|jpg|jpeg|png",400,222);
             $photo3 = base_url()."download/products/".$i;
           }
           else
           {
             $UU = $this->data->get("products",FALSE,array("id"=>$id));
             $photo3 = $UU['photo3'];
           }
		if(!empty($name) && $name != "0" && !empty($mobile) && $mobile != "0" && !empty($text) && $text != "0"){
             $pinDate = "00:00:00 00:00:00";
             $Client = $this->data->get("clients",FALSE,array("id"=>$userid));
             $free = $Client['freeads'] ;
             $paid = $Client['paidads'] ;
             $UU = $this->data->get("products",FALSE,array("id"=>$id));
              if($offer == 1 && $UU['offer'] == 0){
                  if($free >= 1){
                   $this->data->setAdsFree(1,$userid);
                   $free = $free - 1 ;
                   }else{
                     $this->data->setAdsPais(1,$userid);
                     $paid = $paid - 1 ;
                   }
                   $pinDate = date('Y-m-d H:i:s');
               }
              $country = $this->data->get("area",FALSE,array("id"=>$area));
               $userData = array(
               "name"=>$name,
               "mobile"=>$mobile,
               "text2"=>$text,
               "cat_id"=>$cat,
               "area_id"=>$area,
               "country_id"=>isset($country['country_id'])?$country['country_id']:0,
               "offer"=>$offer,
               "price"=>$price,
               "pin_date"=>$pinDate,
               "photo"=>$photo,
               "photo1"=>$photo1,
               "photo2"=>$photo2,
               "photo3"=>$photo3
               );

            $r = $this->data->update("products",$userData,"id",$id);
		}

       echo(json_encode(array("res"=>1)));
    }

    public function updateProduct2($id,$ios = 0)
    {
       header('Content-Type: application/json; charset=utf-8');
          $UU = $this->data->get("products",FALSE,array("id"=>$id));
          if(isset($_REQUEST['photo']))
           {
              $i = $this->uploadPhoto($_REQUEST['photo'],"download/products/");
              $photo = base_url()."download/products/".$i;
              $this->setWaterMark("./download/products/".$i);
           }
           else
           {
             $photo = $UU['photo'];
           }

           if(isset($_REQUEST['photo1']))
           {
              $i = $this->uploadPhoto($_REQUEST['photo1'],"download/products/");
              $photo1 = base_url()."download/products/".$i;
               $this->setWaterMark("./download/products/".$i);
           }
           else
           {
             $photo1 = $UU['photo1'];
           }

           if(isset($_REQUEST['photo2']))
           {
              $i = $this->uploadPhoto($_REQUEST['photo2'],"download/products/");
              $photo2 = base_url()."download/products/".$i;
               $this->setWaterMark("./download/products/".$i);
           }
           else
           {
             $photo2 = $UU['photo2'];
           }

           if(isset($_REQUEST['photo3']))
           {
              $i = $this->uploadPhoto($_REQUEST['photo3'],"download/products/");
              $photo3 = base_url()."download/products/".$i;
               $this->setWaterMark("./download/products/".$i);
           }
           else
           {
             $photo3 = $UU['photo3'];
           }

               $userData = array(
               "photo"=>$photo,
               "photo1"=>$photo1,
               "photo2"=>$photo2,
               "photo3"=>$photo3
               );

            $this->data->update("products",$userData,"id",$id);


       echo($i);
    }

    public function LoginUser($ios = 0)   // تسجيل دخول مستخدم
    {
      header('Content-Type: application/json; charset=utf-8');

      $username     = $this->input->post("mobile");
      $Pass         = $this->input->post("password");
      $device       = $this->input->post("device");
      if($this->data->setLogin3("clients",$username,MD5($Pass),"user") == TRUE)
      {
        $u = $this->data->get("clients",FALSE,array("mobile"=>$username),1);
        /*if($u['id'] != $device){
          $address = $this->data->get("address",FALSE,array("client_id"=>$device),FALSE,TRUE);
          foreach($address AS $adr){
              $adr['client_id'] = $u['id']  ;
              unset($adr['id'])  ;
              $this->data->insert("address",$adr);
          }
        }   */

       if($u['active']==1)
        {
            $this->data->update2("cart",array("client_id"=>$u['id']),array("client_id"=>$device));
            $this->data->update2("fave",array("client_id"=>$u['id']),array("client_id"=>$device));
          if($ios == 1)
          {
             $text = array("id"=>$u['id']);
          }else
          {
            $text = $u['id'] ;
          }

        }else {
          if($ios == 1)
          {
             $text = array("id"=>0);
          }else
          {
            $text = 0 ;
          }
        }
      }
      else
      {
        if($ios == 1)
          {
             $text = array("id"=>0);
          }else
          {
            $text = 0 ;
          }
      }
       echo(json_encode($text));
    }

    public function ForgetPass($ios = 0) // نسيت كلمة المرور
    {
      $this->load->helper('email');
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

      header('Content-Type: application/json; charset=utf-8');
       $username = $this->input->post("email");
       $setting     = $this->setting->get();
      if($this->data->check("clients",FALSE,array("email"=>$username)))
      {
         $newPass = $this->data->newPassword($username,"clients");
          $this->email->from($setting['site_email'], $setting['site_name']);
          $this->email->to($username);

          $this->email->subject(''.$setting['site_name'].'New Password');
                    $message = "
                      <p><strong>New Password : ".$newPass."</strong></p>
                      ";
          $this->email->message($message);

          if($this->email->send())
          {
            if($ios == 1)
            {
              $text = array("res"=>"1") ;//sent
            }else {
             $text = 1 ;//sent
            }

          }
          else
          {
            if($ios == 1)
            {
              $text = array("res"=>"2") ;//sent
            }else {
             $text = 2 ;//sent
            }
          }
      }
      else
      {
       if($ios == 1)
            {
              $text = array("res"=>"0") ;
            }else {
             $text = 0 ;
            } ; //error mail
      }
       echo(json_encode($text));
    }

    public function getUser($id) // عرض بيانات مستخدم
    {
      header('Content-Type: application/json; charset=utf-8');

       $text = $this->data->get("clients",FALSE,array("id"=>$id),1,FALSE,array("id"=>"asc"));
       echo(json_encode($text));
    }

    public function getSupport() // عرض بيانات مستخدم
    {
      header('Content-Type: application/json; charset=utf-8');

       $text = $this->data->get("support",FALSE,array("id >"=>0),FALSE,TRUE,array("id"=>"asc"));
       echo(json_encode($text));
    }

    public function newAds () // اتصل بنا
    {
       header('Content-Type: application/json; charset=utf-8');

           $client      = $this->input->post("client_id");
           $ads        = $this->input->post("ads");

           
       echo(json_encode(array("res"=>1)));
    }


    public function getNotis($user = 0 ,$limit = 0,$start = 0) // عرض التنبيهات
    {
       header('Content-Type: application/json; charset=utf-8');
       $setting = $this->setting->get();
       if($limit == 0){
         $limit = $setting['data_in_page'];
       }
         $arraySearch = array("client_id"=>array("0",$user));
         if($user > 0){
           $this->data->update("notifications",array("readed"=>1),"client_id",$user) ;
         }

       $text = $this->data->get("notifications",FALSE,$arraySearch,FALSE,TRUE,array("id"=>"asc"),array($limit=>$start));

       echo(json_encode($text));
    }

    public function getNotisNumbers($user = 0 , $ios = 0) // عرض التنبيهات
    {
       header('Content-Type: application/json; charset=utf-8');
        // $arraySearch = array("client_id"=>array("0",$user) , "readed"=>0);
         $arraySearch = array("client_id"=>array($user) , "status"=>1);

       $t = $this->data->countTable("cart",$arraySearch);

       if($ios == 1){
           $text = array("res"=>$t);
       }  else{
           $text = $t ;
       }
       echo(json_encode($text));
    }

    public function getBranch($user = 0 , $ios = 0) // عرض التنبيهات
    {
       header('Content-Type: application/json; charset=utf-8');
         $arraySearch = array("client_id"=>array($user));
         $t = $this->data->get("branchs",FALSE,$arraySearch,1,FALSE,FALSE,FALSE,array("id"=>"id"));

       if($ios == 1){
           $text = array("res"=>$t['id']);
       }  else{
           $text = $t['id'] ;
       }
       echo(json_encode($text));
    }

    public function getVisitors($x ,$ios = 0) // عرض التنبيهات
    {
       header('Content-Type: application/json; charset=utf-8');
       if($x == 0){
           $this->data->addVisitors();
       }

         $setting = $this->setting->get();

       $t = $setting['counter'];

       if($ios == 1){
           $text = array("res"=>$t);
       }  else{
           $text = $t ;
       }

       echo(json_encode($text));
    }

    public function getAdPrice($ios = 0) // عرض التنبيهات
    {
       header('Content-Type: application/json; charset=utf-8');

       $setting = $this->setting->get();

       $t = $setting['price'];
       $t2 = $setting['dinar'];

       if($ios == 1){
           $text = array("price"=>$t,"dinar"=>$t2);
       }  else{
           $text = $t."_".$t2 ;
       }

       echo(json_encode($text));
    }

    public function uploadPhoto($tmp,$path){
        $base = $tmp;
         $binary=base64_decode($base);
         $new_name = rand(1,999).time().".jpg" ;
        $file = fopen(''.$path.'/'.$new_name.'', 'wb');
        fwrite($file, $binary);
        fclose($file);
        return  $new_name ;
    }

    public function setWaterMark($path){
        $this->load->library('image_lib');
          $config2['source_image'] = $path;
          $config2['new_image'] = $path;
          $config2['wm_overlay_path'] = "./download/watermark.png";
          $config2['wm_type'] = 'overlay';
          $config2['wm_vrt_alignment'] = 'bottom';
          $config2['wm_hor_alignment'] = 'right';
          $this->image_lib->initialize($config2);

          $this->image_lib->watermark();
    }

    public function removeFile($id , $file){
        header('Content-Type: application/json; charset=utf-8');
        $f = "download/products/product".$id."/".$file;
         unlink($f);
        echo(json_encode(1));
    }


    public function sendNotiToDevice2() // غير مهم
    {
        header('Content-Type: application/json; charset=utf-8');
         $Msg       = $this->input->post("msg");
         $deviceId = $this->input->post("device");
         $client_id = $this->input->post("client_id");

        $ch = curl_init();
        $fields = array(
            'registration_ids' => array($deviceId),
            'data' => array(
                "title" => "تطبيق لاكشيت",
                "page" => "home",
                "message" => $Msg
            )
        );
        $arr2 = array();
        array_push($arr2, "Authorization: key= AIzaSyBQks4kPTJXJDZK3ZCUpCUs_UUTd73wrJ0");
        array_push($arr2, "Content-Type: application/json");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $arr2);
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result =curl_exec($ch);
        curl_close($ch);
        $this->data->insert("notifications",array("text2"=>$Msg,"client_id"=>$client_id,"page"=>"","ndate"=>date('Y-m-d H:i:s')));
        echo(json_encode(1));
    }
    public function sendNotiToDevice3($deviceId) // غير مهم
    {
         $Msg = $this->input->post("msg");
        $ch = curl_init();
        $fields = array(
            'registration_ids' => array($deviceId),
            'data' => array(
                "title" => "تطبيق لاكشيت",
                "page" => "home",
                "message" => $Msg
            )
        );
        $arr2 = array();
        array_push($arr2, "Authorization: key= AIzaSyBQks4kPTJXJDZK3ZCUpCUs_UUTd73wrJ0");
        array_push($arr2, "Content-Type: application/json");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $arr2);
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result =curl_exec($ch);
        curl_close($ch);
    }

    public function sendNotiToDevice($deviceId,$Msg,$page,$title) // غير مهم
    {
        $ch = curl_init();
        $fields = array(
            'registration_ids' => array($deviceId),
            'data' => array(
                "title" => $title,
                "page" => $page,
                "message" => $Msg
            )
        );
        $arr2 = array();
        array_push($arr2, "Authorization: key= AIzaSyBQks4kPTJXJDZK3ZCUpCUs_UUTd73wrJ0");
        array_push($arr2, "Content-Type: application/json");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $arr2);
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result =curl_exec($ch);
        curl_close($ch);
        $this->sendOneSignalMessageToPlayer($Msg,$deviceId);
    }

    public function sendNoti()  // غير مهم
    {
        $P = $this->input->post("sent");
         $Post = json_decode($P)  ;
        $ch = curl_init();
         $ars = explode(",",$Post->regs) ;
        $fields = array(
            'registration_ids' => $ars,
            'data' => array(
                "title" => $Post->title,
                "page" => "home",
                "message" => $Post->msg
            )
        );

        $arr2 = array();
        array_push($arr2, "Authorization: key= AIzaSyAZ7LqxemnGDs_1k-qgkG70TZDELQ5Nf-E");
        array_push($arr2, "Content-Type: application/json");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $arr2);
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result =curl_exec($ch);
        curl_close($ch);

         $Msg = $Post->msg;
        $this->sendOneSignalMessage($Msg);
    }



    public function sendOneSignalMessage($Msg){
		$content = array(
			"en" => $Msg
			);

		$fields = array(
			'app_id' => "c94fd395-8314-45e0-adde-f6499601a201",
			'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
			'contents' => $content
		);

		$fields = json_encode($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic OTE1NDFiMzktZjhiYy00ODY4LTg3NTItZGMwMTI2MDcxMjE5'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

	}

    function sendOneSignalMessageToPlayer($Msg,$Player){
		$content = array(
			"en" => $Msg
			);

		$fields = array(
			'app_id' => "c94fd395-8314-45e0-adde-f6499601a201",
			'include_player_ids' => array($Player),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);

		$fields = json_encode($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic OTE1NDFiMzktZjhiYy00ODY4LTg3NTItZGMwMTI2MDcxMjE5'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
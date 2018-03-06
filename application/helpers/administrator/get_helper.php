<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('strTimes'))
{
        function strTimes($a=0, $b=0) {
    		if (!is_numeric($a)) $a = strtotime($a);
		if (!is_numeric($b)) $b = strtotime($b);
		if ($a == 0) $a = time();
		if ($b == 0) $b = time();
		if ($a == $b) return "في نفس الوقت";
		if ($a > $b) {
    			$aa = $b; $b = $a; $a = $aa; $q = "بعيد";
		}else{
    			$q = "منذ";
		}
		$value = $b-$a;
		if ($value == 1) return $q." ثانية";
		if ($value < 60) return "$value ثواني $q";
		$value /= 60;
		if (round($value) == 1) return $q." دقيقة";
		if ($value < 60) return " $q ".round($value) . " دقائق ";
		$value /= 60;
		if (round($value) == 1) return $q." ساعة";
		if ($value < 24) return " $q ".round($value) . " ساعات ";
		$value /= 24;
		if (round($value) == 1) if ($q == "منذ") return "yesterday"; else return "tomorrow";
		if ($value < 31) return " $q ".round($value) . " أيام ";
		$value /= 31;
		if (round($value) == 1) return $q." شهر";
		if ($value < 12) return " $q ".round($value) . " أشهر ";
		$value /= 12;
		if (round($value) == 1) return $q." سنة";
		return round($value) . " سنوات $q";
	}
}
if ( ! function_exists('strTimes2'))
{
        function strTimes2($a, $b) {
    		$start_date = new DateTime($a);
        $since_start = $start_date->diff(new DateTime($b));
        //$since_start->days.' days total';
        if($since_start->y == 0){
                $x0 = "";
        }else if($since_start->y == 1){
              $x0 = 'سنة'." و ";
        }else if($since_start->y == 2){
              $x0 = 'سنتان'." و ";
        }else if($since_start->y < 11){
              $x0 = $since_start->y .' سنوات'." و ";
        }
        else{
              $x0 = $since_start->y .' سنة'." و ";
        }
        //***************************************
        if($since_start->m == 0){
              $x1 = "";
        }else if($since_start->m == 1){
              $x1 = 'شهر'." و ";
        }else if($since_start->m == 2){
              $x1 = 'شهران'." و ";
        }else if($since_start->m < 11){
              $x1 = $since_start->m .' اشهر'." و ";
        }
        else{
              $x1 = $since_start->m .' شهر'." و ";
        }
        //********************************
        if($since_start->d == 0){
              $x2 = "";
        }else if($since_start->d == 1){
              $x2 = 'يوم'." و ";
        }else if($since_start->d == 2){
              $x2 = 'يومان'." و ";
        }else if($since_start->d < 11){
              $x2 = $since_start->d .' ايام'." و ";
        }
        else{
              $x2 = $since_start->d .' يوم'." و ";
        }
        //**********************************
        if($since_start->h == 0){
              $x3 = "";
        }else if($since_start->h == 1){
              $x3 = 'ساعه'." و ";
        }else if($since_start->h == 2){
              $x3 = 'ساعتان'." و ";
        }else if($since_start->h < 11){
              $x3 = $since_start->h .' ساعات'." و ";
        }
        else{
              $x3 = $since_start->h .' ساعه'." و ";
        }
        //*******************************
        if($since_start->i == 0){
              $x4 = "";
        }else if($since_start->i == 1){
              $x4 = 'دقيقة'." و ";
        }else if($since_start->i == 2){
              $x4 = 'دقيقتان'." و ";
        }else if($since_start->i < 11){
              $x4 = $since_start->i .' دقائق'." و ";
        }
        else{
              $x4 = $since_start->i .' دقيقة'." و ";
        }
        $x = $x0." ".$x1." ".$x2." ".$x3." ".$x4;
        $x = substr($x, 0, -3);
        $x = trim($x);
        return $x ;
	}
}
if ( ! function_exists('getStatus'))
{
        function getStatus($var = '')
    {
    		if($var == 1)
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'.lang("Active").'&nbsp;&nbsp;</span>';
		}
		else if($var == 0)
		{
    			$result = '<span class="label label-important">&nbsp;&nbsp;'.lang("NonActive").'&nbsp;&nbsp;</span>';
		}
        else if($var == 2)
		{
    			$result = '<span class="label label-warning">&nbsp;&nbsp;'.lang("ActiveEmail").'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getStatus2'))
{
        function getStatus2($var = '')
    {
    		if($var == 1)
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'.lang("Yes").'&nbsp;&nbsp;</span>';
		}
		else if($var == 0)
		{
    			$result = '<span class="label label-important">&nbsp;&nbsp;'.lang("NO").'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getStatus3'))
{
        function getStatus3($var = '')
    {
    		if($var == 0)
		{
    			$result = '<span class="label label-important">&nbsp;&nbsp;'."مغلق".'&nbsp;&nbsp;</span>';
		}
        else if($var == 1)
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'."جديد".'&nbsp;&nbsp;</span>';
		}
		else if($var == 2)
		{
    			$result = '<span class="label label-warning">&nbsp;&nbsp;'."رد جديد".'&nbsp;&nbsp;</span>';
		}
        else if($var == 3)
		{
    			$result = '<span class="label label">&nbsp;&nbsp;'."جاري العمل".'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getGroup'))
{
        function getGroup($var = '')
    {
    		if($var > 0 )
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'."مدير فرع".'&nbsp;&nbsp;</span>';
		}
        else if($var == 0)
		{
    			$result = '<span class="label label-warning">&nbsp;&nbsp;'."مستخدم".'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getPay'))
{
        function getPay($var = '')
    {
    		if($var == 1 )
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'."ماستر كارد".'&nbsp;&nbsp;</span>';
		}
        else if($var == 2)
		{
    			$result = '<span class="label label-warning">&nbsp;&nbsp;'."فيزا".'&nbsp;&nbsp;</span>';
		}
        else if($var == 3)
		{
    			$result = '<span class="label label-important">&nbsp;&nbsp;'."نقدا".'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getImportance'))
{
        function getImportance($var = '')
    {
    		if($var == 0)
		{
    			$result = '<span class="label label-important">&nbsp;&nbsp;'."معلق".'&nbsp;&nbsp;</span>';
		}
		else if($var == 1)
		{
    			$result = '<span class="label label-warning">&nbsp;&nbsp;'."تم الشحن".'&nbsp;&nbsp;</span>';
		}
        else if($var == 2)
		{
    			$result = '<span class="label label-success">&nbsp;&nbsp;'."تم التسليم للعميل".'&nbsp;&nbsp;</span>';
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getPermi'))
{
        function getPermi($var = '')
    {
    		$rels = explode(",",$var) ;
        $results = array();
        foreach($rels AS $rel)
        {
               if($rel == 1)
           {
                 $results[] = "إدارة شاملة";
           }
           if($rel == 2)
           {
                 $results[] = "ضبط الإعدادات";
           }
           if($rel == 3)
           {
                 $results[] = "القائمة الرئيسية";
           }
           if($rel == 4)
           {
                 $results[] = "ادارة الاقسام";
           }
           if($rel == 5)
           {
                 $results[] = "ادارة المنتجات";
           }
           if($rel == 6)
           {
                 $results[] = "ادارة العملاء المسجلين";
           }
           if($rel == 7)
           {
                 $results[] = "ادارة طلبات الشراء";
           }
           if($rel == 8)
           {
                 $results[] = "ادارة الاعضاء والصلاحيات";
           }
           if($rel == 9)
           {
                 $results[] = "اخذ نسخة احتياطي";
           }
        }
        $result = implode(" , ",$results) ;
        return $result;
    }
}
if ( ! function_exists('getGender'))
{
        function getGender($var = '')
    {
    		if($var == "M")
		{
    			$result = "ذكر";
		}
		else if($var == "F")
		{
    			$result = "انثي";
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getPeriodClass'))
{
        function getPeriodClass($var = '')
    {
    		if($var == "d")
		{
    			$result = " يوم";
		}
		else if($var == "m")
		{
    			$result = " شهر";
		}
        else if($var == "y")
		{
    			$result = " سنة";
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getPeriodClass2'))
{
        function getPeriodClass2($var = '')
    {
    		if($var == "d")
		{
    			$result = " Day";
		}
		else if($var == "m")
		{
    			$result = " Month";
		}
        else if($var == "y")
		{
    			$result = " Year";
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getFileType'))
{
        function getFileType($var = '')
    {
    		if($var == "file")
		{
    			$result = " ملف PDF";
		}
		else if($var == "video")
		{
    			$result = lang("UploadVideo");
		}
        else if($var == "youtube")
		{
    			$result = lang("YouTubeVideo");
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getWeek'))
{
        function getWeek($var = '')
    {
    		if($var == "1")
		{
    			$result = "الأحد";
		}
		else if($var == "2")
		{
    			$result = "الأثنين";
		}
        else if($var == "3")
		{
    			$result = "الثلاثاء";
		}
        else if($var == "4")
		{
    			$result = "الأربعاء";
		}
        else if($var == "5")
		{
    			$result = "الخميس";
		}
        else if($var == "6")
		{
    			$result = "الجمعه";
		}
        else if($var == "7")
		{
    			$result = "السبت";
		}
        else
		{
    			$result = "";
		}
        return $result;
    }
}
if ( ! function_exists('getVideo'))
{
        function getVideo($data = '',$width= '',$height ='')
    {
          if($data['file_type'] == "video"){
          $ext = substr($data['file'], -3);
      }
		if($data['file_type'] == "youtube")
        {
              $video = '<iframe width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$data['file'].'" frameborder="0" allowfullscreen></iframe>';
        }
        else
        {
              if($ext == "mp4" || $ext == "MP4" || $ext == "swf" || $ext == "SWF" ){
                $video = '
            <video width="'.$width.'" height="'.$height.'" controls>
              <source src="download/files/'.$data['file'].'" type="video/mp4">
              <object data="download/files/'.$data['file'].'" width="'.$width.'" height="'.$height.'">
                <embed src="download/files/'.$data['file'].'" width="'.$width.'" height="'.$height.'">
              </object>
            </video>
            ';
          }
          else if($ext == "flv" || $ext == "FLV" ){
                $video = '
            <object width="'.$width.'" height="'.$height.'">
              <param name="movie" value="download/files/'.$data['file'].'">
              <embed src="download/files/'.$data['file'].'" width="'.$width.'" height="'.$height.'">
              </embed>    </object>
            ';
          }
           else if($ext == "peg" || $ext == "PEG" || $ext == "mpg" || $ext == "MPG" || $ext == "avi" || $ext == "AVI"){
                $video = '
            <object id="MediaPlayer" width="'.$width.'" height="'.$height.'" classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"
            standby="Loading Windows Media Player..." TYPE="application/x-oleobject">
               <param name="FileName" VALUE="download/files/'.$data['file'].'">
               <param name="ShowControls" VALUE="true">
               <param name="ShowStatusBar" value="false">
               <param name="ShowDisplay" VALUE="false">
               <param name="autostart" VALUE="false">
               <embed type="application/x-mplayer2" src="download/files/'.$data['file'].'" name="MediaPlayer"
            width="'.$width.'" height="'.$height.'" ShowControls="1" ShowStatusBar="0" ShowDisplay="0" autostart="0"> </embed>
            </object>
            ';
          }
        }
        return $video;
    }
}
if ( ! function_exists('get_client_ip'))
{
        function get_client_ip($var = '')
    {
           if (isset($_SERVER['HTTP_CLIENT_IP']))
           $var = $_SERVER['HTTP_CLIENT_IP'];
       else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
           $var = $_SERVER['HTTP_X_FORWARDED_FOR'];
       else if(isset($_SERVER['HTTP_X_FORWARDED']))
           $var = $_SERVER['HTTP_X_FORWARDED'];
       else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
           $var = $_SERVER['HTTP_FORWARDED_FOR'];
       else if(isset($_SERVER['HTTP_FORWARDED']))
           $var = $_SERVER['HTTP_FORWARDED'];
       else if(isset($_SERVER['REMOTE_ADDR']))
           $var = $_SERVER['REMOTE_ADDR'];
       else
           $var = 'UNKNOWN';
       return $var;
    }
}

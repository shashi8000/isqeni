<?php
$base_url	= 'http://localhost/lacachette/';
if($_POST['image_form_submit'])
{

    $fname = "images".$_POST['image_form_submit'];
	$images_arr = array();
	foreach($_FILES[''.$fname.'']['name'] as $key=>$val){

        $Count = count(scandir("../download/products/product".$_POST['image_form_submit'])) - 2 ;
        if($Count < 7){
		$image_name = $_FILES[''.$fname.'']['name'][$key];
		$tmp_name 	= $_FILES[''.$fname.'']['tmp_name'][$key];
		$size 		= $_FILES[''.$fname.'']['size'][$key];
		$type 		= $_FILES[''.$fname.'']['type'][$key];
		$error 		= $_FILES[''.$fname.'']['error'][$key];
		
		############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
        if (!file_exists('../download/products/product'.$_POST['image_form_submit'].'')) {
            mkdir('../download/products/product'.$_POST['image_form_submit'].'', 0777, true);
        }
		$target_dir = "../download/products/product".$_POST['image_form_submit']."/";
        $ext = pathinfo($_FILES[''.$fname.'']['name'][$key], PATHINFO_EXTENSION);
		$new_file_name = rand(0,9999).time().".".$ext;
		$target_file = $target_dir.$new_file_name;
		if(move_uploaded_file($_FILES[''.$fname.'']['tmp_name'][$key],$target_file)){
			$images_arr[] = $new_file_name;
		}
        }
	}
	
	//Generate images view
	if(!empty($images_arr)){ $count=0;
		foreach($images_arr as $image_src){ $count++?>
			<ul class="reorder_ul reorder-photos-list">
            	<li id="image_li_<?php echo $count; ?>" class="ui-sortable-handle">
                	<a href="javascript:void(0);" style="float:none;" class="image_link"><img src="<?php echo $base_url."download/products/product".$_POST['image_form_submit']."/".$image_src; ?>" alt=""></a>
               	</li>
          	</ul>
	<?php }
	}
}
?>
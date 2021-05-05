<?php
class Image {
	public static function uploadImage($formname, $query, $params) {
		  
     
	$file = rand(1000,100000)."-".$_FILES[$formname]['name'];
    $file_loc = $_FILES[$formname]['tmp_name'];
	$file_size = $_FILES[$formname]['size'];
	$file_type = $_FILES[$formname]['type'];
	$folder='profile_img/';
	

	if ($file_size > 10240000) {
		die('Oooops! Your image is too big, it has to be 10MB or less');
		}
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	$new_loc = $folder.$final_file;
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$preparams = array($formname=>$new_loc);
		
		$params = $preparams + $params;

		DB::query($query,$params);
		?>
		<script>
		alert('successfully uploaded');
        
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        
        </script>
		<?php
	}
}
		}
	

?>


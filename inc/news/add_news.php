<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';




if($_SERVER['REQUEST_METHOD']=='POST')
{	
	    $headline              =       validation($_POST['headline']);
	    $body                  =       validation($_POST['body']);
        $image                 =       $_FILES['image'];
        $image_name            =       $image['name'];
        // image explode
        $image_explode         =       explode('.',$image_name);
        // get image file extension.
        $image_extension       =       end($image_explode);
        // which kind of file get insert
        $image_file_types      =       array('jpg','png','jpeg');
  
      if(empty($headline)||empty($body)||empty($image_name)){
             $_SESSION['w_msg']="Field is empty";
             header('location:../../template/add_news.php');
             exit();
            }
            if($image['name'])
            {
                    if(in_array($image_extension,$image_file_types))
                    {
                        $query="INSERT INTO `news`(`headline`, `body`) VALUES ('$headline','$body')";
                        mysqli_query($db_connection,$query);
                        $insert_id             =       mysqli_insert_id($db_connection);
                        $rename_image          =       $insert_id."_news.".$image_extension;
                        $temp_location         =       $image['tmp_name'];
                        $upload_location       =       "../../uploads/news/".$rename_image;
                        move_uploaded_file($temp_location, $upload_location);
                        $update_query="UPDATE `news` SET `image`='$rename_image' WHERE id=$insert_id";
                if(mysqli_query($db_connection,$update_query))
                {
                 $_SESSION['s_msg']="News upload successfully.";
                 header('location:../../template/add_news.php');
                }
                else
                {
                 $_SESSION['w_msg']="File format is invalid";
                         header('location:../../template/add_news.php');
                         exit();
                }
                }
                else
            {
                 $_SESSION['w_msg']="File format is invalid";
                 header('location:../../template/add_news.php');
                 exit();
                    }
             }

 

}
else
{
	$_SESSION['w_msg']="There is a problem in post";
    header('location:../register_graduate.php');
}
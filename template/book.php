<?php
session_start();
ini_set('max_execution_time', '300000');
ini_set("pcre.backtrack_limit", "500000000");
require_once __DIR__ . '../../vendor/autoload.php';
require_once '../database/db_connect.php'; 
include '../inc/validation/validation.php';
if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}
ob_start();

?>


<?php 
  $query="SELECT ref FROM short_form_of_reg_gra GROUP BY ref ORDER BY MAX(ref)";
  $run_query=mysqli_query($db_connection,$query);
 
  foreach ($run_query as $key => $value) 
  { 

    $ref_name=$value['ref'];
    $query="SELECT * FROM `short_form_of_reg_gra` WHERE `ref` LIKE '$ref_name' ORDER by register_type ASC";
    $ref_datas=mysqli_query($db_connection,$query); ?>
<br>
<table width="100%" style="border-collapse: collapse;">
  <thead>
    <tr>
      <th  colspan="4"><?php echo $value['ref'] ?></th>
    </tr>
  </thead>
  <tbody>
    ?>
        <?php 
        $t=0;
        foreach ($ref_datas as $key => $value) 
        { 
            $t++;
         ?>
  
        <?php if ($t==1) { ?>
          <tr>

            <td colspan="2">
              <br>
                <?php  
                  echo "<b>Name : </b>";
                  echo $value['name']."<br>";
                  echo "<b>Father : </b>";
                  echo $value['name']."<br>";
                  echo "<b>Mother : </b>";;
                  echo $value['nid_no']."<br>";
                  echo "<b>Present Address : </b>";
                  echo $value['present_address']."</br>,";
                  echo $value['present_thana']."</br>,";
                  echo $value['present_district']."<br>";
                  echo "<b>Register Type : </b>";
                  echo $value['register_type'];
                ?>
                                
             </td>

            
          <?php }elseif($t==2)
            { 
             $t=0; ?>
             <td colspan="2">
                <?php 
  
                  echo "<b>Name : </b>";
                  echo $value['name']."<br>";
                  echo "<b>Father : </b>";
                  echo $value['name']."<br>";
                  echo "<b>Mother : </b>";;
                  echo $value['nid_no']."<br>";
                  echo "<b>Present Address : </b>";
                  echo $value['present_address']."</br>,";
                  echo $value['present_thana']."</br>,";
                  echo $value['present_district']."<br>";
                  echo "<b>Register Type : </b>";
                  echo $value['register_type'];
                ?>
                                
             </td>
       </tr>

         <?php } ?>
            
              
        
 <?php } ?>
      
  </tbody>
</table>
      
        
     
    <?php
     }
?> 














<?php
$body=ob_get_clean();

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' =>5,
    'default_font_size' => 14,
]);

  
$mpdf->WriteHTML($body);
$mpdf->Output();
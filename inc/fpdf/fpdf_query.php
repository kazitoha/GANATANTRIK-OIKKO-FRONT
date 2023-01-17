<?php 
include_once '../../library/FPDF/fpdf.php';


require_once '../../database/db_connect.php';
$catch_id=$_GET['reg_id'];
$query="SELECT * FROM registered_graduates WHERE id=$catch_id";
$run_query=mysqli_query($db_connection,$query);
$data_fetch=mysqli_fetch_assoc($run_query);





$name=$data_fetch['name'];
$mother_name =  $data_fetch['mother_name'];
$father_name  = $data_fetch['father_name'];
$present_address = $data_fetch['present_address'];
$present_thana  = $data_fetch['present_thana'];
$present_district = $data_fetch['present_district'];
$permanent_address = $data_fetch['permanent_address'];
$permanent_thana = $data_fetch['permanent_thana'];
$permanent_district = $data_fetch['permanent_district'];
$nid_no = $data_fetch['nid_no'];
$date_of_birth =  $data_fetch['date_of_birth'];
$gender= $data_fetch['gender'];
$mobile_no =$data_fetch['mobile_no'];
$email =$data_fetch['email'];
$qualifying_degree= $data_fetch['qualifying_degree'];
$dept_name_institute =  $data_fetch['dept_name_institute'];
$reg_no= $data_fetch['reg_no'];
$session =$data_fetch['session'];
$graduation_year= $data_fetch['graduation_year'];
$occupation= $data_fetch['occupation'];
$images=$data_fetch['image'];
// $images="382402.jpg";















class PDF extends FPDF
{
// Page header
function Header()
{

 
    global $images;
    // Logo
    // $this->Image('../../uploads/logo/logo.jpg',8,10,20,20);
    // $this->Image('../../uploads/register_graduate/'.$images,160,5,35,30);
    // Arial bold 15
    // $this->SetFont('Arial','',15);
    // Move to the right
    // $this->Cell(80);
    // Title
    // $this->Cell(10,15,'University of Dhaka',10,0,'C');
    // Arial bold 15
    // $this->SetFont('Arial','B',15);
    // $this->Cell(-10,30,'Registered Graduate Enrollment Form ',10,0,'C');
    // Arial bold 15
    // $this->SetFont('Arial','',11);
    // $this->Cell(10,70,'For enrollment as Registered Graduates of the University [vide section 21(2) of the First Statutes] ',10,0,'C');


    // Line break
    $this->Ln(40);

}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-18);
    // Arial italic 8
    // $this->SetFont('Arial','I',);
    // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}







                     


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','I',14);
$pdf->Cell(0,8,"                                        ",0,1);
$pdf->Cell(0,10,"                                                        $name",0,1);
$pdf->Cell(0,10,"                                                        $mother_name",0,1);
$pdf->Cell(0,10,"                                                        $father_name",0,1);
$pdf->Cell(0,10,"                                                $present_address",0,1);
$pdf->Cell(0,10,"                                                   $present_thana                                      $present_district",0,1);
$pdf->Cell(0,10,"                                                   $permanent_address",0,1);
$pdf->Cell(0,10,"                                                  $permanent_thana                             $permanent_district",0,1);
$pdf->Cell(0,10,"                                    $nid_no",0,1);
$pdf->Cell(0,10,"                                     $date_of_birth                                     $gender",0,1);
$pdf->Cell(0,10,"                                     $mobile_no                                 $email",0,1);
$pdf->Cell(0,10,"                                     ",0,1);
$pdf->Cell(0,10,"           $qualifying_degree",0,1);
$pdf->Cell(0,10,"                                           $dept_name_institute",0,1);
// $i=1;
$pdf->Cell(0,10,"                                     $reg_no                                           $session",0,1);
$pdf->Cell(0,10,"                                            $graduation_year",0,1);
$pdf->Cell(0,10,"                                                     $occupation",0,1);

// $pdf->SetFont('Arial','B',15);
// $pdf->Cell(0,15,"Registration fee:",0,1);
// $pdf->SetFont('Arial','I',14);
// $pdf->Cell(0,10,"(a)Taka 500.00 for Three academic years.",0,1);
// $pdf->Cell(0,10,"(b)Taka 1200.00 for life.",0,1);
// $pdf->SetFont('Arial','B',15);
// $pdf->Cell(0,12,"I do hereby declare that the statements:",0,1);
// $pdf->SetFont('Arial','I',12);
// $pdf->Cell(0,10,"The statements made above are correct.In case of detection of any wrong entries my registration will be ",0,1);
// $pdf->Cell(0,10,"be liable to cancellation without any reference.",0,1);


// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>
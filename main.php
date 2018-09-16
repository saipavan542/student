<html>

   <head>
      <title>Registration Form</title>
   </head>

   <body>
   	<?php
   	$name=$rollnum=$year=$sec=$branch="";
   	?>
      <form method="post">

         Name:  <input type="text" name="name" value="<?php echo $name;?>">
         		</br>
         

         Rollnum:  <input type="text" name="rollnum" value="<?php echo $rollnum;?>">
         		</br>
         

         Year:
          <br />
            <input type = "radio" name = "year" value = "one">One
             <br />
            <input type = "radio" name = "year" value = "two">Two
             <br />
            <input type = "radio" name = "year" value = "three">Three
             <br />
            <input type = "radio" name = "year" value = "four">Four
             <br />
         

         Sec:
            <br />
            <input type = "radio" name = "sec" value = "s1">S1
             <br />
            <input type = "radio" name = "sec" value = "s2">S2
             <br />
         
         Branch:
         	<br />
            <input type = "radio" name = "branch" value = "cse">CSE
             <br />
            <input type = "radio" name = "branch" value = "ece">ECE
             <br />	
            <input type = "radio" name = "branch" value = "eee">EEE
             <br />	
            <input type = "radio" name = "branch" value = "it">IT
             <br />		
         	<input type = "radio" name = "branch" value = "mech">MECH
             <br />	
            <input type = "submit" name = "submit" value ="Submit"/>
          <br />	
         
       </form>

<?php
	

	$con = mysqli_connect('localhost','root','');

	if (!$con) 
	{
		echo 'Not connected to server';
		echo "<br>";
	}
	else
	{
		echo "Connected to server";
		echo "<br>";
	}

	if(!mysqli_select_db($con,'student'))
	{
		echo "Database not selected";
		echo "<br>";
	}
	else
	{
		echo "Database selected";
		echo "<br>";
	}
	if(isset($_POST['name']) && isset($_POST['rollnum']) && isset($_POST['year']) && isset($_POST['sec']) && isset($_POST['branch']))
	{
	$name = $_POST['name'];
	$rollnum = $_POST['rollnum'];
	$year = $_POST['year'];
	$sec = $_POST['sec'];
	$branch = $_POST['branch'];

	}
	$sql = "INSERT INTO details (Name,Rollnum,Year,Sec,Branch) VALUES ('$name','$rollnum','$year','$sec','$branch')";


	if(!mysqli_query($con,$sql))
	{
		echo "Not Inserted";
		echo "<br>";
	}
	else
	{
		echo "Inserted";
		echo "<br>";
	}
	echo "<br>";
	echo $name;
	echo "<br>";
	echo $rollnum;
	echo "<br>";
	echo $year;
	echo "<br>";
	echo $sec;
	echo "<br>";
	echo $branch;
?>

<?php
	require('fpdf/fpdf.php');
	$pdf =new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Image('logo.JPG',10,6,30);
	$pdf->Ln(50);
	$pdf->Cell(40,10,'Name:'.$_POST["name"],0,1);

	$pdf->Cell(40,10,'Rollnum:'.$_POST["rollnum"],0,1);
	$pdf->Cell(40,10,'Year:'.$_POST["year"],0,1);
	$pdf->Cell(40,10,'Section:'.$_POST["sec"],0,1);
	$pdf->Cell(40,10,'Branch:'.$_POST["branch"],0,1);
	//$pdf->WriteHTML2("<br>$name<br>");
	$pdf->Output();
	

?>
	
</body>
</html>
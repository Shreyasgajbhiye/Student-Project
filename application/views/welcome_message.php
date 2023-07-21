<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transcript intro Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>


  	<!-- Include Navbar -->
	<?php include_once "Navbar.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <h4>&nbsp;</h4>
        <h1><center>Pune Institute of Computer Technology,Pune</center></h1>
        <h2><center>Applying for an online transcript</center></h2>
        <h2>Online Transcripts</h2>
        <div>
            <h3>
                <strong>
                  Pune Institute of Computer Technology has implemented an online transcript system for college students and ex-students to apply for further education in foreign universities.
                  The fee for having your transcript approved is Rs....    Read the following procedure before proceeding to apply the transcript.
                </strong>
            </h3>
        </div>
        <div> 
                <h3>
                    <strong>
                        1)	You need to download the transcript template for your course and fill in all the information in that template without making a mistake.<br><br>
                        2)	Students applying for transcripts should fill in the required information in the fields provided in the online application form.<br><br>
                        3)	Follow the instructions for filling in the information in the template.<br><br>
                    </strong>
                </h3>
        </div>
        <div>
                <a href="<?php echo base_url("welcome/templates") ?>">click here for Templates</a>
        </div>
        <br>
        <div>
                <a href="<?php echo base_url("welcome/student_form") ?>">click here for online application</a>
       </div> 
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <title>transcript student information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

    <div class="container py-5">
        <h2 class="text-center mb-5">Students Details</h2>
        <?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
        <!-- Student Details From -->
<form action="addstudent/pay" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend class="fw-bold">Enter your Details</legend>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstname" class="form-label">Student First Name:</label>
                <input type="text" id="firstname" name="first_name" class="form-control">
                <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastname" class="form-label">Student Last Name:</label>
                <input type="text" id="lastname" name="last_name" class="form-control">
                <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-md-12 mb-3">
                <label for="fullname" class="form-label">Full Name (exactly as it appears in academic record):</label>
                <input type="text" id="fullname" name="full_name" class="form-control">
                <?php echo form_error('full_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="studentid" class="form-label">Student ID (Reg.ID No.):</label>
                <input type="text" id="studentid" name="reg_id" class="form-control">
                <?php echo form_error('reg_id', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Student Date of Birth:</label>
                <input type="date" id="dob" name="date_of_birth" class="form-control">
                <?php echo form_error('date_of_birth', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="col-md-6  mb-3">
                <label class="form-label">Gender:</label>
                <div class="d-flex">
                    <div class="form-check mx-2">
                        <input type="radio" id="male" name="gender" value="male" class="form-check-input">
                        <label for="male" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check mx-2">
                        <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                    <div class="form-check mx-2">
                        <input type="radio" id="transgender" name="gender" value="transgender" class="form-check-input">
                        <label for="transgender" class="form-check-label">Transgender</label>
                    </div>
                </div>
                <?php echo form_error('gender_error', '<div class="text-danger">', '</div>'); ?>
            </div>

                           <div class="col-md-6 mb-3">
                <label class="form-label">Direct admission into second year:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="direct_admission" id="noRadio" value="no">
                        <label class="form-check-label" for="noRadio">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="direct_admission" id="yesRadio" value="yes">
                        <label class="form-check-label" for="yesRadio">Yes</label>
                    </div>
                </div>
                <?php echo form_error('gender_error', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Year of Joining:</label>
                <?php
                    $current_year = date('Y')-1;
                    $oldest_year = 1983;
                ?>

                <select id="yearofjoining" name="year_of_joining" class="form-select">
                    <?php for($i=$current_year; $i>=$oldest_year; $i--): ?>
                    <option value="<?php echo $i ?>">
                        <?php echo $i ?>
                    </option>
                    <?php endfor; ?>
                </select>
                
                <?php echo form_error('year_of_joining_error', '<div class="text-danger">', '</div>'); ?>
            </div>


            <div class="col-md-6 mb-3">
                <label class="form-label">Year of Passing (actual/projected):</label>
                <select class="form-select" name="year_of_passing">
                    <option value="">Year of Passing</option>
                     <?php
                        for($i = 2026; $i >= 1987; $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?> 
                </select>
                <?php echo form_error('year_of_passing_error', '<div class="text-danger">', '</div>'); ?>

                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Department:</label>
                        <select class="form-select" name="department">
                            <option value="">Select Your Branch</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Information Technology Engineering">Information Technology Engineering
                            </option>
                            <option value="Electronics & telecommunication Engineering">Electronics &
                                telecommunication Engineering</option>
                        </select>
                        <?php echo form_error('department_error', '<div class="text-danger">', '</div>'); ?>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Course:</label>
                        <select class="form-select" name="course">
                            <option value="">Select Your Course</option>
                            <option value="Bachelor of Engineering">Bachelor of Engineering</option>
                            <option value="Master of Engineering">Masters of Engineering</option>
                        </select>
                        <?php echo form_error('course_error', '<div class="text-danger">', '</div>'); ?>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Semesters completed (for which transcript is sought):</label>
                        <select class="form-select" name="semesters_completed">
                            <option value="">Semesters</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                        <?php echo form_error('semesters_completed_error', '<div class="text-danger">', '</div>'); ?>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Mobile Number:</label>
                        <input type="text" class="form-control" name="contact_mobile">
                        <?php echo form_error('contact_mobile_error', '<div class="text-danger">', '</div>'); ?>

                    </div>

        

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student Email ID for receiving approved document:</label>
                        <input type="email" class="form-control" name="email">
                        <?php echo form_error('email_error', '<div class="text-danger">', '</div>'); ?>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Transcript (ONLY as per <a
                                href="templates.html">Template</a>):</label>
                        <input type="file" class="form-control" name="transcript_file" />
                        <?php echo form_error('email_error', '<div class="text-danger">', '</div>'); ?>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">PDF file with scans of marksheets: </label>
                        <input type="file" class="form-control" name="marksheets_file"><br><br>
                        <?php echo form_error('marksheets_file_error', '<div class="text-danger">', '</div>'); ?>

                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="checkbox" name="accepted_terms" value="I accept the Terms of Service"> I accept the <a
                            href="terms page.html" style="color: blue;text-decoration: none;">Terms of Service</a><a
                            href=""></a><br><br>
                        <br>
                        <?php echo form_error('accepted_terms_error', '<div class="text-danger">', '</div>'); ?>

                                </div>
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <input class="btn w-100 btn-primary " type="submit" value="Submit">
                                    </div>
                                </div>
            </fieldset>
        </form>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
    <br>

    <?php
    $data = $this->session->userdata('email');
    if ($data !== null) {
        // If session data exists, display the email
        echo $data;
        ?>

<table class="table">
    <thread>
        <th>id</th>
        <th>Name</th>
        <th>Reg_id</th>
        <th>DOB</th>
        <th>Sex</th>
        <th>Direct 2nd yr</th>
        <th>Joining</th>
        <th>Passing</th>
        <th>Dept</th>
        <th>Course</th>
        <th>Sem complete</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Marksheet</th>
        <th>Transcript</th>
    <thread>

    <tbody>
    <?php foreach ($inputs as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['reg_id']; ?></td>
                    <td><?php echo $row['date_of_birth']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['direct_admission']; ?></td>
                    <td><?php echo $row['year_of_joining']; ?></td>
                    <td><?php echo $row['year_of_passing']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['semesters_completed']; ?></td>
                    <td><?php echo $row['contact_mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                    <?php $marksheetPath = base_url('../uploads/marksheets/').$row['marksheets_file']; ?>
                    <a href="<?php echo $marksheetPath; ?>" target="_blank">View</a>
                    </td>
                    <td>
                    <?php $transcriptPath = base_url('../uploads/transcripts/').$row['transcript_file']; ?>
                    <a href="<?php echo $transcriptPath; ?>" target="_blank">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>

    <?php } else { ?>
        <!-- If session data is null, show the "Session Expired" message -->
        <p>Session Expired</p>
    <?php } ?>
</body>
</html>

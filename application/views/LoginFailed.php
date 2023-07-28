<!DOCTYPE html>
<html>
    <head>
        <title>Login failed</title>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<body>
<h1>Login failed</h1>
<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Login failed",
            text: "Invalid input!!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    });

    setTimeout(function() {
        window.location.href = "<?php echo base_url('login'); ?>";
    }, 1500);
</script>
</body>
</html>


<?php


if (isset($_GET["alert"])) :

    $alert = $_GET["alert"];

    switch ($alert) {
        case 'del_s':
?>
            <script>
                swal("Student Deleted Successfully", '', 'success');
            </script>
<?php
            break;

        default:
            # code...
            break;
    }

endif;

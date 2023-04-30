<?php

if (isset($alert_success)) {
    foreach ($alert_success as $alert_success) {
        echo '<script>swal("'.$alert_success.'", "", "success");</script>';
    }
}

if (isset($alert_warned)) {
    foreach ($alert_warned as $alert_warned) {
        echo '<script>swal("'.$alert_warned.'", "", "warning");</script>';
    }
}

if (isset($alert_error)) {
    foreach ($alert_error as $alert_error) {
        echo '<script>swal("'.$alert_error.'", "", "error");</script>';
    }
}

if (isset($alert_info)) {
    foreach ($alert_info as $alert_info) {
        echo '<script>swal("'.$alert_info.'", "", "info");</script>';
    }
}


?>
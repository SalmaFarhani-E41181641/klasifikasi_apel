<?php
function user_logged_in()
{
    $var_ci = get_instance();
    if (!$var_ci->session->userdata('email')) {
        redirect('auth');
    }
}

function cekuser()
{
    $var_ci = get_instance();
    if ($var_ci->session->userdata('role') != 1) {
        redirect('forbidden');
        die;
    }
}


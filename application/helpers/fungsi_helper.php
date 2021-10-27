<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        redirect('home');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user') == 1;
    if (!$user_session) {
        $ci->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Hei, Ayo mau ngapain!!!
            </div>');
        redirect('auth/loginshop');
    }
}

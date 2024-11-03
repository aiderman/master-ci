<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function no_cache()
{
    $CI = &get_instance();
    $CI->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $CI->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
    $CI->output->set_header('Pragma: no-cache');
}

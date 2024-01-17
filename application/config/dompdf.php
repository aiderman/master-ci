<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['composer_autoload'] = 'vendor/autoload.php'; // Lokasi autoload.php dari Composer
$config['font_path'] = APPPATH . 'vendor/composer/dompdf/lib/fonts/'; // Lokasi font
$config['font_cache'] = WRITEPATH . 'fonts/';
$config['temp_dir'] = FCPATH . 'assets/temp/'; // Lokasi penyimpanan sementara
$config['dompdf'] = array(
    'enabled' => true,
    'chroot' => realpath(FCPATH),
    'tempDir' => WRITEPATH,
    // ...
);

return $config;

<?php
function admin_custom_js()
{
  echo '<script type="text/javascript" src="' . get_theme_file_uri('/assets/js/admin.js') . '"></script>';
}
add_action('admin_head', 'admin_custom_js');

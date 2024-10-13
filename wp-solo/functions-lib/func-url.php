<?php
/**
 * func-url
 * URL関数
 */
/**
 * パスを定義
 */
/* テンプレートパスを返す */
function temp_path($file = "")
{
  echo esc_url(get_template_directory_uri() . '/' . $file);
}

/* assetsパスを返す */
function assets_path($file = "")
{
  echo esc_url(get_template_directory_uri() . '/assets/' . $file);
}

/* 画像パスを返す */
function img_path($file = "")
{
  echo esc_url(get_template_directory_uri() . '/assets/images/' . $file);
}

/* mediaフォルダへのURLを返す */
function uploads_path($file = "")
{
  $upload_dir = wp_upload_dir();
  echo esc_url($upload_dir['baseurl'] . '/' . $file);
}


/* ホームURLのパスを返す
 *
 * $page = worksの場合、https://xxxx.co.jp/works/ を返す
 * 呼び出しは、<?php page_path('works'); ?> で実施する
*
*/
function page_path( $page= "" ) {
$page = $page . '/';
echo esc_url(home_url($page));
}
?>
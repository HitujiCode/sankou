<?php

/**
 * Functions
 */
// 基本設定
get_template_part('functions-lib/func-base');

// セキュリティー対応
get_template_part('functions-lib/func-security');

// スクリプト、スタイルシートの設定
get_template_part('functions-lib/func-enqueue-assets');

// 投稿のラベルをお知らせに変更
get_template_part('functions-lib/func-add-posttype-post');

// メインクエリの投稿記事表示件数を切り替える
get_template_part('functions-lib/func-posts-edit');

// URL関数
get_template_part('functions-lib/func-url');

// 管理画面カスタマイズ
// get_template_part('functions-lib/func-admin');

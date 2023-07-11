<?php
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');
?>
<?php
function enqueue_name()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/styles/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_name');
?>
<?php
add_action( 'init', 'add_post_type' );
function add_post_type() {

  //カスタム投稿タイプ「PROJECTS」
  register_post_type( 'works',//「works」はお好みで変えてください（カスタムタクソノミーを設定する時にも使います）
  array(
  'labels' => array(
  'name' => __('PROJECTS'),//「PROJECTS」「制作一覧」はお好みで変えてください
  'singular_name' => __('PROJECTS'),
  'all_items' => __('PROJECTS一覧'),
  ),
  'public' => true,
  'menu_position' =>5,
  'menu_icon' => 'dashicons-admin-customizer',//アイコン画像
  'supports' => array('title','editor','thumbnail','custom-fields','excerpt','trackbacks','comments','revisions','page-attributes'),
  'has_archive' => true,
  'show_in_rest' => true,
  )
  );

}
function add_taxonomies() {
	//PROJECTSカテゴリー
    register_taxonomy( 'works_cat', //「works_cat」はお好みで変更してください
        array( 'works' ), //「works」は作成したカスタム投稿タイプの名前にしてください
        array(
            'label' => 'PROJECTSカテゴリー', //表示名
			'public' => true,
			'show_in_menu' => true,
            'show_ui' => true, 
            'show_admin_column' => true, 
            'show_in_nav_menus' => true, 
            'hierarchical' => true, //trueはカテゴリー・falseはタグ
			'rewrite' => array( 'slug' => 'works_cat', 'with_front' => true, ),//パーマリンクの設定
			'show_in_rest' => true,
			'rest_base' => "",
			)
    );
	//PROJECTSタグ
    register_taxonomy( 'works_tag', //「works_tag」はお好みで変更してください
        array( 'works' ), //「works」は作成したカスタム投稿タイプの名前にしてください
        array(
            'label' => 'PROJECTSタグ', //表示名
			'public' => true,
			'show_in_menu' => true,
			'show_ui' => true, 
            'show_admin_column' => true, 
            'show_in_nav_menus' => true, 
			'hierarchical' => false,//trueはカテゴリー・falseはタグ
			'rewrite' => array( 'slug' => 'works_tag', 'with_front' => true, ),//パーマリンクの設定
			'show_in_rest' => true,
			'rest_base' => "",
        )
    );
}
add_action( 'init', 'add_taxonomies', 0 );
//抜粋の設定//
function twpp_change_excerpt_length( $length ) {
    $length = 50;
  
    if ( is_category() || is_tax() ) {
      $length = 100;
    } 
  
    return $length; 
  }
  
  add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );
  
  function twpp_change_excerpt_more( $more ) {
    return '';
  }
  add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );
  
  //
  add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
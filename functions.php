<?php
	
	 //Registering Multiple Menus
 function register_menus() {
   register_nav_menus(
     array(
      'Main-menu' 		=> __( 'Main Menu', 'eveha' ),
    )
  );
 }
 add_action( 'init', 'register_menus' );


//thumbnail image
 add_theme_support('post-thumbnails', array('post', 'page'));


 /*sidebar widget registration*/
function sidebar_widgets(){
	register_sidebar(array(
		'name' 			=> esc_html__('sidebar widget', 'eveha'),
		'description' 	=> esc_html__('this is sidebar widget area', 'eveha'),		
		'id'			=> 'sidebar-widget-one',
		'before_widget' => '<div class="sidebar-box"><div class="sidebar-menu">',
		'after_widget'	=> '</div></div>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
	));


	register_sidebar(array(
		'name' 			=> esc_html__('footer widget ', 'eveha'),
		'description' 	=> esc_html__('this is footer widget area', 'eveha'),		
		'id'			=> 'footer-widget',
		'before_widget' => ' <div class="box"><div class="footer-menu">',
		'after_widget'	=> '</div></div>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
	));

	register_sidebar(array(
		'name' 			=> esc_html__('header widget ', 'eveha'),
		'description' 	=> esc_html__('this is header widget area', 'eveha'),		
		'id'			=> 'header-widget',
		'before_widget' => ' <div class="header-widget"> ',
		'after_widget'	=> '</div>',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));


}
add_action('widgets_init', 'sidebar_widgets');
?>
<?php /*user profile*/
function social_media_profile($user){
?>
<h3>Socila Media Profile</h3>
<table class="from-table">
	<tr>
		<th><label for="facebook">Facebook</label></th>
		<td>
			<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text">
			<span class="description">enter facebook url. ex- https//facebook.com/user/</span>
		</td>
	</tr>

	<tr>
		<th><label for="twitter">Twitter</label></th>
		<td>
			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text">
			<span class="description">enter twitter url. ex- https//twitter.com/user/</span>
		</td>
	</tr>

	<tr>
		<th><label for="pinterest">Pinterest</label></th>
		<td>
			<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr(get_the_author_meta('pinterest', $user->ID)); ?>" class="regular-text">
			<span class="description">enter pinterest url. ex- https//pinterest.com/user/</span>
		</td>
	</tr>

	<tr>
		<th><label for="instagram">Instagram</label></th>
		<td>
			<input type="text" name="instagram" id="instagram" value="<?php echo esc_attr(get_the_author_meta('instagram', $user->ID)); ?>" class="regular-text">
			<span class="description">enter instagram url. ex- https//instagram.com/user/</span>
		</td>
	</tr>

	<tr>
		<th><label for="youtube">Youtube</label></th>
		<td>
			<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>" class="regular-text">
			<span class="description">enter youtube url. ex- https//youtube.com/user/</span>
		</td>
	</tr>

	<tr>
		<th><label for="linkedin">LinkedIn</label></th>
		<td>
			<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text">
			<span class="description">enter linkedin url. ex- https//linkedin.com/user/</span>
		</td>
	</tr>

</table>
<?php }
add_action('show_user_profile', 'social_media_profile');
add_action('edit_user_profile', 'social_media_profile');


function save_social_media_profile($user_id){
	if(!current_user_can('edit_user', $user_id))
		return false; 
	/* copy and paste this line for additional fields. make sure to change 'facebook' to the field ID*/
	update_user_meta($user_id, 'facebook', $_POST['facebook']);
	update_user_meta($user_id, 'twitter', $_POST['twitter']);
	update_user_meta($user_id, 'pinterest', $_POST['pinterest']);
	update_user_meta($user_id, 'instagram', $_POST['instagram']);
	update_user_meta($user_id, 'youtube', $_POST['youtube']);
	update_user_meta($user_id, 'linkedin', $_POST['linkedin']);

}
add_action('personal_options_update', 'save_social_media_profile');
add_action('edit_user_profile_update', 'save_social_media_profile');
?>
<?php
add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}
?>
<?php add_theme_support( 'custom-background' ); ?>
<?php add_theme_support( 'custom-header' ); ?>
<?php add_theme_support( 'custom-logo' ); ?>
<?php add_theme_support( 'automatic-feed-links' );?>
<?php add_editor_style(); ?>
<?php
function add_scripts(){
	wp_enqueue_style('Style', get_stylesheet_uri()); 
	wp_enqueue_style('Main', get_template_directory_uri().'/css/main.css', '', '', ''); 
	wp_enqueue_style('Menu', get_template_directory_uri().'/css/menu.css', '', '', ''); 
	wp_enqueue_style('Form', get_template_directory_uri().'/css/form.css', '', '', ''); 
	wp_enqueue_style('Front page', get_template_directory_uri().'/css/front-page.css', '', '', ''); 	
}
add_action('wp_enqueue_scripts', 'add_scripts');
?>
<?php
/*
Plugin Name: Save test
Plugin URI: https://florian-valois.com/
Description: A save page plugin
Author: Florian Valois
Author URI: https://florian-valois.com/
Text Domain: save-test
Domain Path: /languages/
Version: 0.1
*/

if (!defined('ABSPATH')) {
	exit;
}

add_action('admin_menu','test_plugin_setup_menu');
function test_plugin_setup_menu(){
      add_menu_page('Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
}
// Import fichiers CSS et JS
add_action( 'admin_init', 'import_style_script2' );
function import_style_script2() {
  $pluginDirectory = plugins_url() .'/'. basename(dirname(__FILE__));
  wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css' );
	wp_enqueue_script(
      'ajax-script', 		
			$pluginDirectory.'/script.js',
			false, 
			'', 
			true
    );
	wp_localize_script(
      'ajax-script',
      'wpk_ajax',
			array('ajaxurl' => admin_url( 'admin-ajax.php' ))
    );
}

function test_init(){
	register_setting( 'myplugin_options_group', 'myplugin_option_name' );
      echo "<h1>Titre</h1>";
  
  ?>
  
  <form id="save-test" class="formAjax" method="post" name="">

    <input type="text" id="" class="regular-text" name="input_1" style="width: 300px;" value="">
    <input type="text" id="" name="input_11" value="">
    <input type="text" id="" name="input_12" value="">
    <button type="submit">Envoyer <i class="far fa-save"></i></button>
    <input type="hidden" name="submitForm" value="form_01">
  </form>
  
  <form id="save-test-2" class="formAjax" method="post" action="" name="">
    <input type="text" id="" name="input_2" value="">
    <input type="text" id="" name="input_21" value="">
    <input type="text" id="" name="input_22" value="">
    <button type="submit">Envoyer <i class="far fa-save"></i></button>
    <input type="hidden" name="submitForm" value="form_02">
  </form>
  
  <form id="save-test-3" class="formAjax" method="post" action="" name="">
    <input type="text" id="" name="input_3" value="">
    <input type="text" id="" name="input_31" value="">
    <input type="text" id="" name="input_32" value="">
    <button type="submit">Envoyer <i class="far fa-save"></i></button>
    <input type="hidden" name="submitForm" value="form_03">
  </form>
  
  <div id="yolo"></div>

  <?php
		$insertDataRow = array(
		'form_01',
		'form_02',
		'form_03'
	);
	
	foreach($insertDataRow as $key){
		echo $key.'<br>';
	}
	
}

add_action( 'wp_ajax_' . 'wpk_saveData', 'save_options' );
add_action( 'wp_ajax_nopriv_' . 'wpk_saveData', 'save_options' );
function save_options() {
	
		global $wpdb;
	
		$table = array();
		foreach($_POST['data'] as $key){
			$table[$key['name']] = htmlspecialchars($key['value']);
		}		
	
		$data = serialize($table);
	
		foreach($_POST['data'] as $key){		
			if($key['name'] === 'submitForm'){
				$sectionName = $key['value'];
			}
		}
			
		$results = $wpdb->query( "SELECT * FROM {$wpdb->prefix}keliosis WHERE name = '$sectionName'");
		
		if($results != null){
//			var_dump('existe en bdd');
			foreach($results as $item){
				$id = $item->id;
				$name = $item->name;
				$value = $item->value;
			}
			$test = $wpdb->query( "UPDATE {$wpdb->prefix}keliosis SET value = '$data' WHERE name = '$sectionName'" );
			
			// Sauvegarde des data
			$update_options = json_encode(array(
					'update' => $test
			));

			echo $update_options;  
			
			
		} else{
//			var_dump('n\'existe pas en bdd');
		}
		
		foreach($results as $item){
//			var_dump($item->id);
//			var_dump($item->name);
//			var_dump($item->value);
//			if($item->name === $sectionName){
//				var_dump($item->id);
//				var_dump($item->name);
//				var_dump($item->value);
//			} else {
//				var_dump('pas encore en bdd');
//			}
		}
	
	
//	var_dump(serialize($_POST['data']));
//		if(!$sectionName){
//			$wpdb->insert(
//				$wpdb->prefix.'keliosis',
//				array(
//					'name' => $sectionName,
//					'value' => $yolo
//				)
//			);
//		} else{
//			$wpdb->replace(
//				$wpdb->prefix.'keliosis',
//				array(
//					'name' => $sectionName,
//					'value' => serialize($table)
//						 )
//			);
//		}
	
	
		foreach($_POST['data'] as $key){				
			
			
			if($key['name'] === 'submitForm'){
				$yolo = $key['value'];
//				$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}keliosis WHERE name = '".$key['value']."'", OBJECT );
//				var_dump($_POST['data']);
//				var_dump($results);
//				var_dump($key['value']);
				
			}
			
			
//			var_dump($yolo);
			
		} 
	
//UPDATE `wp_keliosis` SET `value` = 'test' WHERE `name` = 'backtotop' 
	
//	  $table_name = $wpdb->prefix . 'keliosis';
	
	
//		var_dump($_POST['data']);
	
	
	
	
//	foreach($_POST['data'] as $key){
//		if($key['name'] === $results[0]->name){
//			var_dump('yolo');
//			$wpdb->insert(
//				$wpdb->prefix.'keliosis',
//				array('name' => 'sdf','value' => 'sdfg')
//			);
//		} else{
//			var_dump('pas yolo');
//		}
//		var_dump($key['name']);
//		var_dump($results[0]->name);
//	}

	
//			
//		$wpdb->insert( 
//			$table_name, 
//			array( 
//				'name' => 'test', 
//				'value' => $params
//			) 
//		);

	
	
//  	// Récupération des données du form
//		$params = array();
//
//		// Mise en place des datas dans le tableau
//		parse_str($_POST['data'], $params);
//
//		// Sauvegarde des données
//		$option_name = 'test' ;
//
//		if($_POST['data']){
//
//			// Sauvegarde des data
//			$update_options = json_encode(array(
//					'update' => update_option( $option_name, $params )
//			));
//
//			echo $update_options;   
//
//		}
//		
		die(); 
}


function jal_install() {
	global $wpdb;

//	$table_name = $wpdb->prefix . 'keliosis';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$wpdb->prefix}keliosis (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		name varchar(191) NOT NULL,
		value longtext NOT NULL,
		PRIMARY KEY  (id),
		UNIQUE KEY name (name)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	
	dbDelta( $sql );

}

function jal_uninstall() {
	 global $wpdb;
	 $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}keliosis");
}

function jal_install_data() {
	global $wpdb;
	
	$table_name = $wpdb->prefix.'keliosis';
	
	$insertDataRow = array(
		'form_01',
		'form_02',
		'form_03'
	);
	
	foreach($insertDataRow as $key){
		$wpdb->query( "INSERT {$wpdb->prefix}keliosis SET name = '$key'" );
	}
	
	
//	$wpdb->insert( 
//		$table_name,
//			array( 
//				'id' => 1, 
//				'name' => 'form_01'
//			)
//	);
}

register_activation_hook( __FILE__, 'jal_install' );
register_deactivation_hook( __FILE__, 'jal_uninstall' );
register_activation_hook( __FILE__, 'jal_install_data' );
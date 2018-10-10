<?php 
function save_options() {
  
  $option_name = 'myplugin_option_name' ;
  $new_value = array(
    'new_option_name' => $_POST['value']
  );
  
  return $new_value;
}
echo 'test';
//global $options;



//if ( get_option( $option_name ) ) {

    // The option already exists, so we just update it.
    //update_option( $option_name, $new_value );

//} else {
//
//    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
//    $deprecated = null;
//    $autoload = 'no';
//    add_option( $option_name, $new_value, $deprecated, $autoload );
//}

//echo json_encode($new_value);
?>
<?php
/*

Plugin Name: MonPlugin
Plugin URI: 
Description: First step to create a wordpress plugin
Version: 0.0.1
Author: Mehdi & Taoufiq
Author URI: https://wp_plugin.com/wordpress-plugins/
License: GPLv2 or later

*/
// define(‘WP_USE_EXT_MYSQL’, true);

add_action("admin_menu","addMenu");


function addMenu() {
    add_menu_page( 'MonPlugin', 'MonPlugin', 'read', 'MonPlugin_Dashboard', 'MonPlugin_index' );
    add_submenu_page( 'MonPlugin_Dashboard', 'MonPlugin', 'Settings', 'read', 'MonPlugin_Dashboard', 'MonPlugin_index');
    add_submenu_page( 'MonPlugin_Dashboard', 'MonPlugin', 'info', 'read', 'MonPlugin_NouvellePage', 'MonPlugin_NouvellePage');
}



function MonPlugin_index(){
    require_once( dirname( dirname( dirname( dirname( __FILE__ )))) . '/wp-load.php' );
    global $wpdb;
    if(isset($_POST['submit'])){
        $option=$_POST['option'];
        $name = $_POST['inputtxt'];
        $email = $_POST['inputarea'];
$table_name = $wpdb->prefix . "plugin_table";

$wpdb->insert( $table_name, array(
                        'inputtxt' => $name,
                        'inputarea' => $email,
                        'option'=>$option
                        )); 
    echo '<h1 style="color:blue; text-align:center">data registred check your info page</h1> ';
    }
  ?>     
  <center>  
  <h1 style="color:green; text-align:center">register some infos</h1> 
   <form action="" method="post">
    <label for="inputtxt">Firstname:</label>
     <input type="text" name="inputtxt" id="inputtxt"  required/><br><br>
    
    <label for="inputarea">Texte Area:</label> 
    <textarea type="text" name="inputarea" id="inputarea"  required></textarea><br><br> 
   <label for="option"> options :</label>
    <select name="option" id="option" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>
    <input type="submit" name="submit"/>
  </form>
</center>
  <?php

}

function MonPlugin_NouvellePage(){
    
    
    echo '<h1 style="color:green; text-align:center">All Data</h1>';
    
    
    global $wpdb;
    $table_name = $wpdb->prefix . "plugin_table";
    $results = $wpdb->get_results( "SELECT * FROM $table_name"); 
    ?>
    <center>
    <?php
if(!empty($results))  
{    
    ?>  
    <table >
        <thead >
            <tr>
                <th >ID</th>
                <th>Input Text</th>
                <th>Input Area</th>
                <th>Input option</th>
            </tr>
        </thead>
        <tbody s">
    <?php
          
    foreach($results as $row){   
        
        ?>
        <tr>
            <td><?php  echo $row->id ; ?></td>
            <td><?php echo $row->inputtxt ;?></td>
            <td><?php echo $row->inputarea ;?></td>
            <td><?php echo $row->option ;?></td>
        </tr>
     
        <?php
    }
    ?>
    <tbody>
  </table>
<?php
}else{
    echo 'there is no data for now';
}
?>
    </center>
<?php
}
//runs when plugin is activated
register_activation_hook( __FILE__, 'create_table' );

function create_table(){
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "plugin_table";  

    $sql = "CREATE TABLE $table_name (
      id int(10) unsigned NOT NULL AUTO_INCREMENT,
      inputtxt varchar(255) NOT NULL,
      inputarea varchar(255) NOT NULL,
      option varchar(5) NOT NULL,
      
      PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    dbDelta( $sql );
}

// Runs when plugin is desactivated
register_deactivation_hook( __FILE__, 'remove_table' );

function remove_table() {
    global $wpdb;
     $table_name = $wpdb->prefix . 'plugin_table';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
} 

?>

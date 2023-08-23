<?php 
/** 
 * My-Plugin 
 * 
 * @package MyPlugin 
 * @author Umair Iqbal
 * @copyright 2020 Umair Iqbal 
 * @license GPL-2.0-or-later 
 * 
 * @wordpress-plugin 
 * Plugin Name: My Plugin 
 * Plugin URI: https://github.com/Umair10110/Umair10110 
 * Description: This is a API Testing Plugin. 
 * Version: 0.0.1 
 * Author: Umair Iqbal
 * Author URI: https://github.com/Umair10110/Umair10110 
 * Text Domain: hello-world 
 */




function wp_demo_shortcode() { 
  
    
    $message = 'Hello world!'; 
    $endpoint = 'https://jsonplaceholder.typicode.com/todos';

    $request = wp_remote_get($endpoint);
    $data = json_decode( wp_remote_retrieve_body( $request ) );
    $output = '<ol>';
    foreach ($data as $line) {
    $output .= '<li>';
    $output .= 'id=' . $line->id . '<br>';
    $output .= 'userId=' . $line->userId . '<br>';
    $output .= 'title=' . $line->title . '<br>';
    $output .= $line->completed == 1 ? 'completed=True' : 'completed=false' . '<br>';
    $output .= '</li>';
}
$output .= '</ol>';
    return $output;
    }
    
    add_shortcode('getting_data', 'wp_demo_shortcode');

        add_shortcode('data_submission_form', 'data_submission_form_shortcode');
        function data_submission_form_shortcode() {
            ob_start();
            ?>
            <form id="data-submission-form" method="post" action="<?php echo esc_attr( admin_url( 'admin-post.php' ) ); ?>">
                <input type="hidden" name="action" value="submit_data">
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="completed" placeholder="Completed (true/false)" required>
                <button type="submit">Submit Data</button>
            </form>
            <?php
            
            return ob_get_clean();
            
        }

add_action('admin_post_submit_data', 'handle_data_submission');
add_action('admin_post_nopriv_submit_data', 'handle_data_submission');
function handle_data_submission() {
    
    $title = sanitize_text_field($_POST['title']);
    $completed = ($_POST['completed'] === 'true') ? true : false;
    
    
    $data = array(
        'title'=>$title,
        'completed' => $completed,
        'userId' => '1000'
    );
    echo json_encode($data);
   
    $response = wp_remote_post('https://jsonplaceholder.typicode.com/todos', array(
        'body' => json_encode($data),
        'headers' => array('Content-Type' => 'application/json'),
    ));

    if (is_wp_error($response)) {
       
        $error_message = $response->get_error_message();
        echo $error_message;
    } else {
        
        echo "data store successfully";
        echo "</br>";
        
    } 
    // wp_redirect($_SERVER['HTTP_REFERER']);
    exit;
}


function custom_table_shortcode($atts) {
    $atts = shortcode_atts(array(
        'table' => '', 
    ), $atts);
    
    global $wpdb;
    $table_name = $wpdb->prefix . $atts['table'];
    
    $data = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
    
    $output = '<ul>';
    foreach ($data as $row) {
        $output .= '<li>' . esc_html($row['column_name']) . '</li>';
    }
    $output .= '</ul>';
    
    // return $output;
    echo $output;
}
add_shortcode('custom_table', 'custom_table_shortcode');

function custom_table_endpoint_callback($request) {
    $table_name = $request['table'];
    
    global $wpdb;
    $table_name = $wpdb->prefix . $table_name;
    
    $data = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
    
    return rest_ensure_response($data);
}

function register_custom_table_endpoint() {
    register_rest_route('custom/v1', 'table/(?P<table>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'custom_table_endpoint_callback',
    ));
}
add_action('rest_api_init', 'register_custom_table_endpoint');

function custom_data_endpoint_callback($request) {
    // Get parameters from the request
    $table = $request->get_param('table');

    global $wpdb;
    $table_name = $wpdb->prefix . $table;

    // Perform the database query
    $data = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return rest_ensure_response($data);
}

function register_custom_data_endpoint() {
    register_rest_route('custom/v1', 'get-data/', array(
        'methods' => 'GET',
        'callback' => 'custom_data_endpoint_callback',
    ));
}
add_action('rest_api_init', 'register_custom_data_endpoint');


?>


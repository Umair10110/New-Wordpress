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
 * License: GPL v2 or later 
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */

?>

<?php

add_shortcode('subscribe', 'my_api_plugin');
function my_api_plugin()  {
  echo "<h1>Hello World</h1>"; 


// Set the API endpoint URL
$endpoint = 'https://jsonplaceholder.typicode.com/todos';

// Set the data to be sent to the API
$data = array(
  'userId' => 1,
  'title' => 'Buy milk',
  'completed' => false
);

// Send a POST request to the API to create a new todo
$response = wp_remote_post( $endpoint, array(
  'headers' => array( 'Content-Type' => 'application/json; charset=utf-8' ),
  'body' => json_encode( $data )
) );

// Check if the request was successful and retrieve the new todo ID
if ( is_wp_error( $response ) ) {
  // Handle error
} else {
  $new_todo_id = json_decode( wp_remote_retrieve_body( $response ) )->id;
}

// Send a GET request to retrieve all todos
$response = wp_remote_get( $endpoint );

// Check if the request was successful and retrieve the todos
if ( is_wp_error( $response ) ) {
  // Handle error
} else {
  $todos = json_decode( wp_remote_retrieve_body( $response ) );
}

}

function wpb_demo_shortcode() { 
  
    // Things that you want to do.
    $message = 'Hello world!'; 
    $endpoint = 'https://jsonplaceholder.typicode.com/todos';

    $request = wp_remote_get($endpoint);
    $data = json_decode( wp_remote_retrieve_body( $request ) );
    $output = '<ul>';
foreach ($data as $line) {
    $output .= '<li>';
    $output .= 'id=' . $line->id . '<br>';
    $output .= 'userId=' . $line->userId . '<br>';
    $output .= 'title=' . $line->title . '<br>';
    $output .= $line->completed == 1 ? 'completed=True' : 'completed=false' . '<br>';
    $output .= '</li>';
}
$output .= '</ul>';
    


    // Output needs to be return
    echo $output;
    }
    // register shortcode
    add_shortcode('greeting', 'wpb_demo_shortcode');


    function store() { 
  
        $id = 10202;
        $title="Test";
        $completed = 1;
        $userId = 1;
        // Things that you want to do.
    //     $message = 'Hello world!'; 
    //     $endpoint = 'https://jsonplaceholder.typicode.com/todos';
    
    //     $request = wp_remote_get($endpoint);
    //     $data = json_decode( wp_remote_retrieve_body( $request ) );
    //     $output = '<ul>';
    // foreach ($data as $line) {
    //     $output .= '<li>';
    //     $output .= 'id=' . $line->id . '<br>';
    //     $output .= 'userId=' . $line->userId . '<br>';
    //     $output .= 'title=' . $line->title . '<br>';
    //     $output .= $line->completed == 1 ? 'completed=True' : 'completed=false' . '<br>';
    //     $output .= '</li>';
    // }
    // $output .= '</ul>';
        
    
    
    //     // Output needs to be return
    //     echo $output;
        }
        // register shortcode
        add_shortcode('greetings', 'store');
?>


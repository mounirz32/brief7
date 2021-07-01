<?php
/**
 * Plugin Name: contactPlugin
 * Discription: brief 9
 * Author: Mounir Zelouani
 */

   function contact_form_plugin() {
      $content = '';
      $content .= '<h2>Contact Form</h2>';
      $content .= '<form method="POST"';
      $content .= '<label for="your_name">name</label>';
      $content .= '<input type="text" style="margin-left: 1em; width: 50%; margin-bottom: 1em;" name="your_name" placeholder="Name" />';
      $content .= '<br>';
      $content .= '<label for="your_email">Email</label>';
      $content .= '<input type="email" name="your_email" placeholder="Enter Your Email" style="margin-left: 1em; width: 50%; margin-bottom: 1em;" />';
      $content .= '<br>';
      $content .= '<label>Subjecte</label>';
      $content .= '<input type="text" name="subjecte" placeholder="enter your subejct" style="margin-bottom: 1em; width: 50%;" />';
      $content .= '<br>';
      $content .= '<label for="your_message" style="position: relative; right: 1.5em">Message</label>';
      $content .= '<input type="text" name="your_message" placeholder="Enter Your Message" style="margin-left: -0.6em; width: 50%; height: 20vh;" />';
      $content .= '<br>';
      $content .= '<input type="submit" value="Send" name="submit" style="margin-left: 4em; margin-top: 1em">';
      $content .= '</form>';
      return $content;
   }

   add_shortcode('contact_form', 'contact_form_plugin');

   function app_output_buffer()
{
    ob_start();
} // soi_output_buffer
add_action('init', 'app_output_buffer');


   if(isset($_POST['submit'])){
     
      add_action('init', 'tab');
      add_action('init', 'insert_data');
   }

   function tab() {
      require_once(ABSPATH . 'wp-config.php');
      $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
      mysqli_select_db($connection, DB_NAME);

      $sql = "CREATE TABLE IF NOT EXISTS contactinfo(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, firstname varchar(255) NOT NULL, email varchar(66) NOT NULL, subjecte varchar(66) NOT NULL, messagee varchar(255) NOT NULL)";
      $result = mysqli_query($connection, $sql);
      return $result;
   }

   function insert_data() {
      require_once(ABSPATH . 'wp-config.php');
      $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
      mysqli_select_db($connection, DB_NAME);

      $firstname = $_POST['your_name'];
      $email = $_POST['your_email']; 
      $subject = $_POST['subjecte'];
      $message = $_POST['your_message'];

      if(empty($firstname)  || empty($email) || empty($subject) || empty($message)) {
         echo '<h1>All field are required!! </h1>';
      } else {
         $query = "INSERT INTO contactinfo(firstname, email, subjecte, message) VALUES ('$firstname', '$email', '$subject', '$message')";
         $result = mysqli_query($connection, $query);
         wp_redirect($_SERVER['REQUEST_URI']);
         exit();

      }
   }

   function admin_menu_form() {
      add_menu_page('Form', 'Form Submition', 'manage_options', 'admin_menu_form', 'admin_menu_form_main', 'dashicons-format-aside', 4);
      add_submenu_page('admin_menu_form', 'Archived Forms', 'Archive', 'manage_options', 'admin_menu_form_sub_archive', 'admin_menu_form_sub_archive');
   }
   add_action('admin_menu', 'admin_menu_form');

   function admin_menu_form_main() {
      require_once('post.php');
   }
   

   function admin_menu_form_sub_archive() {
      
   }
?>
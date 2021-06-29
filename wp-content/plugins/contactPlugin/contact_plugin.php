<?php
/**
 * Plugin Name: contactPlugin
 * Discription: brief 9
 * Author: Mounir Zelouani
 */

   function contact_form_plugin() {
      $content = '';
      $content .= '<h2>Contact Form</h2>';
      $content .= '<form method="POST" action=""';
      $content .= '<label for="your_name">name</label>';
      $content .= '<input type="text" style="margin-left: 1em; width: 50%; margin-bottom: 1em;" name="your_name" placeholder="Name" />';
      $content .= '<br>';
      $content .= '<label for="your_email">Email</label>';
      $content .= '<input type="email" name="your_email" placeholder="Enter Your Email" style="margin-left: 1em; width: 50%; margin-bottom: 1em;" />';
      $content .= '<br>';
      $content .= '<label>Subjecte</label>';
      $content .= '<input type="text" name="subjecte" placeholder="enter your subejct" />';
      $content .= '<br>';
      $content .= '<label for="your_message" style="position: relative; right: 1.5em">Message</label>';
      $content.= '<input type="text" name="your_message" placeholder="Enter Your Message" style="margin-left: -0.6em; width: 50%; height: 20vh" />';
      $content .= '<br>';
      $content .= '<input type="submit" value="Submit" name="submit" style="margin-left: 4em; margin-top: 1em">';
      $content .= '</form>';
      return $content;
   }

   add_shortcode('contact_form', 'contact_form_plugin');

   if(isset($_POST['submit'])){
      tab();
      insert_data();
   }

   function tab() {
      require_once(ABSPATH . 'wp-config.php');
      $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
      mysqli_select_db($connection, DB_NAME);

      $sql = "CREATE TABLE contactinfo(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, firstname varchar(255) NOT NULL, email varchar(66) NOT NULL, subjecte varchar(66) NOT NULL, message varchar(255) NOT NULL)";
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
         echo '<h1>All field are required!!</h1>';
      } else {
         $query = "INSERT INTO contactinfo (firstname, email, subjecte, message) VALUES ($firstname, $email, $subject, $message)";
         $result = mysqli_query($connection, $query);

         
      }
   }
?>
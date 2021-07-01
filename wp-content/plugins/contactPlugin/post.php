<?php
require_once(ABSPATH . 'wp-config.php');
      $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
      mysqli_select_db($connection, DB_NAME);

      if(isset($_POST['submitdele'])) {
         $id = $_POST['id'];
         $query = "DELETE FROM `contactinfo` WHERE id=".$id;
         mysqli_query($connection, $query);
      }
?>

<html leng="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
   #popup {
      width: 30%;
      height: 34vh;
      position: relative;
      left: 30em;
      bottom: 17em;
      background: #FAEBE0;    
      box-shadow: 5px 5px 15px 5px #DDD;
      display: none;
      position: fixed;
   }
   </style>
</head>
<body>
   <table class="table">
      <th>
         <tr>
            <th scope="row">First Name</th>
            <th scope="row">Email</th>
            <th scope="row">Subject</th>
            <th scope="row">Message</th>
            <th scope="row">Delete</th>
            <th scope="row">Answer</th>
         </tr>
      </th>
      <td>
         <?php 
            require_once(ABSPATH . 'wp-config.php');
            $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            mysqli_select_db($connection, DB_NAME);

            $query = "SELECT * FROM  `contactinfo`";
            $result = mysqli_query($connection, $query);
            while($row = $result->fetch_assoc()) {
               echo '<tr>
                     <td>' . $row["firstname"] . 
                     '</td><td>' . $row["email"] . 
                     '</td><td>' . $row["subjecte"] . 
                     '</td><td>' . $row["message"] . 
                     '</td>
                     <td>
                     <form method="POST">
                     <input type="text" name="id" value="'.$row["id"] .'" hidden>
                     <input type="text" id='.$row["id"] .' name="sub" value="'.$row["subjecte"] .'" hidden>
                     <input type="text" id="email" name="email" value="'.$row["email"] .'" hidden>
                     <button class="btn btn-danger" type="submit" name="submitdele">Delete</button>
                     </form>
                     </td>
                     <td>
                        <button class="btn btn-success" type="submit" onClick="answer('.$row["id"] .')" name="submitrep">Reponse</button>
                     </td>
                  </tr>';
            }

            
         ?>
      </td>
   </table>
   <div id="popup">
      <table>
            <tr>
               <td>Subject: </td>
               <td id="s"></td>
            </tr>
            <tr>
               <td>Message: </td>
               <td><input class="form-control" type="text" name="msg"></td>
            </tr>
            <tr></tr>
            <tr>
               <td> 
                  <button class="btn btn-success" type="submit" name="rep">Reponse</button>  
               </td>
               <td>
                  <button class="btn btn-danger" type="submit" onclick="fereme()">Ferme</button>
               </td>
            </tr>
      </table>
   </div>
   <script>

      function fereme() {
         document.getElementById('popup').style.display = "none";
      }

      function answer(id) {
         document.getElementById('popup').style.display = "block";
         var subject = document.getElementById(id).value;
         document.getElementById('s').innerHTML = subject;
      }
      
   </script>
</body>
</html>
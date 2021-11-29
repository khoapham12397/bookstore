<?php    
   if(isset($_FILES['file'])){
      
      
      $filename = $_FILES['file']['name'];
      
      $rootDir = $_SERVER['DOCUMENT_ROOT'];

      $location =$rootDir."/bookstore/uploads/".$filename;

      $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
      
      $imageFileType = strtolower($imageFileType);

      $valid_extensions = array("jpg","jpeg","png");

      $response = 0;

      //var_dump($_FILES['file']);

      if(in_array(strtolower($imageFileType), $valid_extensions)) {
         if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
            $response = $location;
      }
      
      echo $response;
       
   }
   else echo 0;
?>
<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php require_once('include/header.php'); ?>
<body>
    <div id="wrapper">
        <?php require_once('include/nav-top.php'); ?>
        <?php require_once('include/sidebar.php'); ?>
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>A WEB-BASED NUTRITION OFFICE MANAGEMENT INFORMATION SYSTEM WITH DECISION SUPPORT SYSTEM FOR ESCALANTE CITY </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                 <!-- /. ROW  -->
                <hr />                
             
                 <!-- /. ROW  -->
                
                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-md-12">
                        <img src="../map.jpg" class="thumbnail img-responsive" />
                    </div>
                </div>
                 <!-- /. ROW  -->
               


                    </div>
                    
                </div>
                   
                </div>     
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
     <?php require_once('include/script.php'); ?>
    
   
</body>
</html>

<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php require_once('include/header.php'); ?>
 <style type="text/css">
        canvas, img { display:block; margin:1em auto; }
        canvas { background:url('../map.png') }
        .color-swatch {
            float: left;
            width: 60px;
            height: 60px;
            margin: 0 5px;
            border-radius: 3px;
        }
        .bg-normal{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #0070C0;
        }
        .bg-underweight{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #A8D08D;
        }
        .bg-severely{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #E97E37;
        }
        .bg-over{
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: #CF000F;
        }
 </style>
<body>
    <div id="wrapper">
        <?php require_once('include/nav-top.php'); ?>
        <?php require_once('include/sidebar.php'); ?>
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="../assets/img/logo1.png" alt="DS System" style="width:80px;" class="pull-left">
                        <img src="../assets/img/logo2.png" alt="DS System" style="width:80px;" class="pull-right">
                        <h2>NUTRITION OFFICE MANAGEMENT INFORMATION SYSTEM WITH DECISION SUPPORT SYSTEM</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        <div class="color-swatches">
                            <div class="color-swatch bg-normal">Normal</div>
                            <div class="color-swatch bg-underweight">Under Weight</div>
                            <div class="color-swatch bg-severely">Severely Under Weight</div>
                            <div class="color-swatch bg-over">Over Weight</div>
                        </div>
                    </div>
                    <div class="col-lg-3 pull-right">
                        <select class="form-control" id="cboFilters"></select>
                    </div>
                </div>                           
                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                        <canvas id="viewport" width="1010" height="763"></canvas>
                        <!-- <img class="thumbnail" usemap="#Map" id="heatmap"/>
                        <map name="Map" id="Map"></map> -->
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
     <?php include('include/script.php'); ?>
    <script type="text/javascript">
        // window.location.reload();
    </script>
   
</body>
</html>

 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Administrator</a>
    </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">Welcome Jhon Doe&nbsp;
      <a href="#" class="btn btn-danger square-btn-adjust">Logout</a>
    </div>
</nav>

 <!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
            <li class="text-center">
              <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
            </li>
            <li>
              <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
	          <li>
              <a   href="chart.php"><i class="fa fa-bar-chart-o fa-3x"></i>Graphs</a>
            </li>
            <li>
              <a  href="child.php"><i class="fa fa-table fa-3x"></i> CNO Weight Standards</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-sitemap fa-3x"></i> Manage<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                   <li>
                      <a href="child.php">Manage Child Information</a>
                  </li>
                  <li>
                     <a href="location.php">Manage Location Information</a>
                 </li>
                 <li>
                    <a href="users.php">Manage User Accounts</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-sitemap fa-3x"></i> Reports<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li>
                      <a href="normal.php">normal weight children</a>
                  </li>
                   <li>
                      <a href="under.php">underweight malnourished</a>
                  </li>
                   <li>
                      <a href="sever-under.php">severly underweight</a>
                  </li>
                   <li>
                      <a href="sever-under-total.php">severly and underweight malnourished</a>
                  </li>
              </ul>
          </li>
          <li>
              <a  href="heatmap.php"><i class="fa fa-square-o fa-3x"></i>Heat Map</a>
          </li>
      </ul>

  </div>

</nav>
<!-- /. NAV SIDE  -->

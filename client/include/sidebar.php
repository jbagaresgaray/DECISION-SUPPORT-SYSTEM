<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
            <li>
              <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
	          <!-- <li>
              <a   href="chart.php"><i class="fa fa-bar-chart-o fa-3x"></i>Graphs</a>
            </li> -->
            <li>
              <a  href="ui.php"><i class="fa fa-table fa-3x"></i> CNO Weight Standards</a>
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
                    <a href="years.php">Manage Year and Terms</a>
                  </li>
                 <li>
                    <a href="users.php">Manage User Accounts</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-file-text-o fa-3x"></i> Reports<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li>
                      <a href="javascript:printTask('normal');">Normal Weight</a>
                  </li>
                   <li>
                      <a href="javascript:printTask('under');">Underweight Malnourished</a>
                  </li>
                   <li>
                      <a href="javascript:printTask('severe-under');">Severely Underweight</a>
                  </li>
                  <li>
                      <a href="javascript:printTask('over');">Over Weight</a>
                  </li>
                  <li>
                      <a href="javascript:printTask('severe-under-total');">Severly and Underweight (TOTAL)</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-sitemap fa-3x"></i> DSS<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li>
                      <a href="javascript:printDSS('severeunder','TOP 5 BRGY. WITH SEVERELY UNDERWEIGHT CHILDREN');">Severely Underweight</a>
                  </li>
                   <li>
                      <a href="javascript:printDSS('under','TOP 5 BRGY. WITH UNDERWEIGHT CHILDREN');">Underweight Malnourished</a>
                  </li>
                  <li>
                      <a href="javascript:printDSS('severe-under','TOP 5 BRGY. WITH SEVERELY UNDERWEIGHT AND UNDERWEIGHT CHILDREN');">Severly Underweight and Underweight</a>
                  </li>
                  <li>
                      <a href="javascript:printDSS('severe-under-total','TOP 5 BRGY. WITH SEVERELY UNDERWEIGHT AND UNDERWEIGHT TOTAL OF CHILDREN');">Severly and Underweight (AGE)(TOTAL)</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="profile.php"><i class="fa fa-cog fa-3x"></i>Settings</a>
          </li>
      </ul>

  </div>

</nav>
<!-- /. NAV SIDE  -->
<script type="text/javascript">
  function printTask(value){
    window.sessionStorage['print'] = value;
    window.location.href="print.php";
  }

  function printDSS(value,title){
    window.sessionStorage['dss'] = value;
    window.sessionStorage['title'] = title;
    window.location.href="dss.php";
  }
</script>
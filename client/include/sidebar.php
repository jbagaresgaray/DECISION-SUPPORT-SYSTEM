
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
      <?php if (isset($_SESSION['users']) && !empty($_SESSION['users'])): ?>
      <ul class="nav" id="main-menu">
            <li>
              <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
            <?php if($_SESSION['users']['access'][1]['allow'] == 1): ?>
            <li>
              <a  href="ui.php"><i class="fa fa-table fa-3x"></i> CNO Weight Standards</a>
            </li>
            <?php endif; ?>
            <li>
              <a href="#"><i class="fa fa-sitemap fa-3x"></i> Manage<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <?php if($_SESSION['users']['access'][2]['allow'] == 1): ?>
                  <li>
                      <a href="child.php">Manage Child Information</a>
                  </li>
                <?php endif; ?>
                <?php if($_SESSION['users']['access'][3]['allow'] == 1): ?>
                  <li>
                     <a href="location.php">Manage Location Information</a>
                 </li>
                <?php endif; ?>
                <?php if($_SESSION['users']['access'][4]['allow'] == 1): ?>
                 <li>
                    <a href="years.php">Manage Year and Terms</a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
            <?php if($_SESSION['users']['access'][5]['allow'] == 1): ?>
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
            <?php endif; ?>
            <?php if($_SESSION['users']['access'][6]['allow'] == 1): ?>
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
            <?php endif; ?>
            <li>
                <a href="#"><i class="fa fa-cog fa-3x"></i>Settings <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if($_SESSION['users']['access'][7]['allow'] == 1): ?>
                    <li>
                        <a href="profile.php">User Profile</a>
                    </li>
                    <?php endif; ?>
                    <?php if($_SESSION['users']['access'][8]['allow'] == 1): ?>
                    <li>
                        <a href="groups.php">User Group Privileges</a>
                    </li>
                    <?php endif; ?>
                    <?php if($_SESSION['users']['access'][9]['allow'] == 1): ?>
                    <li>
                      <a href="users.php">User Accounts</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
      </ul>
    <?php endif; ?>
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
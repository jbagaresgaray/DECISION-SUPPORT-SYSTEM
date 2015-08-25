<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">DSS v1</a>
    </div>
    <?php if( isset( $_SESSION['users'] ) ): ?>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">Welcome <?php echo $_SESSION['users']['fname'];?>
      <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
    </div>
    <?php endif; ?>
</nav>

 <!-- /. NAV TOP  -->

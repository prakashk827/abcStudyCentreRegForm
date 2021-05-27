<?php 

?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" 
        src="../assets/img/logo.png" width=50px alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['adminUName']  == '' ? 'User' : $_SESSION['adminUName'] ;?></p>
         <p class="app-sidebar__user-designation"><?php // echo $_SESSION["clientUId"] ;?></p>
        </div>
      </div>
      <ul class="app-menu">
        <!-- <li><a class="app-menu__item" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li> -->
         <li><a class="app-menu__item" href="student-list.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Registered Students</span></a></li>
        


        

        <!-- <li><a class="app-menu__item" href="reset-pssword.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Reset Password</span></a></li> -->


        
        
        
       
        
      </ul>
    </aside>
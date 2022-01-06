<aside class="app-sidebar">
  <div class="app-sidebar__logo">
    <a class="header-brand" href="index-2.html">
      <img src="assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Admintro logo">
      <img src="assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Admintro logo">
      <img src="assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admintro logo">
      <img src="assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Admintro logo">
    </a>
  </div>
  <div class="app-sidebar__user">
    <div class="dropdown user-pro-body text-center">
      <div class="user-pic">
        <img src="<?php   if (strlen($usercek['user_photo'])>0) {
  echo $usercek['user_photo'];
 } else { echo "assets/images/users/default.jpg"; }  ?>
" alt="user-img" class="avatar-xl rounded-circle mb-1">
      </div>
      <div class="user-info">
        <h5 class=" mb-1"><?php echo $usercek['name']." ".$usercek['surname']; ?> <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
        <span class="text-muted app-sidebar__user-name text-sm">
          <?php

          if ($usercek['user_authority']==1) {
            echo "admin";
          }


           ?>


        </span>
      </div>
    </div>
    <div class="sidebar-navs">
      <ul class="nav nav-pills-circle">
        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Support">
          <a class="icon" href="index.html#" >
            <i class="las la-life-ring header-icons"></i>
          </a>
        </li>
        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Documentation">
          <a class="icon" href="index.html#">
            <i class="las  la-file-alt header-icons"></i>
          </a>
        </li>
        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Projects">
          <a href="index.html#" class="icon">
            <i class="las la-project-diagram header-icons"></i>
          </a>
        </li>
        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Settins">
          <a class="icon" href="index.html#">
            <i class="las la-cog header-icons"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <ul class="side-menu app-sidebar3">
    <li class="side-item side-item-category mt-4">Menü</li>
    <li class="slide">
      <a class="side-menu__item"  href="index.php">
      <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
      <span class="side-menu__label">Yönetim Paneli</span></a>
    </li>


            <li class="side-item side-item-category">Widgets & Maps</li>

    <li class="slide">
      <a class="side-menu__item"  href="menu.php">
      <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">

       <path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"/>

      </svg>
      <span class="side-menu__label">Menü</span></a>
    </li>

        <li class="slide">
      <a class="side-menu__item"  href="users.php">
      <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">

       <path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"/>

      </svg>
      <span class="side-menu__label">Kullanıcılar</span></a>
    </li>


        <li class="slide">
      <a class="side-menu__item"  href="urunler.php">
      <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">

       <path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"/>

      </svg>
      <span class="side-menu__label">Ürünler</span></a>
    </li>

        <li class="slide">
      <a class="side-menu__item"  href="slider.php">
      <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">

       <path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"/>

      </svg>
      <span class="side-menu__label">Slider</span></a>
    </li>
  </ul>
</aside>
<!--aside closed-->

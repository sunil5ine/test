<div class="navbar-fixed">
      <nav class="white">
         <div class="nav-wrapper container-wrap">
            <a href="http://5ineprojects.com/cherryhire/" class="brand-logo">
            <img src="assets/img/logo.png" class="responsive-img" alt="logo">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="fas fa-bars black-text"></i>
            </a>
            <ul class="right hide-on-med-and-down">
               <li><i class="far fa-flag font-col dropdown-trigger hide-ref2" data-target='dropdown4'></i><i class="fas fa-circle yellow-text point"></i></li>
               <ul id='dropdown4' class='dropdown-content'>
                  <li ><a href="#!">One</a></li>
                  <li><a href="#!">Two</a></li>
               </ul>
               <li>
                  <i class="far fa-bell font-col dropdown-trigger hide-ref" data-target='dropdown3'></i><i class="fas fa-circle red-text point1"></i>
               </li>
               <ul id='dropdown3' class='dropdown-content'>
                  <li><a href="#!" class="black-text">Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </a></li>
                  <li><a href="#!" class="black-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</a></li>
               </ul>
               <li class="dropdown-trigger hide-ref1" data-target='dropdown2'>
                  <img src="assets/img/droupdown-img.png" class="responsive-img droup-img "  alt="">
                  <i class="fas fa-caret-down font-col1 dropdown-trigger" ></i>
               </li>
               <!-- Dropdown Structure -->
               <ul id='dropdown2' class='dropdown-content'>
                  <li ><a href="#!">Profile</a></li>
                  <li ><a href="#!">Settings</a></li>
                  <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
               </ul>
            </ul>
         </div>
      </nav>
   </div>
      <ul class="sidenav" id="mobile-demo">
         <li><a href="sass.html">Sass</a></li>
         <li><a href="badges.html">Components</a></li>
         <li><a href="collapsible.html">Javascript</a></li>
         <li><a href="mobile.html">Mobile</a></li>
      </ul>
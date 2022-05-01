<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();

?>   
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                           <li>
                                <a href="<?php echo site_url("dashboard"); ?>" class="waves-effect">
                                    <i class="remixicon-dashboard-line"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo site_url("Kitrequest"); ?>" class="waves-effect">
                                    <i class="remixicon-dashboard-line"></i>
                                    <span> Drop-In Center </span>
                                </a>
                            </li> 

                   
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

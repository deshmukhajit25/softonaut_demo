<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
<html lang="en">
 <head>
    <?php $this->load->view('layouts/inc_htmlhead'); ?>
 </head>
<body>
<!-- Begin page -->
<div id="wrapper">
<!-- Topbar Start -->
<?php $this->load->view('layouts/inc_header'); ?>
<!-- end Topbar -->
<!-- ========== Left Sidebar Start ========== -->
<?php $this->load->view('layouts/inc_sidebar'); ?>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">ISDQI</a></li>
                               
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard </h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <!-- <div class="col-md-6 col-xl-3">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">ISDQI Status</h4>
                        <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">31,570</span></h2>
                    </div>
                </div> -->

                <div class="col-md-6 col-xl-2">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Orders</h4>
                        <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">683</span></h2>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Appointments</h4>
                        <p class="text-muted mb-0">Kit Requisted : 4</p>
                        <p class="text-muted mb-0">Drop in Center : 4</p>
                        <p class="text-muted mb-0">Sample Submit : 4</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">                               
                               <div class="text-primary my-1 text-center c-primary"><h5>HELPLINE</h5><div>If you need further assistance please call the benefits administrator at</div><div>989-876-7678</div></div>
                    </div>
             </div>
            </div>
  
        </div> <!-- container -->

    </div> <!-- content -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
</div>
<!-- END wrapper -->

    <?php $this->load->view('layouts/inc_footer'); ?>

    <script>
        jQuery(document).ready(function() {       
    // initiate layout and plugins
    
        });
    </script>
</body>

</html>
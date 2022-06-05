<?php include('../../controller/sessions.php'); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>AIR - <?php echo $get_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="../../plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../plugins/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
        <link href="../../plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <link href="../../plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- App css -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        
        <!-- start left-sidenav-->
        <?php include('../../include/left_sidebar.php') ?>
        <!--   end left-sidenav-->
        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <?php include('../../include/top_bar.php'); ?>
            <!-- Top Bar End -->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box pb-1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="page-title">Regions</h4>
                                    </div><!--end col-->
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <button class="btn btn-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                                            <input type="text" class="form-control search" name="search" id="search" placeholder="Search Regions">
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-end mt-1">
                                        <a  data-bs-toggle="modal" data-bs-target="#create_new" href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="align-self-center fa fa-plus icon-xs"></i> Create New
                                        </a>
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->


                    <!-- ----------------------------------------------------------------------------------------------------- -->
                    <!-- ---------------------------------------------Table Start--------------------------------------------- -->
                    <!-- ----------------------------------------------------------------------------------------------------- -->
                    <div class="card border-0">
                        <div class="card-body p-1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead  style="border: 1px solid #eaf0f9;background: #ebebeb;">
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Defination</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="region_table">
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div>
                    </div>
                    <!-- ----------------------------------------------------------------------------------------------------- -->
                    <!-- ---------------------------------------------Table Start--------------------------------------------- -->
                    <!-- ----------------------------------------------------------------------------------------------------- -->


                </div><!-- container -->

                <?php include('../../include/footer.php') ?>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- ****************************************************************************** -->
        <!-- ********************************* Add Form *********************************** -->
        <!-- ****************************************************************************** -->

        <div class="modal fade bd-example-modal-lg" id="create_new" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="myLargeModalLabel">Create Region</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><!--end modal-header-->
                    <div class="modal-body">
                            
                        <form  id="add_region_form" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Region Code</label>
                                        <input type="text" class="form-control" id="add_code" name="add_code" placeholder="Region Code" maxlength="10" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Region Name</label>
                                        <input type="text" class="form-control" id="add_name" name="add_name" placeholder="Region Name" maxlength="100" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12  mt-3">
                                        <label>Definition</label>
                                        <textarea type="text" class="form-control" id="add_defination" name="add_defination" placeholder="Region Definition" required></textarea>
                                    </div>

                                    <div class="col-md-12  mt-3">
                                        <input type="text" name="oper" value="add" hidden />
                                        <button type="submit" class="btn btn-primary btn-square btn-outline-dashed" id="add_region">Save</button>
                                    </div>
                                </div>

                                
                            </div>    
                        </form>
                        
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div><!--end modal-footer-->
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>  





        <!-- ****************************************************************************** -->
        <!-- ********************************* Add Form *********************************** -->
        <!-- ****************************************************************************** -->

        <div class="modal fade bd-example-modal-lg" id="modal_edit" tabindex="-1" aria-labelledby="myLargeModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="myLargeModalLabel3">Edit Region</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><!--end modal-header-->
                    <div class="modal-body">
                            
                        <form  id="edit_region_form" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Region Code</label>
                                        <input type="hidden" id="edit_id" name="edit_id">
                                        <input type="text" class="form-control" id="edit_code" name="edit_code" placeholder="Region Code" maxlength="10" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Region Name</label>
                                        <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Region Name" maxlength="100" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12  mt-3">
                                        <label>Definition</label>
                                        <textarea type="text" class="form-control" id="edit_defination" name="edit_defination" placeholder="Region Definition" required></textarea>
                                    </div>

                                    <div class="col-md-3  mt-3">
                                        <label>Status</label>
                                        <select name="edit_status" id="edit_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12  mt-3">
                                        <input type="text" name="oper" value="edit" hidden />
                                        <button type="submit" class="btn btn-primary btn-square btn-outline-dashed" id="edit_region">Save</button>
                                    </div>
                                </div>

                                
                            </div>    
                        </form>
                        
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div><!--end modal-footer-->
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div>      


        <!-- jQuery  -->
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/metismenu.min.js"></script>
        <script src="../../assets/js/waves.js"></script>
        <script src="../../assets/js/feather.min.js"></script>
        <script src="../../assets/js/simplebar.min.js"></script>
        <script src="../../assets/js/moment.js"></script>
        <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

        <!-- Plugins js -->
      
        <script src="../../plugins/select2/select2.min.js"></script>
        <!-- <script src="../../plugins/huebee/huebee.pkgd.min.js"></script> -->
        <script src="../../plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="../../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="../../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

        <!-- <script src="../../assets/js/jquery.forms-advanced.js"></script> -->

        <!-- App js -->
        <script src="../../assets/js/app.js"></script>
        <script src="../../plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="../../assets/js/pagejs/regions.js"></script>
        
    </body>

</html>




<style>
    td {
       height: 24px;
       font-size: 12px;
       padding: 0px  4px!important;
    }
    td p {
        margin-bottom: 0px!important;
        font-size:  11px;
        color: #000000;
    }
</style>
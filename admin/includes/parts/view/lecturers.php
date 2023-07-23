<!-- page content -->

<div class="">

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
        <h2>All Lecturers <small>Table</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".add"> Add </button>
          
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
              <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">

        <?php include "includes/parts/add/lecturer.php" ?>
        </div>
        </div>
        </ul>

        <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                <div class="card-box table-responsive">
        
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Count</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Telephone No.</th>
                <th>Courses</th>
                <th style="width: 10%"></th>
            </tr>
            </thead>


            <tbody>
            <?php draw_lecturer_table() ?>
            </tbody>
        </table>
        <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <?php include "includes/parts/edit/lecturer.php" ?> 
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
    </div>
    </div>

    

</div>
</div>
<!-- /page content -->
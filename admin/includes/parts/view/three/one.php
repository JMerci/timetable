
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>3:1 course units <small>Table</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    
                        <?php 
                        if(isset($_SESSION['timetable_courseID'])){
                          echo ' <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".add"> Add </button>';
                        }
                      ?>
                     
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                           <form class="form-label-left input_mask" id="addYearThreeSemOne">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Add new Course unit</h4>
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      
                                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" name="course_unit_number" placeholder="Course unit No." required>
                                      <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" name="course_unit_name" placeholder="Course unit Name">
                                      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>

                                    <input type="hidden" value="three" name="year" />
                                    <input type="hidden" value="one" name="semester" />
                                  </div>

                                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                                      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                                      <select name="course_unit_lecturer" class="form-control has-feedback-left">
                                            <?php get_lectures_select_options() ?>
                                      </select>
                                  </div>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save </button>
                                  </div>
                              </div>
                          </form>
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
                                  <th>Course Unit ID.</th>
                                  <th>Course Unit Name</th>
                                  <th>Lecturer</th>
                                  <th style="width: 10%"></th>
                              </tr>
                              </thead>


                              <tbody>
                              <?php draw_course_unit_table("three","one") ?>
                              </tbody>
                          </table>
                    <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                    <form class="form-label-left input_mask" id="update_course_unit">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Course unit</h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body" id="editing_form">
                            </div>
                        </div>
                    </form>
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
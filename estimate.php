<?php include('header.php') ?>

<main>
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>BUSINESS DETAILS</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a>Calculation Number: XXXXXXXXX</a></li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Business Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Position</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="male"> &nbsp; Owner &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="female"> Employee
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                            
                          </div>
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                              Note: Fields marked with * are mandatory.
                            </label>

                        </form>

                      </div>
                      <div id="step-2">
                         <form class="form-horizontal form-label-left">


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">How many techicians do you have?<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                              Note: Fields marked with * are mandatory.
                            </label>

                        </form>
                      </div>
                      <div id="step-3">
                       
                       <form class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                              Technician:1
                            </label>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technician Annual Wage ($)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technicians Productivity (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technicians Efficiency (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Retail Labour Rate ($)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Number of Days Position Vacant
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                              Technician:2
                            </label>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technician Annual Wage ($)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technicians Productivity (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Technicians Efficiency (%)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Retail Labour Rate ($)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Number of Days Position Vacant
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="how-many" name="how-many" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                            	Note: Fields marked with * are mandatory.
                            </label>
                          </div>

                        </form>

                      </div>
                      <div id="step-4">
                        
                        <table class="table">
                        	<thead>
                        		<tr>
                        			<th>Technician #</th>
                        			<th>Lost Retail Labour</th>
                        			<th>Recruitment Cost</th>
                        			<th>Onboarding Cost</th>
                        			<th>Total Cost</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr>
                        			<td>Technician 1</td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        		</tr>
                        		<tr>
                        			<td>Technician 2</td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        			<td><input type="text" class="form-control"></td>
                        
                        	</tbody>
                        </table>

                        <div class="row">
                        	<div class="col-md-12 text-center">
                        		<a href="#" class="btn btn-primary">Download</a>
                        		<a href="#" class="btn btn-primary">Print</a>
                        	</div>
                        </div>

                      </div>

                    </div>





                  
                  </div>
                </div>
              </div>
		</div>

	</div>

</main>

<?php include('footer.php') ?>


	
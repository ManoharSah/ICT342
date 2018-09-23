<?php include('header.php') ?>
<?php 

$calculation_id = session('calculation_id');


if(!$calculation_id) {
  $calculation_id = insert_temp_calculation();
  session('calculation_id', $calculation_id);
}

$data = get_calculation_data($calculation_id);

?>
<main>	
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>BUSINESS DETAILS</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a>Calculation Number: <?php echo get_calculation_id($calculation_id) ?></a></li>                      
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form class="form-horizontal form-label-left">
                <div id="wizard" class="form_wizard wizard_horizontal">
                  <ul class="wizard_steps" style="margin-bottom: 40px;">
                    <li>
                      <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">Step 1</span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">Step 2</span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">Step 3</span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-4">
                        <span class="step_no">4</span>
                        <span class="step_descr">Step 4</span>
                      </a>
                    </li>
                  </ul>
                  <div id="step-1">
                      <div class="item item form-group" id="name">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="step_1[<?php echo $calculation_id ?>][name]" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['name'] ?>">
                        </div>
                      </div>
                      <div class="item form-group" id="bus_name">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bus_name">Business Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="step_1[<?php echo $calculation_id ?>][bus_name]" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['bus_name'] ?>">
                        </div>
                      </div>
                      <div class="item form-group" id="position" >
                        <label for="position" class="control-label col-md-3 col-sm-3 col-xs-12">Position <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="step_1[<?php echo $calculation_id ?>][position]" value="<?php echo $data['position'] ?>">
                        </div>
                      </div>
                      <div class="item form-group" id="owner">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php echo ($data['owner'] == 1) ? 'active' : ''; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="step_1[<?php echo $calculation_id ?>][owner]" value="1" <?php echo ($data['owner'] == 1) ? 'checked' : ''; ?> /> &nbsp; Owner &nbsp;
                            </label>
                            <label class="btn btn-default <?php echo ($data['owner'] == 2) ? 'active' : ''; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="step_1[<?php echo $calculation_id ?>][owner]" value="2" <?php echo ($data['owner'] == 2) ? 'checked' : ''; ?>> Employee
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group" id="phone">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="step_1[<?php echo $calculation_id ?>][contact]" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['contact'] ?>">
                        </div>
                      </div>
                      <div class="item form-group" id="email">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="step_1[<?php echo $calculation_id ?>][email]" class="email form-control col-md-7 col-xs-12" required="required" type="email" value="<?php echo $data['email'] ?>">
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center;font-weight: normal;">
                          Note: Fields marked with * are mandatory.
                        </label>
                        </div>
                      </div>
                      <div class="item form-group privacy_policy">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: left;font-weight: normal;">
                          <input name="step_1[<?php echo $calculation_id ?>][notification]" type="checkbox" value="1" id="privacy_policy" <?php echo ($data['notification'] == 1) ? 'checked' : ''; ?> /> I agree to Solutions Culture sending me useful information from time to time.  (We HATE spam and will never disclose yor details without yout consent. Our <a href="http://www.solutionsculture.com/privacy-policy/" target="_blank" class="green_link">Privacy policy</a> is here)
                          </label>
                        </div>
                      </div>
                  </div>
                  <div id="step-2">
                      <div class="item form-group"  id="how-many-now">
                        <label class="control-label col-md-offset-2 col-md-3 col-sm-3 col-xs-12">How many techicians do you have?<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" name="step_2[<?php echo $calculation_id ?>][how-many-now]" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['how_many_now'] ?>">
                          <span class="help-block">Annual Salary of a lost technician.</span>
                        </div>
                      </div>
                      <div class="item form-group"  id="how-many">
                        <label class="control-label col-md-offset-2 col-md-3 col-sm-3 col-xs-12">How many technicians are you presently missing? <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-col-md-offset-2sm-4 col-xs-12">
                          <input type="number" name="step_2[<?php echo $calculation_id ?>][how-many]" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['how_many'] ?>">
                          <span class="help-block">Annual Salary of a lost technician.</span>
                        </div>
                      </div>
                      <div class="form-group">                        
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center;font-weight: normal;">
                            Note: Fields marked with * are mandatory.
                          </label>
                      </div>
                  </div>
                  <div id="step-3">
                      
                      <div id="show_techician"></div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center;font-weight: normal;">
                        	Note: Fields marked with * are mandatory.
                        </label>
                      </div>
                  </div>
                  <div id="step-4">
                    <table class="table" id="summary">
                    	<thead>
                    		<tr>
                    			<th>Technician #</th>
                    			<th>
                            Lost Retail Labour
                            <a href="#" data-toggle="tooltip" data-placement="top" title="This is for lost retail labour"><i class="glyphicon glyphicon-question-sign"></i></a>
                          </th>
                    			<th>
                            Recruitment Cost
                            <a href="#" data-toggle="tooltip" data-placement="top" title="This is for recruitment cost"><i class="glyphicon glyphicon-question-sign"></i></a>
                          </th>
                    			<th>
                            Onboarding Cost
                            <a href="#" data-toggle="tooltip" data-placement="top" title="This is for onboarding cost"><i class="glyphicon glyphicon-question-sign"></i></a>
                          </th>
                    			<th>
                            Total Cost
                            <a href="#" data-toggle="tooltip" data-placement="top" title="This is for total cost"><i class="glyphicon glyphicon-question-sign"></i></a>
                          </th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	</tbody>
                    </table>
                    <div class="row">
                      <div class="col-md-2 col-md-offset-5 text-center">
                    		<a href="http://www.solutionsculture.com/contact/" target="_blank" class="btn btn-primary btn-block">Contact</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-primary" onclick="printToPdf()">Download</a>
                        <a href="#" class="btn btn-primary" onclick="printdiv('summary')">Print</a>
                    	</div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
		</div>
	</div>
</main>

<?php include('footer.php') ?>


	
<?php include('header.php') ?>
<?php 

$calculation_id = session('calculation_id');

if(!$calculation_id) {
  $calculation_id = insert_temp_calculation();
  session('calculation_id', $calculation_id);
}

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
                  <ul class="wizard_steps">
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
                          <input type="text" name="calculation[<?php echo $calculation_id ?>][name]" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group" id="business_name">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="business_name">Business Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="calculation[<?php echo $calculation_id ?>][business_name]" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group" id="position" >
                        <label for="position" class="control-label col-md-3 col-sm-3 col-xs-12">Position <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="calculation[<?php echo $calculation_id ?>][position]">
                        </div>
                      </div>
                      <div class="item form-group" id="owner">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="calculation[<?php echo $calculation_id ?>][owner]" value="1"> &nbsp; Owner &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="calculation[<?php echo $calculation_id ?>][owner]" value="2"> Employee
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group" id="phone">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="calculation[<?php echo $calculation_id ?>][phone]" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group" id="email">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="calculation[<?php echo $calculation_id ?>][email]" class="email form-control col-md-7 col-xs-12" required="required" type="email">
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                          Note: Fields marked with * are mandatory.
                        </label>
                        </div>
                      </div>
                  </div>
                  <div id="step-2">
                      <div class="item form-group"  id="how-many">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">How many techicians do you have?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="calculation[<?php echo $calculation_id ?>][how-many]" required="required" class="form-control col-md-7 col-xs-12">
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                          Note: Fields marked with * are mandatory.
                        </label>
                        </div>
                      </div>
                  </div>
                  <div id="step-3">
                      
                      <div id="show_techician"></div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                        	Note: Fields marked with * are mandatory.
                        </label>
                      </div>
                  </div>
                  <div id="step-4">
                    <table class="table" id="summary">
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
              </form>
            </div>
          </div>
        </div>
		</div>
	</div>
</main>

<?php include('footer.php') ?>


	
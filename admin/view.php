<?php include('header.php') ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p class="text-center">Calculation Number: XXXXXXXXXX</p>
        <table class="table table-hover view-table">
          <tbody> 
            <tr>
              <td>Name</td>
              <td>Manohar</td>
            </tr>
            <tr>
              <td>Business Name</td>
              <td>Manohar Enterprise</td>
            </tr>
            <tr>
              <td>Position</td>
              <td></td>
            </tr>
            <tr>
              <td>Owner?</td>
              <td>
                <div id="gender" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="male"> &nbsp; Owner &nbsp;
                  </label>
                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="female"> Employee
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td></td>
            </tr>
            <tr>
              <td>Mobile</td>
              <td></td>
            </tr>
            <tr>
              <td>Number Of Technicians</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">Technican 1</td>
            </tr>
            <tr>
              <td>Technician Annual Wage ($)</td>
              <td></td>
            </tr>
            <tr>
              <td>Technicians Productivity (%)</td>
              <td></td>
            </tr>
            <tr>
              <td>Technicians Efficiency (%)</td>
              <td></td>
            </tr>
            <tr>
              <td>Retail Labour Rate ($)</td>
              <td></td>
            </tr>
            <tr>
              <td>Number of Days Position Vacant</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">Technican 2</td>
            </tr>
            <tr>
              <td>Technician Annual Wage ($)</td>
              <td></td>
            </tr>
            <tr>
              <td>Technicians Productivity (%)</td>
              <td></td>
            </tr>
            <tr>
              <td>Technicians Efficiency (%)</td>
              <td></td>
            </tr>
            <tr>
              <td>Retail Labour Rate ($)</td>
              <td></td>
            </tr>
            <tr>
              <td>Number of Days Position Vacant</td>
              <td></td>
            </tr>
          </tbody>
        </table>
        
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
            </tr>
            <tr>
              <td>Technician 3</td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary">Download</a>
        <a href="#" class="btn btn-primary">Print</a>
      </div>
    </div>
  </div>
</main>
<?php include('footer.php') ?>
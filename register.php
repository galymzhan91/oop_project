<?php

include 'includes/header.php';
require_once 'DB.php';




?>
	<div class="row justify-content-center">
		<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Sign up for further actions</h4>
          <form class="needs-validation" method="post" action="success.php" novalidate>
            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username <span class="text-muted">(required)</span></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
<!-------------------------password--field---------------------------->			 
			 <div class="row">
              <div class="col-md-6 mb-2">
                <label for="psw">Password <span class="text-muted">(required)</span></label>
				<input type="password" id="psw" name="password" data-toggle="popover" data-content="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" required>
                <div class="invalid-feedback">
                  Password is required.
                </div>
              </div>
              <div class="col-md-6 mb-2">
               <label for="psw">Password validation <span class="text-muted">(required)</span></label>
				<input type="password" id="psw" name="password_v" required>
                <div class="invalid-feedback">
                  Password validation is required.
                </div>
              </div>
            </div>
			<div id="message">
			  <h3>Password must contain the following:</h3>
			  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			  <p id="number" class="invalid">A <b>number</b></p>
			  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>
<!----------------------------------------------------------------->			 			
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(required)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" name="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Region</label>
                <select class="custom-select d-block w-100" id="state" name="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
			<div class="row">
			  <div class="col-md-6 mb-1">
                <label for="phone">Phone number</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
				<div class="invalid-feedback">
                  Phone number required.
                </div>
			  </div>
			</div>
			
			      <hr class="m-1 pb-2">
            <button class="btn btn-primary btn-lg btn-block" name="submit"  id="submitId" type="submit">Register</button>
			</form>
	</div>
</div>
<?php
include 'includes/footer.php';
?>


<?php require APPROOT.'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-6">
        <h2>Create an account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT.'/users/register'; ?>" method="POST">
          <div class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" class="form-control form-control-lg <?php echo(!empty($data['name_error']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['name']; ?>" name="name">
            <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Email: <sup>*</sup></label>
            <input type="email" class="form-control form-control-lg <?php echo(!empty($data['email_error']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>" name="email">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Password: <sup>*</sup></label>
            <input type="password" class="form-control form-control-lg <?php echo(!empty($data['password_error']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password']; ?>" name="password">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Confirm password: <sup>*</sup></label>
            <input type="password" class="form-control form-control-lg <?php echo(!empty($data['confirm_password_error']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['confirm_password']; ?>" name="confirm_password">
            <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Register">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT.'/users/login'; ?>" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h5><?php echo _ADDITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">

                  <div class="form-group col-md-12">

                    <label><?php echo _TABLEFIELDUSERNAME; ?></label>
                    <input type="text" value="" placeholder="" name="user_name" class="form-control" required="">

                    <label><?php echo _TABLEFIELDUSEREMAIL; ?></label>
                    <input type="text" value="" placeholder="" name="user_email" class="form-control" required="">
                    <label id="email-availability-status"></label>

                    <label><?php echo _TABLEFIELDDESCRIPTION; ?></label>
                    <textarea type="text" class="mceNoEditor form-control" name="user_description"></textarea>

                    <label><?php echo _TABLEFIELDPASSWORD; ?></label>
                    <input type="password" value="" placeholder="" name="user_password" class="form-control" id="password-field" required="">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                    <label><?php echo _TABLEFIELDUSERROLE; ?></label>
                    <select class="custom-select form-control" name="user_role" required="">
                      <option value selected>-</option>
                      <?php foreach($roles as $role): ?>
                        <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
                      <?php endforeach; ?>
                    </select>

                 <label><?php echo _TABLEFIELDVERIFIED; ?></label>
                 <select class="custom-select form-control" name="user_verified">
                  <option value selected>-</option>
                  <option value="1"><?php echo _YESTEXT; ?></option>
                  <option value="0"><?php echo _NOTEXT; ?></option>
                </select>

                  </div>

                  <hr>

                  <button class="btn btn-primary" type="submit" name="save"><?php echo _SAVECHANGES; ?></button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

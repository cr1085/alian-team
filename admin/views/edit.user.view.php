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
              <h5><?php echo _EDITITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">

                  <div class="form-group col-md-12">

                   <input type="hidden" value="<?php echo $usr['user_id']; ?>" name="user_id">
                   
                   <label class="required"><?php echo _TABLEFIELDUSERNAME; ?></label>
                   <input type="text" value="<?php echo $usr['user_name']; ?>" name="user_name" class="form-control" required="">

                   <br/>

                   <label class="required"><?php echo _TABLEFIELDUSEREMAIL; ?></label>
                   <input type="text" value="<?php echo $usr['user_email']; ?>" name="user_email" class="form-control" required="">

                   <br/>

                   <label><?php echo _TABLEFIELDPASSWORD; ?></label>
                   <input type="hidden" value="<?php echo $usr['user_password']; ?>" name="user_password_save">
                   <input type="password" value="" placeholder="" name="user_password" class="form-control" id="password-field">
                   <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                   <br/>

                    <label><?php echo _TABLEFIELDDESCRIPTION; ?></label>
                    <textarea type="text" class="mceNoEditor form-control" name="user_description"><?php echo $usr['user_description']; ?></textarea>

                   <br/>

                   <label class="control-label"><?php echo _TABLEFIELDSTATUS; ?></label>

                   <select class="custom-select form-control" name="user_status">
                    <?php
                    if($usr['user_status'] == 1){
                      echo '<option value="1" selected="selected">'._ACTIVE.'</option>';
                      echo '<option value="0">'._INACTIVE.'</option>';

                    } else{
                      echo '<option value="0" selected="selected">'._INACTIVE.'</option>';
                      echo '<option value="1">'._ACTIVE.'</option>';
                    }
                    ?>
                  </select>

                   <br/>

                    <label class="control-label"><?php echo _TABLEFIELDUSERROLE; ?></label>

                    <select class="custom-select form-control" name="user_role">

                      <?php
                      foreach($roles as $role)
                      {
                        if($usr['user_role'] == $role['role_id']){

                          echo '<option value="'.$usr['user_role'].'" selected="selected">'.$role['role_name'].'</option>';
                        }
                        else{
                          echo '<option value="'.$role['role_id'].'">'.$role['role_name'].'</option>';
                        }
                      }
                      ?>

                    </select>

                    <br>

                   <label class="control-label"><?php echo _TABLEFIELDVERIFIED; ?></label>

                   <select class="custom-select form-control" name="user_verified">
                    <?php
                    if($usr['user_verified'] == 1){
                      echo '<option value="1" selected="selected">'._YESTEXT.'</option>';
                      echo '<option value="0">'._NOTEXT.'</option>';

                    } else{
                      echo '<option value="0" selected="selected">'._NOTEXT.'</option>';
                      echo '<option value="1">'._YESTEXT.'</option>';
                    }
                    ?>
                  </select>

                  <br/>
                  <br/>

                  <p><b><?php echo _TABLEFIELDDATEREGISTER; ?> </b> <?php echo FormatDate($connect, $usr['user_created']); ?></p>

                  <hr>

                  <button class="btn btn-primary" type="submit" name="save"><?php echo _UPDATEITEM; ?></button>
                  <button class="btn btn-danger deleteItem" type="button" data-url="../controller/delete_user.php?id=<?php echo $usr['user_id']; ?>" data-redirect="../controller/users.php"><?php echo _DELETEITEM; ?></button>

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

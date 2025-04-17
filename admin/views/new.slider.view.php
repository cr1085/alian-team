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
            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <div class="form-row">
                  <div class="form-group col-md-9">
                    <div class="block col-md-12">

                      <label class="required"><?php echo _TABLEFIELDURLLINK; ?></label>
                      <input type="text" placeholder="" name="slider_link" value="#" class="form-control">

                      <br>

                      <label class="required"><?php echo _TABLEFIELDIMAGE; ?></label>

                      <div class="new-image" id="image-preview" style="width: 500px; height: 200px;">
                        <label for="image-upload" id="image-label"><?php echo _CHOOSEFILE; ?></label>
                        <input type="file" name="slider_image" id="image-upload" required="" />
                      </div>

                    <span class="text-danger recomendedsize"><?php echo _RECOMMENDEDSIZE; ?> <b>920 x 360</b> </span>
                      <br/>
                      

                    </div>
                  </div>
                  <div class="form-group col-md-3 sidebar">

               <div class="block col-md-12">
                 <label><?php echo _TABLEFIELDSTATUS; ?></label>

                 <select class="custom-select form-control" name="slider_status">
                  <option value="1" selected=""><?php echo _ENABLED; ?></option>
                  <option value="0"><?php echo _DISABLED; ?></option>
                </select>

              </div>

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
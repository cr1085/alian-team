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


          <div class="col-12 c-col-12">
            <div id="saved"><i class="fa fa-check"></i> <?php echo _CHANGESSAVED; ?></div>
            <input type="submit" name="save" id="save" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" form="editTranslate" />
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4" style="margin-top: 20px;">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="editTranslate">
                <div class="form-row">

                  <div class="form-group col-md-12">

                   <div class="table-responsive">

                    <fieldset>
                      <legend><?php echo _SEO; ?></legend>

                      <table class="display table t-table">

                        <tr>  
                         <td>
                          <label><?php echo _SEOMETATITLE; ?></label>
                          <input type="text" value="<?php echo $translation['tr_1']; ?>" name="tr_1" class="form-control">
                        </td>
                      </tr>

                      <tr>  
                       <td>
                        <label><?php echo _SEOMETAKEYWORDS; ?></label>
                        <input type="text" value="<?php echo $translation['tr_2']; ?>" name="tr_2" class="form-control">
                      </td>
                    </tr>

                    <tr>  
                     <td>
                      <label><?php echo _SEOMETADESCRIPTION; ?></label>
                      <input type="text" value="<?php echo $translation['tr_3']; ?>" name="tr_3" class="form-control">
                    </td>
                  </tr>

                </table>

              </fieldset>


              <fieldset>
                <legend><?php echo _MAINTENANCEMODE; ?></legend>

                <table class="display table t-table">

                  <tr>  
                   <td>
                    <label><?php echo _MAINTENANCEMODEPAGETITLE; ?></label>
                    <input type="text" value="<?php echo $translation['tr_maintenancepage']; ?>" name="tr_maintenancepage" class="form-control">
                  </td>
                </tr>

                <tr>  
                 <td>
                  <label><?php echo _MAINTENANCEMODETITLE; ?></label>
                  <input type="text" value="<?php echo $translation['tr_maintenancetitle']; ?>" name="tr_maintenancetitle" class="form-control">
                </td>
              </tr>

              <tr>  
               <td>
                <label><?php echo _MAINTENANCEMODESUBTITLE; ?></label>

                <input type="text" value="<?php echo $translation['tr_maintenancesub']; ?>" name="tr_maintenancesub" class="form-control">
              </td>
            </tr>

          </table>
        </fieldset>


              <fieldset>
                <legend><?php echo _TRERRORPAGE; ?></legend>

                <table class="display table t-table">

                  <tr>  
                   <td>
                    <label><?php echo _TRERRORPAGETITLE; ?></label>
                    <input type="text" value="<?php echo $translation['tr_eptitle']; ?>" name="tr_eptitle" class="form-control">
                  </td>
                </tr>

                <tr>  
                 <td>
                  <label><?php echo _TRERRORPAGESUBTITLE; ?></label>
                  <input type="text" value="<?php echo $translation['tr_epsubtitle']; ?>" name="tr_epsubtitle" class="form-control">
                </td>
              </tr>

              <tr>  
               <td>
                <label><?php echo _TRERRORPAGETAGLINE; ?></label>

                <input type="text" value="<?php echo $translation['tr_eptagline']; ?>" name="tr_eptagline" class="form-control">
              </td>
            </tr>

              <tr>  
               <td>
                <label><?php echo _TRERRORPAGEBUTTON; ?></label>

                <input type="text" value="<?php echo $translation['tr_epbutton']; ?>" name="tr_epbutton" class="form-control">
              </td>
            </tr>

          </table>
        </fieldset>


        <fieldset>
          <legend><?php echo _PAGES; ?></legend>

          <table class="display table t-table">

            <tr>  
             <td>
              <label><?php echo _TRPROFILEPAGE; ?></label>
              <input type="text" value="<?php echo $translation['tr_profilepage']; ?>" name="tr_profilepage" class="form-control">
            </td>
          </tr>

          <tr>  
           <td>
            <label><?php echo _TRSIGNINPAGE; ?></label>
            <input type="text" value="<?php echo $translation['tr_signinpage']; ?>" name="tr_signinpage" class="form-control">
          </td>
        </tr>

        <tr>  
         <td>
          <label><?php echo _TRSIGNUPPAGE; ?></label>

          <input type="text" value="<?php echo $translation['tr_signuppage']; ?>" name="tr_signuppage" class="form-control">
        </td>
      </tr>

      <tr>  
       <td>
        <label><?php echo _TRRESETPAGE; ?></label>

        <input type="text" value="<?php echo $translation['tr_resetpage']; ?>" name="tr_resetpage" class="form-control">
      </td>
    </tr>

    <tr>  
     <td>
      <label><?php echo _TRFORGOTPAGE; ?></label>

      <input type="text" value="<?php echo $translation['tr_forgotpage']; ?>" name="tr_forgotpage" class="form-control">
    </td>
  </tr>

</table>
</fieldset>

<fieldset>
  <legend><?php echo _TRAPPCONTENT; ?></legend>

  <table class="display table t-table">

    <tr>  
     <td>
      <label><?php echo _TRAPPTERMSANDCONDS; ?></label>
      <textarea class="simpletinymce form-control" name="tr_termsandconds"><?php echo $translation['tr_termsandconds']; ?></textarea>
     </td>
   </tr>

    <tr>  
     <td>
      <label><?php echo _TRAPPABOUTUS; ?></label>
      <textarea class="simpletinymce form-control" name="tr_aboutus"><?php echo $translation['tr_aboutus']; ?></textarea>
     </td>
   </tr>

</table>

</fieldset>


<fieldset>
  <legend><?php echo _GENERALTRANSLATIONS; ?></legend>


  <table class="display table t-table">


    <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_4']; ?>" name="tr_4" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_5']; ?>" name="tr_5" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_6']; ?>" name="tr_6" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_7']; ?>" name="tr_7" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_8']; ?>" name="tr_8" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_9']; ?>" name="tr_9" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_10']; ?>" name="tr_10" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_11']; ?>" name="tr_11" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_12']; ?>" name="tr_12" class="form-control">
     </td>
   </tr>

   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_13']; ?>" name="tr_13" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_14']; ?>" name="tr_14" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_15']; ?>" name="tr_15" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_16']; ?>" name="tr_16" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_17']; ?>" name="tr_17" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_18']; ?>" name="tr_18" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_19']; ?>" name="tr_19" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_20']; ?>" name="tr_20" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_21']; ?>" name="tr_21" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_22']; ?>" name="tr_22" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_23']; ?>" name="tr_23" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_24']; ?>" name="tr_24" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_25']; ?>" name="tr_25" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_26']; ?>" name="tr_26" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_27']; ?>" name="tr_27" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_28']; ?>" name="tr_28" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_29']; ?>" name="tr_29" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_30']; ?>" name="tr_30" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_31']; ?>" name="tr_31" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_32']; ?>" name="tr_32" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_33']; ?>" name="tr_33" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_34']; ?>" name="tr_34" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_35']; ?>" name="tr_35" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_36']; ?>" name="tr_36" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_37']; ?>" name="tr_37" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_38']; ?>" name="tr_38" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_39']; ?>" name="tr_39" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_40']; ?>" name="tr_40" class="form-control">
     </td>
   </tr>

   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_41']; ?>" name="tr_41" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_42']; ?>" name="tr_42" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_43']; ?>" name="tr_43" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_44']; ?>" name="tr_44" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_45']; ?>" name="tr_45" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_46']; ?>" name="tr_46" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_47']; ?>" name="tr_47" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_48']; ?>" name="tr_48" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_49']; ?>" name="tr_49" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_50']; ?>" name="tr_50" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_51']; ?>" name="tr_51" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_52']; ?>" name="tr_52" class="form-control">
     </td>
   </tr>

   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_79']; ?>" name="tr_79" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_80']; ?>" name="tr_80" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_81']; ?>" name="tr_81" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_82']; ?>" name="tr_82" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_83']; ?>" name="tr_83" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_84']; ?>" name="tr_84" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_85']; ?>" name="tr_85" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_86']; ?>" name="tr_86" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_87']; ?>" name="tr_87" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_88']; ?>" name="tr_88" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_89']; ?>" name="tr_89" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_90']; ?>" name="tr_90" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_91']; ?>" name="tr_91" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_92']; ?>" name="tr_92" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_93']; ?>" name="tr_93" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_94']; ?>" name="tr_94" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_95']; ?>" name="tr_95" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_96']; ?>" name="tr_96" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_97']; ?>" name="tr_97" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_98']; ?>" name="tr_98" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_99']; ?>" name="tr_99" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_100']; ?>" name="tr_100" class="form-control">
     </td>
   </tr>

   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_101']; ?>" name="tr_101" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_102']; ?>" name="tr_102" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_103']; ?>" name="tr_103" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_104']; ?>" name="tr_104" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_105']; ?>" name="tr_105" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_106']; ?>" name="tr_106" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_107']; ?>" name="tr_107" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_108']; ?>" name="tr_108" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_109']; ?>" name="tr_109" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_110']; ?>" name="tr_110" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_111']; ?>" name="tr_111" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_112']; ?>" name="tr_112" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_113']; ?>" name="tr_113" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_114']; ?>" name="tr_114" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_115']; ?>" name="tr_115" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_116']; ?>" name="tr_116" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_117']; ?>" name="tr_117" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_118']; ?>" name="tr_118" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_119']; ?>" name="tr_119" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_120']; ?>" name="tr_120" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_121']; ?>" name="tr_121" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_122']; ?>" name="tr_122" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_123']; ?>" name="tr_123" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_124']; ?>" name="tr_124" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_125']; ?>" name="tr_125" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_126']; ?>" name="tr_126" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_127']; ?>" name="tr_127" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_128']; ?>" name="tr_128" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_129']; ?>" name="tr_129" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_130']; ?>" name="tr_130" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_131']; ?>" name="tr_131" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_132']; ?>" name="tr_132" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_133']; ?>" name="tr_133" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_134']; ?>" name="tr_134" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_135']; ?>" name="tr_135" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_136']; ?>" name="tr_136" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_137']; ?>" name="tr_137" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_138']; ?>" name="tr_138" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_139']; ?>" name="tr_139" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_140']; ?>" name="tr_140" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_141']; ?>" name="tr_141" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_142']; ?>" name="tr_142" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_143']; ?>" name="tr_143" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_144']; ?>" name="tr_144" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_145']; ?>" name="tr_145" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_146']; ?>" name="tr_146" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_147']; ?>" name="tr_147" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_148']; ?>" name="tr_148" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_149']; ?>" name="tr_149" class="form-control">
     </td>
   </tr>

   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_150']; ?>" name="tr_150" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_151']; ?>" name="tr_151" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_152']; ?>" name="tr_152" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_153']; ?>" name="tr_153" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_154']; ?>" name="tr_154" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_155']; ?>" name="tr_155" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_156']; ?>" name="tr_156" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_157']; ?>" name="tr_157" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_158']; ?>" name="tr_158" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_159']; ?>" name="tr_159" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_160']; ?>" name="tr_160" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_161']; ?>" name="tr_161" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_162']; ?>" name="tr_162" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_163']; ?>" name="tr_163" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_164']; ?>" name="tr_164" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_165']; ?>" name="tr_165" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_166']; ?>" name="tr_166" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_167']; ?>" name="tr_167" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_168']; ?>" name="tr_168" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_169']; ?>" name="tr_169" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_170']; ?>" name="tr_170" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_171']; ?>" name="tr_171" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_172']; ?>" name="tr_172" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_173']; ?>" name="tr_173" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_174']; ?>" name="tr_174" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_175']; ?>" name="tr_175" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_176']; ?>" name="tr_176" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_177']; ?>" name="tr_177" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_178']; ?>" name="tr_178" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_179']; ?>" name="tr_179" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_180']; ?>" name="tr_180" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_181']; ?>" name="tr_181" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_182']; ?>" name="tr_182" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_183']; ?>" name="tr_183" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_184']; ?>" name="tr_184" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_185']; ?>" name="tr_185" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_186']; ?>" name="tr_186" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_187']; ?>" name="tr_187" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_188']; ?>" name="tr_188" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_189']; ?>" name="tr_189" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_190']; ?>" name="tr_190" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_191']; ?>" name="tr_191" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_192']; ?>" name="tr_192" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_193']; ?>" name="tr_193" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_194']; ?>" name="tr_194" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_195']; ?>" name="tr_195" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_196']; ?>" name="tr_196" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_197']; ?>" name="tr_197" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_198']; ?>" name="tr_198" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_199']; ?>" name="tr_199" class="form-control">
     </td>
   </tr>


   <tr>  
     <td>
       <input type="text" value="<?php echo $translation['tr_200']; ?>" name="tr_200" class="form-control">
     </td>
   </tr>

 </table>
</div>

</div>

</div>


<input type="submit" name="save" id="save2" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" form="editTranslate" />
<div id="saved2"><i class="fa fa-check"></i> <?php echo _CHANGESSAVED; ?></div>

</form>
</div>
</div>



</div>
</div>
</div>
</div>
</section>

<div class="scrollTop">
  <span><a href=""><i class="dripicons-arrow-thin-up"></i></a></span>
</div>
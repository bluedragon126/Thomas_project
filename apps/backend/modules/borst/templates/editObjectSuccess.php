<style type="text/css">
.listing table td {border-top:0px solid #CED2D0;}
.error_list {margin:1px 0 0 10px;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" style="width:950px;">
    <div class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      <div class="shoph3 widthall"><?php echo $title ?> Object</div>
      <div class="float_left listing" style="width:50%;">
        <div class="float_left widthall" style="width:70%;">
          <form id="one_object_form" name="one_object_form" method="POST" action="">
            <input type="hidden" name="mode" value="edit">
            <?php echo $objectForm->renderHiddenFields()?>
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
              <tr valign=top>
                <td><table width="50%" border="0" cellspacing="0" cellpadding="0" id="back_object_list">
                    <tr>
                      <td width="10%">Objekt</td>
                      <td width="25%"><?php echo $objectForm['object_name']->render(array('class'=>'float_left'))?></td>
					  <td width="25%"><div id="obj_name_error" class="float_left redcolor" style="padding-left:5px; width:300px;">*</div></td>
                    </tr>
                    <tr valign=top>
                      <td width="10%">Land</td>
                      <td width="25%"><?php echo $objectForm['object_country']->render(array('class'=>'float_left','maxlength'=>3))?></td>
					  <td width="25%"><div id="obj_country_error" class="float_left redcolor" style="padding-left:5px;">*</div></td>
                    </tr>
                    <?php /*?><tr valign=top>
                      <td width="10%">Logga</td>
                      <td width="25%"><?php echo $objectForm['object_logo']->render(array('class'=>'float_left'))?></td>
					  <td width="25%"><div id="obj_logo_error" class="float_left redcolor" style="padding-left:5px;"></div></td>
                    </tr><?php */?>
                    <tr>
                      <td></td>
                      <td><input type="button" class="registerbuttontext submit" onclick="check_object_record()" value="Uppdatera"></td>
                  </table></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

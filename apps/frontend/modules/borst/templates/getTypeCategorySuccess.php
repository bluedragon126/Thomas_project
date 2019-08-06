<script>
    $(document).ready(function(){
        $('.selectBox').jqTransform();
    });
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="1" id="serch_type_select">
<tr class="">
    <td width="14%">Kategori:</td>
    <td>
        <div class="selectBox">
        <select id="adv_search_category" name="adv_search_category" class="border-radius-5px form_input width_277 contactus-inputs mrg_btm_5">
            <?php 
                foreach($arrCategory as $key=>$value)
                echo "<option value=".$key.">".$value."</option>"; 
            ?>
        </select>
        </div>
    </td>
</tr>
<tr class="">
    <td width="14%">Type:</td>
    <td>
        <div class="selectBox">
        <select id="adv_search_type" name="adv_search_type" class="border-radius-5px form_input width_277 contactus-inputs">
            <option value="0"></option>
            <?php 
                foreach($arrType as $key=>$value)
                echo "<option value=".$key.">".$value."</option>"; 
            ?>
        </select>        
        </div>
    </td>
</tr>     
</table>
<div class="padtd float_right width_1200_left_align">
    <form id="order_count_frm">
        <!-- display OrderCount Form -->
        <?php echo $orderForm->renderHiddenFields(); ?>
        <b> &nbsp;Number of records</b>
        <?php echo $orderForm['order_count']; ?>
        <!-- add second ajax call function name -->
        <input type="hidden" id="execute_fun_name" value="<?php echo $execute_fn_name?>"/>
    </form>
</div>
<script type="text/javascript">
    //bind input choice change event
    bindOrderCount();
</script>
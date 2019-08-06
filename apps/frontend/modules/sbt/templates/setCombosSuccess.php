<?php //if($type_id==1):?>
	
	<?php if($blog_article=='analysis'):?>

           <?php /*?> <?php if($market_cnt > 0):?>
			<span class="row"> 
            	<span class="label_text">Market:</span>
                <span class="input_box"><?php echo $form['analysis_market_id']->renderError() ?><?php echo $form['analysis_market_id']->render(array('id'=>'analysis_market')) ?></span>
            </span>
            <?php endif; ?><?php */?>
			
			<?php if($stocklist_cnt > 0):?>
            <span class="row"> 
            	<span class="label_text">Lista:</span>
                <span class="input_box"><?php echo $form['analysis_stocklist_id']->renderError() ?><?php echo $form['analysis_stocklist_id']->render(array('id'=>'analysis_stocklist')) ?><span class="indicator"><img align="absmiddle" src="/images/indicator.gif"></span></span>
            </span>
			<?php endif; ?>
			
            <?php if($sector_cnt > 0):?>
            <span class="row"> 
            	<span class="label_text">Sektor:</span>
                <span class="input_box"><?php echo $form['analysis_sector_id']->renderError() ?><?php echo $form['analysis_sector_id']->render(array('id'=>'analysis_sector')) ?><span class="indicator"><img align="absmiddle" src="/images/indicator.gif"></span></span>
            </span>
            <?php endif; ?>
			
            <?php if($object_cnt > 0):?>
			<span class="row"> 
            	<span class="label_text">Object:</span>
                <span class="input_box"><?php echo $form['analysis_object_id']->renderError() ?><?php echo $form['analysis_object_id']->render() ?><span class="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span></span>
            </span>
			<?php endif; ?>
			
	<?php endif; ?>	
	
	<?php if($blog_article=='blog'):?>
	
           <?php /*?> <?php if($market_cnt > 0):?>
			<span class="row"> 
            	<span class="label_text">Market:</span>
                <span class="input_box"><?php echo $userBlogForm['ublog_market_id']->renderError() ?><?php echo $userBlogForm['ublog_market_id']->render() ?></span>
            </span>
            <?php endif; ?><?php */?>
			
            <?php if($stocklist_cnt > 0):?>
			<span class="row"> 
            	<span class="label_text">Lista:</span><span class="indicator"><img src="/images/indicator.gif"></span>
                <span class="input_box"><?php echo $userBlogForm['ublog_stocklist_id']->renderError() ?><?php echo $userBlogForm['ublog_stocklist_id']->render() ?><span class="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span></span>
            </span>
            <?php endif; ?>
			
            <?php if($sector_cnt > 0):?>
            <span class="row"> 
            	<span class="label_text">Sektor:</span>
                <span class="input_box"><?php echo $userBlogForm['ublog_sector_id']->renderError() ?><?php echo $userBlogForm['ublog_sector_id']->render() ?><span class="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span></span>
            </span>
            <?php endif; ?>
			
            <?php if($object_cnt > 0):?>
            <span class="row"> 
            	<span class="label_text">Object:</span>
                <span class="input_box"><?php echo $userBlogForm['ublog_object_id']->renderError() ?><?php echo $userBlogForm['ublog_object_id']->render() ?><span class="indicator"><img align="absmiddle"  src="/images/indicator.gif"></span></span>
            </span>
			<?php endif; ?>
			
	<?php endif; ?>	
	
<?php //else: ?>
	
	<?php //if($blog_article=='analysis'):?>
	    <?php //if($object_cnt > 0):?>
			<!--<span class="row"> 
            	<span class="label_text">Object:</span>
                <span class="input_box"><?php //echo $form['analysis_object_id']->renderError() ?><?php //echo $form['analysis_object_id']->render() ?></span>
            </span>-->
	    <?php //endif; ?>	
	<?php //endif; ?>	
	
	<?php //if($blog_article=='blog'):?>
	    <?php //if($object_cnt > 0):?>
			<!--<span class="row"> 
            	<span class="label_text">Object:</span>
                <span class="input_box"><?php //echo $userBlogForm['ublog_object_id']->renderError() ?><?php //echo $userBlogForm['ublog_object_id']->render() ?></span>
            </span>-->
	    <?php //endif; ?>	
	<?php //endif; ?>	
<?php //endif; ?>
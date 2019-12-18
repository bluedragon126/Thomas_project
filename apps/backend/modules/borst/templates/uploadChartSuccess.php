<script type="text/javascript">
/**
 *
 *  AJAX IFRAME METHOD (AIM)
 *  https://www.webtoolkit.info/
 *
 **/
 
AIM = {
 
 frame : function(c) {
 
  var n = 'f' + Math.floor(Math.random() * 99999);
  var d = document.createElement('DIV');
  d.innerHTML = '<iframe style="display:none" src="about:blank" id="'+n+'" name="'+n+'" onload="AIM.loaded(\''+n+'\')"></iframe>';
  document.body.appendChild(d);
 
  var i = document.getElementById(n);
  if (c && typeof(c.onComplete) == 'function') {
   i.onComplete = c.onComplete;
  }
 
  return n;
 },
 
 form : function(f, name) {
  f.setAttribute('target', name);
 },
 
 submit : function(f, c) {
  AIM.form(f, AIM.frame(c));
  if (c && typeof(c.onStart) == 'function') {
   return c.onStart();
  } else {
   return true;
  }
 },
 
 loaded : function(id) {
  var i = document.getElementById(id);
  if (i.contentDocument) {
   var d = i.contentDocument;
  } else if (i.contentWindow) {
   var d = i.contentWindow.document;
  } else {
   var d = window.frames[id].document;
  }
  if (d.location.href == "about:blank") {
   return;
  }
 
  if (typeof(i.onComplete) == 'function') {
   i.onComplete(d.body.innerHTML);
  }
 }
 
}
 </script>
 <script type="text/javascript">
  function startCallback() {
   return true;
  }
 
  function completeCallback(response) {
   document.getElementById('chart_image_upload_error').innerHTML = response;
   //window.location.reload();
  }
 </script>
<style type="text/css">
#subscription_other_links a {color:#114993;}
.heading{
    font-weight: bold;
}
.classnot{
   
}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" style="width:950px;">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/btchart?stock_type=all' ?>">Stock List</a>&nbsp;&nbsp;
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addStock' ?>">Add Stock</a>&nbsp;&nbsp;
        <a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/uploadChart' ?>">Add chart</a>&nbsp;&nbsp;
        <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addChartType' ?>">Add chart Type</a>&nbsp;&nbsp;
	</div>
    
    <div class="shoph3 widthall">Upload Chart</div>
    <div style="float: left;">
    <form>
        <table>
        <tr>
            <td> Stock : </td>
            <td>
                <select id="stock_id">
                    <?php foreach($stock_list as $key => $value): ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>            
            </td>
        </tr>
        <tr>
            <td> Chart Type : </td>
            <td>
                <select id="chart_type">
                <?php foreach($chart_list as $key => $value): ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span id="upload_link"><input type="button" id="chartImage" value="Select chart Image" /></span>
				<span id="upload_msg" style="color:#FF0000;"></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="3"> </td>
        </tr>
             
        </table>
    </form>        
    </div>
    <div class="float_left widthall">
   	<div class="float_left listing">

    </div>
    </div>
    
  </div>
 </div>
</div>

<!-- Used on product image upload. -->
<div id="upload_chart_image" style="border:0px solid red;" title="Upload Chart image" class="hide_div">
<form id="upload_chart_image_form" name="upload_chart_image_form" enctype="multipart/form-data" method="post" action="/backend.php/borst/uploadChartImage/" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback});">
 <table border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td><div class="float_left" style="width:20px;"></div></td><td id="chart_image_upload_error">&nbsp;</td>
	</tr>
	<tr>
		<td id="browse_box_div"><div class="float_left" style="width:20px;"></div></td><td align="right"><input type="file" name="upload_product_image" id="upload_product_image" /></td>
	</tr>
 </table>
    <input type="hidden" name="company_id" id="company_id" value="" />
    <input type="hidden" name="chart_type_id" id="chart_type_id" value="" />
</form>
</div>

<div id="price_distribution_last_row_box" style="border:0px solid red;" title="Price Distribution Notification">
 <table border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="price_distribution_last_row_msg">&nbsp;</td>
	</tr>
 </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#upload_product_image").bind('click','',function(){
       $("#company_id").val($("#stock_id").val())
       $("#chart_type_id").val($("#chart_type").val())        
    });
    
    $('#chartImage').live("click",function(){											  
		$('#upload_product_image').val('');	
		$('#chart_image_upload_error').html('');	
		showChartImageUploadBox();
	});
    $("#stock_id").bind('change','',function(){
        $("#upload_msg").html('');
    });
    $("#chart_type").bind('change','',function(){
        $("#upload_msg").html('');
    });    
    
function showChartImageUploadBox()
{
	// This Dialog box is used to send a friend request.
	$('#upload_chart_image').dialog('destroy');
	var box_width = '';
	var classname = $('#upload_chart_image').attr('class');
	$('#upload_chart_image').removeClass(classname).addClass('show_div');
	
	// To adjust the popups width in mac safari.
	var jQbrowser = navigator.userAgent.toLowerCase();
    jQuery.os = {
      mac: /mac/.test(jQbrowser),
      win: /win/.test(jQbrowser),
      linux: /linux/.test(jQbrowser)
    };

	
	if(jQuery.os.mac) 
	{
		if(jQuery.browser.safari)
		{  
			box_width = 350;
		}
	}
	else
		box_width = 350;
	
	$('#upload_chart_image').dialog({
		autoOpen: false,
		width: box_width,
		modal: true,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save Image": function() { 
			    
				$('#upload_chart_image_form').submit();
				
				 var browse_box_text = $('#browse_box_div').html();
				$('#browse_box_div').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" />');
				
				setTimeout("checkMessageChartImageUpload()",2000);               
			} 
		}
	});
	$('#upload_chart_image').dialog('open');
}
       
    
});
</script>
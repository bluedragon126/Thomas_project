/**
 *method getNewsletterForValue
 *@param $id
 *load the newsletter from current selected values  (Article,SbtArticle,Blog and Ads)
 *and call loadNewsletter method to load data from ajax call
 */
var lock = false;
function getNewsletterForValue(type,id){
    if(type=="article" || type=="sbtArticle"){
        var obj = $("input[value='"+$("#current_val").attr("css")+"']");
        var arr = $(obj).val().split("_");
        $(obj).val(type+"_"+id+"_"+arr[2]);
    }else{
        var obj = $("input[id='"+$("#current_val").attr("css")+"']");
        $(obj).val(id);
    }
    $( "#newsletter_dialog" ).dialog("destroy");
    loadNewsletter();
}

/**
 *method loadNewsletter
 *load newsletter from selected articles ,blog and ads value and
 *call bindNewsletterStyle to bind style to them
 */
function loadNewsletter(){
  
    $.ajax({
        url:'newsletterAutomation',
        data:$("#newsletter_form").serialize(),
        success:function(data){
            $("#n_newletter").html(data);
            bindNewsletterStyle();
            bindosrtable();
        }
    });
}
/**
* method bindNewsletterStyle
* show article ,sbtArticle ,blog and ads edit label on mouseenter and mouseleave
*/
function bindNewsletterStyle(){
    $("#top_left_side td").html("&nbsp;")
    $("#n_parent a").attr("href","#");
    //show all edit view (Article, SbtArticle, Blog or Ads)
    $(".n_article_top").attr("style","visibility:visible");
    $(".n_article_top .next_nobj").attr("style","visibility:visible");
    $(".n_article_top .next_nobj").each(function(){
        //alert($(this).next().val());
       $(this).html($(this).next().val());
    });

    //focus the edit view for list view (Article, SbtArticle, Blog or Ads)
    $("table td[id^='nobj']").unbind("mouseover").bind("mouseover", function(){

        if(!lock){
            $(this).attr("style","background:#AAAAAA;border:0px solid #444444;");
            $(".n_article_top").attr("style","visibility:visible");
            $(this).find(".n_article_top").attr("style","visibility:hidden;");
            lock = true;
              $(this).bind("mouseleave", function(){
                         $(this).attr("style","background:#FFFFFF;border:1px solid #FFFFFF;");
                        $(".n_article_top").attr("style","visibility:visible");
                    lock = false;
    });
        }
        
              
    });
    //unfocus edit view for list view (Article, SbtArticle, Blog or Ads)
  

    //load dialog view on click event of current view (Article, SbtArticle, Blog or Ads)
    $("table td[id^='nobj']").unbind("click").bind("click",function(){
        $("#current_val").attr("css",$(this).parent().attr("id"));
        var idArr = $(this).attr("id").split("_");
        loadDailogBox(idArr[1]);

       
    });
}

function unbindDialogbox(){
     $("table td[id^='nobj']").unbind("click");
}

function loadDailogBox(dialog_type){
        //var idArray = $(this).parent().attr("id").split("_");
       var param = new Array();
       var cnt= 0;
       var varVal = "";
       title_str = dialog_type;
        if(dialog_type == 'article'){
            $("input[name='article[]']").each(function(){
                varVal = $(this).val().split("_");
                if(dialog_type == varVal[0])
                 param[cnt++] = varVal[1];
            });
         title_str = "BÖRSTJÄNAREN";
        }
          
        else if(dialog_type == 'sbtArticle'){
            $("input[name='article[]']").each(function(){
                varVal = $(this).val().split("_");
                if(dialog_type == varVal[0])
                 param[cnt++] = varVal[1];
            });
            title_str = "Syster BT";
        }
        else
            title_str = title_str.toUpperCase();
        var url_path = "/backend.php/borst/"+dialog_type+"Dialog"; //create appropriate dialog view path
     
        //load dialog html
        $.ajax({
            url:url_path,
            data:{"params":param},
            success:function(data){

                $("#newsletter_dialog").html(data); //load dialog data
                bindDailogStyle();
                //configure dialog view
                $( "#newsletter_dialog" ).dialog({
                    height: 340,
                    width:1050,
                    modal: true,
                    title: title_str
                });
            }
        });
}
/**
 * method bindDailogStyle
 * bind the dialog row style on mouseenter and mouseleave
 */
function bindDailogStyle(){
    $(".article_div_list_tr").bind("mouseenter",function(){
        $(this).attr("style","background:#AAAAAA;color:#FFFFFF;");
    });
    $(".article_div_list_tr").bind("mouseleave",function(){
        $(this).attr("style","background:#FFFFFF;color:#000000;");
    });
}

$(document).ajaxSuccess(function() {
    bindDailogStyle();

});

/**
 * method bindNewsletterLink
 * set preview link for particular newsletter
 */
function bindNewsletterLink(){
    
    $("#newsletter_id").unbind("change").bind("change",function(){
        $.ajax({
       url: 'getNewsLetterPreviewLink',
       data:{"id":$(this).val()},
       success:function(data){
            var preview_link = '<a href="javascript:void(0)" class="cursor lightbluefont" onclick="window.open(\'newsletterAutomation?'+data+'\')" >[Preview]</a>';
            $("#newsletter_link").html(preview_link);
            if(data){
                $.ajax({
                   url:"newsletterAutomation?"+data,
                   success:function(newData){
                       $("#mail_body").val(newData);
                   }
                });
            }else{
                 $("#mail_body").val("");
                 $("#newsletter_link").html("");
            }
       }
    });
    });
}

/**
*
 */
function getUsersEmailIdForNewsLetter(){

    $.ajax({
       url:'getEmailIdsForNewsletter',
      // data:$("#send_mail").serialize(),
      data: {"s_abon":$("#s_abon").val(),"s_stat":$("#s_stat").val()},
       success:function(data){
           $("#email_list_div").html(data);
       }
    });


}

function deleteNewsletter(id,page){
    $('#news_letter_delete_confirm').dialog({
        autoOpen: false,
        width: 300,
        title:"Är du säker på att du vill radera nyhetsbrev nummer "+id,
        buttons: {
            "Radera objekt": function() {
                $.ajax({
                    url:"DeleteNewsletterById",
                    data:{
                        "id":id,
                        "page":page
                    },
                    success:function(data){
                         $('#news_letter_delete_confirm').dialog("close");
                        $("#newsletter_page").html(data);
                        
                    }
                });
            },
            "Avbryt": function() {
                $(this).dialog("close");
            }
        }
    });
    $('#news_letter_delete_confirm').dialog("open");
   
}

function bindosrtable(){
    var tempHeight;
    var tempWidth;
    /*$("#right_side_div tr").hide();
          tempHeight = $("#right_side").parent().height();
          $("#right_side").parent().height( $( "#left_side" ).parent().height());
          $("#temp_right_tr").attr("height","20px");*/
    $( "#right_side" ).droppable({
        drop: function( event, ui ) {
            console.log(ui);
            //alert(ui.item[0].id);
            var obj = ui.draggable[0];
            var obj_id = $(obj).attr("id").split("_");
         if(obj_id[2]=="left")
            elementMove(obj,"right");
        }
    });
    $( "#left_side" ).droppable({
        drop: function( event, ui ) {
             console.log(ui);
         //alert(ui.item[0].id);
         var obj = ui.draggable[0];
         var obj_id = $(obj).attr("id").split("_");
         if(obj_id[2]=="right")
            elementMove(obj,"left");
        }
    });
    $( "#left_side" ).sortable({
        connectWith: "#right_side",
       
        start:function(event, ui){
            var obj = ui.item[0];
            unbindDialogbox();
          //  $(obj).find("td").css("background", "#FFFF00");
          $("#right_side_div tr").hide();
          $("#right_side_tr_bottom ").show();
          $("#right_side_tr_bottom tr").show();
          tempHeight = $("#right_side").parent().height();
           // $("#right_side").parent().height( $("#left_side" ).parent().height());
          //  $("#right_side").height($("#right_side").parent().height());
          $("#right_side").parent().height( $("#left_image_table").height());
          $("#right_side").height($("#left_image_table").height());
          $("#right_side").css("border","2px solid black");
          //  $("#temp_right_tr").height(1);
           // $("#temp_right_tr td").height(1);
        },
           receive:function(event,ui){
            
            console.log(ui);
         //alert(ui.item[0].id);
         var obj = ui.item[0];

         elementMove(obj,"left");
       
        }
        ,
        stop: function(event, ui){
               $("#right_side_div tr").show();
               $("#right_side").parent().height( tempHeight);
               $("#right_side").height(tempHeight);
               $("#right_side").css("border","0px solid black");
         moveElement();
        }
    }).disableSelection();
    $( "#right_side" ).sortable({
        connectWith: "#left_side",
        dropOnEmpty: true,
        start:function(event, ui){
            var obj = ui.item[0];
            unbindDialogbox();
          //  $(obj).find("td").css("background", "#FFFF00");
         

          //  $(obj).find("td").css("background", "#FFFF00");
          
          tempHeight = $("#left_side").height();
            //$("#left_side").height($("#right_side").parent().parent().parent().parent().height());
            $("#left_side").height($("#left_image_table").height());
          //  $("#temp_right_tr").height(1);
           // $("#temp_right_tr td").height(1);
      
        },
        receive:function(event,ui){
      
            console.log(ui);
         //alert(ui.item[0].id);
         var obj = ui.item[0];
 
         elementMove(obj,"right");
       

        },
        stop: function(event, ui){
             moveElement();
              
               $("#left_side").height(tempHeight);
        }
    }).disableSelection();

}
function moveElement(){
    $("#top_left_side").height(0);
    $("#article_ids").html("");
    $( "#left_side tr" ).each(function(){
        var obj = '<input type="hidden"  name="article[]" value="'+$(this).attr("id")+'">';
        console.log($(this).attr("id"));
        $(obj).val($(this).attr("id"));
        if($(this).attr("id") && $(this).attr("id")!='temp_right_tr' && $(this).attr("id")!='top_left_side')
            $("#article_ids").append($(obj));
    });
    $( "#right_side tr" ).each(function(){
         var obj = '<input type="hidden"  name="article[]" value="'+$(this).attr("id")+'">';
        $(obj).val($(this).attr("id"));
        if($(this).attr("id") && $(this).attr("id")!='temp_right_tr')
            $("#article_ids").append($(obj));
    });
}
function elementMove(obj,new_pos){
       // $(obj).find("td").css("background", "#FFFFFF");
         var objVal = $("input[value='"+obj.id+"']");
        
         var id = obj.id.split("_");
         
          
         var pos = "prev";
         var prevObj = $(obj).prev();
         if($(prevObj).attr("id")==null){
             prevObj = $(obj).next();
             pos = "next";
         }
         
         $(obj).attr("id",id[0]+"_"+id[1]+"_"+new_pos);
         $(objVal).val(obj.id);

         if($(prevObj).attr("id")!=null){
            var prevVal = $("input[value='"+$(prevObj).attr("id")+"']");
          if($(prevVal).attr("id") == ""){
            prevVal = $("#article_ids input").last();
            if($(prevVal).val() == $(objVal).val())
                prevVal = $(prevVal).prev();
          }

            if(pos == "prev")
                $(prevVal).after($(objVal));
            else
                $(prevVal).before($(objVal));
          }
         loadNewsletter();
}
<style>.swish_input{display: none;}.hide {display: none !important;} .hidenew{display: none !important;}</style>
<script type="text/javascript" language="javascript">
    function showModelIcons() {
            if(flag) {
                $('#unclickableDiv').css('width', $(document).width())
                $('#unclickableDiv').css('height', $(document).height())        
                $('#unclickableDiv').css('display', 'block');
                $('#loadingTxt').hide(1);  
            }
            else
            {
                $('#unclickableDiv').css('display', 'none');
            }
    }
    $(document).ready(function () {

        var errCodes = {"ACMT01":"Counterpart is not activated",
                    "ACMT03":"Payer not Enrolled", 
                    "ACMT07":"Payee not Enrolled", 
                    "AM02":"Amount value is too large", 
                    "AM03":"Invalid or missing Currency",
                    "AM06":"Amount value is too low", 
                    "BE18":"Payer alias is invalid", 
                    "BANKIDCL":"Payer cancelled BankId signing",  
                    "DS24":"Swish timed out waiting for an answer from the banks after payment was started",
                    "FF08":"PayeePaymentReference is invalid",      
                    "FF10":"Bank system processing error",
                    "PA01":"Parameter is not correct",
                    "PA02":"Amount value is missing or not a valid number", 
                    "RP01":"Payee alias is missing or empty",
                    "RP02":"Wrong formatted message", 
                    "RP03":"Callback URL is missing or does not use Https", 
                    "RP06":"Another active PaymentRequest already exists for this payerAlias. Only applicable for E-Commerce", 
                    "RF07":"Transaction declined",                                         
                    "TM01":"Swish timed out before the payment was started",                     
                };
        var errCode = {"ACMT01":"Motparten är inte aktiverad",
                    "ACMT03":"Betalaren är ej ansluten till Swish", 
                    "ACMT07":"Betalningsmottagaren är ej ansluten till Swish", 
                    "AM02":"Beloppet är för högt", 
                    "AM03":"Ogiltig valuta",
                    "AM06":"Beloppet är för lågt", 
                    "BE18":"Ogiltigt betalaralias", 
                    "BANKIDCL":"Betalaren avbröt BankID-signering",  
                    "DS24":"Swish time out i väntan på svar från banken. Kolla med din bank om betalning gjorts",
                    "FF08":"Ogiltig betalningsreferens",      
                    "FF10":"Bank system bearbetning fel",
                    "PA01":"Parametern är inte korrekt",
                    "PA02":"Belopp saknas eller ogiltigt nummer", 
                    "RP01":"Betalninsmottagarens alias saknas",
                    "RP02":"Felformaterat meddelande", 
                    "RP03":"Callback URL saknas", 
                    "RP06":"En annan aktiv betalningsbegäran finns redan hos betalaren", 
                    "RF07":"Transaktionen nekad",                                         
                    "TM01":"Swish time out innan betalningen påbörjades",                     
                };
        //alert(errCode.RP06);
    
        
        pop_Height = $('#popup_container_swish').height();
        pop_Width = $('#popup_container_swish').width();
        screen_Height = $(window).height();
        screen_Width = $(window).width();
        pop_Hht = ((screen_Height - pop_Height)/2);
        pop_Wdh = ((screen_Width - pop_Width)/2);
        $('#popup_container_swish').css('top',pop_Hht);
        $('#popup_container_swish').css('left',pop_Wdh);
        
        $('.radio').unbind('click');	
        $('.radio').live("click",function(){
                if ($(this).val() == '1' || $(this).val() == '3') {
                    $('#swishcell_num').val('');
                    $('.swish_input').hide();
                    $('.payment_conformation_li').css({'display' : 'block'});
                    $('#payment_conformation_swish').hide();
                } else {
                    $('.swish_input').css({'display' : 'block'});                     
                    //$('#swishcell_num').val('');
                    $('.payment_conformation_li').hide();
                    $('#payment_conformation_swish').css({'display' : 'block'});
                }
        });        
        
        var transId = false;
        var poll = function(){
            
            setTimeout(function(){
                    //console.log("Polling...");
                    //$.get("/ajax.php?transactionId=" + transId, function (data) {
                    $.get("/borst_shop/swishApi?transactionId=" + transId, function (data) {
                        data = JSON.parse(data);
                        //console.log(data);
                        //console.log(data.status);
                        var swishRes = JSON.stringify(data);
                        //var swishRes = '{"errorCode":null,"errorMessage":null,"id":"1982C1DB28454A10A7F47A5A816C203C","payeePaymentReference":"234567892","paymentReference":"DC985EF6A34F4F47ADFAE5853DE5C7C1","callbackUrl":"https://localhost/swish_payment/getswish-api-master/success.php","payerAlias":"46739866319","payeeAlias":"1233144318","amount":1.00,"currency":"SEK","message":"Test successful","status":"PAID","dateCreated":"2018-01-19T13:08:45.414Z","datePaid":"2018-01-19T13:09:18.565Z"}'
                        //console.log(swishRes);
                        if (data && data.status == "PAID") {
                            // Perform redirect to order confirmation
                            //console.log("Order completed.");                                
                            window.location = 'https://'+window.location.hostname+'/borst_shop/shopArticlePaymentDone?typ=4&swishRes='+swishRes;
                        } else {
                            if (data.status == 'ERROR' || data.status == 'DECLINED') {
                                //console.log('error');
                                $('#popup_container_swish').hide();
                                flag = 0;
                                showModelIcons();
                                if(data.status == 'DECLINED'){
                                    $("#msg-poll").html('Transaktionen nekad');
                                }else{
                                    $("#msg-poll").html(errCode[data.errorCode]);
                                }
                                //window.location = 'https://'+window.location.hostname+'/borst_shop/shopArticlePaymentDone?typ=4&swishRes='+swishRes;
                            } else {
                                //console.log('success');
                                poll();
                            }
                            //console.log("status ==> " + data.status);
                            //console.log('errorCode ==>' + data.errorCode);
                            //console.log('errorMessage ==> ' + data.errorMessage);
                        }
                    });
            }, 200);
        };

        $("#payment_conformation_swish").click(function(){
            var swishCellNumber = $('#swishcell_num').val();
                if(swishCellNumber == ''){
                    $('#msg-poll').html('Ange telefonnumret');
                    return false;
                } else {
                    //posibilities to enter valid cell number => 0739866319 / 46739866319 / 460739866319 / 739866319 / 073 986 63 19
                    //swish api accept valid cell number = 46739866319     
                    var nr = $("#swishcell_num").val();
                    var nr = nr.replace(/ +/g, "");//to remove special chare from cell number
                    var firstChar = nr.charAt(0);//check if first char is 0
                    var firstTwoChars = nr.substring(0, 2);//check if first two chars are 46
                    var firstThreeChars = nr.substring(0, 3);////check if first three chars are 460
                    if(firstChar == '0'){//console.log('check if first char is 0 ');//check if first char is 0 then 0739866319 remove 0 it to make like 46739866319
                        var cellNum = '46'+nr.substring(1, nr.length);
                    }else if(firstThreeChars == '460'){//console.log('check if first three chars are 460 ');//check if first three chars are 460 then remove 0 it 460739866319 to make like 46739866319
                        var cellNum = '46'+nr.slice(3);
                    }else if(firstTwoChars == '46'){//console.log('check if first two chars are 46 ');//check if first two chars are 46 then 46739866319 keep as it is bcoz it is valid
                        var cellNum = nr;
                    }else {//console.log('check if number is valid ');//check if number is 739866319 then add country code 46 to make it 46739866319
                        var cellNum = '46'+nr;
                    }
                    //console.log('entered number is ' + nr); 
                    //console.log('converted number is ' + cellNum);
                    //return false;                        samt
                    //var swishAmt = $("#samt").val();
                    //var msg = $("#msg-select").val();
                   //$.get("/ajax.php?orderId=" + $("#order").val() + "&phone=" + cellNum + "&samt=" + swishAmt + "&msg=" + msg, function (data) {
                   $.get("/borst_shop/swishApi?phone=" + cellNum, function (data) {
                        if (typeof (data) != "object") {
                            //console.log('hi');
                            data = JSON.parse(data);
                        }                            
                        transId = data.transactionId;
                        var resStatus = data.status;
                        //console.log("data => " + data);
                        //console.log("transid1 => " + transId);
                        //console.log("status1 => " + resStatus);

                        /*var userStr = JSON.stringify(data);
                        //console.log(userStr);
                        var newArr = [];                          
                        //to check error is in response
                        JSON.parse(userStr, (key, value) => {
                            //console.log('<=key=> '+ key + ' <=value=> ' + value);
                            if (key == 'errorCode') {//if error then show it
                                    //console.log('error1');                                
                                    //console.log(errCode[value]);
                                    //console.log('<=key=> '+ key + ' <=value=> ' + value);
                                    if(errCode[value]){
                                        $("#msg-poll").html(errCode[value]);
                                    }else{
                                        $("#msg-poll").html(value);
                                    }                                    
                                    newArr.push(value);
                            }
                        });
                        //console.info("transid2 => " + transId);
                        //console.log("status2 => " + data.status);
                        if(transId){//if transaction is present then wait for response
                            if (newArr.length == 0) {
                                $('#popup_container_swish').show();
                                flag = 1;
                                showModelIcons();
                                //console.log('success1');
                                $("#transid-input").val(transId);
                                poll();// proceed to capture response
                            }
                            //console.log(newArr[0] + '=error Array=' + newArr.length);
                        }    */   
                        if(transId){//console.log(111);
                            $('#popup_container_swish').show();
                                flag = 1;
                                showModelIcons();
                                //console.log('success1');
                                $("#transid-input").val(transId);
                                poll();// proceed to capture response
                        }else{
                            myObj = data;//[{"errorCode":"BE18","errorMessage":"Payer alias is invalid","additionalInformation":null}]

                            for (i in myObj) {
                                //console.log('<=key1=> '+ myObj[i].errorCode + ' <=value1=> ' + myObj[i].errorMessage);
                                //console.log('<=key2=> ' + myObj[i]);
                                    if (myObj[i].errorCode) {
                                        //console.log(222);
                                        $("#msg-poll").html(errCode[myObj[i].errorCode]);
                                    } else {
                                        //console.log(333);
                                        $("#msg-poll").html(myObj[i]);
                                    }
                                }
                        }
                    });
                }
        });
        
        var leftHeight = $(".btshopleftdiv").height();
        var rightHeight = $(".rightbanner").height();
        var maxHeight = 0;

        if (rightHeight > leftHeight)
        {
            maxHeight = rightHeight;
        } else
        {
            maxHeight = leftHeight;
        }

        $(".rightbanner").css({"height": maxHeight + "px"});
        $(".btshopleftdiv").css({"min-height": maxHeight + "px"});

        $('.bank_selection_outer').hide();
        $('.btshopleftdivinner').jqTransform();
    });
</script>
<div class="maincontentpage maincontentpageshop margin-top-15m">
    <div class="inner-page-contetn-left margin-bottom-10m">
        <?php if ($sf_user->getAttribute('loginRequired') == true || $loginRequiredForProduct == true): ?>
            <div class="red_text2">Vänligen logga in för att köpa detta objekt!</div>
        <?php else: ?>
            <div class="breadcrumb_div">
                <div>
                    <div class="photoimg "><img alt="photo" src="/images/new_home/btshop.gif"></div>
                    <div class="breadcrumb">
                        <ul>
                            <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
            ))
            ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="btshopleftdiv ptop_10" >
                <div class="btshopleftdivinner">
                    <div class="cart_payment_steps">
                        <div class="bt-shop-step-top-margin widthall float_left">&nbsp;</div>
                        <?php include_partial('borst_shop/payment_steps_partial',array('step'=>2,'designType'=>2)) ?>
                        <div class="bt-shop-step-bottom-margin widthall float_left">&nbsp;</div>
                    </div>
                <div class="shop_detail_title">2. Välj betalsätt</div>
                <div class="spacer"></div>
                <div class="blue_title"><!--Välj betalsätt--></div>
                <ul class="cartStep2">
                    <li>
                        <span class="span1"><input type="radio" class="radio" checked="checked" value="1" name="pay_option" onchange="paymentMethod('1')"></span>
                        <span class="shop_payment_type span2">Kortbetalning</span>
                        <span class="span3"><img src="<?php echo 'https://' . $host_str . '/images/new_home/visa-mastercard.png'; ?>" width="60" height="19" alt="Visa" /></span>
                    </li>
                    <li>
                        <span class="span1"><input type="radio" class="radio" name="pay_option" value="3" onchange="paymentMethod('3')"></span>
                        <span class="shop_payment_type span2" >Förskottsbetalning </span>&nbsp;<span>(via plus- eller bankgiro)</span>
                    </li>
                    <li>
                            <span class="span1"><input type="radio" class="radio" name="pay_option" value="4" onchange="paymentMethod('4')"></span>
                            <span class="shop_payment_type span2 tooltip"><img  src="<?php echo 'https://' . $host_str . '/images/swish_logo.png'; ?>" width="130" height="30" alt="Swish" /><span class="tooltiptext"><p id="tooltiptext_title">För att betala med Swish:</p><p>Fyll i ditt mobilnummer nedan,</p><p>öppna Swish-appen i din mobil</p><p>och godkänn betalningen.</p></span></span>
                            <span class="span3"></span>
                    </li>
                    <li id="swish_input" class="swish_input">
                        <span class="span1" style="margin: 0;"><input placeholder="Fyll i ditt mobilnummer här" type="text" size="25" class="inputBox277 form_input width_277" id="swishcell_num" name="swishcell_num" value=""></span>
                    </li>
                    <li class="hidenew">
                        <input type="text" id="transid-input" placeholder="" >
                        <div id="msg-callback"></div>
                    </li>
                </ul>
                <!--<div class="blank_11h widthall">&nbsp;</div>-->
                <ul class="rows margin_left_0">
                    <li class="payment_conformation_li"> <a id="article_payment_conformation" class="red_button payment_conformation_class"><span>BEKRÄFTA</span></a></li>
                    <li> <a id="payment_conformation_swish" class="red_button payment_conformation_class swish_input"><span>BEKRÄFTA</span></a></li>
                </ul>	
                <div id="msg-poll"></div>
                <div class="blank_100h widthall">&nbsp;</div>                
                <div class="spacer"></div>
               </div>        
            </div>
        <?php endif; ?>
        <div class="mrg_top_49 floatLeft mrg_lft_60 margin_bottom_60">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner" id="shop_rightbanner">
        <?php include_partial('borst_shop/get_cart_data_partial_article', array('final_vat' => $final_vat, 'final_totals' => $final_totals, 'final_dicount' => $final_dicount, 'host_str' => $host_str, 'products_data' => $products_data, 'price_arr' => $price_arr, 'product_qty_arr' => $product_qty_arr, 'price_detail_id_arr' => $price_detail_id_arr, 'product_article' => $product_article, 'add_shipping_flag' => $add_shipping_flag, 'total_shipping_cost' => $total_shipping_cost, 'logged_user' => $logged_user, 'payment_user_info' => $payment_user_info, 'product_detail' => $product_detail, 'metastock_data' => $metastock_data, 'falcon_computer_data' => $falcon_computer_data, 'bocker_data' => $bocker_data, 'utbildningar_data' => $utbildningar_data, 'marknadsbrev_data' => $marknadsbrev_data, 'abonnemang_data' => $abonnemang_data, 'btcart_data' => $btcart_data, 'xmas_offer_data' => $xmas_offer_data, 'productID' => $productID, 'on_last_step' => 1)) ?>
    </div>
</div>
<div id="popup_container_swish" class="popup_container_swish">  
    <div id="popup_content_swish">
        <p>Godkänn betalning i Swish-appen</p>
        <p>1. Öppna Swish-appen på din mobila enhet.</p>
        <p>2. Godkänn betalningen.</p>
        <p>3. Klart.</p>
    </div>        
</div>
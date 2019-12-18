$(document).ready(function()
{
        //select all checkboxes
        $("#coupon_ids_check_uncheck").live('change',function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox_coupon').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox_coupon').live('change',function(){ //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#coupon_ids_check_uncheck")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.checkbox_coupon:checked').length == $('.checkbox_coupon').length ){
                $("#coupon_ids_check_uncheck")[0].checked = true; //change "select all" checked status to true
            }
        });
    $('#sf_guard_user_username').attr('readonly', 'true'); //change by sandeep
    //$("#search_subscriptionlist_form").validate();
    
	/* Initialise combos */
	initSubscribtionTypeCombos();
	
	/* To Show-Hide Registration Blog Rights Section.*/
	$("#blog_rights_plus").toggle(
	  function () {
		$(".blog_rights").toggle();
		$(this).attr('src','/images/minusicon.png');
		$('#blog_info_div').val('show');
	  },
	  function () {
		$(".blog_rights").toggle();
		$(this).attr('src','/images/addplusicon.png');
		$('#blog_info_div').val('hide');
	  }
	);
	
	/* To Maintain Show-Hide Registration Blog Rights Section.*/
	var blog_info_status = $('#blog_info_div').val();
	if(blog_info_status=='show')
	{
		$('#blog_rights_plus').trigger('click');
	}
	
	// This Dialog box is used when an article is deleted.		
	$('#delete_article_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Article": function() { 
					$('#delete_article_id').val();
					$('#update_artiklar').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when an sbt article is deleted.		
	$('#delete_sbt_article_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Sbt Article": function() { 
			
					var id = $('#delete_sbt_article_id').val();
					
					$('#update_sbt_article_list_table #row_'+id).remove();
					$.get("/backend.php/sbt/deleteSbtArticleAndRelatedData?analysis_id="+id, function(data){
				 		//$("#blog_detail_div").html(data);
                        $("#confirm_message").show();
                        $("#confirm_message").html(data);
                    
					});
					
					//$('#update_sbt_artiklar').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the article list is updated.		
	$('#updateArticleList_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Update Article List": function() { 
					//$('#update_artiklar').submit();
					updateArticleList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the article list is updated.		
	$('#updatePurchaseList_confirm_box').dialog({
		autoOpen: false,
		width: 400,
		buttons: {
			"Update Purchase List": function() { 
					updatePurchaseList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when purchase record is updated.		
	$('#update_purchaserecord_box').dialog({
		autoOpen: false,
		width: 400,
		buttons: {
			"Update Purchase Status": function() { 
					var pur_id = $('#pur_id').val();
					updatePurchaseStatusToDone(pur_id);
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the sbt article list is updated.		
	$('#updateSbtArticleList_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Update Article List": function() { 
					//$('#update_artiklar').submit();
					updateSbtArticleList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the object list is updated.		
	$('#updateObjectList_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Update Object List": function() { 
					$('#update_objekt_list').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when an object is deleted.		
	$('#delete_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Object": function() { 
					$('#delete_obj_id').val()
					$('#update_objekt_list').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a category is deleted.		
	$('#delete_category_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Delete Category": function() { 
					$('#delete_cat_id').val()
					$('#delete_article_category').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when for editing a category.		
	$('#edit_category_box').dialog({
		autoOpen: false,
		width: 600,
		buttons: {
			"Save Change": function() { 
					$('#update_category_name').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a article type is deleted.		
	$('#delete_type_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Delete Type": function() { 
					$('#delete_type_id').val()
					$('#delete_article_type').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when for editing a article type.		
	$('#edit_type_box').dialog({
		autoOpen: false,
		width: 600,
		buttons: {
			"Save Change": function() { 
					$('#update_type_name').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the user list is updated.		
	$('#update_userlist_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Update User List": function() { 
					//$('#update_user_form').submit();
					updateUserListUsers();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the sbt inactive user list is updated.		
	$('#update_sbtinactiveuserlist_box').dialog({
		autoOpen: false,
		width: 400,
		buttons: {
			"Update SbtInactive User List": function() { 
					updateSbtInactiveUserList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a user is deleted.		
	$('#delete_user_confirm_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Delete User": function() { 
					deleteSelectedUser();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
			    $('#delete_user_id').val('');	
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when password for a specific user is reseted.
	$('#reset_user_password_confirm_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Reset Password": function() { 
					resetSelectedUsersPassword();
					$('#reset_pass_user_id').val('');
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
			    $('#reset_pass_user_id').val('');	
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a add a note by admin to a analysis while awarding a medal.
	$('#medal_note_for_analysis_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Award Medal": function() { 
					$('#award_medal_to_analysis').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a add a note by admin to a author while awarding a medal.
	$('#medal_note_for_author_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Award Medal": function() { 
					$('#award_medal_to_author').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the enquiry list is updated.		
	$('#updateEnquiryList_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Update Enquiry List": function() { 
					//$('#update_user_form').submit();
					updateEnquiryList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when an enquiry post is deleted.		
	$('#delete_enquirypost_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Post": function() { 
					var delete_post_id = $('#delete_post_id').val();
					var enq_id = $('#enq_id').val();
					$.ajax({
						  url:'/backend.php/borst/replyListOnEnquiry?delete_post_id='+delete_post_id+'&enq_id='+enq_id,
						  success:function(data)
						  {
							$("#enquiry_post_list").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
						  }
					});
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	
	// This Dialog box is used when an account email is deleted.
	$('#delete_acc_email_confirm_box').dialog({
		autoOpen: false,
		width: 400,
		buttons: {
			"Delete Account Email": function() { 
					var delete_acc_email_id = $('#delete_acc_email_id').val();
					$.ajax({
						  url:'/backend.php/borst/deleteEmail?mode=del_email_account&id='+delete_acc_email_id,
						  success:function(data)
						  {
							$('#delete_acc_email_id').val('');
							location.reload();
						  }
					});
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when an public email is deleted.
	$('#delete_pub_email_confirm_box').dialog({
		autoOpen: false,
		width: 400,
		buttons: {
			"Delete Public Email": function() { 
					var delete_pub_email_id = $('#delete_pub_email_id').val();
					$.ajax({
						  url:'/backend.php/borst/deleteEmail?mode=del_email_public&id='+delete_pub_email_id,
						  success:function(data)
						  {
							 $('#delete_pub_email_id').val('');
							 location.reload();
						  }
					});
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when an ad is deleted.		
	$('#delete_sbt_ad_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Ad": function() { 
					var delete_ad_id = $('#delete_ad_id').val();
					$.ajax({
						  url:'/backend.php/borst/getAdList?delete_ad_id='+delete_ad_id,
						  success:function(data)
						  {
							$("#sbt_adslist_outer").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
                            $("#add_delete_confirmation_msg").css('display','block');
						  }
					});					
					
					
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
        /* code by sandeep */
        $('#delete_sbt_ad_confirm_box_perm').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Ad": function() { 
					var delete_id = $('#delete_id').val();
					$.ajax({
						  url:'/backend.php/borst/deleteAd?delete_id='+delete_id,
						  success:function(data)
						  {
                                                        document.location.href='/backend.php/borst/archiveAdList';
							$("#sbt_adslist_outer").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
                                                        $("#delete_sbt_ad_msg_perm").css('display','block');
						  }
					});					
					
					
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
        $('#unarchive_sbt_ad_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Unarchive Ad": function() { 
					var delete_ad_id = $('#is_unarchive').val();
					$.ajax({
						  url:'/backend.php/borst/getAdList?is_unarchive='+delete_ad_id,
						  success:function(data)
						  {
							$("#sbt_adslist_outer").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
                            $("#add_delete_confirmation_msg").css('display','block');
						  }
					});					
					
					
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
        $('#delete_code_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Code": function() { 
					var delete_ad_id = $('#is_archives').val();
					$.ajax({
						  url:'/backend.php/borst/deleteCode?is_archive='+delete_ad_id,
						  success:function(data)
						  {
                                                        document.location.href='/backend.php/borst/couponList';
							$("#sbt_adslist_outer").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
                                                        $("#add_delete_confirmation_msg").css('display','block');
						  }
					});					
					
					
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
        
        $('#delete_send_code_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Delete Code": function() { 
					var delete_ad_id = $('#is_archive').val();
					$.ajax({
						  url:'/backend.php/borst/deleteSendCode?is_archive='+delete_ad_id,
						  success:function(data)
						  {
                                                        document.location.href='/backend.php/borst/'+$('#coupon_list_url').val();
							$("#sbt_adslist_outer").html(data);
							$('#action_msg').css('display','block');
							$('#action_msg').html('Post Deleted');
                                                        $("#add_delete_confirmation_msg").css('display','block');
						  }
					});					
					
					
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
	/* code by sandeep end */
	// This Dialog box is used when the article title is not filled in.		
	$('#article_title_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the admin is trying to remove last row in bt-shop price distribution section.		
	$('#price_distribution_last_row_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the sending subscription emails.		
	$('#sendsubscription_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
							  type:'POST',
							  data:$('#send_subscription_form').serialize(),
							  url:'/backend.php/email/sendSubscriptionMail',
							  success:function(data)
							  {
								$("#subscribtion_send_report").html(data);
							  }
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
// This Dialog box is used when the sending reminder subscription emails.		
	$('#sendremindersubscription_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
							  type:'POST',
							  data:$('#send_remider_subscription_form').serialize(),
							  url:'/backend.php/borst/reminderEndSubcription',
							  success:function(data)
							  {
								//$("#reminder_subscribtion_send_report").html(data);
                                                                document.location.href='/backend.php/borst/subscriptionList';
							  }
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});	
	// This Dialog box is used when the shop article is deleted.		
	$('#delete_shop_article_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() {
			
				var column_id = $('#btshop_articlelist_outer #column_id').val();
                var btshop_article_type = $('#selected_article_type').val();
				var delete_shop_article_id = $('#btshop_articlelist_outer #delete_shop_article_id').val();

				$.ajax({
						  url:'/backend.php/borst/getShopArticleList?column_id='+column_id+'&delete_shop_article_id='+delete_shop_article_id+'&selected_article_type='+btshop_article_type,
						  success:function(data)
						  {
							$('#btshop_articlelist_outer #delete_shop_article_id').val('');
							$("#btshop_articlelist_outer").html(data);
                            initBtShopArticleCombo();
						  }
				});
					
				$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when the shop article list is updated.		
	$('#update_shop_art_list_confirm_box').dialog({
		autoOpen: false,
		width: 350,
		buttons: {
			"Update Article List": function() { 
					updateShopArticleList();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});

        // This Dialog box is used when the article list is updated.
	$('#deletePurchaseOrder_confirm_box').dialog({
		autoOpen: false,
		width: 300,
                title:'Ta bort inköpsbekräftelse',
		buttons: {
			"Radera Köp": function() {
					//$('#update_artiklar').submit();
                                        var str = $('#delete_order_id_page').val();
										var arr = str.split(',');
										console.log(arr);
					deletePurchaseOrder(arr[0],arr[1]);
					$(this).dialog("close");
			},
			"Avbryt": function() {
				$(this).dialog("close");
			}
		}
	});
	/* Used for sorting user search result according to column */
	$('#update_user_form_column_row a').unbind('click');
	$('#update_user_form_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();

		//$('#update_user_form_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#update_user_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  type:'POST',
			  data:$('#search_user_form').serialize(),
			  url:'/backend.php/borst/getSearchUserList?column_id='+column_id,
			  success:function(data)
			  {
			  	$("#search_userlist_outer").html(data);
				var order = $('#search_user_column_order').val();
				setUpdateUserListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for update userlist page pagination. */
	$('#alluser_list_listing a').unbind('click');	
	$('#alluser_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var current_column_order = $('#search_user_column_order').val();	
		var page = $(this).attr("id");
		
		$('#update_user_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#alluser_list_listing').html();
		//$('#alluser_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
			  type:'POST',
			  data:$('#search_user_form').serialize(),
			  url:'/backend.php/borst/getSearchUserList?column_id='+column_id+"&page="+page+"&search_user_column_order="+current_column_order,
			  success:function(data)
			  {
			  	$("#search_userlist_outer").html(data);
				var order = $('#search_user_column_order').val();
				setUpdateUserListOrderImage('sortby_'+column_id,order);
			  }
		});

	});
	
	/* Used for sorting article search result according to column */
	$('#update_article_form_column_row a').unbind('click');
	$('#update_article_form_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();

		//$('#update_article_form_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  type:'POST',
			  data:$('#search_article_form').serialize(),
			  url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+'&only_sort=1',
			  success:function(data)
			  {
			  	$("#search_articlelist_outer").html(data);
				var order = $('#search_article_column_order').val();
				setUpdateArticleListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for update articlelist page pagination. */
	$('#allarticle_list_listing a').unbind('click');	
	$('#allarticle_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var current_column_order = $('#search_article_column_order').val();	
		var page = $(this).attr("id");
		
		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#allarticle_list_listing').html();
		//$('#allarticle_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
			  type:'POST',
			  data:$('#search_article_form').serialize(),
			  url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+"&page="+page+"&search_article_column_order="+current_column_order,
			  success:function(data)
			  {
			  	$("#search_articlelist_outer").html(data);
				var order = $('#search_article_column_order').val();
				setUpdateArticleListOrderImage('sortby_'+column_id,order);
			  }
		});

	});
	
	$('#send_remind_btn').click(function(){
		sendReminder();
	});
	
	/* Used for sorting sisterBt articles according to column */
	$('#update_analysis_form_column_row a').unbind('click');
	$('#update_analysis_form_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
		var tab_id = $('#tab_id').val();

		//$('#update_analysis_form_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#update_analysis_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});

		$.ajax({
			  url:'/backend.php/sbt/getSbtArticleRequest?column_id='+column_id+'&tab_id='+tab_id,
			  success:function(data)
			  { 
			  	$("#sbt_article_list_div").html(data);
				var order = $('#sbt_analysis_column_order').val();
				setSbtArticleListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for update userlist page pagination. */
	$('#update_analysis_list_listing a').unbind('click');	
	$('#update_analysis_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var current_column_order = $('#sbt_analysis_column_order').val();	
		var page = $(this).attr("id");
		
		$('#update_analysis_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/sbt/getSbtArticleRequest?column_id='+column_id+"&page="+page+"&sbt_analysis_column_order="+current_column_order,
			  success:function(data)
			  {
			  	$("#sbt_article_list_div").html(data);
				var order = $('#sbt_analysis_column_order').val();
				setSbtArticleListOrderImage('sortby_'+column_id,order);
			  }
		});

	});
	
	/* Used for tab change on sisterBt articles request */
	$('#article_request_menu_section a').unbind('click');
	$('#article_request_menu_section a').live("click",function(){   
		var tab_id = $(this).attr("id");

		var tab_arr = new Array('tab_0','tab_1','tab_2','tab_3','tab_4','tab_5'); 
		for(var i=0;i<tab_arr.length;i++)
		{
			var classname = $('#'+tab_arr[i]).attr('class');
			if(tab_id == tab_arr[i])
				$('#'+tab_arr[i]).removeClass(classname).addClass('selectedtab');
			else
				$('#'+tab_arr[i]).removeClass(classname).addClass('');
		}
		
		//$('#sbt_article_list_div').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
	
		$.ajax({
			  url:'/backend.php/sbt/getSbtArticleRequest?tab_id='+tab_id+'&tab_click=1',
			  success:function(data)
			  {
			  	$("#sbt_article_list_div").html(data);
				//var order = $('#sbt_analysis_column_order').val();
				//setSbtArticleListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for tab change on sisterBt assign medals to articles  */
	$('#medals_menu_section a').unbind('click');
	$('#medals_menu_section a').live("click",function(){   
		var tab_id = $(this).attr("id");

		var tab_arr = new Array('medal_user','medal_article'); 
		for(var i=0;i<tab_arr.length;i++)
		{
			var classname = $('#'+tab_arr[i]).attr('class');
			if(tab_id == tab_arr[i])
				$('#'+tab_arr[i]).removeClass(classname).addClass('selectedtab');
			else
				$('#'+tab_arr[i]).removeClass(classname).addClass('');
		}
		
		//$('#sbt_medal_content_div').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
	
		if(tab_id == 'medal_user')
		{
			$.ajax({
				  url:'/backend.php/sbt/getMedalUser',
				  success:function(data)
				  {
					$("#sbt_medal_content_div").html(data);
				  }
			});
		}
		
		if(tab_id == 'medal_article')
		{
			$.ajax({
				  url:'/backend.php/sbt/getMedalArticle',
				  success:function(data)
				  {
					$("#sbt_medal_content_div").html(data);
				  }
			});
		}
		
	});
	
	/* Used for sorting analysis list on medal page according to column */
	$('#medal_analysis_list_column_row a').unbind('click');
	$('#medal_analysis_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
		var current_column_order = $('#medal_analysis_column_order').val();	

		//$('#medal_analysis_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#medal_analysis_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/sbt/getMedalArticle?column_id='+column_id+'&medal_analysis_column_order='+current_column_order,
			  success:function(data)
			  {
			  	$("#sbt_medal_content_div").html(data);
				var order = $('#medal_analysis_column_order').val();
				setMedalAnalysisListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for profile only user blog post tab listing page pagination. */
	$('#medal_analysis_list_listing a').unbind('click');
	$('#medal_analysis_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var page = $(this).attr("id");
		var current_column_order = $('#medal_analysis_column_order').val();	
		
		$('#medal_analysis_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#medal_analysis_list_listing').html();
		//$('#medal_analysis_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
		$.post("/backend.php/sbt/getMedalArticle?column_id="+column_id+"&page="+page+'&medal_analysis_column_order='+current_column_order, function(data){
			$('#sbt_medal_content_div').html(data);
	
			setMedalAnalysisListOrderImage('sortby_'+column_id,current_column_order);
		});
	});
		
	/* Used for sorting user list on medal page according to column */
	$('#medal_user_list_column_row a').unbind('click');
	$('#medal_user_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
		var current_column_order = $('#medal_user_column_order').val();	

		//$('#medal_user_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#medal_user_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/sbt/getMedalUser?column_id='+column_id+'&medal_user_column_order='+current_column_order,
			  success:function(data)
			  {
			  	$("#sbt_medal_content_div").html(data);
				var order = $('#medal_user_column_order').val();
				setMedalUserListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for profile only user blog post tab listing page pagination. */
	$('#medal_user_list_listing a').unbind('click');
	$('#medal_user_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var page = $(this).attr("id");
		var current_column_order = $('#medal_user_column_order').val();	
		
		$('#medal_user_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#medal_user_list_listing').html();
		//$('#medal_user_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
		$.post("/backend.php/sbt/getMedalUser?column_id="+column_id+"&page="+page+'&medal_user_column_order='+current_column_order, function(data){
			$('#sbt_medal_content_div').html(data);
	
			setMedalUserListOrderImage('sortby_'+column_id,current_column_order);
		});
	});

	
	/* Used for sorting publisher request userlist page according to column */
	$('#sbt_publisher_request_list_column_row a').unbind('click');
	$('#sbt_publisher_request_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
		var current_column_order = $('#publisher_request_userlist_column_order').val();	

		//$('#sbt_publisher_request_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#sbt_publisher_request_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/sbt/sbtPublisherRequestUserList?column_id='+column_id+'&publisher_request_userlist_column_order='+current_column_order,
			  success:function(data)
			  {
			  	$("#sbt_publisher_request_content_div").html(data);
				var order = $('#publisher_request_userlist_column_order').val();
				setPublisherRequestUserListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for publisher request tab listing page pagination. */
	$('#sbt_publisher_request_list_listing a').unbind('click');
	$('#sbt_publisher_request_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var page = $(this).attr("id");
		var current_column_order = $('#publisher_request_userlist_column_order').val();	

		$('#sbt_publisher_request_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#sbt_publisher_request_list_listing').html();
		//$('#sbt_publisher_request_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
		$.post("/backend.php/sbt/sbtPublisherRequestUserList?column_id="+column_id+"&page="+page+'&publisher_request_userlist_column_order='+current_column_order, function(data){
			$('#sbt_publisher_request_content_div').html(data);
	
			setPublisherRequestUserListOrderImage('sortby_'+column_id,current_column_order);
		});
	});
	
	/* Used for sorting publisher pending request page according to column */
	$('#publisher_pending_request_list_column_row a').unbind('click');
	$('#publisher_pending_request_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
		var current_column_order = $('#publisher_pending_request_list_column_order').val();	

		//$('#publisher_pending_request_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#publisher_pending_request_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/sbt/getSbtPublisherRequestList?column_id='+column_id+'&publisher_pending_request_list_column_order='+current_column_order,
			  success:function(data)
			  {
			  	$("#sbt_publisher_request_content_div").html(data);
				var order = $('#publisher_pending_request_list_column_order').val();
				setPublisherPendingRequestListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for sorting publisher pending request page pagination. */
	$('#publisher_pending_request_list_listing a').unbind('click');
	$('#publisher_pending_request_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var page = $(this).attr("id");
		var current_column_order = $('#publisher_pending_request_list_column_order').val();	

		$('#publisher_pending_request_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#publisher_pending_request_list_listing').html();
		//$('#publisher_pending_request_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
		$.post("/backend.php/sbt/getSbtPublisherRequestList?column_id="+column_id+"&page="+page+'&publisher_pending_request_list_column_order='+current_column_order, function(data){
			$('#sbt_publisher_request_content_div').html(data);
	
			setPublisherPendingRequestListOrderImage('sortby_'+column_id,current_column_order);
		});
	});
	
	
	/* Used when publisher userlist page is updated. */
	$('#assign_to_publisher_button').unbind('click');
	$('#assign_to_publisher_button').live("click",function(){   

	var save_changes_button = $('#request_send_button').html();
    $('#successMsg').removeClass('hide_div');
	//$('#successMsg').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
	$('#sbt_publisher_request_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
		
	$.ajax({
				type:'POST',
				data:$('#assign_to_publisher_form').serialize(),
				url:'/backend.php/sbt/sbtPublisherRequestUserList',
				success:function(data)
				{
					$.ajax({
							type:'POST',
							data:$('#assign_to_publisher_form').serialize(),
							url:'/backend.php/email/sendApprovePublisherMail',
							success:function(data1)
							{
								//$("#sbt_publisher_request_content_div").html(data);
								$('#request_send_button').html(save_changes_button);
								$('#successMsg').html('Changes Saved');
								$('#sbt_publisher_request_list_table').find("tr").each(function(index){
									$(this).removeClass('withOpacity');
								});
							}
					});
					
				}
		  });
	});
	
	/* Used when publisher pending request page is updated. */
	$('#change_to_publisher_button').unbind('click');
	$('#change_to_publisher_button').live("click",function(){   

	$('#successMsg').removeClass('hide_div');
	//$('#successMsg').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
	
	var save_changes_button = $('#change_to_publisher_outer_div').html();
	$('#change_to_publisher_outer_div').html('<span class="float_right">'+save_changes_button+'</span> ');
	
	$('#publisher_pending_request_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
		
	$.ajax({
				type:'POST',
				data:$('#change_to_publisher_form').serialize(),
				url:'/backend.php/sbt/getSbtPublisherRequestList',
				success:function(data)
				{
					$.ajax({
							type:'POST',
							data:$('#change_to_publisher_form').serialize(),
							url:'/backend.php/email/sendApprovePublisherMail',
							success:function(data1)
							{ 
								$("#sbt_publisher_request_content_div").html(data);
								$('#successMsg').html('Changes Saved');
								$('#change_to_publisher_outer_div').html(save_changes_button);
								
								/*$('#publisher_pending_request_list_table').find("tr").each(function(index){
									$(this).removeClass('withOpacity');
								});*/
							}
					});
					
				}
		  });
	});
	
	/* Used for tab change on sisterBt publisher request */
	$('#publisher_request_menu_section a').unbind('click');
	$('#publisher_request_menu_section a').live("click",function(){   
		
		var tab_id = $(this).attr("id");
		var tab_action_arr = new Array();
		tab_action_arr['publisher_all_user'] = 'sbtPublisherRequestUserList';
		tab_action_arr['publisher_request'] = 'sbtPublisherRequestList';
	
		var tab_arr = new Array('publisher_all_user','publisher_request'); 
		
		for(var i=0;i<tab_arr.length;i++)
		{
			var classname = $('#'+tab_arr[i]).attr('class');
			if(tab_id == tab_arr[i])
				$('#'+tab_arr[i]).removeClass(classname).addClass('selectedtab');
			else
				$('#'+tab_arr[i]).removeClass(classname).addClass('');
		}
		
		//$('#sbt_publisher_request_content_div').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
		$.ajax({ 
				  url:'/backend.php/sbt/'+tab_action_arr[tab_id],
				  success:function(data)
				  {
					 $('#successMsg').addClass('hide_div');  
					$("#sbt_publisher_request_content_div").html(data);
				  }
		});
		
	});
	
	
	/* Used for sorting borst enquiries according to column */
	$('#update_borst_enquiry_column_row a').unbind('click');
	$('#update_borst_enquiry_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();

		//$('#update_borst_enquiry_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#borst_enquiry_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});

		$.ajax({
			  type:'POST',
			  data:$('#search_borst_enquiry_form').serialize(),
			  url:'/backend.php/borst/getContactEnquiry?column_id='+column_id,
			  success:function(data)
			  { 
			  	$("#borst_enquirylist_outer").html(data);
				var order = $('#borst_enquiry_form_column_order').val();
				setBorstEnquiryListOrderImage(column_id,order);
			  }
		});
		
	});
	
	
	/* Used for pagination of sorted / unsorted borst enquiries according to column */
	$('#borst_enquiry_list_listing a').unbind('click');
	$('#borst_enquiry_list_listing a').live("click",function(){   
	
	    var column_id = $('#column_id').val();	
		var current_column_order = $('#borst_enquiry_form_column_order').val();	
		var page = $(this).attr("id");
	
		$('#borst_enquiry_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#borst_enquiry_list_listing').html();
		//$('#borst_enquiry_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

		$.ajax({
			  type:'POST',
			  data:$('#search_borst_enquiry_form').serialize(),
			  url:'/backend.php/borst/getContactEnquiry?column_id='+column_id+"&page="+page+"&borst_enquiry_form_column_order="+current_column_order,
			  success:function(data)
			  { 
			  	$("#borst_enquirylist_outer").html(data);
				var order = $('#borst_enquiry_form_column_order').val();
				setBorstEnquiryListOrderImage('sortby_'+column_id,order);
			  }
		});
		
	});
	
	pathArray = window.location.pathname.split( '/' );
	for (var i = 0; i < pathArray.length; i++ ) 
	{
		/*if('sf_guard_user' == pathArray[i] || 'sf_guard_group' == pathArray[i] || 'sf_guard_permission' == pathArray[i])
		{
			$('#sf_admin_container').find("a").each(function(index){
				var ref = $(this).attr("href");
				$(this).attr("href",'https://'+window.location.hostname+'/backend.php'+ref);	
			});
			
			$('#sf_admin_container').find("form").each(function(index){
				var action = $(this).attr("action");
				$(this).attr("action",'https://'+window.location.hostname+'/backend.php'+action);	
			});

			
			break;
		}*/
		
		if('createShopArticle' == pathArray[i])
		{
			if('edit_shop_article_id' == pathArray[i+1])
				shopArticleList(pathArray[i+2]);
				
			adjustPriceDisForMacSaf();
			break;
		}		
	}
	
	
	/* Used for searching a perticular enquiry. */
	$('#search_for_enquiry_btn').unbind('click');	
	$('#search_for_enquiry_btn').live("click",function(){   
		var enq_subject = $('#enq_subject').val();	
		var enq_type = $('#enq_type').val();	

		if(!enq_subject && !enq_type) $('#search_error').html('Please select at least one field');
		else 
		{ 
			$('#search_error').html('');
			//$('#borst_enquirylist_outer').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
		
			$.ajax({
				  type:'POST',
				  data:$('#search_borst_enquiry_form').serialize(),
				  url:'/backend.php/borst/getContactEnquiry',
				  success:function(data)
				  {
					$("#borst_enquirylist_outer").html(data);
				  }
			});
		}

	});
	
	/* Used for updating enquiry list. */
	$('#update_enquiry_button').unbind('click');	
	$('#update_enquiry_button').live("click",function(){   
		open_confirmation('Are you sure you want to update the Enquiry List?', '', 'updateEnquiryList_confirm_box', 'update_enquiry_msg');
	});
	
	/* Used for posting reply to any request. */
	$('#post_enquiry_reply').unbind('click');	
	$('#post_enquiry_reply').live("click",function(){   
		var enq_id = $('#enq_id').val();
		var enquiry_reply_text = trim(tinyMCE.activeEditor.getContent());
		var postid = $('#postid').val();
		if(enquiry_reply_text == '' || enquiry_reply_text.length == 0) 
		{ 
			$('#post_enquiry_reply_error').html('Required'); 
			$('#contact_enquiry_post_reply_text').focus();
		}
		else
		{
			$('#post_enquiry_reply_error').html(' '); 
			tinyMCE.triggerSave();
			$.ajax({
				  type:'POST',
				  data:$('#reply_on_enquiry').serialize(),
				  url:'/backend.php/borst/replyListOnEnquiry?enq_id='+enq_id,
				  success:function(data)
				  {
					$("#enquiry_post_list").html(data);
					tinyMCE.activeEditor.setContent('');
					$('#action_msg').css('display','block');
					if(postid) $('#action_msg').html('Change saved');
					else 
					{
						$('#action_msg').html('Post saved');
						
						$.ajax({
							  url:'/backend.php/email/enquiryReplyMail',
							  success:function(data1)
							  {
							  }
						});
					}
					
					$('#postid').val('');
				  }
			});	
		}
	
	});
	
	// This Dialog box is used when a newsletter is sent.		
	$('#send_newsletter_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Send Newsletter": function() { 
					$('#send_mail').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// This Dialog box is used when a article update is sent.		
	$('#send_article_update_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					$('#send_article_update_form').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	$('#updateCoupondetail_list_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
						type:'POST',
						data:$('#update_subscription_form').serialize(),
						url:'/backend.php/borst/'+$('#coupon_list_url').val(),
						success:function(data)
						{
							//$("#subscription_outer").html(data);
                                                        document.location.href='/backend.php/borst/'+$('#coupon_list_url').val();
							$('#subscription_update_msg').html('Coupon List Updated');
						}
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
        $('#updateCouponCodeData_list_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
						type:'POST',
						data:$('#update_subscription_form').serialize(),
						url:'/backend.php/borst/couponList',
						success:function(data)
						{
							//$("#subscription_outer").html(data);
                                                        document.location.href='/backend.php/borst/couponList';
							$('#subscription_update_msg').html('Coupon List Updated');
						}
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
        
	// This Dialog box is used when a subscrition list update is sent.		
	$('#updatesubscriptionlist_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
						type:'POST',
						data:$('#update_subscription_form').serialize(),
						url:'/backend.php/borst/subscriptionList',
						success:function(data)
						{
							//$("#subscription_outer").html(data);
							$('#subscription_update_msg').html('List Updated');
						}
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
        //code by sandeep
        $('#sendemail_updatesubscriptionlist_confirm_box').dialog({
		autoOpen: false,
		width: 300,
		buttons: {
			"Ok": function() { 
					
					$.ajax({
						type:'POST',
						data:$('#update_subscription_form').serialize(),
						url:'/backend.php/borst/subscriptionList?code=sendcoupon',
						success:function(data)
						{
							//$("#subscription_outer").html(data);
							$('#subscription_update_msg').html('List Updated');
						}
					});
					
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});//Code added by sandeep end
        
        
	/* Used when admin want to edit any comment on enquiry.*/
	$('#enquiry_post_list .noclass_edit').unbind('click');	
	$('#enquiry_post_list .noclass_edit').live("click",function(){   
		var editpost_id = $(this).attr("id");
		$.get("/backend.php/borst/getEnquiryCommentData?editpost_id="+editpost_id, function(data){
			tinyMCE.activeEditor.setContent(data);
			$('#postid').val(editpost_id);
		});
	});
	
	/* Used for update articlelist page pagination. */
	$('#enquiry_post_list_listing a').unbind('click');	
	$('#enquiry_post_list_listing a').live("click",function(){   
		var page = $(this).attr("id");
		var enq_id = $('#enq_id').val();
		
		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#enquiry_post_list_listing').html();
		//$('#enquiry_post_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
			  url:'/backend.php/borst/replyListOnEnquiry?page='+page+'&enq_id='+enq_id,
			  success:function(data)
			  {
			  	$("#enquiry_post_list").html(data);
			  }
		});
	});
	
	
	/* Used for sorting enquiry according to status.*/
	$('#enq_sort_by a').unbind('click');	
	$('#enq_sort_by a').live("click",function(){   
		var ans_status = $(this).attr("id");
		$('#search_borst_enquiry_form_table #ans_type').val(ans_status);

		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  type:'POST',
			  data:$('#search_borst_enquiry_form').serialize(),
			  url:'/backend.php/borst/getContactEnquiry',
			  success:function(data)
			  {
			  	$("#borst_enquirylist_outer").html(data);
			  }
		});
	});
	
	/* Used for adding price for btshop product.*/
	$('img.temp_class').unbind('click');	
	$('img.temp_class').live("click",function(){ 
		
		$.ajax({
			  url:'/backend.php/borst/priceDistribution',
			  success:function(data)
			  { 
				$('#price_parent').append('<div class="float_left" style=" margin-top:10px;">'+data+'</div>');
			  }
		});
	});
	
	/* Deleting the product price distribution div. */
	$('span.tem img').unbind('click');	
	$('span.tem img').live("click",function(){ 
		if($('span.tem img').length == 1) {open_confirmation('Cannot Delete','','price_distribution_last_row_box','price_distribution_last_row_msg');return false;}
		$(this).parent().parent().remove();
		$('#price_parent').children("div").eq(0).css('margin-top','0px');	
	});
	
	/* when create btshop article form is submitted.*/
	$('#submit_create_shop_article_form').unbind('click');	
	$('#submit_create_shop_article_form').live("click",function(){ 
		var shop_title = $('#bt_shop_article_btshop_article_title').val();	
		var shop_description = tinyMCE.activeEditor.getContent();
		var title_flag = desc_flag = product_img_flag = shop_qty_num_flag = shop_product_price_num_flag = shop_product_detail_flag = product_weight_flag = 0;
		var shop_qty = new Array(); 
		var shop_product_price = new Array(); 
		var shop_product_text = new Array(); 
		var art_type = $('#bt_shop_article_btshop_type_id').val();
		var is_sellable = $('#bt_shop_article_is_sellable').attr('checked');
               
		// Check weither title is blank or not.
		if(shop_title == " " || shop_title.length == 0) 
		{ 
			$('#btshop_article_title_error').html('Required'); 
			$('#btshop_article_title_error').focus(); 
			title_flag = 1;
		}
		else  {$('#btshop_article_title_error').html('');}
		
		// Check weither the product image is uploaded or not.
		$.ajax({
			  url:'/backend.php/borst/isShopImageSet',
                          async:false,
			  success:function(data)
			  {
			  	if(data == 'Image not uploaded') product_img_flag = 1;
				$("#upload_msg").html(data);
			  }
		});
		
		// Check weither description is empty or not.
		if(shop_description == " " || shop_description.length == 0) 
		{ 
			$('#btshop_product_description_error').html('Required'); 
			$('#btshop_product_description_error').focus(); 
			desc_flag = 1;
		}
		else  {$('#btshop_product_description_error').html('');}
		
		// Check weither all price destribution fields are filled properly.
		$("input[name='shop_qty[]']").each(function(index){
			shop_qty[index] = $(this).val();
			if(isNaN($(this).val())) shop_qty_num_flag = 1;
		});
		
		$("input[name='shop_product_price[]']").each(function(index){
			shop_product_price[index] = $(this).val();
			if(isNaN($(this).val())) shop_product_price_num_flag = 1;
		});
		
		$("input[name='shop_product_text[]']").each(function(index){
			shop_product_text[index] = $(this).val();
		});
		if(is_sellable == true)
                {
                    //$.ajax({
			//  url:'/backend.php/borst/isSellable',
			 // success:function(data)
			  //{
			  	//if(data == 'Image not uploaded') product_img_flag = 1;
				//$("#upload_msg").html(data);
			  //}
		//});



                        if(shop_qty_num_flag == 0 && shop_product_price_num_flag == 0)
                        {
                                for(var i=0;i<shop_qty.length;i++)
                                {
                                        if(shop_qty[i]=='' || shop_product_price[i]=='' || shop_product_text[i]=='')
                                        {
                                                shop_product_detail_flag = 1;
                                                $('#price_detail_error').html('Required');
                                        }
                                }

                                if(shop_product_detail_flag == 0) $('#price_detail_error').html('');
                        }
                        else
                        {
                                shop_product_detail_flag = 1;
                                $('#price_detail_error').html('Invalid Input');
                        }

                        if(art_type == 1 || art_type == 3)
                        {
                                var product_weight = trim($('#bt_shop_article_product_weight').val());

                                if(isNaN(product_weight) || product_weight == '' || product_weight.length == 0)
                                {
                                                product_weight_flag = 1;
                                                $('#product_weight_error').html('Invalid Input');
                                }
                                else
                                {
                                        $('#product_weight_error').html('');
                                }

                                if(desc_flag == 0 && title_flag == 0 && product_img_flag == 0 && shop_product_detail_flag == 0 && product_weight_flag ==0)
                                {
                                        $('#create_shop_article_form').submit();
                                }
                        }
                        else
                        {
                                $('#product_weight_error').html('');

                                if(desc_flag == 0 && title_flag == 0 && product_img_flag == 0 && shop_product_detail_flag == 0)
                                {
                                        $('#create_shop_article_form').submit();
                                }
                        }
             }else{
                 $('#create_shop_article_form').submit();
             }
             //end of is_sellable if
		
		
	});
	
	/*!
	 *
	 * Used when admin wants a to upload a image for btshop product.
	 *
	 */
	$('#productImage').unbind('click');	 
    $('#productImage').live("click",function(){											  
		$('#upload_product_image').val('');	
		$('#product_image_upload_error').html('');	
		showProductImageUploadBox();
	});
	
	
	/* Used for sorting borst shopping article by column */
	$('#borst_shop_article_list_column_row a').unbind('click');
	$('#borst_shop_article_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();
        var btshop_article_type = $('#selected_article_type').val();

		//$('#borst_shop_article_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#borst_shop_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});

		$.ajax({
			  url:'/backend.php/borst/getShopArticleList?column_id='+column_id+'&selected_article_type='+btshop_article_type,
			  success:function(data)
			  { 
			  	$("#btshop_articlelist_outer").html(data);
				var order = $('#shop_article_column_order').val();
				setBorstShopArticleListOrderImage(column_id,order);
                initBtShopArticleCombo();
			  }
		});
		
	});
	
	
	/* Used for pagination of sorted / unsorted borst shop article according to column */
	$('#borst_shop_article_list_listing a').unbind('click');
	$('#borst_shop_article_list_listing a').live("click",function(){   
	
	    var column_id = $('#column_id').val();	
		var current_column_order = $('#shop_article_column_order').val();	
		var page = $(this).attr("id");
        var btshop_article_type = $('#selected_article_type').val();
	
		$('#borst_shop_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#borst_shop_article_list_listing').html();
		//$('#borst_shop_article_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

		$.ajax({
			  url:'/backend.php/borst/getShopArticleList?column_id='+column_id+"&page="+page+"&shop_article_column_order="+current_column_order+'&selected_article_type='+btshop_article_type,
			  success:function(data)
			  { 
			  	$("#btshop_articlelist_outer").html(data);
				var order = $('#shop_article_column_order').val();
				setBorstShopArticleListOrderImage('sortby_'+column_id,order);
                initBtShopArticleCombo();
			  }
		});
		
	});
	
	
	/* Used for sorting sisterBt ads according to column */
	$('#sbt_ads_list_column_row a').unbind('click');
	$('#sbt_ads_list_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();

		//$('#sbt_ads_list_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#sbt_ads_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});

		$.ajax({
			  url:'/backend.php/borst/getAdList?column_id='+column_id,
			  data:$('#search_adlist_form').serialize(),
			  success:function(data)
			  { 
			  	$("#sbt_adslist_outer").html(data);
				var order = $('#adlist_column_order').val();
				setAdListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for update userlist page pagination. */
	$('#sbt_ads_list_listing a').unbind('click');	
	$('#sbt_ads_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var current_column_order = $('#adlist_column_order').val();	
		var page = $(this).attr("id");
		
		$('#sbt_ads_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  url:'/backend.php/borst/getAdList?column_id='+column_id+"&page="+page+"&adlist_column_order="+current_column_order,
			  data:$('#search_adlist_form').serialize(),
			  success:function(data)
			  {
			  	$("#sbt_adslist_outer").html(data);
				var order = $('#adlist_column_order').val();
				setAdListOrderImage('sortby_'+column_id,order);
			  }
		});

	});
	
	/* Used while sending BT-SHOP subscription . */
	$('#shop_art_type').unbind('change');
	$('#shop_art_type').live("change",function(){
		var type_id = $(this).val();	
		if(type_id > 0)
		{
			$('#subscription_type_error').html('');
			$.ajax({
				url:'/backend.php/borst/getSubscriptionList?type_id='+type_id,
				success:function(data)
				{ 
					$("#subscription_list").html(data);
				}
			});
		}
		else
		{
			$('#subscription_type_error').html('Type Not Selected');
		}
	});
	
	/* Used while sending BT-SHOP subscription . */
	$('#send_subscription_button').unbind('click');	
	$('#send_subscription_button').live("click",function(){   
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;														 
		var type_id = $('#shop_art_type').val();	
		var mail_to_str = trim($("#komma_seperated_users").val());
		var email_flag = type_flag = 0; 
		
		if(mail_to_str)
		{
			var mail_to_arr = mail_to_str.split(',');
		
			if(mail_to_arr.length >= 1)
			{
				for(var i=0; i<mail_to_arr.length; i++)
				{
					var email = mail_to_arr[i];
					if(reg.test(email) == false) 
					{ 
						$('#komma_seperated_email_error').html('Please enter valid email addresses'); 
						email_flag = 1; 
						break;
					}
				}
				
				if(email_flag == 0) $('#komma_seperated_email_error').html('');
			}
		}
		else
		{
			$('#komma_seperated_email_error').html(''); 
		}
		
		
		if(type_id == 0)
		{
			$('#subscription_type_error').html('Type Not Selected');
			type_flag = 1;
		}
		else
		{
			$('#subscription_type_error').html('');
		}
		
		if(email_flag == 0 && type_flag == 0)
		{
			open_confirmation('Are you sure about sending subscription?', '', 'sendsubscription_confirm_box', 'sendsubscription_msg');
		}
		
	});
	
	/* Used while sending filtering subscription . */
	/*$('#filter_shop_art_type').unbind('change');
	$('#filter_shop_art_type').live("change",function(){
		var type_id = $(this).val();	

		if(type_id > 0)
		{
			$('#filter_subscription_type_error').html('');
			
			$.ajax({
				url:'/backend.php/borst/getFilterSubscriptionList?type_id='+type_id,
				success:function(data)
				{ 
					$("#filtered_subscription_list").html(data);
				}
			});
		}
		else
		{
			$("#filtered_subscription_list").html('');
			$('#filter_subscription_type_error').html('Type Not Selected');
		}
	});*/
	
/*---------All functionality of Subscription search,sort,update,listing,pagination,filtering and there validation---------------------------*/    
    
	/*
     * 
     * Validation Used while sending filtering subscription.
     * 
     */
     
    	$('#filter_subscription_button').unbind('click');
    	$('#filter_subscription_button').live("click",function(){
    		var type_id = $('#filter_shop_art_type').val();	
    		var flag = 0;
    		var start_date = trim($('#sub_start_date_text').val());
    		var stop_date = trim($('#sub_end_date_text').val());
    
    		if( (start_date.length > 0) && (stop_date.length <= 0) ) {flag = 1;$('#filter_subscription_type_error').html('Please select the stop date');}
    		if( (stop_date.length > 0) && (start_date.length <= 0) ) {flag = 1;$('#filter_subscription_type_error').html('Please select the start date');}
    		
    		if(flag == 0)
    		{
    			if(type_id > 0)
    			{
    				$('#filter_subscription_type_error').html('');
    				
    				$.ajax({
    					  type:'POST',
    					  data:$('#filter_subscriber_list_form').serialize(),
    					  url:'/backend.php/borst/emailOfValidSubscriber',
    					  success:function(data)
    					  {
    						$("#all_filtered_subscribers").html(data);
    					  }
    				});
    			}
    			else
    			{
    				$("#filtered_subscription_list").html('');
    				$('#filter_subscription_type_error').html('Type Not Selected');
    			}
    		}
    	});
        
	    onchangeArticletype();
            //onchangeCoupontype();
      
	/* 
     *
     * Used for sorting subscriber list according to column.
     * 
     */
     
    	$('#subscriber_list_column_row a').unbind('click');
    	$('#subscriber_list_column_row a').live("click",function(){  
    	  
    		var column_id = $(this).attr("id");
            if($('#selected_subscription_type').val()!='')
            {
                var selected_subscription_type = $('#selected_subscription_type').val();
            }
            else
            {
                var selected_subscription_type = 'All';
            }
            
            var selected_coupon_code = $("#coupon_code").val();
            
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
    		});
    	    var order = $('#subscription_list_column_order').val();
             order = order!=""?order:"DESC";
              
            var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		$.ajax({
    			  
                  url:'/backend.php/borst/getSubscriptionListData?column_id='+column_id+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
                  +'&action_type=sort&ordertype='+order+'&coupon_code='+selected_coupon_code,
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				setSubscriptionListOrderImage(column_id,order);
                    onchangeArticletype();
    			  }
    		});
    	});
        
        
        $('#coupon_list_column_row a').unbind('click');
    	$('#coupon_list_column_row a').live("click",function(){  
    	  
    		var column_id = $(this).attr("id");
            if($('#selected_subscription_type').val()!='')
            {
                var selected_subscription_type = $('#selected_subscription_type').val();
            }
            else
            {
                var selected_subscription_type = 'All';
            }
            
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
    		});
    	    var order = $('#subscription_list_column_order').val();
             order = order!=""?order:"DESC";
              
            var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		$.ajax({
    			  
                  url:'/backend.php/borst/getCouponListData?column_id='+column_id+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
                  +'&action_type=sort&ordertype='+order,
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				setSubscriptionListOrderImage(column_id,order);
                    //onchangeCoupontype();
    			  }
    		});
    	});
    
     /* 
     *
     * Used for searching subscriber list according to column using pressing enter key.
     * 
     */
     
     $('#ono,#fname,#lname,#search_subcription').keypress(function(e){
        
         var code = (e.keyCode ? e.keyCode : e.which);
         if(code == 13) 
         { 
            
            var column_id = $(this).attr("id");
    		var column_name  = $('#'+column_id).html();
            //var current_column_order = $('#subscription_list_column_order').val();
            
             var order = $('#subscription_list_column_order').val();
             //order = order!=""?order:"DESC";	
             order = order=='ASC'?'DESC':'ASC';
                          
    		var page = $('#current_page').val();
            if($('#selected_subscription_type').val()!='')
            {
                var selected_subscription_type = $('#selected_subscription_type').val();
            }
            else
            {
                var selected_subscription_type = 'All';
            }
            var selected_coupon_code = $("#coupon_code").val();
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
                
    		});
            
    	
            var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		$.ajax({
    		      type: 'POST',
                  data: 'column_id='+column_id+"&page="+page+"&ordertype="+order+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
                  +'&action_type=search'+'&coupon_code='+selected_coupon_code, 
                  url: '/backend.php/borst/getSubscriptionListData',
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				//var order = $('#subscription_list_column_order').val();
                    //alert(co)
    				setSubscriptionListOrderImage(column_id,order);
                    onchangeArticletype();
    			  }
    		});
                
         }
     });
      /* 
     *
     * Used for searching transaction list according to column using pressing enter key. on shoptransaction
     * 
     */
     $('#ono,#fname,#lname,#search_subcription').keypress(function(e){
        
         var code = (e.keyCode ? e.keyCode : e.which);
         if(code == 13) 
         { 
             page =1;
             $('#update_purchaseorder_list_table').find("tr.classnot").each(function(index){
        			$(this).addClass('withOpacity');
        	});
        	
        	$.ajax({
        			  type:'POST',
        			  data:$('#search_purchaseorder_form').serialize(),
        			  url:'/backend.php/borst/searchPurchaseOrder?page='+page,
        			  success:function(data)
        			  {
        			  	$("#showpurchaselist_outer").html(data);
        			  }
        	  });
       }
     });
     /* 
     *
     * Used for searching subscriber list according to column.
     * 
     */

    	$('#search_subcription').unbind('click');
    	$('#search_subcription').live("click",function(){
    		var column_id = $(this).attr("id");
    		var column_name  = $('#'+column_id).html();
            //var current_column_order = $('#subscription_list_column_order').val();
            
             var order = $('#subscription_list_column_order').val();
             //order = order!=""?order:"DESC";	
             order = order=='ASC'?'DESC':'ASC';
                          
    		var page = $('#current_page').val();
            if($('#selected_subscription_type').val()!='')
            {
                var selected_subscription_type = $('#selected_subscription_type').val();
            }
            else
            {
                var selected_subscription_type = 'All';
            }
            var selected_coupon_code = $("#coupon_code").val();
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
                
    		});
            
    	
            var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		$.ajax({
    		      type: 'POST',
                  data: 'column_id='+column_id+"&page="+page+"&ordertype="+order+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
                  +'&action_type=search'+'&coupon_code='+selected_coupon_code, 
                  url: '/backend.php/borst/getSubscriptionListData',
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				//var order = $('#subscription_list_column_order').val();
                    //alert(co)
    				setSubscriptionListOrderImage(column_id,order);
                    onchangeArticletype();
    			  }
    		});
    	});
     
	/*
     * 
     * Used for update userlist page pagination.
     * 
     */
    
    
        $('#coupon_list_listing a').unbind('click');	
    	$('#coupon_list_listing a').live("click",function(){
    	   
    		var column_id = $('#column_id').val();	
    		//var current_column_order = $('#subscription_list_column_order').val();
            var order = $('#subscription_list_column_order').val();
            // order = order!=""?order:"DESC";
            order = order=='ASC'?'DESC':'ASC';
             	
    		var page = $(this).attr("id");
    		var selected_subscription_type = $('#subscription_type').val();
            
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
    		});
    		var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		
            
    		$.ajax({
    			  url:'/backend.php/borst/getCouponListData?column_id='+column_id+"&page="+page+"&ordertype="+order+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest,
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				//var order = $('#subscription_list_column_order').val();
                    
    				setSubscriptionListOrderImage('sortby_'+column_id,order);
                    //onchangeCoupontype();
    			  }
    		});
    
    	});
        
    	$('#subscriber_list_listing a').unbind('click');	
    	$('#subscriber_list_listing a').live("click",function(){
    	   
    		var column_id = $('#column_id').val();	
    		//var current_column_order = $('#subscription_list_column_order').val();
            var order = $('#subscription_list_column_order').val();
            // order = order!=""?order:"DESC";
            order = order=='ASC'?'DESC':'ASC';
             	
    		var page = $(this).attr("id");
    		var selected_subscription_type = $('#subscription_type').val();
                var selected_coupon_code = $("#coupon_code").val();
            
    		$('#subscriber_list_table').find("tr.classnot").each(function(index){
    			$(this).addClass('withOpacity');
    		});
    		var ajaxrequest = $("#search_subscriptionlist_form").serialize();
    		
            
    		$.ajax({
    			  url:'/backend.php/borst/getSubscriptionListData?column_id='+column_id+"&page="+page+"&ordertype="+order+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest+'&coupon_code='+selected_coupon_code,
    			  success:function(data)
    			  {
    			  	$("#subscription_outer").html(data);
    				//var order = $('#subscription_list_column_order').val();
                    
    				setSubscriptionListOrderImage('sortby_'+column_id,order);
                    onchangeArticletype();
    			  }
    		});
    
    	});

/*---------End of All functionality of Subscription search,sort,update,listing,pagination,filtering and there validation---------------------------*/	
	
	/* Deletign shop articles . */
	$('.del_shop_art a').unbind('click');
	$('.del_shop_art a').live("click",function(){

		var shop_art_name =  $(this).attr("name");
		var shop_art_id =  $(this).attr("id");
		$('#btshop_articlelist_outer #delete_shop_article_id').val(shop_art_id);
		
		open_confirmation('Vill du radera butik artikeln '+shop_art_name, '', 'delete_shop_article_confirm_box', 'delete_shop_article_msg');
	});
	
	// This Dialog box is used when for editing a newsletter.		
	$('#edit_newsletter_box').dialog({
		autoOpen: false,
		width: 500,
		buttons: {
			"Save Change": function() { 
					$('#update_newsletter_name').submit();
					$(this).dialog("close"); 
			}, 
			"Cancel": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// Datepicker
	$('#datepicker').datepicker({inline: true});
	
	$("#sub_start_date_text").datepicker({showOn: 'button', buttonImage: '/images/calender.jpg', buttonImageOnly: true,
        altField: '#sub_start_date_text', altFormat: 'yy-mm-dd'
    });
	
	$("#sub_end_date_text").datepicker({showOn: 'button', buttonImage: '/images/calender.jpg', buttonImageOnly: true,
    	altField: '#sub_end_date_text', altFormat: 'yy-mm-dd'
    });
   
    // selected subscription type only
    //$("#subscription_type").unbind('change');
    //$("#subscription_type").change(function(){
     //   getSelectedSubscriptionTypes();
    //})
	
    // selected btshop article type only
    $("#btshop_article_type").unbind('change');
    $("#btshop_article_type").change(function(){
        getSelectedBtShopArticleTypes();	        
    })
	
	/* Used for sorting sbt article search result according to column */
	$('#update_sbt_article_form_column_row a').unbind('click');
	$('#update_sbt_article_form_column_row a').live("click",function(){   
		var column_id = $(this).attr("id");
		var column_name  = $('#'+column_id).html();

		//$('#update_sbt_article_form_column_row #'+column_id).html(column_name+'<img src="/images/indicator.gif" />');
	
		$('#update_sbt_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		$.ajax({
			  type:'POST',
			  data:$('#search_sbtarticle_form').serialize(),
			  url:'/backend.php/sbt/getSearchSbtArticleList?column_id='+column_id+'&only_sort=1',
			  success:function(data)
			  {
			  	$("#search_sbtarticlelist_outer").html(data);
				var order = $('#search_sbtarticle_column_order').val();
				setUpdateArticleListOrderImage(column_id,order);
			  }
		});
		
	});
	
	/* Used for update sbt articlelist page pagination. */
	$('#allsbtarticle_list_listing a').unbind('click');	
	$('#allsbtarticle_list_listing a').live("click",function(){   
		var column_id = $('#column_id').val();	
		var current_column_order = $('#search_sbtarticle_column_order').val();	
		var page = $(this).attr("id");
		
		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#allsbtarticle_list_listing').html();
		//$('#allsbtarticle_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
			  type:'POST',
			  data:$('#search_sbtarticle_form').serialize(),
			  url:'/backend.php/sbt/getSearchSbtArticleList?column_id='+column_id+"&page="+page+"&search_sbtarticle_column_order="+current_column_order,
			  success:function(data)
			  {
			  	$("#search_sbtarticlelist_outer").html(data);
				var order = $('#search_sbtarticle_column_order').val();
				setUpdateArticleListOrderImage('sortby_'+column_id,order);
			  }
		});

	});
	
	/* Used for update sbt articlelist page pagination. */
	$('#purchaseorder_list_listing a').unbind('click');	
	$('#purchaseorder_list_listing a').live("click",function(){   
		
		
		var page = $(this).attr("id");
		
		$('#update_purchaseorder_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
		});
		
		var pagination_numbers = $('#purchaseorder_list_listing').html();
		//$('#purchaseorder_list_listing').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span> <span class="float_right">'+pagination_numbers+'</span>');
		
		searchPurchaseOrder(page);

	});
	
	
	/* Used while send a payment request after confirmation. */
	$('a.save_mail_bill').unbind('click');	
	$('a.save_mail_bill').live("click",function(){   

		var id = $(this).attr("id");
		var purchase_id = $(this).attr("name");
		
		if(id == 'save_receipt')
		{
			window.location = 'https://'+window.location.hostname+'/backend.php/borst/saveAsPdf?purchase_id='+purchase_id+'&receipt=1'
		}
		if(id == 'save_receipt_article')
		{
			window.location = 'https://'+window.location.hostname+'/backend.php/borst/saveAsPdf?purchase_id='+purchase_id+'&receipt=1'+'&individual_article=1'
		}
		/*if(id == 'e_bill')
		{
			$.ajax({
			  url:'/email/sendInvoiceToUser?purchase_id='+purchase_id,
			  success:function(data)
			  {
				  	$('#pdf_send_report').html('Mail sent');
			  }
			});
		}*/
		
		if(id == 'save_invoice')
		{
			window.location = 'https://'+window.location.hostname+'/backend.php/borst/saveAsPdf?purchase_id='+purchase_id+'&receipt=0'
		}
                
                if(id == 'save_invoice_article')
                {
                    window.location = 'https://'+window.location.hostname+'/backend.php/borst/saveAsPdf?purchase_id='+purchase_id+'&receipt=0'+'&individual_article=1'
                }
		
		if(id == 'print_invoice')
		{
			var o = $("#invoice_data");
			o.jqprint();
		}
		
		if(id == 'print_receipt')
		{
			var o = $("#receipt_data");
			o.jqprint();
		}
	});
	
	/* View Account Start */
	
    /* Used to list logged-In users subscription. */
	$('#account_links #my_subscription').unbind('click');	
	$('#account_links #my_subscription').live("click",function(){   
		
		//$('#myaccount_data_container').html('<span class="float_left" style="text-align:center; padding-bottom:10px; width:100%;"><img src="/images/indicator.gif" /></span>');
		
		var id = $(this).attr("name");
		
		$.ajax({
		  url:'/backend.php/borst/userSubscription?id='+id,
		  success:function(data)
		  {
			$('#myaccount_data_container').html(data);
		  }
		});
	});
	
    /* Used to list logged-In users subscription. */
	$('.all_my_subscription_pagination a').unbind('click');	
	$('.all_my_subscription_pagination a').live("click",function(){   
		
		var page = $(this).attr("id");
		var id = $('#acc_id').val();
		
		var pagination_numbers = $('.all_my_subscription_pagination').html();
		//$('.all_my_subscription_pagination').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
		$.ajax({
		  url:'/backend.php/borst/fetchMoreUserSubscription?page='+page+'&id='+id,
		  success:function(data)
		  {
			$('#my_subscription_list').html(data);
		  }
		});
	});
	/* View Account End */
	$('#searchAdList').live("click",function(){   
			$.ajax({
			  url:'/backend.php/borst/getAdList',
			  data:$('#search_adlist_form').serialize(),
			  success:function(data)
			  { 
			  	$("#sbt_adslist_outer").html(data);
				var order = $('#adlist_column_order').val();
				//setAdListOrderImage(column_id,order);
			  }
		});
	});

        
	
});//ready ends

function doSortingColumnCoupons(urllink, column)
{
    var _cls = $('#' + column+' span').attr("class");

    if (_cls == "sort" || _cls == "sort_dsc") {
        var _order = "ASC";
        var setClass = "sort_asc";
    } else {
        var _order = "DESC";
        var setClass = "sort_dsc";
    }

    var	couponcodeId = '#couponcode';
    var couponcode   = $(couponcodeId).val();
    var	couponstatusId = '#couponstatus';
    var couponstatus   = $(couponstatusId).val();
    var queryString  = 'submit_values=yes&couponcode='+couponcode+'&couponstatus='+couponstatus;
    
    $('#loadingTxt').show(1);
    $('#renderPart').load(urllink + '?' + queryString + '&sort=yes&sortby=' + column + '&order=' + _order, function ()
    {
        $('#loadingTxt').hide(1);
        $('#' + column+' span').removeClass('sort').addClass(setClass);
    });
}
function doCouponCodeFilter(url, selId)
{
	var couponcodeId   = '#couponcode';
	var couponcode	   = $(couponcodeId).val();	
	var couponstatusId = '#couponstatus';
        var couponstatus   = $(couponstatusId).val();
        
	$('#loadingTxt').show(1);
	$('#renderPart').load(url+'?submit_values=yes&couponcode='+couponcode+'&couponstatus='+couponstatus, function()
	{
            $('#loadingTxt').hide(1);
	});
}
/*function getSelectedSubscriptionTypes()
{
        var subscription_type = $("#subscription_type").val();
		$.ajax({
			  url:'/backend.php/borst/getSubscriptionListData?subscription_type='+subscription_type,
			  success:function(data)
			  {
			  	$("#subscription_outer").html(data);
                initSubscriptionCombos();
			  }
		});    
}*/
/*function initSubscriptionCombos()
{
    $("#subscription_type").unbind('change');
    $("#subscription_type").change(getSelectedSubscriptionTypes);   
}*/

function getSelectedBtShopArticleTypes()
{
        var btshop_article_type = $("#btshop_article_type").val();
		$.ajax({
			  url:'/backend.php/borst/getShopArticleList?selected_article_type='+btshop_article_type,
			  success:function(data)
			  {
			  	$("#btshop_articlelist_outer").html(data);
                initBtShopArticleCombo();
			  }
		});		            
}
function initBtShopArticleCombo()
{
    $("#btshop_article_type").unbind('change');
    $("#btshop_article_type").change(getSelectedBtShopArticleTypes);
}

/* To fill the article price range section while editing shopping article.*/
function shopArticleList(id)
{
	var article_id = id;
	$.ajax({
		  url:'/backend.php/borst/getPriceRange?shop_art_id='+article_id,
		  success:function(data)
		  { 
			$("#price_parent").html(data);
		  }
	});
}

function showProductImageUploadBox()
{
	// This Dialog box is used to send a friend request.
	$('#upload_btshop_product_image_box').dialog('destroy');
	var box_width = '';
	var classname = $('#upload_btshop_product_image_box').attr('class');
	$('#upload_btshop_product_image_box').removeClass(classname).addClass('show_div');
	
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
	
	$('#upload_btshop_product_image_box').dialog({
		autoOpen: false,
		width: box_width,
		modal: true,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save Image": function() { 
			    
				$('#upload_btshop_product_image_form').submit();
				
				 var browse_box_text = $('#browse_box_div').html();
				//$('#browse_box_div').html('<span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" />');
				
				setTimeout("checkMessage()",800);	
			} 
		}
	});
	$('#upload_btshop_product_image_box').dialog('open');
}

function checkMessage()
{ 
	var upload_response = $('#product_image_upload_error').html();
	
	if(upload_response == 'File Uploaded Successfully')
	{
		$('#browse_box_div').html('');
		$('#upload_btshop_product_image_box').dialog("close"); 
		$('#upload_msg').html('File Uploaded Successfully');
		//location.reload();
	}
	else
	{
	  $('#browse_box_div').html('<div class="float_left" style="width:20px;"></div>');
	  setTimeout("checkMessage()",800);	
	}
}

function checkMessageChartImageUpload()
{ 
	var upload_response = $('#chart_image_upload_error').html().trim();
    var rsp = upload_response.substr(0,26);
	if(rsp == 'File Uploaded Successfully')
	{
		$('#browse_box_div').html('');
		$('#upload_chart_image').dialog("close"); 
		$('#upload_msg').html(upload_response);
		//location.reload();
	}
	else
	{
	  $('#browse_box_div').html('<div class="float_left" style="width:20px;"></div>');
	  setTimeout("checkMessage()",800);	
	}
}

/* Removes leading whitespaces */
function LTrim( value ) {
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
}

/* Removes ending whitespaces */
function RTrim( value ) {
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
}

/* Removes leading and ending whitespaces */
function trim( value ) {
	return LTrim(RTrim(value));
}

/*!
 *
 * to open confirmation box.
 *
 */	
function open_confirmation(mess, str, dialog_divid, msgdivid)
{ 
	$('#'+dialog_divid).dialog('open');
	$('#'+msgdivid).html(mess);
	
	if(dialog_divid=='delete_confirm_box')
		$('#delete_obj_id').val(str);	
	else
		$('#delete_obj_id').val('');	
		
	if(dialog_divid=='delete_article_confirm_box')
		$('#delete_article_id').val(str);	
	else
		$('#delete_article_id').val('');	
		
	if(dialog_divid=='delete_sbt_article_confirm_box')
		$('#delete_sbt_article_id').val(str);	
	else
		$('#delete_sbt_article_id').val('');	
		
	if(dialog_divid=='delete_category_box')
		$('#delete_cat_id').val(str);	
	else
		$('#delete_cat_id').val('');	
		
	if(dialog_divid=='delete_type_box')
		$('#delete_type_id').val(str);	
	else
		$('#delete_type_id').val('');	
		
	if(dialog_divid=='delete_user_confirm_box')
		$('#delete_user_id').val(str);	
	else
		$('#delete_user_id').val('');
		
	if(dialog_divid=='reset_user_password_confirm_box')
		$('#reset_pass_user_id').val(str);	
	else
		$('#reset_pass_user_id').val('');
		
	if(dialog_divid=='delete_enquirypost_confirm_box')
		$('#delete_post_id').val(str);	
	else
		$('#delete_post_id').val('');
		
	if(dialog_divid=='delete_acc_email_confirm_box')
		$('#delete_acc_email_id').val(str);	
	else
		$('#delete_acc_email_id').val('');
		
	if(dialog_divid=='delete_pub_email_confirm_box')
		$('#delete_pub_email_id').val(str);	
	else
		$('#delete_pub_email_id').val('');
		
	if(dialog_divid=='delete_sbt_ad_confirm_box')
		$('#delete_ad_id').val(str);	
	else
		$('#delete_ad_id').val('');

        if(dialog_divid=='deletePurchaseOrder_confirm_box')
		$('#delete_order_id_page').val(str);
	else
		$('#delete_order_id_page').val('');
            
        /* code by sandeep */
        if(dialog_divid=='unarchive_sbt_ad_confirm_box')
		$('#is_unarchive').val(str);	
	else
		$('#is_unarchive').val('');
            
        if(dialog_divid=='delete_sbt_ad_confirm_box_perm')
		$('#delete_id').val(str);	
	else
		$('#delete_id').val('');
            
            
        if(dialog_divid=='delete_code_confirm_box'){
		$('#is_archives').val(str);
        }
	else{
		$('#is_archives').val('');
        }
        
        if(dialog_divid=='delete_send_code_confirm_box')
		$('#is_archive').val(str);	
	else
		$('#is_archive').val('');
	/* code by sandeep end */
}

/*!
 *
 * to open edit article category confirmation box.
 *
 */	
function edit_category_confirmation(mess, str, dialog_divid, msgdivid, name)
{
	$('#'+dialog_divid).dialog('open');
	$('#'+msgdivid).html(mess);
	
	if(dialog_divid=='edit_category_box')
	{
		$('#edit_cat_id').val(str);	
		$('#category_name').val(name);	
	}
	else
		$('#edit_cat_id').val('');

	if(dialog_divid=='edit_type_box')
	{
		$('#edit_type_id').val(str);	
		$('#type_name').val(name);	
	}
	else
		$('#edit_type_id').val('');
}

/*!
 *
 * to open edit newsletter confirmation box.
 *
 */	
function edit_newsletter_confirmation(mess, str, dialog_divid, msgdivid, name)
{
	$('#'+dialog_divid).dialog('open');
	$('#'+msgdivid).html(mess);
	
	if(dialog_divid=='edit_newsletter_box')
	{
		$('#edit_newsletter_id').val(str);	
		$('#newsletter_name').val(name);	
	}
	else
		$('#edit_cat_id').val('');
}

/*!
 *
 * This function is used to set the onlySave flag.
 *
 */	
function setSaveFlag()
{
	$('#saveOnly').val(1);	
}

/*!
 *
 * This function is used while saving an article data.
 *
 */	
function check_template_name()
{ 
	var art_title = $('#rubrik').val();
	art_title = trim(art_title);
	var template_name = $('#template_name').val();
	var has_error = 0;
	
	if($("#tplt_chk").is(':checked'))
	{
		var str = $('#tplt_name').val();
		var stringVar = trim(str);
		if(stringVar == " " || stringVar.length == 0)
		{
			has_error = 1;
			//alert("Du mste fylla i mallen namn!");
			open_confirmation('Du mste fylla i mallen namn!', '', 'article_title_confirm_box', 'article_title_msg');
			return false;
		}
		
		if(template_name.length > 0)
		{
			var arr = template_name.split(',');
			for(var i=0; i<arr.length;i++)
			{
				if(arr[i].toLowerCase() == str.toLowerCase())
				{
					has_error = 1;
					alert('Mallnamn finns redan, ge en annan mall namn!');
					return false;
				}
			}
		} 
		
		if(has_error == 0)
		{
			$('#save_temp').val(1);
			return true;
		}
	}
	else if(art_title == " " || art_title.length == 0)
	{
			//alert("Du mste fylla i artikeln namnet!");
			open_confirmation('Du mste fylla i mallen namnet!', '', 'article_title_confirm_box', 'article_title_msg');
			return false;
	}
	else 
	{
		//return true;
	}
}

/*!
 *
 * This function opens the selected template.
 *
 */	
function change_template()
{
	var tmp_name = $('#filenames').val();
	$('#temp_switch').val(tmp_name);
	var popurl="https://"+window.location.hostname+"/backend.php/borst/createArticle/template_id/"+tmp_name;
	window.location = popurl;
}

/*!
 *
 * This function is used while saving an object data.
 *
 */	
function check_object_record()
{ 
	var object_name = $('#objekt_object_name').val();
	var object_country = $('#objekt_object_country').val();
	var object_id = $('#objekt_object_id').val();
	var object_name_flag = 0;
	var object_country_flag = 0;
	
	object_name = trim(object_name);
	object_country = trim(object_country);
	
	if(object_name == '' || object_name.length == 0) 
	{
		$('#obj_name_error').html('* Required');
		object_name_flag = 1;
	}
	else
	{
		$('#obj_name_error').html('*');
		object_name_flag = 0;
	}
	
	if(object_country == '' || object_country.length == 0) 
	{
		$('#obj_country_error').html('* Required');
		object_country_flag = 1;
	}
	else
	{
		$('#obj_country_error').html('*');
		object_country_flag = 0;
	}
	
	if(object_name_flag == 0 && object_country_flag == 0)
	{
		var obj_parameter = '';
		var obj_id = $('#objekt_object_id').val();
		if(obj_id > 0) obj_parameter = '&object_id='+obj_id;
		
		$.get("/backend.php/borst/checkForObject?object_name="+object_name+"&object_country="+object_country+obj_parameter, function(data){
			//alert(data);
			if(data == 'update' || data == 'new')
			{
				$('#one_object_form').submit();
			}
			else
			{
				$('#obj_name_error').html('* Object with same name and land already exist.');
			}
		});
	}
}

/*!
 *
 * This function is used while saving an new article category.
 *
 */	
function check_category_record()
{ 
	var category_name = $('#add_category_text').val();
	if(category_name)
	{
		$('#add_category_error').html('');	
		
		$.get("/backend.php/borst/checkForCategory?category_name="+category_name, function(data){
				if(data == 0)	$('#add_new_category').submit();
		});
	}
	else
	{
		$('#add_category_error').html('Required');	
	}
}

/*!
 *
 * This function is used while saving an new newsletter.
 *
 */	
function check_newsletter_record()
{ 
	var newsletter_name = $('#add_newsletter_text').val();
	if(newsletter_name)
	{
		$('#add_newsletter_error').html('');	
		
		$.get("/backend.php/borst/checkForNewsletter?newsletter_name="+newsletter_name, function(data){
				if(data == 0)	$('#add_new_newsletter').submit();
				if(data == 1)   $('#add_newsletter_error').html('Already Exisist');	
		});
	}
	else
	{
		$('#add_newsletter_error').html('Required');	
	}
}


/*!
 *
 * This function is used while saving an new article type.
 *
 */	
function check_type_record()
{ 
	var type_name = $('#add_type_text').val();
	if(type_name)
	{
		$.get("/backend.php/borst/checkForType?type_name="+type_name, function(data){
				if(data == 0)	$('#add_new_type').submit();
		});
	}
	else
	{
		$('#add_type_error').html('Required');	
	}
}

/* Used in backend for searching perticular user.*/
function search_for_user()
{ 
	var tempname = trim($('#tempname').val());
	var inlog1 = trim($('#inlog1').val());
	var inlog2 = trim($('#inlog1').val());
	var s_abon = $('#s_abon').val(); 
	var user_status_arr = $('#user_status_arr').val();
	//alert('tempname='+tempname.length+' inlog1='+inlog1.length+' inlog2='+inlog2.length+' s_abon='+s_abon+'user_status_arr='+user_status_arr);
	
	if(tempname.length == 0 && inlog1.length == 0 && inlog2.length == 0 && s_abon == 0 && user_status_arr == 0)
	{
		$('#search_user_error').html('Please fill or select atleast one field');
	}
	else
	{
		$('#search_user_error').html('&nbsp;');
		//$('#search_userlist_outer').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
		$.ajax({
				  type:'POST',
				  data:$('#search_user_form').serialize(),
				  url:'/backend.php/borst/getSearchUserList',
				  success:function(data)
				  {
					$("#search_userlist_outer").html(data);
				  }
			  });
	}
}

/*!
 *
 * This function sets the image for update user page as per the order.
 *
 */	
function setUpdateUserListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_regdate') $('#sortby_regdate').html('<span class="float_left">Reg'+image_txt+'</span>');
	if(column_id == 'sortby_betdate') $('#sortby_betdate').html('<span class="float_left">Bet'+image_txt+'</span>');
	if(column_id == 'sortby_stopdate') $('#sortby_stopdate').html('<span class="float_left">Stop'+image_txt+'</span>');
	if(column_id == 'sortby_kundnr') $('#sortby_kundnr').html('<span class="float_left">Kundnr'+image_txt+'</span>');
	if(column_id == 'sortby_username') $('#sortby_username').html('<span class="float_left">User'+image_txt+'</span>');
	if(column_id == 'sortby_firstname') $('#sortby_firstname').html('<span class="float_left">Förnamn'+image_txt+'</span>');
	if(column_id == 'sortby_lastname') $('#sortby_lastname').html('<span class="float_left">Efternamn'+image_txt+'</span>');
	if(column_id == 'sortby_city') $('#sortby_city').html('<span class="float_left">Ort'+image_txt+'</span>');
	if(column_id == 'sortby_email') $('#sortby_email').html('<span class="float_left">E-mail'+image_txt+'</span>');
	if(column_id == 'sortby_abonid') $('#sortby_abonid').html('<span class="float_left">Abonn'+image_txt+'</span>');
	if(column_id == 'sortby_userstatid') $('#sortby_userstatid').html('<span class="float_left">Status'+image_txt+'</span>');
	if(column_id == 'sortby_inlog') $('#sortby_inlog').html('<span class="float_left">Inlog'+image_txt+'</span>');
	if(column_id == 'sortby_inlogdate') $('#sortby_inlogdate').html('<span class="float_left">Senaste inlog'+image_txt+'</span>');
	if(column_id == 'sortby_total') $('#sortby_total').html('<span class="float_left">Totalt'+image_txt+'</span>');
	if(column_id == 'sortby_regdate') $('#sortby_regdate').html('<span class="float_left">Belopp'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for update article page as per the order.
 *
 */	
function setUpdateArticleListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_art_status') $('#sortby_art_status').html('<span class="float_left">Status'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left">Datum'+image_txt+'</span>');
	if(column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left">Författare'+image_txt+'</span>');
	if(column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left">Rubrik'+image_txt+'</span>');
	if(column_id == 'sortby_category') $('#sortby_category').html('<span class="float_left">Kat'+image_txt+'</span>');
	if(column_id == 'sortby_type') $('#sortby_type').html('<span class="float_left">Typ'+image_txt+'</span>');
	if(column_id == 'sortby_object') $('#sortby_object').html('<span class="float_left">Objekt'+image_txt+'</span>');
	if(column_id == 'sortby_art_view') $('#sortby_art_view').html('<span class="float_left">Visad'+image_txt+'</span>');
}

/*!
 *
 * This function sets the yesterdays date in the checkbox row.
 *
 */	
function setNewDate(id)
{
	var mydate= new Date()
	mydate.setDate(mydate.getDate()-1)
	
	var theyear=mydate.getFullYear()
	var themonth=mydate.getMonth()+1
	var theyesterday=mydate.getDate()
	
	$('#bet_id'+id).val(theyear+'-'+themonth+'-'+theyesterday);
	$('#payment'+id).val(200);
}

/*!
 *
 * This function updates the user who are on the current userlist page.
 *
 */	
function updateUserListUsers()
{ 
	var column_id = $('#column_id').val();	
	var current_column_order = $('#search_user_column_order').val();	
	var page = $(this).attr("id");
	
	$('#update_user_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
		
	$.ajax({
		  type:'POST',
		  data:$('#update_user_form').serialize(),
		  url:'/backend.php/borst/getSearchUserList?column_id='+column_id+"&page="+page+"&search_user_column_order="+current_column_order,
		  success:function(data)
		  {
		  		$.ajax({
					type:'POST',
			  		data:$('#search_user_form').serialize(),
			  		url:'/backend.php/borst/getSearchUserList?column_id='+column_id+"&page="+page+"&search_user_column_order="+current_column_order,
			  		success:function(data)
			  		{
			  			$("#search_userlist_outer").html(data);
						var order = $('#search_user_column_order').val();
						setUpdateUserListOrderImage('sortby_'+column_id,order);
			  		}
				});
		  }
	});
}

/*!
 *
 * This function updates the user who are sbt inactive page.
 *
 */	
function updateSbtInactiveUserList()
{ 
	$.ajax({
		  type:'POST',
		  data:$('#update_sbtinactiveuser_form').serialize(),
		  url:'/backend.php/borst/sbtInactiveUserList',
		  success:function(data)
		  {
		  	location.reload();	
		  }
	});
}

/*!
 *
 * This function delete's selected user.
 *
 */	
function deleteSelectedUser()
{ 
	var column_id = $('#column_id').val();	
	var current_column_order = $('#search_user_column_order').val();	
	var page = $(this).attr("id");
	var user_id = $('#delete_user_id').val();
	
	$('#update_user_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
		
	$.ajax({
		   		type:'POST',
				data:$('#search_user_form').serialize(),
				url:'/backend.php/borst/getSearchUserList?column_id='+column_id+"&page="+page+"&search_user_column_order="+current_column_order+"&delete_user_id="+user_id,
				success:function(data)
				{
					$("#search_userlist_outer").html(data);
					var order = $('#search_user_column_order').val();
					setUpdateUserListOrderImage('sortby_'+column_id,order);
					$('#delete_user_id').val('');
				}
		 });
}

/*!
 *
 * This function resets the selected users password.
 *
 */	
function resetSelectedUsersPassword()
{ 
	var column_id = $('#column_id').val();	
	var current_column_order = $('#search_user_column_order').val();	
	var page = $(this).attr("id");
	var user_id = $('#reset_pass_user_id').val();
	
	$('#update_user_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
	
	$.ajax({
		type:'POST',
		data:{'user_id':user_id},
		url:'/backend.php/email/newPassToUser',
		success:function(data)
		{
			$.ajax({
				type:'POST',
				data:$('#search_user_form').serialize(),
				url:'/backend.php/borst/getSearchUserList?column_id='+column_id+"&page="+page+"&search_user_column_order="+current_column_order,
				success:function(data)
				{
					$("#search_userlist_outer").html(data);
					var order = $('#search_user_column_order').val();
					setUpdateUserListOrderImage('sortby_'+column_id,order);
				}
			});
            $("#pass_reset_confirmation_msg").css('display','block');
		}
	});
}

/*!
 *
 * This function is used for reminding user.
 *
 */	
function sendReminder()
{ 
	$.ajax({
		type:'POST',
		data:$('#remind_user_form').serialize(),
		url:'/backend.php/borst/remindUser',
		success:function(data)
		{
			$.ajax({
				url:'/backend.php/email/remindUserMail',
				success:function(data)
				{
					 //location.reload();
				}
			});
		}
	});
}

/* Used in backend for searching perticular article.*/
function search_for_article()
{
	//$('#search_articlelist_outer').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
	$.ajax({
			  type:'POST',
			  data:$('#search_article_form').serialize(),
			  url:'/backend.php/borst/getSearchArticleList',
			  success:function(data)
			  {
			  	$("#search_articlelist_outer").html(data);
			  }
		  });
}

/* Used in backend for searching perticular sbt article.*/
function search_for_sbt_article()
{
	//$('#search_sbtarticlelist_outer').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
	$.ajax({
			  type:'POST',
			  data:$('#search_sbtarticle_form').serialize(),
			  url:'/backend.php/sbt/getSearchSbtArticleList',
			  success:function(data)
			  {
			  	$("#search_sbtarticlelist_outer").html(data);
			  }
		  });
}

/*!
 *
 * This function updates the article who are on the current articlelist page.
 *
 */
function updateArticleListForUnload()
{
	var column_id = $('#column_id').val();
	
	var page = $('#page_number').val();

	$('#update_article_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});

	$.ajax({
		  type:'POST',
                   async: false,
		  data:$('#update_artiklar').serialize(),
		  url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+"&page="+page,
		  success:function(data)
		  {
                      return 1;
                  }
                  
        });
      
}

/*!
 *
 * This function updates the article who are on the current articlelist page.
 *
 */	
function updateArticleList()
{ 
	var column_id = $('#column_id').val();	
	var current_column_order = $('#search_article_column_order').val();	
	var page = $('#page_number').val();
	
	$('#update_article_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
	
	$.ajax({
		  type:'POST',
		  data:$('#update_artiklar').serialize(),
		  url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+"&page="+page,
		  success:function(data)
		  {
				$.ajax({
					type:'POST',
			  		data:$('#search_article_form').serialize(),
			  		url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+"&page="+page,
			  		success:function(data)
			  		{
                                                var javascr = "<script>$(document).ready(function(){$('#update_message_div').show();}); ;</script>" ;
                                               
			  			$("#search_articlelist_outer").html(data);
                                                $("#search_articlelist_outer").append(javascr);
						var order = $('#search_article_column_order').val();
						setUpdateArticleListOrderImage('sortby_'+column_id,order);
                                                
			  		}
				});
		  }
	});
}

/*!
 *
 * This function updates the article who are on the current articlelist page.
 *
 */	
function updatePurchaseList()
{
    var page = $('#purchaseorder_list_listing .selected').html();
	$.ajax({
		  type:'POST',
                  data:$('#update_purchase_form').serialize()+','+$('#search_purchaseorder_form').serialize()+'&page='+page,
		  url:'/backend.php/borst/searchPurchaseOrder',
		  success:function(data)
		  {
                        $('#showpurchaselist_outer').html(data);
			 // location.reload();
			  $('#purchase_update_msg').html('List updated successfully')
		  }
	});
}

/*!
 *
 * This function updates the purchase order status to complete.
 *
 */	
function updatePurchaseStatusToDone(pur_id)
{ 
	
	$.ajax({
		  url:'/backend.php/borst/changePurchaseOrderStatus?pur_id='+pur_id,
		  success:function(data)
		  {
			$('#update_purchase_btn').remove();
			$("#link_as_per_status").html(data);
			
					$.ajax({
						url:'/backend.php/email/paymentStatusUpdateMail?pur_id='+pur_id,
						success:function(data1)
						{
						}
					});
		  }
	});
}

/*!
 *
 * This function updates the sbt article who are on the current sbtarticlelist page.
 *
 */	
function updateSbtArticleList()
{ 
	var column_id = $('#column_id').val();	
	var current_column_order = $('#search_sbtarticle_column_order').val();	
	var page = $('#page_number').val();
	
	$('#update_sbt_article_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});
	
	$.ajax({
		  type:'POST',
		  data:$('#update_sbt_artiklar').serialize(),
		  url:'/backend.php/sbt/getSearchSbtArticleList?column_id='+column_id+"&page="+page,
		  success:function(data)
		  {
				$('#update_sbt_article_list_table').find("tr.withOpacity").each(function(index){
					$(this).removeClass('withOpacity');
				});
				
				/*$.ajax({
					type:'POST',
			  		data:$('#search_sbtarticle_form').serialize(),
			  		url:'/backend.php/sbt/getSearchSbtArticleList?column_id='+column_id+"&page="+page,
			  		success:function(data)
			  		{
			  			$("#search_sbtarticlelist_outer").html(data);
						var order = $('#search_sbtarticle_column_order').val();
						setUpdateArticleListOrderImage('sortby_'+column_id,order);
			  		}
				});*/
		  }
	});
}


/*!
 *
 * This function updates the shop article who are on the current articlelist page.
 *
 */	
function updateShopArticleList()
{ 
	var column_id = $('#column_id').val();	
		
	/*$('#borst_shop_article_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});*/
	
	//$('.shop_update_msg').html('<span class="float_left" style="text-align:center; width:100%;"><img src="/images/indicator.gif" /></span>');
	
	$.ajax({
		  type:'POST',
		  data:$('#update_shop_art_list').serialize(),
		  url:'/backend.php/borst/getShopArticleList?column_id='+column_id,
		  success:function(data)
		  {
			  $('.shop_update_msg').html('List Updated Successfully');
		  }
	});
}

/*!
 *
 * This function sets the image for sbt article as per the order.
 *
 */	
function setSbtArticleListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left" style="width:90px;">Article Title'+image_txt+'</span>');
	if(column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left" style="width:105px;">Vote Received'+image_txt+'</span>');
	if(column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="width:80px;">Författare'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left" style="width:100px;">Created Date'+image_txt+'</span>');
}

/*!
 *
 * This function rejects the article publish request.
 *
 */	
function rejectAnalysis()
{
	var analysis_suggestion = tinyMCE.activeEditor.getContent();

	if(analysis_suggestion == " " || analysis_suggestion.length == 0) 
	{ 
		$('#suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Suggestion:</strong></span><span class="float_left" style="color:red; margin-left:10px;"><strong>Required</strong></span>');
	}
	else 
	{ 
		$('#suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Suggestion:</strong></span>');
		$('#sbt_published').val('2');
		$('#sbt_analysis_suggestion_analysis_status').val('2');
		$('#suggestion_on_analysis_form').submit();
	} 
}

/*!
 *
 * This function approves the article publish request.
 *
 */	
function approveAnalysis()
{
	var now = new Date();
	
	if( $('#sbt_created_at_month').val()=='' || $('#sbt_created_at_day').val()=='' || $('#sbt_created_at_year').val()=='' )
	{
		$('#date_suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Publish Date:</strong></span><span class="float_left" style="color:red; margin-left:10px;"><strong>Please Proved Proper Publish Date</strong></span>');
	}
    else if( $('#sbt_created_at_hour').val()=='' || $('#sbt_created_at_minute').val()=='' )
	{
		$('#date_suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Publish Date:</strong></span><span class="float_left" style="color:red; margin-left:10px;"><strong>Please Proved Proper Publish Time</strong></span>');
	}
	else if($('#sbt_created_at_year').val() < now.getFullYear())
	{
		$('#date_suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Publish Date:</strong></span><span class="float_left" style="color:red; margin-left:10px;"><strong>The year is already passed</strong></span>');
	}
	else if($('#sbt_created_at_month').val() < now.getMonth())
	{
		$('#date_suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Publish Date:</strong></span><span class="float_left" style="color:red; margin-left:10px;"><strong>The month is already passed</strong></span>');	
	}
	else
	{
		$('#date_suggestion_msg').html('<span class="float_left" style="color:black;"><strong>Publish Date:</strong></span>');	
		$('#sbt_published').val('1');
		$('#sbt_analysis_suggestion_analysis_status').val('1');
		
		$('#publish_date').val($('#sbt_created_at_year').val()+'-'+$('#sbt_created_at_month').val()+'-'+$('#sbt_created_at_day').val()+' '+$('#sbt_created_at_hour').val()+':'+$('#sbt_created_at_minute').val()+':'+$('#sbt_created_at_sec').val());
		$('#suggestion_on_analysis_form').submit();
	}
	
    //alert(now.getDate()+'/'+now.getMonth()+'/'+now.getFullYear());
}

/*!
 *
 * This function sets the image for medal analysis list as per the order.
 *
 */	
function setMedalAnalysisListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_title') $('#sortby_title').html('<span class="float_left" style="width:80px;">Rubrik'+image_txt+'</span>');
	if(column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left" style="width:105px;">Vote Received'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left" style="width:60px;">Datum'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for medal user list as per the order.
 *
 */	
function setMedalUserListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="width:85px;">Användare'+image_txt+'</span>');
	if(column_id == 'sortby_vote') $('#sortby_vote').html('<span class="float_left" style="width:105px;">Vote Received'+image_txt+'</span>');
	if(column_id == 'sortby_regdate') $('#sortby_regdate').html('<span class="float_left" style="width:70px;">Regdate'+image_txt+'</span>');
}

/*!
 *
 * This function is used when a note is given by admin to author while awarding medal to analysis.
 *
 */	
function awardMedalToAnalysis(dialog_divid,medal_id)
{
	$('#'+dialog_divid).dialog('open');
	$('#sbt_analysis_medal_details_analysis_medal_type_id').val(medal_id);
}

/*!
 *
 * This function is used when a note is given by admin to author while awarding medal to him.
 *
 */	
function awardMedalToAuthor(dialog_divid,medal_id)
{
	$('#'+dialog_divid).dialog('open');
	$('#sbt_author_medal_details_author_medal_type_id').val(medal_id);
}

/* Used in backend for searching perticular enquiry.*/
function updateEnquiryList()
{
	/*$('#borst_enquiry_list_table').find("tr.classnot").each(function(index){
		$(this).addClass('withOpacity');
	});*/

	$.ajax({
			  type:'POST',
			  data:$('#update_borst_enquiry').serialize(),
			  url:'/backend.php/borst/getContactEnquiry',
			  success:function(data)
			  {
			  	$("#update_msg").html('List Updated');
			  }
	});
}


function adjustPriceDisForMacSaf()
{
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
			$('#price_parent').css('width','518px');	
		}
	}
}

/*!
 *
 * This function checks the backend newsletter form.
 *
 */	
function checkNewsletterForm()
{ 
	var group_id = $("input[name='kundgrupp']:checked").val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var email_flag = news_mail_from_flag = news_subject_flag = news_mail_body = 0;

	 if(group_id == 4)
	{
		var mail_to_str = trim($("#mail_to").val());
		
		if(mail_to_str)
		{
			var mail_to_arr = mail_to_str.split(',');

			if(mail_to_arr.length >= 1)
			{
				for(var i=0; i<mail_to_arr.length; i++)
				{
					var email = mail_to_arr[i];
					if(reg.test(email) == false) 
					{ 
						$('#news_mail_to_error').html('Please enter valid email addresses'); 
						email_flag = 1; 
						break;
					}
				}
			}
			else
			{
				$('#news_mail_to_error').html('Required'); 
				email_flag = 1; 	
			}
		}
		else
		{
			$('#news_mail_to_error').html('Required'); 
			email_flag = 1; 
		}
	
	
	
	
	} 
	
	if(email_flag == 0){$('#news_mail_to_error').html('');}
	
	
	var mail_from = trim($("#mail_from").val());
	if(mail_from)
	{
		if(reg.test(mail_from) == false) {$('#news_mail_from_error').html('Invalid');news_mail_from_flag = 1;}
		else {$('#news_mail_from_error').html('');news_mail_from_flag = 0;}
	}
	else {$('#news_mail_from_error').html('Required');news_mail_from_flag = 1;}
	
	var subject = trim($("#subject").val());
	if(subject)
	{
		if(subject == '' || subject.length == 0) {$('#news_mail_subject_error').html('Required');news_subject_flag = 1;}
		else {$('#news_mail_subject_error').html('');news_subject_flag = 0;}
	}
	else {$('#news_mail_subject_error').html('Required');news_subject_flag = 1;}
	
	var mail_body = trim($("#mail_body").val());
	if(mail_body)
	{
		if(mail_body == '' || mail_body.length == 0) {$('#news_mail_body_error').html('Required');news_mail_body = 1;}
		else {$('#news_mail_body_error').html('');news_mail_body = 0;}
	}
	else {$('#news_mail_body_error').html('Required');news_mail_body = 1;}
	
	if( (email_flag == 0) && (news_mail_from_flag == 0) && (news_subject_flag == 0) && (news_mail_body == 0) )
	{
		open_confirmation('Ska brevet skickas syster?', '', 'send_newsletter_confirm_box', 'send_newsletter_msg');
	}
	
}


/*!
 *
 * This function checks the backend sendArticleUpdate form.
 *
 */	
function checkSendArticleUpdateForm()
{ 
	var group_id = $("input[name='kundgrupp']").val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var email_flag = articleupdate_mail_from_flag = articleupdate_subject_flag = articleupdate_mail_body = 0;

	/* 
	
	if(group_id == 4)
	{
		var mail_to_str = trim($("#articleupdate_mail_to").val());
		
		if(mail_to_str)
		{
			var mail_to_arr = mail_to_str.split(',');

			if(mail_to_arr.length >= 1)
			{
				for(var i=0; i<mail_to_arr.length; i++)
				{
					var email = mail_to_arr[i];
					if(reg.test(email) == false) 
					{ 
						$('#articleupdate_mail_to_error').html('Please enter valid email addresses'); 
						email_flag = 1; 
						break;
					}
				}
			}
			else
			{
				$('#articleupdate_mail_to_error').html('Required'); 
				email_flag = 1; 	
			}
		}
		else
		{
			$('#articleupdate_mail_to_error').html('Required'); 
			email_flag = 1; 
		}
	}
	
	*/
	
	
	if(email_flag == 0){$('#articleupdate_mail_to_error').html('');}
	
	var mail_from = trim($("#articleupdate_mail_from").val());
	if(mail_from)
	{
		if(reg.test(mail_from) == false) {$('#articleupdate_mail_from_error').html('Invalid');articleupdate_mail_from_flag = 1;}
		else {$('#articleupdate_mail_from_error').html('');articleupdate_mail_from_flag = 0;}
	}
	else {$('#articleupdate_mail_from_error').html('Required');articleupdate_mail_from_flag = 1;}
	
	var subject = trim($("#articleupdate_subject").val());
	if(subject)
	{
		if(subject == '' || subject.length == 0) {$('#articleupdate_subject_error').html('Required');articleupdate_subject_flag = 1;}
		else {$('#articleupdate_subject_error').html('');articleupdate_subject_flag = 0;}
	}
	else {$('#articleupdate_subject_error').html('Required');articleupdate_subject_flag = 1;}
	
	if( (email_flag == 0) && (articleupdate_mail_from_flag == 0) && (articleupdate_subject_flag == 0) )
	{
		open_confirmation('Ska brevet skickas broder?', '', 'send_article_update_confirm_box', 'send_article_update_msg');
	}

}

/*!
 *
 * This function sets the image for publisher request userlist as per the order.
 *
 */	
function setPublisherRequestUserListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="width:85px;">Användare'+image_txt+'</span>');
	if(column_id == 'sortby_regdate') $('#sortby_regdate').html('<span class="float_left" style="width:70px;">Regdate'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for publisher pending request page as per the order.
 *
 */	
function setPublisherPendingRequestListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_author') $('#sortby_author').html('<span class="float_left" style="width:85px;">Användare'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left" style="width:105px;">Request Date'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for borst enquiry list page as per the order.
 *
 */	
function setBorstEnquiryListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_subject') $('#sortby_subject').html('<span class="float_left" style="width:54px;">Ämne'+image_txt+'</span>');
	if(column_id == 'sortby_enq_type') $('#sortby_enq_type').html('<span class="float_left" style="width:110px;">Typ av förfrågan'+image_txt+'</span>');
	if(column_id == 'sortby_firstname') $('#sortby_firstname').html('<span class="float_left" style="width:71px;">Förnamn'+image_txt+'</span>');
	if(column_id == 'sortby_lastname') $('#sortby_lastname').html('<span class="float_left" style="width:79px;">Efternamn'+image_txt+'</span>');
	if(column_id == 'sortby_email') $('#sortby_email').html('<span class="float_left" style="width:57px;">E-post'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left" style="width:46px;">Date'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for borst shop  article list page as per the order.
 *
 */	
function setBorstShopArticleListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_subject') $('#sortby_subject').html('<span class="bk_shoplist_col_name">Ämne'+image_txt+'</span>');
	if(column_id == 'sortby_status') $('#sortby_status').html('<span class="bk_shoplist_col_status">Status'+image_txt+'</span>');
	if(column_id == 'sortby_type') $('#sortby_type').html('<span class="bk_shoplist_col_type">Type of Article'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="bk_shoplist_col_delete">Date'+image_txt+'</span>');
}

/*!
 *
 * This function sets the image for subscription list page as per the order.
 *
 */	
function setSubscriptionListOrderImage(column_id,order)
{ 
    //alert(order);
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="DESC" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="ASC" />';
    
	
        if(column_id == 'sortby_code') $('#sortby_code').html('<span class="float_left width_125">Coupon Code'+image_txt+'</span>');
	if(column_id == 'sortby_name') $('#sortby_name').html('<span class="float_left width_125">Subscription name'+image_txt+'</span>');
	if(column_id == 'sortby_startdate') $('#sortby_startdate').html('<span class="float_left width_80">Start Date'+image_txt+'</span>');
	if(column_id == 'sortby_stopdate') $('#sortby_stopdate').html('<span class="float_left width_80">Stop Date'+image_txt+'</span>');
	if(column_id == 'sortby_firstname') $('#sortby_firstname').html('<span class="float_left width_75">Förnamn'+image_txt+'</span>');
	if(column_id == 'sortby_lastname') $('#sortby_lastname').html('<span class="float_left width_80">Efternamn'+image_txt+'</span>');
        if(column_id == 'sortby_email') $('#sortby_email').html('<span class="float_left width_55">E-mail'+image_txt+'</span>');
	if(column_id == 'sortby_date') $('#sortby_date').html('<span class="float_left width_55">Date'+image_txt+'</span>');
        if(column_id == 'sortby_status') $('#sortby_status').html('<span class="float_left width_125">Status'+image_txt+'</span>');
}


/*!
 *
 * This function sets the image for ad list page as per the order.
 *
 */	
function setAdListOrderImage(column_id,order)
{ 
	if(order == 'ASC') var image_txt = '<img src="/images/desc.gif" alt="desc" />';
	if(order == 'DESC') var image_txt = '<img src="/images/asc.gif" alt="asc" />';
			
	if(column_id == 'sortby_ad_position') $('#sortby_ad_position').html('<span class="float_left" style="width:85px; border:0px solid red;">Ad Position'+image_txt+'</span>');
	if(column_id == 'sortby_ad_name') $('#sortby_ad_name').html('<span class="float_left" style="width:70px; border:0px solid red;">Ad Name'+image_txt+'</span>');
	if(column_id == 'sortby_ad_path') $('#sortby_ad_path').html('<span class="float_left" style="width:64px; border:0px solid red;">Ad Path'+image_txt+'</span>');
	
	if(column_id == 'sortby_ad_type') $('#sortby_ad_type').html('<span class="float_left" style="width:66px; border:0px solid red;">Ad Type'+image_txt+'</span>');
	if(column_id == 'sortby_ad_enable') $('#sortby_ad_enable').html('<span class="float_left" style="width:83px; border:0px solid red;">Ad Enabled'+image_txt+'</span>');
	if(column_id == 'sortby_ad_target') $('#sortby_ad_target').html('<span class="float_left" style="width:75px; border:0px solid red;">Ad Target'+image_txt+'</span>');
	if(column_id == 'sortby_ad_click') $('#sortby_ad_click').html('<span class="float_left" style="width:100px; border:0px solid red;">CCount Id'+image_txt+'</span>');
	
	if(column_id == 'sortby_ad_total_clicks') $('#sortby_ad_total_clicks').html('<span class="float_left" style="width:86px; border:0px solid red;">Total Clicks'+image_txt+'</span>');
	if(column_id == 'sortby_ad_displayed') $('#sortby_ad_displayed').html('<span class="float_left" style="width:100px; border:0px solid red;">Displ. Count'+image_txt+'</span>');
	if(column_id == 'sortby_ad_priority') $('#sortby_ad_priority').html('<span class="float_left" style="width:62px; border:0px solid red;">Priority'+image_txt+'</span>');
}

function initSubscribtionTypeCombos()
{
	$('#filter_shop_art_type').unbind('change');
	$('#filter_shop_art_type').change(getsubCatTypeVal);	
}

function getsubCatTypeVal()
{
	var type_id = $(this).val();	

	if(type_id > 0)
	{
		$('#filter_subscription_type_error').html('');
		
		$.ajax({
			url:'/backend.php/borst/getFilterSubscriptionList?type_id='+type_id,
			success:function(data)
			{ 
				$("#filtered_subscription_list").html(data);
			}
		});
	}
	else
	{
		$("#filtered_subscription_list").html('');
		$('#filter_subscription_type_error').html('Type Not Selected');
	}
	
	initSubscribtionTypeCombos();
}

/* Used for image upload.*/
function upload_img_for_bt(id)
{
	if(id == 'ingress') var post_url = "/backend.php/borst/btIngressImageUpload/mode/upload";
	if(id == 'bt_detail') var post_url = "/backend.php/borst/btDetailImageUpload/mode/upload";
	//var post_url = "/sbt/imageUpload/mode/upload/image_path/"+id;
	
	var window_name = 'upload_image_in_article_detail';
	var new_width = 340;
	var new_height = 350;
	
	openWindowInCenter(post_url,new_width,new_height,window_name);
    
    
}





/* To show the opened window in center of page. */
function openWindowInCenter(post_url,new_width,new_height,window_name)
{
	var url = "https://"+window.location.hostname+"/"+post_url;
	var name = window_name;
	var w = new_width;
	var h = new_height;
	
	// Fudge factors for window decoration space.
	// In my tests these work well on all platforms & browsers.
	w += 32;
	h += 96;
	wleft = (screen.width - w) / 2;
	wtop = (screen.height - h) / 2;
	// IE5 and other old browsers might allow a window that is
	// partially offscreen or wider than the screen. Fix that.
	// (Newer browsers fix this for us, but let's be thorough.)
	if (wleft < 0) {
	w = screen.width;
	wleft = 0;
	}
	if (wtop < 0) {
	h = screen.height;
	wtop = 0;
	}
	var win = window.open(url,
	name,
	'width=' + w + ', height=' + h + ', ' +
	'left=' + wleft + ', top=' + wtop + ', ' +
	'location=no, menubar=no, ' +
	'status=no, toolbar=no, scrollbars=yes, resizable=yes');
	// Just in case width and height are ignored
	win.resizeTo(w, h);
	// Just in case left and top are ignored
	win.moveTo(wleft, wtop);
	win.focus();
	
	//window.open("https://"+window.location.hostname+"/epolicy.php","mywindow","menubar=1,resizable=1,width=500,height=525");
}


function updateCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
};

function checkCoords()
{
	if (parseInt($('#w').val())) return true;
	alert('Please select a crop region then press submit.');
	return false;
};

/*!
 *
 * This function updates the purchase order status to complete.
 *
 */	
 
 
function searchPurchaseOrder(page)
{ 
	$('#update_purchaseorder_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
	});
	
	$.ajax({
			  type:'POST',
			  data:$('#search_purchaseorder_form').serialize(),
			  url:'/backend.php/borst/searchPurchaseOrder?page='+page,
			  success:function(data)
			  {
			  	$("#showpurchaselist_outer").html(data);
			  }
	});
}


/*!
 *
 * This function updates the purchase order status to complete.
 *
 */	
function searchSubscriptionList(page)
{ 
	$('#update_subscription_form').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
	});
	
	$.ajax({
			  type:'POST',
			  data:$('#search_subscriptionlist_form').serialize(),
			  url:'/backend.php/borst/SearchSubscriptionList?page='+page,
			  success:function(data)
			  {
			  	$("#subscription_outer").html(data);
			  }
	});
}
function searchSubscriptionList1(page)
{ 
	$('#update_subscription_form').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
	});
	
	$.ajax({
			  type:'POST',
			  data:$('#search_subscriptionlist_form').serialize(),
			  url:'/backend.php/borst/SearchSubscriptionList?page='+page,
			  success:function(data)
			  {
			  	$("#subscription_outer").html(data);
			  }
	});
}
/*!
 *
 * This function updates the purchase order status to complete.
 *
 */
function deletePurchaseOrder(page,id)
{


	$.ajax({
			  type:'POST',
			  data:{'page':page,'id':id},
			  url:'/backend.php/borst/deletePurchaseOrder',
			  success:function(data)
			  {
			  	searchPurchaseOrder(page);
			  }
	});
}

/**
 *
 */
function searchArticleListForCount(){
    var column_id = $('#column_id').val();
		var current_column_order = $('#search_article_column_order').val();
		var page = $('#allarticle_list_listing .selected').parent().attr("id");

		$('#update_article_list_table').find("tr.classnot").each(function(index){
			$('#allarticle_list_listing .selected').parent().addClass('withOpacity');
		});

		var pagination_numbers = $('#allarticle_list_listing').html();
		//$('#allarticle_list_listing').html('<span class="float_right">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');

		$.ajax({
			  type:'POST',
			  data:$('#search_article_form').serialize(),
			  url:'/backend.php/borst/getSearchArticleList?column_id='+column_id+"&page="+page+"&search_article_column_order="+current_column_order,
			  success:function(data)
			  {
			  	$("#search_articlelist_outer").html(data);
				var order = $('#search_article_column_order').val();
				setUpdateArticleListOrderImage('sortby_'+column_id,order);
			  }
		});
}

function bindOrderCount(){
    $("#order_count_order_count").bind('change',function(){
           $.ajax({
                url:'saveOrderCount',
                data:$('#order_count_frm').serialize(),
                success:function(data){

                },
                complete:function(data){
                    var fn = window[$("#execute_fun_name").val()];
                    if(typeof fn === 'function') {
                        fn();
                    }
                }
            });
        });
}
$(document).ajaxSend(function() {
  $('.loader_view').removeClass('hide_div');
  $('.loader').removeClass('hide_div');
  $('#loader_val').val(parseInt($('#loader_val').val())+1);
});
//or...
$(document).ajaxSuccess(function() {
    $('#loader_val').val(parseInt($('#loader_val').val())-1);
    if(parseInt($('#loader_val').val())==0){
        $('.loader_view').addClass('hide_div');
        $('.loader').addClass('hide_div');
    }
  
});

/*---------All functionality of Subscription search,sort,update,listing,pagination,filtering and there validation---------------------------*/
 
  function onchangeArticletype()
  {
     $('#subscription_type').unbind('change');
	 $('#subscription_type').bind("change",function(){   
		var column_id = $(this).attr("id");
        var selected_subscription_type = $("#subscription_type").val();	        
        var selected_coupon_code = $("#coupon_code").val();
		$('#subscriber_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
            
		});
        var ajaxrequest = $("#search_subscriptionlist_form").serialize();
		$.ajax({
			  url:'/backend.php/borst/getSubscriptionListData?column_id='+column_id+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
              +'&action_type=sort'+'&ordertype=desc'+'&coupon_code='+selected_coupon_code,
			  success:function(data)
			  {
			  	$("#subscription_outer").html(data);
                var order = $('#subscription_list_column_order').val();
				setSubscriptionListOrderImage(column_id,order);
                onchangeArticletype();
			  }
		});
	});
  }
  
  
function onchangeCoupontype()
  {
     $('#subscription_type').unbind('change');
	 $('#subscription_type').bind("change",function(){   
		var column_id = $(this).attr("id");
        var selected_subscription_type = $("#subscription_type").val();	
		$('#subscriber_list_table').find("tr.classnot").each(function(index){
			$(this).addClass('withOpacity');
            
		});
        var ajaxrequest = $("#search_subscriptionlist_form").serialize();
		$.ajax({
			  url:'/backend.php/borst/getCouponListData?column_id='+column_id+'&subscription_type='+selected_subscription_type+'&'+ajaxrequest
              +'&action_type=sort'+'&ordertype=desc',
			  success:function(data)
			  {
			  	$("#subscription_outer").html(data);
                var order = $('#subscription_list_column_order').val();
				setSubscriptionListOrderImage(column_id,order);
                onchangeCoupontype();
			  }
		});
	});
  }
/*---------End of All functionality of Subscription search,sort,update,listing,pagination,filtering and there validation---------------------------*/  


	/* Used while sending BT-SHOP reminder subscription . */
	$('#send_remindersubscription_button').unbind('click');
        $('#send_remindersubscription_button').live("click",function(){ 
            type_flag = 0;
            if($('#reminder_subscription_nof_days').val() == '')
            {
                $('#no_days_email_error').html('Required');
                type_flag = 1;
            }
            if($('#reminder_subscription_subject').val() == '')
            {
                $('#email_subject_error').html('Required');
                type_flag = 1;
            }
            if($('#reminder_subscription_email_contain').val() == '')
            {
                $('#mailer_text_error').html('Required');
                type_flag = 1;
            }            
            
            if($('#reminder_subscription_subscription_type').val() == '')
            {
                $('#subscription_type_email_error').html('Type Not Selected');
                type_flag = 1;
            }
            else if($('#reminder_subscription_nof_days').val() == '')
            {
                $('#subscription_type_email_error').html('');
                $('#no_days_email_error').html('Required');
                type_flag = 1;
            }
            else if(isNaN($('#reminder_subscription_nof_days').val()))
            {
                    $('#subscription_type_email_error').html('');
                    $('#no_days_email_error').html('');                    
                    $('#no_days_email_error').html('Please enter days in number');
                    type_flag = 1;
            }               
            else if($('#reminder_subscription_subject').val() == '')
            {
                $('#no_days_email_error').html('');
                $('#email_subject_error').html('Required');
                type_flag = 1;
            }
            else if($('#reminder_subscription_email_contain').val() == '')
            {
                $('#email_subject_error').html('');
                $('#mailer_text_error').html('Required');
                type_flag = 1;
            }
            else
            {
                $('#subscription_type_email_error').html('');
                $('#no_days_email_error').html('');
                $('#email_subject_error').html('');
                $('#mailer_text_error').html('');
                type_flag = 0;
            }
            
            //alert(type_flag);
            if(type_flag == 0)
            {
                    open_confirmation('Are you sure about set reminder subscription?', '', 'sendremindersubscription_confirm_box', 'sendremindersubscription_msg');
            }
            
        });
        
    function checkrecordoraction()
    {
        var t=$(".sf_admin_batch_checkbox:checked");
        //alert('hi '+t.length);
        if(t.length <= 0)
        {
            alert('Please Select Record');
            return false;
        }
        else
        {
           var optionval = $('select[name="batch_action"] option:selected').val();
            //alert(optionval);
            if(optionval =='batchDelete')
            {
                var answer = confirm("Are you sure?")
                if (answer){
                    $('#sf_admin_content').find("form").submit();
                    //$('#sf_admin_content').find("form").hide();
                }
            }
            else
            {
                alert('Choose an action');
            }        
        }
    }
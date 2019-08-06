<div class="maincontentpage">
    <div class="forumlistingleftdiv">
        <div class="float_left width_640">
            
            <form action="newsletterManager" method="POST">
              
                <input type="hidden" name="ads[]" value="">
                <input type="hidden" name="ads[]" value="">
                 <input type="hidden" name="blog" value="">
                <input type="Submit" class="registerbuttontext new_btn new_news" value="New" style="width: 50px;">
            </form>
           
        </div>
        <div class="forumlistingleftdivinner">
            <div id="showpurchaselist_outer" class="forumlistingleftdivinner font_11">
                <div class="shoph3 widthall">NewsLetter List</div>
                <div class="float_left listing_spacing">
                    <div class="float_left width_1020" id="newsletter_page">
                        <?php print include_partial('newsletter_list_block',array('pager'=>$pager))?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="news_letter_delete_confirm"></div>
</div>
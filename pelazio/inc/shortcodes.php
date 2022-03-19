<?php
global $has_error;
const MSG_STATUS_PENDING = 0;
add_shortcode('contact_us', 'contact_form_callback');
function contact_form_callback()
{
    return '
<section id="analysis">
    <form action="" method="post">
        <div class="contact-us">
        <div>
            <label for="topic">موضوع</label>
            <input class="form-control" name="topic" id="topic" type="text" placeholder="موضوع" required>
        </div>
        <div>
            <label for="contactname">نام و نام خانوادگی</label>
            <input class="form-control" name="contactname" id="contactname" type="text" placeholder="نام و نام خانوادگی" required>
        </div>
        <div>
             <label for="contactcontent">پیام</label>
            <textarea class="form-control" name="contactcontent" id="contactcontent" rows="5" placeholder="پیام" required></textarea>
        </div>
        <div>
            <label for="contactemail">ادرس ایمیل</label>
            <input class="form-control" name="contactemail" id="contactemail" type="email" placeholder="ادرس ایمیل" required>
        </div>
        <div>
			<input type="button" value="ارسال" id="contact_btn" name="contact_btn" tabindex="4"
			  class="contact-us__button"/>
        </div>
       </div>
    </form>
</section>
 ';
}
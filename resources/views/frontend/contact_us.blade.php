@include('layouts.front_header')
<div class="bodySec contactSec">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="whatWeDoTxt">
                        <h2><span>send us a note</span></h2>
                        <div class="contactForm">
                            <form class="AnimationForm">
                                <div class="field" data-aos="fade-up" data-aos-delay="100">
                                    <input type="text" name="">
                                    <fieldset>First Name <span>*</span></fieldset>
                                </div>

                                <div class="field"  data-aos="fade-up" data-aos-delay="200">
                                    <input type="text" name="">
                                    <fieldset>Last Name <span>*</span></fieldset>
                                </div>

                                <div class="field"  data-aos="fade-up" data-aos-delay="250">
                                    <input type="email" name="">
                                    <fieldset>Email Address<span>*</span></fieldset>
                                </div>


                                <div class="field"  data-aos="fade-up" data-aos-delay="300">
                                    <input type="text" name="">
                                    <fieldset>Phone Number</fieldset>
                                </div>

                                <div class="field textarea" data-aos="fade-up" data-aos-delay="400">
                                    <textarea></textarea>
                                    <fieldset>Your Message </fieldset>
                                </div>
                                <div class="field">
                                    <input type="submit" value="Send Message" name="">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="contactInfo">
                        <h6>DeepTrading.ai</h6>
                        <ul>
                            <li><span>Call Us:</span><a href="tel:+7324230343">732-423-0343</a></li>
                            <li><span>Email:</span><a href="mailto://info@deeptrading.ai">info@deeptrading.ai</a></li>
                        </ul>
                    </div>
                    <div class="locationMap">
                        <img src="deeptrading_frontend/assets/images/map-location.png">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @include('layouts.front_footer')


<script src="deeptrading_frontend/assets/js/main.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    if($('input[type="text"], textarea, select').val().length > 0 ){
                $('fieldset').addClass('active');
            }
        $('.field input, .field textarea, .field select').blur(function()
        {
            if($(this).val() != ''){
            $(this).closest('.field').find('fieldset').addClass('active');
        } else {
        
             $(this).closest('.field').find('fieldset').removeClass('active');
        }
        
    });
    $('.field input, .field textarea, .field select').focusin(function()
        {
            $(this).closest('.field').find('fieldset').addClass('active');
    });

});
</script>


</body>
</html>
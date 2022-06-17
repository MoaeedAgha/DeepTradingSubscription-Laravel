@include('layouts.front_header')
    <style>
			.invalid-feedback , .invalid-feedback-email{
				display: block !important;
				font-size: 100% !important;
    			color: #c1310c !important;
			}
        </style>

<div class="bodySec storySec">
        <div class="container">
        	<div class="row">
        		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <form method="POST" class="registration-form AnimationForm">
        				<figcaption>
		        			<div class="signUpTabs">
		        				<h2 class="text-left"><span>Sign Up</span></h2>
			        			<ul>
			        				<li class="active">personal</li>
			        				<li>address</li>
			        				<li>sign up</li>
			        			</ul>
			        			<div class="row">
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        @csrf
			        					<div class="field" data-aos="fade-up">
                                            <input id="FirstName" type="text"
                                                class="required" required
                                                name="FirstName" value=""
												>
		                                    <fieldset>First Name <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="MiddleName" type="text"
                                                class=""
                                                name="MiddleName" value=""
                                                >
                                            
		                                    <fieldset>Middle Name</fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="LastName" type="text"
                                                class="required"
                                                name="LastName" value=""
                                                >
                                            
		                                    <fieldset>Last Name <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="Company" type="text"
                                                    value=""
                                                    class="required"
                                                    name="Company" 
                                            >

                                            
		                                    <fieldset>Company</fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="Title" type="text"
                                                    class="required"
                                                    name="Title" value=""
                                                    >
                                            
		                                    <fieldset>Title</fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input type="Email" class="required" id="exampleInputEmail"
                                                    name="Email"
                                                    value=""
                                                    >
                                        
		                                    <fieldset>Email <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="PhoneNumber" type="text"
                                                    maxlength="12"
                                                    onkeypress="return onlyNum(event)"
                                                    value=""
                                                    class="required"
                                                    name="PhoneNumber"
                                            >

                                        
		                                    <fieldset>Phone</fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        					<div class="field">
                                            <input type="button" class="btn-next" name="" value="Next">
			        					</div>
			        				</div>
			        			</div>
		        			</div>
	        			</figcaption>

	        			<figcaption class="address">
		        			<div class="signUpTabs">
		        				<h2 class="text-left"><span>Sign Up</span></h2>
			        			<ul>
			        				<li>personal</li>
			        				<li class="active">address</li>
			        				<li>sign up</li>
			        			</ul>
			        			<div class="row">
			        				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        					<div class="field" data-aos="fade-up">
                                            <input id="StreetAddress1" type="text"
                                                    value=""
                                                    class="required"
                                                    name="StreetAddress1" 
                                            >

		                                    <fieldset>Street Address <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			        					<div class="field" data-aos="fade-up">
                                            <input id="City" type="text"
                                                    value=""
                                                    class="required"
                                                    name="City"
                                            >

                                        
		                                    <fieldset>City <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			        					<div class="field" data-aos="fade-up">
                                            <input id="State" type="text"
                                                    value=""
                                                    class="required"
                                                    name="State"
                                            >

                                            
		                                    <fieldset>State/Province <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			        					<div class="field" data-aos="fade-up">
                                            <input id="ZipCode" type="text"
                                                    value=""
                                                    class="required"
                                                    name="ZipCode"
                                            >

                                    
		                                    <fieldset>Postal/Zip Code <span>*</span></fieldset>
		                                </div>
			        				</div>
			        				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			        					<div class="field" data-aos="fade-up">
		                                    <select name="Country" id="Country" class="required">
		                                    	<option value=""></option>
								            	<option value="Afghanistan">Afghanistan</option>
								            	<option value="Åland Islands">Åland Islands</option>
								            	<option value="Albania">Albania</option>
								            	<option value="Algeria">Algeria</option>
								            	<option value="American Samoa">American Samoa</option>
								            	<option value="Andorra">Andorra</option>
								            	<option value="Angola">Angola</option>
								            	<option value="Anguilla">Anguilla</option>
								            	<option value="Antarctica">Antarctica</option>
								            	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								            	<option value="Argentina">Argentina</option>
								            	<option value="Armenia">Armenia</option>
								            	<option value="Aruba">Aruba</option>
								            	<option value="Australia">Australia</option>
								            	<option value="Austria">Austria</option>
								            	<option value="Azerbaijan">Azerbaijan</option>
								            	<option value="Bahamas">Bahamas</option>
								            	<option value="Bahrain">Bahrain</option>
								            	<option value="Bangladesh">Bangladesh</option>
								            	<option value="Barbados">Barbados</option>
								            	<option value="Belarus">Belarus</option>
								            	<option value="Belgium">Belgium</option>
								            	<option value="Belize">Belize</option>
								            	<option value="Benin">Benin</option>
								            	<option value="Bermuda">Bermuda</option>
								            	<option value="Bhutan">Bhutan</option>
								            	<option value="Bolivia">Bolivia</option>
								            	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								            	<option value="Botswana">Botswana</option>
								            	<option value="Bouvet Island">Bouvet Island</option>
								            	<option value="Brazil">Brazil</option>
								            	<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								            	<option value="Brunei Darussalam">Brunei Darussalam</option>
								            	<option value="Bulgaria">Bulgaria</option>
								            	<option value="Burkina Faso">Burkina Faso</option>
								            	<option value="Burundi">Burundi</option>
								            	<option value="Cambodia">Cambodia</option>
								            	<option value="Cameroon">Cameroon</option>
								            	<option value="Canada">Canada</option>
								            	<option value="Cape Verde">Cape Verde</option>
								            	<option value="Cayman Islands">Cayman Islands</option>
								            	<option value="Central African Republic">Central African Republic</option>
								            	<option value="Chad">Chad</option>
								            	<option value="Chile">Chile</option>
								            	<option value="China">China</option>
								            	<option value="Christmas Island">Christmas Island</option>
								            	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								            	<option value="Colombia">Colombia</option>
								            	<option value="Comoros">Comoros</option>
								            	<option value="Congo">Congo</option>
								            	<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
								            	<option value="Cook Islands">Cook Islands</option>
								            	<option value="Costa Rica">Costa Rica</option>
								            	<option value="Cote D'ivoire">Cote D'ivoire</option>
								            	<option value="Croatia">Croatia</option>
								            	<option value="Cuba">Cuba</option>
								            	<option value="Cyprus">Cyprus</option>
								            	<option value="Czech Republic">Czech Republic</option>
								            	<option value="Denmark">Denmark</option>
								            	<option value="Djibouti">Djibouti</option>
								            	<option value="Dominica">Dominica</option>
								            	<option value="Dominican Republic">Dominican Republic</option>
								            	<option value="Ecuador">Ecuador</option>
								            	<option value="Egypt">Egypt</option>
								            	<option value="El Salvador">El Salvador</option>
								            	<option value="Equatorial Guinea">Equatorial Guinea</option>
								            	<option value="Eritrea">Eritrea</option>
								            	<option value="Estonia">Estonia</option>
								            	<option value="Ethiopia">Ethiopia</option>
								            	<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								            	<option value="Faroe Islands">Faroe Islands</option>
								            	<option value="Fiji">Fiji</option>
								            	<option value="Finland">Finland</option>
								            	<option value="France">France</option>
								            	<option value="French Guiana">French Guiana</option>
								            	<option value="French Polynesia">French Polynesia</option>
								            	<option value="French Southern Territories">French Southern Territories</option>
								            	<option value="Gabon">Gabon</option>
								            	<option value="Gambia">Gambia</option>
								            	<option value="Georgia">Georgia</option>
								            	<option value="Germany">Germany</option>
								            	<option value="Ghana">Ghana</option>
								            	<option value="Gibraltar">Gibraltar</option>
								            	<option value="Greece">Greece</option>
								            	<option value="Greenland">Greenland</option>
								            	<option value="Grenada">Grenada</option>
								            	<option value="Guadeloupe">Guadeloupe</option>
								            	<option value="Guam">Guam</option>
								            	<option value="Guatemala">Guatemala</option>
								            	<option value="Guernsey">Guernsey</option>
								            	<option value="Guinea">Guinea</option>
								            	<option value="Guinea-bissau">Guinea-bissau</option>
								            	<option value="Guyana">Guyana</option>
								            	<option value="Haiti">Haiti</option>
								            	<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
								            	<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								            	<option value="Honduras">Honduras</option>
								            	<option value="Hong Kong">Hong Kong</option>
								            	<option value="Hungary">Hungary</option>
								            	<option value="Iceland">Iceland</option>
								            	<option value="India">India</option>
								            	<option value="Indonesia">Indonesia</option>
								            	<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
								            	<option value="Iraq">Iraq</option>
								            	<option value="Ireland">Ireland</option>
								            	<option value="Isle of Man">Isle of Man</option>
								            	<option value="Israel">Israel</option>
								            	<option value="Italy">Italy</option>
								            	<option value="Jamaica">Jamaica</option>
								            	<option value="Japan">Japan</option>
								            	<option value="Jersey">Jersey</option>
								            	<option value="Jordan">Jordan</option>
								            	<option value="Kazakhstan">Kazakhstan</option>
								            	<option value="Kenya">Kenya</option>
								            	<option value="Kiribati">Kiribati</option>
								            	<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								            	<option value="Korea, Republic of">Korea, Republic of</option>
								            	<option value="Kuwait">Kuwait</option>
								            	<option value="Kyrgyzstan">Kyrgyzstan</option>
								            	<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								            	<option value="Latvia">Latvia</option>
								            	<option value="Lebanon">Lebanon</option>
								            	<option value="Lesotho">Lesotho</option>
								            	<option value="Liberia">Liberia</option>
								            	<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								            	<option value="Liechtenstein">Liechtenstein</option>
								            	<option value="Lithuania">Lithuania</option>
								            	<option value="Luxembourg">Luxembourg</option>
								            	<option value="Macao">Macao</option>
								            	<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								            	<option value="Madagascar">Madagascar</option>
								            	<option value="Malawi">Malawi</option>
								            	<option value="Malaysia">Malaysia</option>
								            	<option value="Maldives">Maldives</option>
								            	<option value="Mali">Mali</option>
								            	<option value="Malta">Malta</option>
								            	<option value="Marshall Islands">Marshall Islands</option>
								            	<option value="Martinique">Martinique</option>
								            	<option value="Mauritania">Mauritania</option>
								            	<option value="Mauritius">Mauritius</option>
								            	<option value="Mayotte">Mayotte</option>
								            	<option value="Mexico">Mexico</option>
								            	<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								            	<option value="Moldova, Republic of">Moldova, Republic of</option>
								            	<option value="Monaco">Monaco</option>
								            	<option value="Mongolia">Mongolia</option>
								            	<option value="Montenegro">Montenegro</option>
								            	<option value="Montserrat">Montserrat</option>
								            	<option value="Morocco">Morocco</option>
								            	<option value="Mozambique">Mozambique</option>
								            	<option value="Myanmar">Myanmar</option>
								            	<option value="Namibia">Namibia</option>
								            	<option value="Nauru">Nauru</option>
								            	<option value="Nepal">Nepal</option>
								            	<option value="Netherlands">Netherlands</option>
								            	<option value="Netherlands Antilles">Netherlands Antilles</option>
								            	<option value="New Caledonia">New Caledonia</option>
								            	<option value="New Zealand">New Zealand</option>
								            	<option value="Nicaragua">Nicaragua</option>
								            	<option value="Niger">Niger</option>
								            	<option value="Nigeria">Nigeria</option>
								            	<option value="Niue">Niue</option>
								            	<option value="Norfolk Island">Norfolk Island</option>
								            	<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								            	<option value="Norway">Norway</option>
								            	<option value="Oman">Oman</option>
								            	<option value="Pakistan">Pakistan</option>
								            	<option value="Palau">Palau</option>
								            	<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
								            	<option value="Panama">Panama</option>
								            	<option value="Papua New Guinea">Papua New Guinea</option>
								            	<option value="Paraguay">Paraguay</option>
								            	<option value="Peru">Peru</option>
								            	<option value="Philippines">Philippines</option>
								            	<option value="Pitcairn">Pitcairn</option>
								            	<option value="Poland">Poland</option>
								            	<option value="Portugal">Portugal</option>
								            	<option value="Puerto Rico">Puerto Rico</option>
								            	<option value="Qatar">Qatar</option>
								            	<option value="Reunion">Reunion</option>
								            	<option value="Romania">Romania</option>
								            	<option value="Russian Federation">Russian Federation</option>
								            	<option value="Rwanda">Rwanda</option>
								            	<option value="Saint Helena">Saint Helena</option>
								            	<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								            	<option value="Saint Lucia">Saint Lucia</option>
								            	<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								            	<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
								            	<option value="Samoa">Samoa</option>
								            	<option value="San Marino">San Marino</option>
								            	<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								            	<option value="Saudi Arabia">Saudi Arabia</option>
								            	<option value="Senegal">Senegal</option>
								            	<option value="Serbia">Serbia</option>
								            	<option value="Seychelles">Seychelles</option>
								            	<option value="Sierra Leone">Sierra Leone</option>
								            	<option value="Singapore">Singapore</option>
								            	<option value="Slovakia">Slovakia</option>
								            	<option value="Slovenia">Slovenia</option>
								            	<option value="Solomon Islands">Solomon Islands</option>
								            	<option value="Somalia">Somalia</option>
								            	<option value="South Africa">South Africa</option>
								            	<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
								            	<option value="Spain">Spain</option>
								            	<option value="Sri Lanka">Sri Lanka</option>
								            	<option value="Sudan">Sudan</option>
								            	<option value="Suriname">Suriname</option>
								            	<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								            	<option value="Swaziland">Swaziland</option>
								            	<option value="Sweden">Sweden</option>
								            	<option value="Switzerland">Switzerland</option>
								            	<option value="Syrian Arab Republic">Syrian Arab Republic</option>
								            	<option value="Taiwan, Province of China">Taiwan, Province of China</option>
								            	<option value="Tajikistan">Tajikistan</option>
								            	<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								            	<option value="Thailand">Thailand</option>
								            	<option value="Timor-leste">Timor-leste</option>
								            	<option value="Togo">Togo</option>
								            	<option value="Tokelau">Tokelau</option>
								            	<option value="Tonga">Tonga</option>
								            	<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								            	<option value="Tunisia">Tunisia</option>
								            	<option value="Turkey">Turkey</option>
								            	<option value="Turkmenistan">Turkmenistan</option>
								            	<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								            	<option value="Tuvalu">Tuvalu</option>
								            	<option value="Uganda">Uganda</option>
								            	<option value="Ukraine">Ukraine</option>
								            	<option value="United Arab Emirates">United Arab Emirates</option>
								            	<option value="United Kingdom">United Kingdom</option>
								            	<option value="United States">United States</option>
								            	<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								            	<option value="Uruguay">Uruguay</option>
								            	<option value="Uzbekistan">Uzbekistan</option>
								            	<option value="Vanuatu">Vanuatu</option>
								            	<option value="Venezuela">Venezuela</option>
								            	<option value="Viet Nam">Viet Nam</option>
								            	<option value="Virgin Islands, British">Virgin Islands, British</option>
								            	<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
								            	<option value="Wallis and Futuna">Wallis and Futuna</option>
								            	<option value="Western Sahara">Western Sahara</option>
								            	<option value="Yemen">Yemen</option>
								            	<option value="Zambia">Zambia</option>
								            	<option value="Zimbabwe">Zimbabwe</option>
								            </select>
		                                    <fieldset>Country <span>*</span></fieldset>
		                                </div>
			        				</div>

			        				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        					<div class="field textarea aos-init aos-animate" data-aos="fade-up">
                                            <textarea id="Description"
                                                value=""
                                                class=""
                                                name="Description"
                                            >
                                            </textarea>
                                            
		                                    <fieldset>Company Description</fieldset>
		                                </div>
			        				</div>

			        				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        					<div class="field">
                                            <input type="button" class="btn-next" name="" value="Next">
			        						<input type="button" class="btn-previous" name="" value="Prev">
			        						
			        					</div>
			        				</div>
			        			</div>
		        			</div>
	        			</figcaption class="signup">

	        			<figcaption>
		        			<div class="signUpTabs">
		        				<h2 class="text-left"><span>Sign Up</span></h2>
			        			<ul>
			        				<li>personal</li>
			        				<li>address</li>
			        				<li class="active">sign up</li>
			        			</ul>
			        			<div class="row">
			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="UserId" type="text"
                                                    class="required"
                                                    name="UserId" value="" 
                                                    >
                                           
		                                    <fieldset>User ID <span>*</span></fieldset>
		                                </div>
			        				</div>

			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                            <input id="Password" type="password"
                                                    value=""
                                                    class="required"
                                                    name="Password"
                                            >

                                            
		                                    <fieldset>Password <span>*</span></fieldset>
		                                </div>
			        				</div>

			        				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
			        					<div class="field" data-aos="fade-up">
                                        <input id="password-confirm" type="password" class="required" 
                                                name="Password_confirmation"
                                        >
		                                    <fieldset>Conform Password <span>*</span></fieldset>
		                                </div>
			        				</div>

			        				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        					
                                        <label class="customCheck">Subscribe to Mailing List?
											  <input type="checkbox" name="Mailing_list" value="1" />
											  <span class="checkmark"></span>
											</label>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">		
										<div class="field leftSubmit">
											<input type="button" class="btn-previous" name="" value="Prev">
			        						<input type="button" class="btn-next" name="" value="Sign Up">
			        					</div>
			        				</div>


			        			</div>
		        			</div>
	        			</figcaption>


	        			<figcaption>
		        			<div class="signUpTabs">
		        				<h2 class="text-center"><span>Thank You</span></h2>
		        				<div class="row">
		        					<div class="col-12 col-sm-12 col-md-12">
		        						<div class="thanksMsg">
		        							<h6>Thank you for contacting us we will contact you shortly.</h6>
		        						</div>
		        					</div>
		        				</div>
		        			</div>
	        			</figcaption>
        			</form>
        		</div>
        	</div>
            
        </div>
    </div>



<section class="footerSec">
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<div class="copyTxt">
						<p>&copy; 2020  DeepTrading.ai,  All Rights Reserved</p>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="termLinks">
						<a href="javascript:;">Privacy Policy</a>|
						<a href="javascript:;">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>


<script src="{{ asset('css/js/main.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){

$('.registration-form figcaption:first-child').fadeIn('slow');

    $('input.required, select.required').on('focus', function () {
        $(this).removeClass('input-error');
    });

    // next step
    $('.registration-form .btn-next').on('click', function () {
        var parent_figcaption = $(this).parents('figcaption');
        var next_step = true;
		var count = 0;
        parent_figcaption.find('input.required, select.required').each(function () {
            if ($(this).val() == "") {
                $(this).addClass('input-error');
				$("span.invalid-feedback").remove();
				$('<span class="invalid-feedback"><strong>Please fill out this field.</strong></span>').insertAfter('input.input-error');
				next_step = false;
				count = count+1;
            } else {
                $(this).removeClass('input-error');
				$(this).removeClass('invalid-data');
            }
		});
		if(count == 0){
			var email = document.getElementById("exampleInputEmail").value;
			if (!validateEmail(email)) {
				$("span.invalid-feedback-email").remove();
				$("span.invalid-feedback").remove();
				next_step = false;
				var element = document.getElementById("exampleInputEmail");
				element.classList.remove("email-error");
				element.classList.add("email-error");
				$('<span class="invalid-feedback-email"><strong>Please enter valid email address.</strong></span>').insertAfter('input.email-error');
			} 
			else{
				var element = document.getElementById("exampleInputEmail");
				element.classList.remove("email-error");
				$("span.invalid-feedback-email").remove();
			}

			var password_element = document.getElementById("Password");
			password = document.getElementById("Password").value; 
            confirm_password = document.getElementById("password-confirm").value; 
			if(password != confirm_password)
			{
				next_step = false;
				password_element.classList.remove("password-error");
				$("span.invalid-feedback").remove();
				password_element.classList.add("password-error");
				$('<span class="invalid-feedback"><strong>Password and confirm password must be same.</strong></span>').insertAfter('input.password-error'); 
			}
			else{
				$("span.invalid-feedback").remove();
			}
			var user_id_element = document.getElementById("UserId");
			user_id = document.getElementById("UserId").value; 

			if(user_id){
				next_step = false;
				$.ajax({
					type: 'get',
					dataType: 'json',
					url: 'getUserId/'+user_id,
					success: function (response) {
						var len = 0;
						console.log(response);
						if(response.length != 0){
							if(response[0].UserId != null){
								user_id_element.classList.add("UserId-error");
								$('<span class="invalid-feedback"><strong>UserId already taken.</strong></span>').insertAfter('input.UserId-error'); 
							}
						}
						else{
							user_id_element.classList.remove('UserId-error');
							$("form").submit();
						}
					}
				});
			}
			
		}

        if (next_step) {
            parent_figcaption.fadeOut(400, function () {
                $(this).next().fadeIn();
            });
        }

	});

	function validateEmail(email) {
		const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}

    // previous step
    $('.registration-form .btn-previous').on('click', function () {
		$( "#UserId" ).val('');
        $(this).parents('figcaption').fadeOut(400, function () {
            $(this).prev().fadeIn();
        });
    });

    // submit
    $('.registration-form').on('submit', function (e) {
		var count = 0;
        $(this).find('input.required, select.required').each(function () {
			if ($(this).val() == "") {
                e.preventDefault();
				$(this).addClass('input-error');
				count = count +1;
			}
			else {
                $(this).removeClass('input-error');
            }
			
		});
		if(count == 0)
		{
			var password_element = document.getElementById("Password");
			password = document.getElementById("Password").value; 
            confirm_password = document.getElementById("password-confirm").value; 
			var user_id_element = document.getElementById("UserId");
			user_id = document.getElementById("UserId").value; 
			if(password != confirm_password)
			{
				e.preventDefault();
            }
			else if(user_id){
				if($( "#UserId" ).hasClass( "UserId-error" )){
					e.preventDefault();
				}	
				else {
					password_element.classList.remove("password-error");
					$("span.invalid-feedback").remove();
					$(this).removeClass('input-error');
					$.ajax({
						type: 'post',
						data: {
							'_token': '{{csrf_token()}}'
						},
						url: '{{ route('register') }}',
						success: function (response) {
							if (response.status == 200) {
								
							} else {
								swal('Error', response.message, 'error');
							}
						}
					});
				
				}
			}

		}


	});
	
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



function onlyNum(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
}

</script>

</body>
</html>
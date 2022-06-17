@include('layouts.front_header')
<div class="bodySec storySec">
        <div class="container">
        	<h2 class="text-left"><span>pricing plan</span></h2>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                	<div class="priceBox">
                		<div class="pricingHeadSec">
                			<h2><span>Basic</span></h2>
                			<p>Save 10% with Yearly Subscription</p>
                		</div>
                		<div class="pricePermon">
                			<ul>
                				<li>
                					<h6>$299</h6>
                					<p>per month</p>
                				</li>
                				<li>
                					<i>OR</i>
                				</li>
                				<li>
                					<h6>$3229</h6>
                                    			<p>Per Year</p>
                				</li>
                			</ul>
                		</div>

                		<div class="priceBoxList">
                			<ul>
                				<li>Choice of two stocks per month from a pre-selected list of stocks</li>
                				<li>$199 extra per month for each additional stock</li>
                				<li>Weekly model training</li>
                				<li>Advanced Deep Learning models</li>
                			</ul>
                			<a href="{{route('subscribe' , ['basic_monthly_plan'=>1]) }}">Subscribe Monthly</a>
							<a href="{{route('subscribe' , ['basic_yearly_plan'=>2]) }}">Subscribe Yearly</a> 
                		</div>
                		
                	</div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                	<div class="priceBox">
                		<div class="pricingHeadSec">
                			<h2><span>Advanced</span></h2>
                			<p>Save 10% with Yearly Subscription</p>
                		</div>
                		<div class="pricePermon">
                			<ul>
                				<li>
                					<h6>$499</h6>
                					<p>per month</p>
                				</li>
                				<li>
                					<i>OR</i>
                				</li>
                				<li>
                					<h6>$5389</h6>
                					<p>Per Year</p>
                				</li>
                			</ul>
                		</div>

                		<div class="priceBoxList">
                			<ul>
                				<li>Choice of two stocks per month from the list of all stocks traded in popular exchanges </li>
                				<li>$299 extra per month for each additional stock</li>
                				<li>$299 extra per month for each additional stock</li>
                				<li>Advanced Deep Learning models with additional advanced features</li>
                			</ul>
                			<a href="{{route('subscribe' , ['advance_monthly_plan'=>3]) }}">Subscribe Monthly</a>
							<a href="{{route('subscribe' , ['advance_yearly_plan'=>4]) }}">Subscribe Yearly</a> 
                		</div>
                		
                	</div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                	<div class="entPriceBg">
                		<h2><span>enterprise</span></h2>
                		<ul>
                			<li>Custom time series data for training</li>
                			<li>Custom model adjustments for specific user needs</li>
                			<li>Advanced Deep Learning models</li>
                			<li>Web service API access to our models</li>
                		</ul>
                	</div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                	<div class="moreInfo">
                		<p>For more details contact us at <a href="mailto://info@deeptrading.ai">info@deeptrading.ai</a></p>
                	</div>
                </div>
            </div>
        </div>
    </div>
	@include('layouts.front_footer')


<script src="deeptrading_frontend/assets/js/main.js"></script>


</body>
</html>

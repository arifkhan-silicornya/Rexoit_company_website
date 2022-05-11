@php $inner_page_navbar = get_static_option('site_header_type') ? get_static_option('site_header_type') : 'navbar'; @endphp
@include('frontend.partials.'.$inner_page_navbar)
<div id="rfp">
    <div class="container-fluid mb-5 ">
      <div class="row pt-5 mb-5 mx-auto">
        <div class="col-md-5 offset-md-2 mr-5">
          <form id="regForm" method="post" enctype="multipart/form-data" action="">
          @csrf
            
                <!--@if(isset($_REQUEST['msg']))-->
                <!--    <div class="tab">-->
                <!--      <h4 class="text-center text-success">{{ $_REQUEST['msg'] }}</h4>-->
                <!--    </div>-->
                <!--@endif-->
            
            <div class="tab">
              <h2 class="text-center">Request For Proposal</h2>
            </div>
            
            <h2 class="text-center text-uppercase">Project Info </h2>

            <label>Project Name<pre class="text-danger">*</pre>:</label>
            <div class="tab2">
                <input class="rounded" type="text" placeholder="Project Name..." required name="project_name" onkeyup="countDownData();" />
            </div>

            <label for="project_start_date">Project Estimate Starting Date<pre class="text-danger">*</pre>:</label>
            <div class="tab2">
              <input class="rounded" type="date" placeholder="Project Starting Date..." required name="project_start_date" onchange="countDownData();">
            </div>
            
            <label for="project_end_date">Project Estimate Ending Date :</label>
            <div class="tab2">
              <input class="rounded" type="date" placeholder="Project Ending Date..." name="project_end_date" onchange="countDownData();">
            </div>
            
            <label>Approximate Project Budget ( $ ) :</label>
            <div class="tab2">
              <input type="number" placeholder="Proximate Project Budget... Ex: 5000" name="budget" onkeyup="countDownData();">
            </div>


            <label>Project Duration( Working Days ) :</label>
            <div class="tab2">
              <input type="text" placeholder="Project Duration...Ex: 2 months 15days" name="project_duration" onkeyup="countDownData();">
            </div>
            

            <label>Let us know about your company  :</label>
            <div class="tab2 px-3 pt-3">
              <textarea name="about_client_company" class="w-100 h-100 m-0" rows="6" cols="66" placeholder="Example: Rexoit is one of the leading software companies in Bangladesh. Rexoit was established in 2017 to steer customers through the next generation of business innovation powered by technology with state-of-the-art software development and IT services. We provide a wide variety of Software Development & information technology services, including ERP system ..." onkeyup="countDownData();"></textarea>
            </div>

            <label>Project Executive Summary  :</label>
            <div class="tab2 px-3 pt-3">
              <textarea name="project_executive_summary" class="w-100 h-100 m-0" rows="4" cols="66" placeholder="Example: We want to develop our Company website & Mobile app, here we want a Customer mobile app, a Delivery mobile app, and Vendor mobile app. All Mobile Apps are included (Android & iOS) operating system  ..." onkeyup="countDownData();"></textarea>
            </div>

         
            <label>I want to make application for my Client<pre class="text-danger">*</pre> :</label>
            <div class="tab2 p-3" >
              <label class="w-100 " >
                <input name="webClient" id="WebClient" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="WebClient" class="checkbox">Web application</span>
              </label>
              <label class="w-100 ">
                <input name="androidClient" id="androidClient" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="androidClient" class="checkbox">Android application</span>
              </label>
              <label class="w-100 ">
                <input name="iosClient" id="seq1" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="iosClient" class="checkbox">iOS application</span>
              </label>
              <label class="w-100 ">
                <input name="desktopClient" id="desktopClient" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="desktopClient" class="checkbox">Desktop application</span>
              </label>
            </div>
            
            <label>I want to make application for Admin / Moderator<pre class="text-danger">*</pre> :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="webAdmin" id="webAdmin" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="webAdmin" class="checkbox">Web application</span>
              </label>
              <label class="w-100 ">
                <input name="androidAdmin" id="androidAdmin" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="androidAdmin" class="checkbox">Android application</span>
              </label>
              <label class="w-100 ">
                <input name="iosAdmin" id="iosAdmin" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="iosAdmin" class="checkbox">iOS application</span>
              </label>
              <label class="w-100 ">
                <input name="desktopAdmin" id="desktopAdmin" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="desktopAdmin" class="checkbox">Desktop application</span>
              </label>
            </div>
            
            <label>I want to make application for Vendor :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="webVendor" id="webvendor" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="webvendor" class="checkbox">Web application</span>
              </label>
              <label class="w-100 ">
                <input name="androidVendor" id="androidvendor" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="androidvendor" class="checkbox">Android application</span>
              </label>
              <label class="w-100 ">
                <input name="iosVendor" id="iosvendor" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="iosvendor" class="checkbox">iOS application</span>
              </label>
              <label class="w-100 ">
                <input name="desktopVendor" id="desktopvendor" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="desktopvendor" class="checkbox">Desktop application</span>
              </label>
            </div>
            <!--
            <label>Vendor Type :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="vendorType" id="singlevendor" type="radio" value="singlevendor"  onclick="countDownData();"/>
                <span for="singlevendor" class="radius">Single Vendor</span>
              </label>
              <label class="w-100 ">
                <input name="vendorType" id="multiplevendor" type="radio" value="multiplevendor"  onclick="countDownData();"/>
                <span for="multiplevendor" class="radius">Multiple Vendor</span>
              </label>
            </div>
            -->

            <label>Human Language :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="englishLang" id="englishLang" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="englishLang" class="checkbox">English</span>
              </label>
              <label class="w-100 ">
                <input name="banglaLang" id="banglaLang" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="banglaLang" class="checkbox">Bangla</span>
              </label>
              <label class="w-100 ">
                <input name="hindiLang" id="hindiLang" type="checkbox" value="1"  onclick="countDownData();"/>
                <span for="hindiLang" class="checkbox">Hindi</span>
              </label>
              <div class="w-100 ">
                <label for="otherHUmanLanguage">Others</label>
                <input name="humanLanguage" id="otherHUmanLanguage" class="othHumLang" type="text" value=""  placeholder="Russian,Spanish, Chinese," onkeyup="countDownData();"/>
              </div>
            </div>
         
            <label>Do You Have Domain<pre class="text-danger">*</pre> :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="domain" id="domainyes" type="radio" value="1"  onclick="countDownData();"/>
                <span for="domainyes" class="radius">Yes</span>
              </label>
              <label class="w-100 ">
                <input name="domain" id="domainno" type="radio" value="0"  onclick="countDownData();"/>
                <span for="domainno" class="radius">No</span>
              </label>
            </div>
            <label>Do You Have Hosting<pre class="text-danger">*</pre> :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="hosting" id="hostingyes" type="radio" value="1"  onclick="countDownData();"/>
                <span for="hostingyes" class="radius">Yes</span>
              </label>
              <label class="w-100 ">
                <input name="hosting" id="hostingno" type="radio" value="0"  onclick="countDownData();"/>
                <span for="hostingno" class="radius">No</span>
              </label>
            </div>

            <h2 class="text-center text-uppercase my-5">General Features </h2>    
            
            <label>Choose Features :</label>
            <div class="tab2 p-3">
              <label class="w-100 ">
                <input name="reg_login" id="reg_login" type="checkbox" value="1" onclick="countDownData();" />
                <span for="reg_login" class="checkbox">Registraion / Login </span>
              </label>
              <label class="w-100 ">
                <input name="emailVerification" id="emailVerification" type="checkbox" value="1" onclick="countDownData();"/>
                <span for="emailVerification" class="checkbox">Email Verification</span>
              </label>
              <label class="w-100 ">
                <input name="phoneVerification" id="phoneVerification" type="checkbox" value="1" onclick="countDownData();" />
                <span for="phoneVerification" class="checkbox">Phone Number Verification</span>
              </label>
              <label class="w-100 ">
                <input name="thirdPartyLogin" id="thirdPartyLogin" type="checkbox" value="1" onclick="countDownData();" />
                <span for="thirdPartyLogin" class="checkbox">Third-Party API Login System (Google, Facebook, etc)</span>
              </label>
              <label class="w-100 ">
                <input name="searchOption" id="searchOption" type="checkbox" value="1" onclick="countDownData();"/>
                <span for="searchOption" class="checkbox">Search Option</span>
              </label>
              <label class="w-100 ">
                <input name="addTocart" id="addTocart" type="checkbox" value="1" onclick="countDownData();"/>
                <span for="addTocart" class="checkbox">Add To Cart</span>
              </label>

              <label class="w-100 " >
                <input name="liveChat" id="liveChat" type="checkbox" value="1" onclick="showChatType();"/>
                <span for="liveChat" class="checkbox">Live Chat</span>
              </label>
              <p id="chatType" style="display:none" class="bg_danger_cus p-1">
                <label>Chat Type</label>
                <label class="w-100 " onclick="show">
                  <input name="msngrchat" id="msngrchat" type="checkbox" value="1"  onclick="countDownData();" />
                  <span for="msngrchat" class="checkbox">Messanger Chat</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="Whatsappchat" id="Whatsappchat" type="checkbox" value="2"  onclick="countDownData();" />
                  <span for="Whatsappchat" class="checkbox">Whatsapp Chat</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="thirdpartychat" id="thirdpartychat" type="checkbox" value="1"  onclick="countDownData();" />
                  <span for="thirdpartychat" class="checkbox">Third party Chat System</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="manualchat" id="manualchat" type="checkbox" value="1"  onclick="countDownData();" />
                  <span for="manualchat" class="checkbox">Custom Chat</span>
                </label>
              </p>
              <label class="w-100 " >
                <input onclick="showPaymentOption();" name="paymentSystem" id="paymentSystem" type="checkbox" value="8" onclick="countDownData();" />
                <span  class="checkbox">Payment System</span>
              </label>
              <p id="paymentOption" style="display:none" class="bg_danger_cus p-1">
                <label>Payment Methods</label>
                <label class="w-100 " onclick="show">
                  <input name="mob_banking" id="mob_banking" type="checkbox" value="1" onclick="countDownData();" />
                  <span for="mob_banking" class="checkbox">Mobile Banking (Bkash / Nogad / Others)</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="visa" id="visa" type="checkbox" value="1" onclick="countDownData();" />
                  <span for="visa" class="checkbox">International Payment Method ( Visa )</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="mastercard" id="mastercard" type="checkbox" value="1" onclick="countDownData();" />
                  <span for="mastercard" class="checkbox">International Payment Method ( Mastercard )</span>
                </label>
                <label class="w-100 " onclick="show">
                  <input name="paypal_payoneer" id="paypal_payoneer" type="checkbox" value="1" onclick="countDownData();" />
                  <span for="paypal_payoneer" class="checkbox">International Payment Method ( Paypal / Payoneer )</span>
                </label>
                <input type="text" placeholder="Others" />
              </p>
              <label class="w-100 " >
                <input name="liveOrderTrack" id="liveOrderTrack" type="checkbox" value="1" onclick="countDownData();" />
                <span for="liveOrderTrack" class="checkbox">Live Order Tracking</span>
              </label>
            </div>


            <h2 class="text-center text-uppercase my-5">More Features </h2>    
            
            <label>Write More Features :</label>
            <div class="tab2 p-3">
              <textarea onkeyup="countDownData();" id="more_features" name="more_features" class="w-100 h-100 m-0" rows="4" cols="66" placeholder="Write more features ..." ></textarea>
            </div>

           
            <h2 class="text-center text-uppercase my-5">Programming Language / Technology </h2>    
            
            <label>Choose Languages / Technologies for your new project :</label>
            <div class="tab2 p-3">
              <label class="w-100 " >
                <input name="html" id="html" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="html" class="checkbox">HTML / CSS / Javascript  </span>
              </label>
              <label class="w-100 " >
                <input name="bootstrap" id="bootstrap" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="bootstrap" class="checkbox">Bootstrap ( CSS Framework )</span>
              </label>
              <label class="w-100 " >
                <input name="Reactjs" id="Reactjs" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="Reactjs" class="checkbox">ReactJs</span>
              </label>
              <label class="w-100 " >
                <input name="nodejs" id="nodejs" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="nodejs" class="checkbox">NodeJs</span>
              </label>
              <label class="w-100 " >
                <input name="expressjs" id="expressjs" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="expressjs" class="checkbox">ExpressJs</span>
              </label>
              <label class="w-100 " >
                <input name="java" id="java" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="java" class="checkbox">Java</span>
              </label>
              <label class="w-100 " >
                <input name="python" id="python" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="python" class="checkbox">Python</span>
              </label>
              <label class="w-100 " >
                <input name="django" id="django" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="django" class="checkbox">Django</span>
              </label>
              <label class="w-100 " >
                <input name="flask" id="flask" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="flask" class="checkbox">Flask</span>
              </label>
              <label class="w-100 " >
                <input name="swift" id="swift" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="swift" class="checkbox">Swift</span>
              </label>
              <label class="w-100 " >
                <input name="flutter" id="flutter" type="checkbox" value="1"  onclick="countDownData();" />
                <span for="flutter" class="checkbox">Flutter</span>
              </label>
              <div class="w-100 ">
                <label for="othersTechnologies">Others</label>
                <input name="othersTechnologies" id="othersTechnologies" class="othHumLang" type="text" value=""  placeholder="Go, Kotlin, C#, ..." onkeyup="countDownData();"/>
              </div>
            </div>


            <h2 class="text-center text-uppercase my-5">Demo Link </h2>    
            
            <label>Share Demo Link :</label>
            <div class="tab2 ">
              <input name="demolink" type="url" placeholder="Example : http://www.rexoit.com "  onkeyup="countDownData();" />
            </div>

            
            <h2 class="text-center text-uppercase my-5">Your Company Info </h2>    

            <label>Company Name :</label>
            <div class="tab2 ">
              <input type="text" placeholder="Company Name" name="companyName" onkeyup="countDownData();" />
            </div>
            <label>Contact Person Name<pre class="text-danger">*</pre> :</label>
            <div class="tab2 ">
              <input type="text" placeholder="Contact Person Name" name="ContactPersonName" required onkeyup="countDownData();" />
            </div>
            <label>Contact Person Email <pre class="text-danger">*</pre> :</label>
            <div class="tab2 ">
              <input type="email" placeholder="Contact Person Email" name="ContactPersonEmail" required onkeyup="countDownData();" />
            </div>
            <label>Contact Person Phone Number<pre class="text-danger">*</pre> :</label>
            <div class="tab2 ">
              <input type="text" placeholder="Contact Person Phone Number " name="phoneNumber" required onkeyup="countDownData();" />
            </div>

            <label>Company / Contact Person Address :</label>
            <div class="tab2 pl-2">
              <textarea name="ContactPersonAddress" class="w-100 h-100 m-0" rows="3" cols="66" placeholder="Company Address......." onkeyup="countDownData();" ></textarea>
            </div>

            <label>Upload Document ( pdf, docx, png, jpeg ):</label>
            <div class="tab2 ">
              <input type="file" placeholder="file upload" name="fileforRFP" onchange="countDownData();" />
            </div>
            
          
            <button type="submit" value="submit" class="px-5">Submit</button>
          
          </form>
        </div>
        <div class="col-md-3 d-block " >
          <div class="tab sticky-top" style="">
            <div class="c100 center custom" id="circleColor">
              <span > <span id="outputPercentageValue">0</span> %</span>
              <div class="slice">
                  <div class="bar"></div>
                  <div class="fill"></div>
              </div>
            </div>
            <p class="my-3 text_gray text-center"> Your Completion Percentage</p>
            <div class="text-justify mt-5" style="color:#737373;">
             A request for proposal (RFP) is an open request for bids to complete a new project proposed by the company that issues it.
             An RFP must describe and define the project/software in enough detail to attract viable responses. The prospective company should be able to understand the nature of the business, the requirements of the software, and the goals it wishes to achieve with the project. The project must be defined in enough detail for the software development company to clearly understand its scopes like Technical requirements, project timeframe, budget, and all of the products and services that must be provided to carry it out.
             A well-written RFP conveys the intention behind the proposal and ensures that the result will meet expectations.
             It also ensures an open process.
            </div>
          </div>
        </div>
      </div>

      
  
      
    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          

<script type="text/javascript">
let countValue = 0;

function checkValuePresent(value){
  if(value == ""){
    count = 0;
  }else{
    count = 4;
  }
  return count;
}

function countDownData(){
    
  let project_name = document.querySelector('[name="project_name"]').value;
  let project_start_date = document.querySelector('[name="project_start_date"]').value;
  let project_end_date = document.querySelector('[name="project_end_date"]').value;
  let budget = document.querySelector('[name="budget"]').value;
  let project_duration = document.querySelector('[name="project_duration"]').value;
  let about_client_company = document.querySelector('[name="about_client_company"]').value;
  let project_executive_summary = document.querySelector('[name="project_executive_summary"]').value;
  let more_features = document.querySelector('#more_features').value;
  
  

  let webClient = document.querySelector('[name="webClient"]').checked;
  let androidClient = document.querySelector('[name="androidClient"]').checked;
  let iosClient = document.querySelector('[name="iosClient"]').checked;
  let desktopClient = document.querySelector('[name="desktopClient"]').checked;
  
  
  let demolink = document.querySelector('[name="demolink"]').value;
  let companyName = document.querySelector('[name="companyName"]').value;
  let ContactPersonName = document.querySelector('[name="ContactPersonName"]').value;
  let ContactPersonEmail = document.querySelector('[name="ContactPersonEmail"]').value;
  let phoneNumber = document.querySelector('[name="phoneNumber"]').value;
  let ContactPersonAddress = document.querySelector('[name="ContactPersonAddress"]').value;
  let file = document.querySelector('[name="fileforRFP"]').value;
  
  let webAdmin = document.querySelector('[name="webAdmin"]').checked;
  let androidAdmin = document.querySelector('[name="androidAdmin"]').checked;
  let iosAdmin = document.querySelector('[name="iosAdmin"]').checked;
  let desktopAdmin = document.querySelector('[name="desktopAdmin"]').checked;
  
  let webVendor = document.querySelector('[name="webVendor"]').checked;
  let androidVendor = document.querySelector('[name="androidVendor"]').checked;
  let iosVendor = document.querySelector('[name="iosVendor"]').checked;
  let desktopVendor = document.querySelector('[name="desktopVendor"]').checked;
  
  let englishLang = document.querySelector('#englishLang').checked;
  let banglaLang = document.querySelector('#banglaLang').checked;
  let hindiLang = document.querySelector('#hindiLang').checked;
  let otherHUmanLanguage = document.querySelector('#otherHUmanLanguage').value;
  
  let domainyes = document.querySelector('#domainyes').checked;
  let domainno = document.querySelector('#domainno').checked;
  
  let hostingyes = document.querySelector('#hostingyes').checked; 
  let hostingno = document.querySelector('#hostingno').checked; 
  
  let reg_login = document.querySelector('#reg_login').checked;
  let emailVerification = document.querySelector('#emailVerification').checked;
  let phoneVerification = document.querySelector('#phoneVerification').checked;
  let thirdPartyLogin = document.querySelector('#thirdPartyLogin').checked;
  let searchOption = document.querySelector('#searchOption').checked;
  let addTocart = document.querySelector('#addTocart').checked;
  let liveChat = document.querySelector('#liveChat').checked;
  let paymentSystem = document.querySelector('#paymentSystem').checked;
  let liveOrderTrack = document.querySelector('#liveOrderTrack').checked;
  
  let html = document.querySelector('#html').checked;
  let bootstrap = document.querySelector('#bootstrap').checked;
  let Reactjs = document.querySelector('#Reactjs').checked;
  let nodejs = document.querySelector('#nodejs').checked;
  let expressjs = document.querySelector('#expressjs').checked;
  let java = document.querySelector('#java').checked;
  let python = document.querySelector('#python').checked;
  let django = document.querySelector('#django').checked;
  let flask = document.querySelector('#flask').checked;
  let swift = document.querySelector('#swift').checked;
  let flutter = document.querySelector('#flutter').checked;

  
  if(webClient == true || androidClient == true || iosClient == true || desktopClient == "true"){
    checkValue1 = 5;
  }else{
    checkValue1 = 0;
  }
  

  if(webAdmin == true || androidAdmin == true || iosAdmin == true || desktopAdmin == "true"){
    checkValue2 = 5;
  }else{
    checkValue2 = 0;
  }

  
  if(webVendor == true || androidVendor == true || iosVendor == true || desktopVendor == "true"){
    checkValue3 = 5;
  }else{
    checkValue3 = 0;
  }

  //let singlevendor = document.querySelector('#singlevendor').checked;
  //let multiplevendor = document.querySelector('#multiplevendor').checked;

  if(englishLang == true || banglaLang == true || hindiLang == true || otherHUmanLanguage.length > 0){
    checkValue4 = 5;
  }else{
    checkValue4 = 0;
  }

  if(domainyes == true || domainno == true ){
    checkValue5 = 5;
  }else{
    checkValue5 = 0;
  }

  if(hostingyes == true || hostingno == true ){
    checkValue6 = 5;
  }else{
    checkValue6 = 0;
  }

  if( reg_login == true || emailVerification == true || phoneVerification == true || thirdPartyLogin == true || searchOption == true || addTocart == true || liveChat == true || paymentSystem == true || liveOrderTrack == true )
  {
    checkValue7 = 5;  
  }else{
    checkValue7 = 0;
  }

  if( html == true || bootstrap == true || Reactjs == true || nodejs == true || expressjs == true || java == true || python == true || django == true || flask == true || swift == true || flutter == true)
  {
    checkValue8 = 5;  
  }else{
    checkValue8 = 0;
  }

    let value1 = checkValuePresent(project_name);
    let value2 = checkValuePresent(project_start_date);
    let value3 = checkValuePresent(project_end_date);
    let value4 = checkValuePresent(budget);
    let value5 = checkValuePresent(project_duration);
    let value6 = checkValuePresent(about_client_company);
    let value7 = checkValuePresent(project_executive_summary);
    let value8 = checkValuePresent(more_features);
    let value9 = checkValuePresent(demolink);
    let value10 = checkValuePresent(companyName);
    let value11 = checkValuePresent(ContactPersonName);
    let value12 = checkValuePresent(ContactPersonEmail);
    let value13 = checkValuePresent(phoneNumber);
    let value14 = checkValuePresent(ContactPersonAddress);
    let value15 = checkValuePresent(file);

  
  
  
  let countValue = value1+value2+value3+value4+value5+value6+value7+value8+value9+value10+value11+value12+value13+value14+value15;
  let checkValue = checkValue1+checkValue2+checkValue3+checkValue4+checkValue5+checkValue6+checkValue7+checkValue8;

  let TotalValue= countValue+checkValue;


  document.getElementById("outputPercentageValue").innerHTML = TotalValue;

  let cssClass = 'c100 center custom p'+ TotalValue;
  
  document.getElementById('circleColor').className = cssClass;
  

}

function showChatType() {
  let x = document.getElementById("chatType");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function showPaymentOption() {
  let x = document.getElementById("paymentOption");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}




</script>
</div>
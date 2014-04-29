<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
    div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
    ul.main { width: 95%; list-style-type: square; }
    ul.main li { padding-bottom: 2mm; }
    h1 { text-align: center; font-size: 20mm}
    h3 { text-align: center; font-size: 14mm}
	table .content{width:100%;}
	td .title{font-size: 16pt ; font-weight: normal; color:#000000;height: 35px; width:100%;}
	.value{font-size: 16pt ; font-weight: bold; color:#999999; height:30px;padding-left:10px;}
	td .tw{width:20%;}
	td .three{width:30%;}
	td .sub{padding-left:25px;}
	
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
					http://www.gatewayacademy.com.au/
                </td>
                <td style="width: 34%; text-align: center">
                    page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">
                    &copy;Gateway Training Academy 2008-2014
                </td>
            </tr>
        </table>
    </page_footer>
    <bookmark title="Presentation" level="0" ></bookmark>
    <br><br><br><br><br><br><br><br>
    <h1>CERTIFICATE III GUARANTEE ENROLMENT FORM</h1>
    <br>
    <br><br><br><br><br>
    <div style="text-align: center; width: 100%;">
        <br>
        <img src="<?php echo wpcf7_plugin_url('html2pdf/templates/imgs/logo.png');?>" alt="Logo HTML2PDF" style="width: 150mm">
        <br>
    </div>
    <br><br><br><br><br>
    
</page>
<page pageset="old">
    <bookmark title="Index" level="0" ></bookmark>
    <!-- here will be the automatic index -->
</page>
<page pageset="old">
    <bookmark title="Studen Detail" level="0" ></bookmark>
    <div class="note">
        Student Detail<br>
    </div>
    <br>
    <table class="content">
        <tr>
            <td class="title"><span class="title">1. Student Type </span></td>          
			<td class="value"><i><?php $name = 'student-type'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></td>          
        </tr>
		<?php $courese = '';

		if( isset($post->courese) AND $post->courese){
			$courses = implode(',',unserialize(htmlspecialchars_decode($post->courese)));
		}
		?>
        <tr>
            <td class="title"><div class="title">2. I em enrolling to </div></td>          
			<td class="value"><div class="value"><i><?php echo $courses;?></i></div></td>          
        </tr>
        <tr>
           <td class="title"><div class="title">3. Do you have interenet accesso <br>  <div class="sub">be learn online? </div></div></td>          
			<td class="value"><div class="value"><i><?php $name = 'internet-access';echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
        </tr>
        <tr>
            <td class="title"><div class="title">4. Student Details </div></td>          
			<td class="value"></td>          
        </tr>
      	<tr>
          	<td class="title"><div class="title sub">Gender</div></td>          
			<td class="value"><i><?php echo isset($post->gender) ? $post->gender : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">First Name</div></td>          
			<td class="value"><i><?php echo isset($post->fsname) ? $post->fsname : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Last Name</div></td>          
			<td class="value"><i><?php echo isset($post->lsname) ? $post->lsname : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Date of Birth</div></td>          
			<td class="value"><i><?php echo isset($post->birth) ? $post->birth : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Home Phone</div></td>          
			<td class="value"><i><?php echo isset($post->hphone) ? $post->hphone : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Mobile Phone</div></td>          
			<td class="value"><i><?php echo isset($post->mphone) ? $post->mphone : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Address</div></td>          
			<td class="value"><i><?php echo isset($post->address) ? $post->address : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Suburb</div></td>          
			<td class="value"><i><?php echo isset($post->suburb) ? $post->suburb : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">State</div></td>          
			<td class="value"><i><?php echo isset($post->state) ? $post->state : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Pcode</div></td>          
			<td class="value"><i><?php echo isset($post->pcode) ? $post->pcode : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Email</div></td>          
			<td class="value"><i><?php echo isset($post->email) ? $post->email : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Employer Name</div></td>          
			<td class="value"><i><?php echo isset($post->employername) ? $post->employername : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">Host Employer</div></td>          
			<td class="value"><i><?php echo isset($post->hem) ? $post->hem : '';?></i></td>          
		</tr>
    </table>
</page>
<page pageset="old">
    <bookmark title="Emergency Contact Details" level="0" ></bookmark>
    <div class="note">
        Emergency Contact Details<br>
    </div>
    <br>
    <table class="content">
      	<tr>
          	<td class="title"><div class="title sub">1. Name </div></td>          
			<td class="value"><i><?php echo isset($post->ename) ? $post->ename : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">2. Relationship</div></td>          
			<td class="value"><i><?php echo isset($post->relationship) ? $post->relationship : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">3. Full Address</div></td>          
			<td class="value"><i><?php echo isset($post->eaddress) ? $post->eaddress : '';?></i></td>          
		</tr>
      	<tr>
          	<td class="title"><div class="title sub">4. Phone Number</div></td>          
			<td class="value"><i><?php echo isset($post->ephone) ? $post->ephone : '';?></i></td>          
		</tr>
    </table>
</page>
<page pageset="old">
    <bookmark title="AVETMISS" level="0" ></bookmark>
    <div class="note">
        Australian Vocational Education and Training Management Information Statistical Standart Form
    </div>
    <br>
    <table class="content">
        <tr>
            <td style="width:100%;"><div class="title">1. Is this first time you have enrolled at this entre? </div></td>          
        </tr>
        <tr>
			<td style="width:100%;"><div class="value"><i><?php echo isset($post->firsttime) ? $post->firsttime : '';?></i></div></td>          
        </tr>
        <tr>
            <td style="width:100%;"><div class="title">2. If YES, then state the month & year your study will begin.(i.e July 2010)? </div></td>          
        </tr>
        <tr>
			<td style="width:100%;"><div class="value"><i><?php $name = 'info-begin';echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
        </tr>
        <tr>
            <td style="width:50%;"><div class="title">3. Which country where you born in?</div></td>          
			<td style="width:50%;"><div class="title">What other languages can you speak?</div></td>          
        </tr>
        <tr>
            <td style="width:50%;"><div class="value"><i><?php $name = 'info-country';echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
            <td style="width:50%;"><div class="value"><i><?php $name = 'info-lang';echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
        </tr>
       <tr>
           <td style="width:100%;"><div class="title">4. How well do you speak English? </div></td>          
        </tr>
        <tr>
			<td style="width:100%;"><div class="value"><i><?php $name = 'info-english'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
        </tr>
        <tr>
            <td style="width:100%;"><div class="title">5. Are you Aboriginal Or Torres Strait Islander origin? </div></td>          
         </tr>
         <tr>
 			<td style="width:100%;"><div class="value"><i><?php $name = 'info-aboriginal'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
         </tr>
         <tr>
             <td style="width:100%;"><div class="title">6. Do you consider yourself to have a disability, Impairment or long term condition? </div></td>          
          </tr>
          <tr>
  			<td style="width:100%;">
				<div class="value"><i>
					<?php $name = 'info-condition'; echo isset($post->{$name}) ? $post->{$name} : '';?>
				</i></div>
				<div class="value"><i>
					<?php $name = 'info-condition-option'; echo isset($post->{$name}) ? $post->{$name} : '';?>
					<?php $name = 'info-condition-other'; echo isset($post->{$name}) ? $post->{$name} : '';?>
				</i></div></td>          
          </tr>
          <tr>
              <td style="width:100%;"><div class="title">7. What is your highest level of education? </div></td>          
           </tr>
           <tr>
   			<td style="width:100%;"><div class="value"><i><?php $name = 'info-edu'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
           </tr>
	       <tr>
	           <td style="width:40%;"><div class="title">In which year did you complete school?</div></td>          
	       </tr>
           <tr>
   			<td style="width:100%;"><div class="value"><i><?php $name = 'info-edu-year'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
           </tr>
           <tr>
               <td style="width:100%;"><div class="title">8. Are you still in Secondary School?(High School) </div></td>          
            </tr>
            <tr>
    			<td style="width:100%;"><div class="value"><i><?php $name = 'info-inshcool'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
            </tr>
            <tr>
                <td style="width:100%;"><div class="title">9. Have you successfully completed any of the following quelification eigher here in Australia or Overseas? </div></td>          
             </tr>
             <tr>
     			<td style="width:100%;"><div class="value"><i><?php $name = 'info-9'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
             </tr>
             <tr>
                 <td style="width:100%;"><div class="title">10. Of the following categories, which BEST describes your current employment status?</div></td>          
              </tr>
              <tr>
      			<td style="width:100%;"><div class="value"><i><?php $name = 'info-10'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
              </tr>
              <tr>
                  <td style="width:100%;"><div class="title">11. What was your main reason for study?</div></td>          
               </tr>
               <tr>
       			<td style="width:100%;"><div class="value"><i><?php $name = 'info-11'; echo isset($post->{$name}) ? $post->{$name} : '';?></i></div></td>          
               </tr>
			   </table>
</page>
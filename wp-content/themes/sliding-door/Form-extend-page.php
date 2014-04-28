<?php
/**
 * Template Name: Form extend page
 *
 * A custom page template just has form.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); 
?>


    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/banner_form.gif" alt="" height="162">
    </div>
    <div class="content_mod row mb10">
        <div class="p15">
				<form action="/form/#wpcf7-f35-p81-o1" method="post" class="wpcf7-form" novalidate="novalidate">
				<div style="display: none;">
				<input type="hidden" name="_wpcf7" value="35">
				<input type="hidden" name="_wpcf7_version" value="3.8">
				<input type="hidden" name="_wpcf7_locale" value="en_US">
				<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f35-p81-o1">
				<input type="hidden" name="_wpnonce" value="16a2ac517d">
				</div>
                <div class="ui-accordion ui-accordion-icons accordion_style03">
                    <div class="ui-accordion-content" style="display: block">
                        <div class="form_div" style="height:100px;line-height: 100px">Student Type：
                            <select style="width: 300px">
                                <option>Self-Funded</option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div style="line-height: 30px;font-size: 16px;margin: 5px 0"><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label></div>
                        <div style="line-height: 30px;font-size: 16px;margin: 5px 0"><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label></div>
                        <div style="line-height: 30px;font-size: 16px;margin: 5px 0"><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label></div>
                        <div style="line-height: 30px;font-size: 16px;margin: 5px 0"><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label><label for="" class="radio"><input type="radio"><b>BSB20107</b>-Certificate ll in Business</label></div>

                    </div>
                    <h3 class="ui-accordion-header"><span class="ui-icon"></span><a href="#">Student Detail</a></h3>
                    <div class="ui-accordion-content" style="display: block">
                          <table class="form_table">
                              <tr>
                                  <th width="15%">First Name</th>
                                  <td width="35%"><input type="text"></td>
                                  <th width="15%">Last Name</th>
                                  <td><input type="text"></td>
                              </tr>
                              <tr>
                                  <th width="15%">First Name</th>
                                  <td width="35%"><input type="text"></td>
                                  <th width="15%">Last Name</th>
                                  <td><input type="text"></td>
                              </tr>
                              <tr>
                                  <th width="15%">First Name</th>
                                  <td width="35%"><input type="text"></td>
                                  <th width="15%">Last Name</th>
                                  <td><input type="text"></td>
                              </tr>
                              <tr>
                                  <th width="15%">Address</th>
                                  <td colspan="3"><input type="text"></td>
                              </tr>
                              <tr>
                                  <th width="15%">Suburb</th>
                                  <td width="35%"><input type="text"></td>
                                  <td colspan="2">
                                      <label class="ml10">State</label>
                                      <select style="width: 100px">
                                          <option>NSW</option>
                                          <option></option>
                                          <option></option>
                                      </select>
                                      <label>State</label>
                                      <input type="text" style="width: 210px"></td>
                              </tr>
                          </table>
                    </div>
                    <h3 class="ui-accordion-header"><span class="ui-icon"></span><a href="#">Course Outcome</a></h3>
                    <div class="ui-accordion-content" style="display: block">
                        <div class="form_div"><label for="" class="radio"><input type="radio">Male</label><label for="" class="radio"><input type="radio">Female</label></div>
                        <table class="form_table">
                            <tr>
                                <th width="15%">First Name</th>
                                <td width="35%"><input type="text"></td>
                                <th width="15%">Last Name</th>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <th width="15%">First Name</th>
                                <td width="35%"><input type="text"></td>
                                <th width="15%">Last Name</th>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <th width="15%">First Name</th>
                                <td width="35%"><input type="text"></td>
                                <th width="15%">Last Name</th>
                                <td><input type="text"></td>
                            </tr>
                        </table>
                    </div>
                    <h3 class="ui-accordion-header"><span class="ui-icon"></span><a href="#">Course Cost<b class="redstar">*</b></a></h3>
                    <div class="ui-accordion-content" style="display: block">
                        <div class="form_controller">
                                <h3>1 Is this the first time you have enrolled at this center?</h3>
                                <p><label for="" class="radio"><input type="radio">Male</label><label for="" class="radio"><input type="radio">Female</label></p>
                        </div>
                        <div class="form_controller">
                            <h3>2 Is this the first time you have enrolled at this center?</h3>
                            <p><input type="text" style="width: 400px"></p>
                        </div>
                        <div class="form_controller">
                            <h3>3 Is this the first time you have enrolled at this center?</h3>
                            <p><label for="" class="checkbox"><input type="radio">well</label><label for="" class="radio"><input type="radio">very well</label></p>
                        </div>
                        <div class="form_controller">
                            <h3>4 Is this the first time you have enrolled at this center?</h3>
                            <p>
                                <select style="width: 400px">
                                    <option>please</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </p>
                        </div>
                        <div class="form_controller">
                            <h3>5 Is this the first time you have enrolled at this center?</h3>
                            <p><label for="" class="radio"><input type="radio">Male</label><label for="" class="radio"><input type="radio">Female</label></p>
                        </div>
                    </div>
                    <h3 class="ui-accordion-header"><span class="ui-icon"></span><a href="#">Student Declaration<b class="redstar">*</b></a></h3>
                    <div class="ui-accordion-content" style="display: block">
                        <table class="form_table">
                            <tr>
                                <td width="220"><a href="javascript:void(0)" class="ui_link">Terms and Conditions</a></td>
                                <td><label for="" class="radio"><input type="radio">Agree</label><label for="" class="radio"><input type="radio">Disagree</label></td>
                            </tr>
                        </table>
                        <div class="mb10">
							<input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" />
							<a href="javascript:void(0)" class="btn_red"><span>Enrol Now</span></a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type='text/javascript' src='http://www.gatewayacademy.com.au/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.50.0-2014.02.05'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.gatewayacademy.com.au\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.gatewayacademy.com.au/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.8'></script>
<?php get_footer(); ?>

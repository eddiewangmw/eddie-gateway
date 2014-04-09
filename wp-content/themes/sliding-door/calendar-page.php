<?php
/**
 * Template Name: Calandar page
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); ?>

<link href='<?php echo get_template_directory_uri(); ?>/calendar/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo get_template_directory_uri(); ?>/calendar/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo get_template_directory_uri(); ?>/calendar/lib/moment.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/calendar/lib/jquery.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/calendar/lib/jquery-ui.custom.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/calendar/fullcalendar/fullcalendar.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2014-01-12',
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: '2014-01-01'
				},
				{
					title: 'Long Event',
					start: '2014-01-07',
					end: '2014-01-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-01-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-01-16T16:00:00'
				},
				{
					title: 'Meeting',
					start: '2014-01-12T10:30:00',
					end: '2014-01-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2014-01-12T12:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2014-01-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2014-01-28'
				}
			]
		});
		
	});

</script>
    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/banner_calendar.gif" alt="" height="162">
    </div>
    <!--日历控件-->
    <div class="calendar_mod row">
        <div class="p15">
            <h2>Academic Calendar 2014<small>You can add school event to your google calendar</small></h2>
            <div id='calendar'></div>
        </div>
    </div>
    <!--搜索-->
    <div class="search_mod row mb10">
        <form action="<?php echo home_url();?>" class="main_search" id="search">
            <input type="text" placeholder="what do you want to learn?" name="s">
            <a href="javascript:void(0)" class="btn_search"></a>
        </form>
    </div>

<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		width: 900px;
		margin: 40px auto;
	}

</style>
<?php get_footer(); ?>

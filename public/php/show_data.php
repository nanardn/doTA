<?php
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */

if (!empty($_REQUEST['year']) && !empty($_REQUEST['month'])) {
    $year = intval($_REQUEST['year']);
    $month = intval($_REQUEST['month']);
    $lastday = intval(strftime('%d', mktime(0, 0, 0, ($month == 12 ? 1 : $month + 1), 0, ($month == 12 ? $year + 1 : $year))));

/* CREATE YOUR EVENTS */
    $dates = array(
        array(
            "date" => "2014-08-05",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
        array(
            "date" => "2014-08-09",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
        ),

           array(
            "date" => "2014-08-11",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
        array(
            "date" => "2014-08-14",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   

        ),

           array(
            "date" => "2014-09-04",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"#\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
        array(
            "date" => "2014-09-05",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   

        ),

          array(
            "date" => "2014-09-21",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
        array(
            "date" => "2014-09-22",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   

        ),

           array(
            "date" => "2014-09-13",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
        array(
            "date" => "2014-09-14",
            "badge" => false,
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   

        ),

           array(
            "date" => "2014-09-16",
            "badge" => false,
            "title" => "Title",
            "title" => "<h3><i class=\"fa fa-calendar light-grey\"></i>&nbsp;&nbsp;5 August 2014</h3>",
            "body" => "

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> New York Hospital Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 19:00 to 21:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Merriston Street #4456, New York
            </p>

            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Boston City Great Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 15:00 to 16:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Wide Street #44, Boston
            </p>
            
            <hr />

            <h5>
            <a href=\"event-single.html\" target=\"_blank\"> Los Angeles Charity Event<span class=\"light-grey\"><i class=\"fa fa-map-marker pull-right\"></i></span></a>
            </h5>

            <p class=\"light-grey\">
            <i class=\"fa fa-clock-o\"></i> 11:00 to 13:00 
            &nbsp;&nbsp;&nbsp; &nbsp;
            <i class=\"fa fa-map-marker\"></i> 
            Los Angeles #12, LA
            </p>
            
            <hr />

            ",
            "footer" => "<a href=\"#\" class=\"light-grey\"> All events &nbsp;<i class=\"fa fa-plus\"></i></a>",
            "classname" => "has-event"   
            ),
    );
    /* ..... */

    for ($i = 0; $i <= (rand(4, 10)); $i++) {
        $date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1, $lastday), 2, '0', STR_PAD_LEFT);

        /* ERASE THIS IN ORDER TO SHOW YOUR DATES */

        /* ..... */

        if (!empty($_REQUEST['grade'])) {
            $dates[$i]['badge'] = false;
            $dates[$i]['classname'] = 'grade-' . rand(1, 4);
        }

        if (!empty($_REQUEST['action'])) {
            $dates[$i]['title'] = 'Action for ' . $date;
            $dates[$i]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[$i]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[$i]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[$i]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[$i]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
    }

    echo json_encode($dates);

} else {
    echo json_encode(array());

}

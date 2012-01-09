<?php
function status_to_label($status) {
        $classes = array('success', 'warning', 'important', 'notice');
        $label = array('OK', 'WARNING', 'CRITICAL', 'UNKNOWN');
        return "<span class=\"label " . $classes[$status]  .  "\">" . $label[$status]  . "</span>";
}

function boolean_to_label($boolean, $if_true = 'ENABLED', $if_false = 'DISABLED') {
        if ($boolean == TRUE)
                return "<span class=\"label success\">{$if_true}</span>";
        else
                return "<span class=\"label\">{$if_false}</span>";
}

function pr() {
	$args = func_get_args();
	foreach ($args as $arg) {
		echo "<pre>";
		var_dump($arg);
		echo "</pre>";
	}
}

function relative_time_abbr($timestamp) {
	return "<abbr class=\"time\" title=\"" . date('c', $timestamp)  .  "\">" . relative_time($timestamp)  . "</abbr>";
}

function relative_time( $timestamp ){
    if( !is_numeric( $timestamp ) ){
        $timestamp = strtotime( $timestamp );
        if( !is_numeric( $timestamp ) ){
            return "";
        }
    }

    $difference = time() - $timestamp;
        // Customize in your own language.
    $periods = array( "sec", "min", "hour", "day", "week", "month", "years", "decade" );
    $lengths = array( "60","60","24","7","4.35","12","10");

    if ($difference > 0) { // this was in the past
        $ending = "ago";
    }else { // this was in the future
        $difference = -$difference;
        $ending = "to go";
    }
    for( $j=0; $difference>=$lengths[$j] and $j < 7; $j++ )
        $difference /= $lengths[$j];
    $difference = round($difference);
    if( $difference != 1 ){
                // Also change this if needed for an other language
        $periods[$j].= "s";
    }
    $text = "$difference $periods[$j] $ending";
    return $text;
}

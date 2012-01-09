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

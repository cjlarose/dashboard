google.load('visualization', '1', {'packages':['table']});

function drawUsersPie(container_id) {
	google.visualization.drawChart({
		"containerId": container_id,
		"dataSourceUrl": 'http://www.google.com/fusiontables/gvizdata?tq=',
		"query": "SELECT user, size_gb FROM 1686471 WHERE size >= 0 ORDER BY size_gb desc",
		"refreshInterval": 60,
		"chartType": "PieChart",
		"options": {
			"title":"Disk Space (GB) by User",
			"sliceVisibilityThreshold": 1/90
		}
	});
}

function drawResourcesPie(container_id) {
	google.visualization.drawChart({
		"containerId": container_id,
		"dataSourceUrl": 'http://www.google.com/fusiontables/gvizdata?tq=',
		"query": "SELECT resource_name, resource_size_gb FROM 1735745 ORDER BY resource_size desc",
		"refreshInterval": 60,
		"chartType": "PieChart",
		"options": {
			"title":"Disk Space (GB) by Resource",
		}
	});
}

function drawSizeLine(container_id) {
	google.visualization.drawChart({
		"containerId": container_id,
		"dataSourceUrl": 'http://www.google.com/fusiontables/gvizdata?tq=',
		"query": "SELECT Date,irods_total_size_GB FROM 1735396",
		"refreshInterval": 60,
		"chartType": "LineChart",
		"options": {
			"title":"Disk Space (GB) by Resource",
		}
	});
}

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


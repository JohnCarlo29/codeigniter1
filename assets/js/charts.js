$(document).ready(function(){

	$.ajax({
		url:'admin/count_requests',
		method:'get',
		success:function(response){
			var ctx = $("#myChart1");
			var data = [];
			var bgColors = [];

			$.each(response[0],function(key, value){
				data.push(value);
			});

			var myPieChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
				    datasets: [{
				        data: data,
				        backgroundColor: ['#ff6384','#cc65fe']
				    }],

				    // These labels appear in the legend and in the tooltips when hovering different arcs
				    labels: ['School Requirement','Work Requirement']
				},
				options: {
			        title:{
			            display: true,
			            text: "Requests Chart",
			            fontSize: 20
			        }
			    } 
			});
		}
	});

	$.ajax({
		url:'admin/count_violations',
		method:'get',
		success:function(response){
			var ctx = $("#myChart2");
			var data = [];
			var labels = [];
			var bgColors = [];

			$.each(response[0],function(key, value){
				data.push(value);
				labels.push(key);
			});

			var myDoughnutChart = new Chart(ctx, {
			    type: 'doughnut',
			    data: {
				    datasets: [{
				        data: data,
				        backgroundColor: ['#ff6384','#cc65fe']
				    }],

				    // These labels appear in the legend and in the tooltips when hovering different arcs
				    labels: labels
				},
				options: {
			        title:{
			            display: true,
			            text: "Violations Chart",
			            fontSize: 20
			        }
			    } 
			});
		}
	});
});
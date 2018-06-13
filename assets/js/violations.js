$(document).ready(function(){
	$('#violationTable').DataTable({
		"processing":true,
		"serverSide":true,
		"order": [],
		"ajax": {
            "url": 'admin/get_unresolve_violation',
            "type": "post"
        },
		'columnDefs':[
			{
				'targets':[0],
				'visible':false
			},
			{
				'targets':[5],
				'searchable':false
			}
		]
	});

	$('#newViolationForm').submit(function(e){
		e.preventDefault();
		$.ajax({
			method:'post',
			url:'admin/ew_violation',
			data: $(this).serialize(),
			success:function(response){
				if(response == 1){
					swal({
						title:'New Violation',
						text:'Violation added',
						icon:'success'
					}).then(function(){
						window.location.reload();
					});
				}else if(response == 0){
					swal({
						title:'Error',
						text:'Please contact the administrator',
						icon:'error'
					});
				}else{
					swal({
						title:'Warning',
						text:response,
						icon:'warning'
					});
				}
			},
			error:function(xhr){
				console.log(xhr.responseText);
			}
		});
	});

	$('#violationTable tbody').on('click','.resolve',function(){
		var id = $(this).data('id');
		$('#resolveModal').modal();
		$('#resolveForm input[name=id]').val(id);
		//console.log(data);
		$('#resolveForm').submit(function(e){
			e.preventDefault();
			var data = $('#resolveForm').serialize();
			$.ajax({
				method:'post',
				url:'admin/resolve_violation',
				data:data,
				success:function(response){
					if(response == 1){
						swal({
							title:'Resolve Violation',
							text:'violation has been resolved',
							icon:'success'
						}).then(function(){
							window.location.reload();
						});
					}else if(response == 0){
						swal({
							title:'Error',
							text:'Please contact the administrator',
							icon:'error'
						});
					}else{
						swal({
							title:'Warning',
							text:response,
							icon:'warning'
						});
					}
				},
				error:function(xhr){
					console.log(xhr.responseText);
				}
			});
		});
	});

	//violation history
	$('#violationHistory').DataTable({
		"processing":true,
		"serverSide":true,
		"order": [],
		"ajax": {
            "url": 'admin/get_all_violation',
            "type": "post"
        },
        'columnDefs':[
			{
				'targets':[4],
				'searchable':false
			}
		]
	});
});
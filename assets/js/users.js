$(document).ready(function(){
	$('#usersTable').DataTable({
		'processing':true,
		'serverSide':true,
		'order': [],
		'ajax':{
			'url':'admin/get_users',
			'method':'post'
		},
		'columnDefs':[
			{
				'targets':[0],
				'visible':false
			}
		]
	});

	$('#usersTable tbody').on('click','.delete-user', function(){
		swal({
			title: "Are you sure?",
			text: "Once deleted, the user will not able to use the system",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url:'admin/delete_user',
					method:'post',
					data:{id:$(this).data('id')},
					success:function(response){
						if (response == 1){
							swal("User has been deleted!", {
								icon: "success",
							}).then(function(){
								window.location.reload();
							});
						}else{
							swal("Failed to delete user", {
								icon: "error",
							});
						}
					}
				});
			} else {
			swal("Removing user has been Cancelled");
			}
		});
	});

	$('#usersTable tbody').on('click','.edit-user', function(){
		$('#usersModal').modal();
		$('#changePassForm input[name=id]').val($(this).data('id'));
	});

	$('#addUserForm').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			method:'post',
			url:'admin/add_user',
			data:data,
			success:function(response){
				if(response == 1){
					swal("User has been added!", {
						icon: "success",
					}).then(function(){
						window.location.reload();
					});
				}else if(response == 0){
					swal("Failed to add user", {
						icon: "error",
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

	$('#changePassForm').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			method:'post',
			url:'admin/change_pass',
			data:data,
			success:function(response){
				if(response == 1){
					swal("Edit Done!", {
						icon: "success",
					}).then(function(){
						window.location.reload();
					});
				}else if(response == 0){
					swal("Failed to add edit user password", {
						icon: "error",
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
		})
	});
});
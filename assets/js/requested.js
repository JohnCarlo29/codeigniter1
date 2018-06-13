$(document).ready(function(){
	$('#requestTable').DataTable({
		"processing":true,
		"serverSide":true,
		"order": [],
		"ajax": {
            "url": 'admin/get_pending_request',
            "type": "post"
        },
        "columnDefs": [
            { 
                "targets": [ 0 ],
                "visible": false
            },
            { 
                "targets": [ 6 ],
                "searchable": false
            }
        ]
	});

    $('#requestTable tbody').on('click','.approve-request',function(){
        var id = $(this).data('id');
        $.ajax({
            method:'post',
            url:'admin/approve_request',
            data:{id:id},
            success:function(response){
                if(response == 1){
                    swal({
                        title:'Success',
                        text:'Request Approved',
                        icon:'success'
                    }).then(function(){
                        window.location.reload();
                    });
                }else{
                    swal({
                        title:'Error',
                        text:'Please contact administrator',
                        icon:'error'
                    });
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

    $('#allRequestTable').DataTable({
        "processing":true,
        "serverSide":true,
        "order": [],
        "ajax": {
            "url": 'admin/get_all_request',
            "type": "post"
        },
        "columnDefs": [
            { 
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });
});
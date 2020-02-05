
<!doctype html>
<html>
<head>
<?php $this->load->view('header'); ?>
<title>Leaves</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>

        body {
            background-color: #F1F4F5;
        }
        
        .card-header {
            padding: 0.2rem 1.25rem;
            /* margin-bottom: 0; */
            background-color: #ffffff;
            border-bottom: 0px;
        }
        
        .card-body {
            padding: 0rem 1.25rem;
        }
        
        p {
            margin-top: 0;
            margin-bottom: 10px;
        }
        
        .card {
            border-radius: 0px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        
        .flex-wrap {
            margin-bottom: -35px;
        }
        
        div.dataTables_wrapper div.dataTables_paginate {
            margin-top: -25px;
        }
        
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #5D78FF;
            border-color: #5D78FF;
        }
		.btn.focus, .btn:focus {
			outline: 0;
			box-shadow: none;
		}
		
</style>
</head>
<body>


<div class="container">

        <div class="col-md-12">
            <div class="card">
			<div class="col-md-4 float-right"><span id="success_message"></span></div>
                <div class="card-header">
				<div class="row">
                    <div class="col-md-6"><h4>Leaves Module</h4></div>
					
					<div class="col-md-6 text-right">
					<a href="javascript:void(0);" id="add_button" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus-circle"></i> Apply Leave</a></div>
                </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="example" style="width:100%;">
                        <thead>
                            <tr>
                               <th>Emp Id</th>
                            <th>Leave Type</th>
                            <th>From Date</th>
                            <th>To Date </th>
                            <th>Reason</th>
                            <th>Request To</th>
                            <th>action</th>
                             

                            </tr>
                        </thead>
                        <tbody>
                            


                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

<!-- modal start here -->
            <div class="modal fade" id="userModal">
                <div class="modal-dialog">
                    
					<form id="user_form" name="" action="" method="POST">
					<div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" >Leave Apply</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                <div class="modal-body">						
					<div class="col-md-12 col-xl-12">
							<div class="row">
								<div class="col-md-12">
									<div class="md-form">
									<label>Leave Type</label>
										<select class="form-control" id="leave_type" name="leave_type" >
										  <option value="" selected disabled>Select Leave Type </option>
										  <option value="casual leave">Casual Leave</option>
										  <option value="sick leave">Sick Leave</option>
										  <option value="emergency leave">Emergency Leave</option>
										</select><span id="leave_type_error" class="text-danger"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="md-form">
										<label>From Date</label>
										<div class="input-group date" id="datetimepicker12" data-target-input="nearest">
										<input type="text" name="from_date" id="from_date" class="form-control datetimepicker-input" data-target="#datetimepicker12"  /><span id="from_date_error" class="text-danger"></span>
										<div class="input-group-append" data-target="#datetimepicker12" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-form">
									<label>To Date</label>
									<div class="input-group date" id="datetimepicker13" data-target-input="nearest">
                                    <input type="text" name="to_date" id="to_date" class="form-control datetimepicker-input" data-target="#datetimepicker13"  /><span id="to_date_error" class="text-danger"></span>
                                    <div class="input-group-append" data-target="#datetimepicker13" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
									</div>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="md-form">
										<label for="message">Leave Reason</label>
										<input type="text" id="reason" name="reason" class="form-control" placeholder="Reason" ><span id="reason_error" class="text-danger"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-form">
										<label for="message">Reports To</label>
										<select class="form-control" id="reports_to" name="reports_to"  >
										  <option value="" selected disabled>Select Reports To </option>
										  <option value="admin">Admin</option>
										  <option value="manager">Manager</option>
										  <option value="supervisor">Supervisor</option>
										</select><span id="reports_to_error" class="text-danger"></span>
									</div>
								</div>
							</div>
						
						
						</div>	
					</div>
					<div class="modal-footer">
						<input type="hidden" name="user_id" id="user_id"/>
						<input type="hidden" name="data_action" id="data_action" value="Insert"/>
						<input type="submit" name="action" id="action" class="btn btn-primary" value="Add" >    
						<button type="button" class="btn btn-secondary" data-dismiss="modal"></i> Close</button>   
					</div>
                    </div>
					</form>
                </div>
            </div>
            <!-- modal end here -->


</body>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Leave Apply");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Leave applied successfully!!</div>');
                    }
                }

                if(data.error)
                {
                    $('#leave_type_error').html(data.leave_type_error);
                    $('#from_date_error').html(data.from_date_error);
                    $('#to_date_error').html(data.to_date_error);
                    $('#reason_error').html(data.reason_error);
                    $('#reports_to_error').html(data.reports_to_error);
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{user_id:user_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#leave_type').val(data.leave_type);
                $('#from_date').val(data.from_date);
                $('#to_date').val(data.to_date);
                $('#reason').val(data.reason);
                $('#reports_to').val(data.reports_to);
                $('.modal-title').text('Edit Leave');
                $('#user_id').val(user_id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
				
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var user_id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{user_id:user_id, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Leave deleted successfully!!</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});

	$('#datetimepicker12').datetimepicker({
                defaultDate: new Date(),
                format: 'DD-MM-YYYY'
    });
    $('#datetimepicker13').datetimepicker({
                defaultDate: new Date(),
                //format: 'YYYY-MM-DD hh:mm:ss A'
                format: 'DD-MM-YYYY'
    });
	
	
	$(document).ready(function() {
            $('#example').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 10,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                     'excel'
                ]


            });
        });
	
</script>
</html>
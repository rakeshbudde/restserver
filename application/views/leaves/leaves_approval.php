<!doctype html>
<html>
<head>
<title>Leaves Approval</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  
<?php $this->load->view('header'); ?>

<style>

        body {
            /* background-color: #F1F4F5; */
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
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#menu1"><i class="fas fa-address-card"></i> Approvals</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2"><i class="fas fa-plus-square"></i> Add new leave type</a>
    </li>
   <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3"><i class="fas fa-tasks"></i> Manage leave type</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="menu1" class="container tab-pane active">
      <div class="col-md-12">
            <div class="card">
			<div class="col-md-4 float-right"><span id="success_message"></span></div>
                <div class="card-header">
                    <h4>Leave Approvals</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover" id="example2" style="width:100%;">
                        <thead>
                            <tr>
                               <th>Emp Id</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
								 <th>Reason</th>
                                <th>Reported to</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody id="getdata">
                          
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
  <div id="menu2" class="container tab-pane fade">
		  <div class="container"><br>
		  <div class="col-md-4 float-right"><span id="success_message"></span></div>
		  <div class="col-md-6">
			
			<form id="add_new_leave_type_form" method="POST">
				
				<div class="form-group">
				  <label>New Leave Type</label>
				  <input type="text" class="form-control" id="leave_type_name" placeholder="Enter leave type" name="leave_type_name" required>
				  <!--<span id="new_leave_type_error" class="text-danger"></span>-->
				</div>
				 
				 <div class="form-group">
					<label>Set Days</label>
					<select class="form-control" id="set_days" name="set_days" required>
						<option value="" selected disabled>Choose days</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
					<!--<span id="set_days_error" class="text-danger"></span>-->
				</div>
				
				
				<input type="hidden" name="new_data_action" id="new_data_action" value="Insert_new_leavetype"/>
				<input type="submit" name="new_leave_type_action" id="new_leave_type_action" class="btn btn-primary" value="Create" > 
		  </form>

		</div>
		</div>
    </div>
	<div id="menu3" class="container tab-pane fade">
      <div class="col-md-12">
            <div class="card">
			<div class="col-md-4 float-right"><span id="success_message"></span></div>
                <div class="card-header">
                    <h4>Leave Types</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover" id="" style="width:100%;">
                        <thead>
                            <tr>
                               <th>S no</th>
                                <th>Leave Type Name</th>
								<th>Slug</th>
								<th>Is Paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
						
							<tr>
							<td>1</td>
							<td>casual leave</td>
							<td>cl</td>
							<th>No</th>
							<td><button type="button" name="edit" class="btn  btn-xs edit" id=''><i class="fas fa-pencil-alt" style="color:#28B463;"></i></button>
							<button type="button" name="delete" class="btn  btn-xs delete" id=''><i class="fas fa-trash" style="color:#E74C3C;"></i></button></td>
							</tr>
							
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
  </div>
</div>

	
</body>
<script>
$(document).ready(function(){

    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('#getdata').html(data);
            }
        });
    }

    fetch_data();

   /*  $('#add_button').click(function(){
        $('#add_new_leave_type_form')[0].reset();
        //$('.modal-title').text("Leave Apply");
        $('#action').val('Create');
        $('#new_data_action').val("Insert_new_leavetype");
        //$('#userModal').modal('show');
    }); */


$(document).on('submit', '#add_new_leave_type_form', function(e){
			 e.preventDefault();
			$.ajax({
				url:"<?php echo base_url() . 'leaves_approval_controller/new_leave_type_action' ?>",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				success:function(data)
				{
					alert(data);
					if(data.success)
					{
						$('#add_new_leave_type_form')[0].reset();
						if($('#new_data_action').val() == "Insert_new_leavetype")
						{
							$('#success_message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>New leave type added successfully!!</div>');
						}
					}
					
					if(data.error)
					{
						$('#new_leave_type_error').html(data.new_leave_type_error);
						$('#set_days_error').html(data.set_days_error);
						
					}
				}
			})
		});


});

</script>
<script>
$(document).ready(function() {
            $('#example2').DataTable({

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
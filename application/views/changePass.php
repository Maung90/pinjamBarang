<div class="container card p-4 mt-4 mb-5 ">
	<?php 
	if ($this->session->userdata('no_identitas') != '') {
		$id = $this->session->userdata('no_identitas');
	}elseif ($this->session->userdata('no_user') != '') {
		$id = $this->session->userdata('no_user');
	}else{
		$id = null;
	}

	
	if ($this->session->userdata('notif')): 
		echo $this->session->userdata('notif'); 
	endif

	?>
	<div> 
		<div class="row">
			<div class="col-md-12">
				<h3 class="fw-bold">Change Password</h3>
			</div>
			<div class="col-md-5"> 
				<div class="mb-4">
					<form id="form">
						<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
							<div>
								<label for="notelp" class="form-label">No Telp</label>
								<input
								autocomplete="off"
								autofocus
								type="text"
								class="form-control"
								id="notelp"
								placeholder="0 8 1 2 3 4 5 6 7 8 9"
								name="notelp"
								aria-describedby="defaultFormControlHelp" />
								<div id="defaultFormControlHelp" class="form-text"> 
									*masukan no telp yang telah terdaftar
								</div>
							</div>
							<div>
								<label for="email" class="form-label">Email</label>
								<input
								autocomplete="off"
								type="email"
								class="form-control"
								id="email"
								placeholder="example@gmail.com"
								name="email"
								aria-describedby="defaultFormControlHelp" />
								<div id="defaultFormControlHelp" class="form-text"> 
									*masukan email yang telah terdaftar
								</div>
							</div>
							<div class="mt-3 d-flex justify-content-end">
								<button type="button" class="btn btn-primary" id="getAcc">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div> 
			<div class="col-md-1"></div>
			<div class="col-md-5"> 
				<div class="mb-4">
					<form action="<?= base_url('ChangePassword/update/'.$id); ?>" method="POST" id="form">
						<div class="my-3 px-4 py-3" style="border:1px solid #dbdade;">
							<div>
								<label for="pass" class="form-label">Password</label>
								<input
								type="password"
								class="form-control"
								id="pass" 
								name="pass"
								aria-describedby="defaultFormControlHelp" readonly />
								<div id="defaultFormControlHelp" class="form-text"> 
									*masukan password baru
								</div>
							</div>
							<div class="mt-3 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary" id="update" disabled>Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div> 
		</div> 
	</div>
</div>


<script>

	$(document).ready(function(){ 

		$('#getAcc').on('click',function(){  

			var data = {
				email : $('#email').val(),
				notelp : $('#notelp').val(),
			};
			$.ajax({
				url : '<?= base_url('ChangePassword/getAcc/'.$id);?>',
				type : 'POST',
				data : data, 
				success : function (response){ 
					if(response == 'true'){ 
						$('#getAcc').attr('disabled','true');
						$('#email').attr('readonly','true');
						$('#notelp').attr('readonly','true');

						$('#update').removeAttr('disabled');
						$('#pass').removeAttr('readonly');
						$('#pass').focus();
						toastr.success("Silahkan masukan password yang baru!", 'Success', {
							closeButton: true,
							tapToDismiss: false,
							progressBar: true
						});
					}else{ 
						toastr.error("Email atau Notelp tidak terdaftar atau salah!", 'Error', {
							closeButton: true,
							tapToDismiss: false,
							progressBar: true
						});
					}
				},
				error : function (xhr, status, error) {
					console.error('gagal mengubah sesi' + error);
				}

			});

		});  
	});
</script>
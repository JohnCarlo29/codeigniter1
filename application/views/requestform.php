<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid gradient-bg">
	<div class="container" style="padding-top: 80px;">
		<div class="row">
			<div class="col-md-6 text-white">
					<img src="<?=base_url('assets/images/logo.jpg'); ?>" class="mx-auto d-block" id="logo">
				<h1 class="text-center">MNHS Mission & Vision</h1>
				<h2>Mission</h2>
				<p class="text-justify">We, the stakeholders of Muntinlupa National High School shall relentlessly strive to provide equal and equitable access to quality education that respond to the cultural, environmental, financial, commercial, industrial, technical and technological demands of the progressively thriving City of Muntinlupa.</p>

				<h2>Vision</h2>
				<p class="text-justify">Muntinlupa National High School is a caring and friendly institution of learning transforming Filipino youths into God-loving, productive and lifelong learners in a technologically driven society strongly supported by all stakeholders.</p>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Form Request
					</div>
					<div class="card-body">
						<form method="post" action="send_request">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="date_request">Date</label>
									<input type="text" class="form-control" name="date_request" id="date_request" value="<?= date('Y-m-d');?>">
								</div>
								<div class="form-group col-md-6">
									<label for="lrn">LRN No.</label>
									<input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN No.">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-9">
									<label for="sname">Surname</label>
									<input type="text" class="form-control" name="sname" id="sname" placeholder="Surname">
								</div>
								<div class="form-group col-md-3">
									<label for="suffix">Suffix</label>
									<input type="text" class="form-control" name="suffix" id="suffix" placeholder="Jr, Sr, etc.">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="fname">Firstname</label>
									<input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname">
								</div>
								<div class="form-group col-md-6">
									<label for="mname">Middle Name</label>
									<input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-5">
									<label for="form">Form Request</label>
									<select class="form-control" name="form" id="form">
										<option value="0">Choose Form</option>
										<option value="form 137">Form 137</option>
										<option value="good moral">Good Moral</option>
									</select>
								</div>
								<div class="form-group col-md-7">
									<label for="purpose">Purpose</label>
									<select class="form-control" name="purpose" id="purpose">
										<option value="0">Select Purpose</option>
										<option value="school requirement">For School</option>
										<option value="work requirement">For Work</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="contact">Contact</label>
									<input type="text" class="form-control" name="contact" id="contact" placeholder="CellPhone No.">
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary form-control">Submit</button>
								</div>
								<div class="col-md-6">
									<button type="reset" class="btn btn-danger form-control">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php if($this->session->flashdata('request_error')){?>
				<div class="col-md-12 mt-3 alert alert-danger" role="alert">
				    <?php echo $this->session->flashdata('request_error'); ?>       
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
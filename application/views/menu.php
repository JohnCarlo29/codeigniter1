	<div class="container">
		<?php $this->load->view('layout/banner'); ?>
		<div class="row menu">
			<div class="<?= ($this->session->userdata('type') == 0)?'col-md-4':'col-md-3'; ?>">
				<div class="card">
					<img src="<?= base_url('assets/images/menu-form.png');?>" class="card-img-top"  alt="image" >
					<div class="card-body text-center">
						<h4 class="card-title">Forms</h4>
						<p>Requested Form 134 and Good Moral</p>
						<a href="<?= base_url('requests');?>" class="btn btn-primary">Click Here</a>
					</div>
				</div>	
			</div>
			<div class="<?= ($this->session->userdata('type') == 0)?'col-md-4':'col-md-3'; ?>">
				<div class="card">
					<img src="<?= base_url('assets/images/menu-violation.png');?>" class="card-img-top" alt="image">
					<div class="card-body text-center">
						<h4 class="card-title">Violations</h4>
						<p>Violation monitoring of students</p>
						<a href="<?= base_url('violations');?>" class="btn btn-primary">Click Here</a>
					</div>
				</div>	
			</div>
			<div class="<?= ($this->session->userdata('type') == 0)?'col-md-4':'col-md-3'; ?>">
				<div class="card">
					<img src="<?= base_url('assets/images/menu-chart.png');?>" class="card-img-top"  alt="image">
					<div class="card-body text-center">
						<h4 class="card-title">Chart</h4>
						<p>Graph Representation of Requested Forms</p>
						<a href="<?= base_url('charts');?>" class="btn btn-primary">Click Here</a>
					</div>
				</div>	
			</div>
			<?php if($this->session->userdata('type') == 1){
				echo '<div class="col-md-3">
					<div class="card">
						<img src="'.base_url().'/assets/images/menu-chart.png" class="card-img-top"  alt="image">
						<div class="card-body text-center">
							<h4 class="card-title">Users</h4>
							<p>Adding or Modifying Officers credentials</p>
							<a href="'.base_url('users').'" class="btn btn-primary">Click Here</a>
						</div>
					</div>	
				</div>';
			} ?>
		</div>
	</div>



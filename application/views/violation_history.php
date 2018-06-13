<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<?php $this->load->view('layout/banner'); ?>
	<table id="violationHistory" class="table table-sm table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Date Happened</th>
                <th>LRN</th>
                <th>Student Name</th>
                <th>Nature of Abuse</th>
                <th>Status</th>
                <th>Response</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Date Happened</th>
                <th>LRN</th>
                <th>Student Name</th>
                <th>Nature of Abuse</th>
                <th>Status</th>
                <th>Response</th>
            </tr>
        </tfoot>
    </table>
</div>
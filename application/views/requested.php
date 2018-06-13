<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <?php $this->load->view('layout/banner'); ?>
    <div class="card">
        <div class="card-header">
            <p class="pull-left">Requested Forms</p>
            <div class="pull-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#allRequestModal">
                    <i class="fa fa-plus"></i> View All
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="requestTable" class="table table-sm table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date Requested</th>
                        <th>LRN</th>
                        <th>Student Name</th>
                        <th>Requested Form</th>
                        <th>Purpose</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Date Requested</th>
                        <th>LRN</th>
                        <th>Student Name</th>
                        <th>Requested Form</th>
                        <th>Purpose</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="allRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Requests</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="allRequestTable" class="table table-sm table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Date Requested</th>
                            <th>LRN</th>
                            <th>Student Name</th>
                            <th>Form</th>
                            <th>Purpose</th>
                            <th>Approve</th>
                            <th>Approve By</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date Requested</th>
                            <th>LRN</th>
                            <th>Student Name</th>
                            <th>Form</th>
                            <th>Purpose</th>
                            <th>Approve</th>
                            <th>Approve By</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
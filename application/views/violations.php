<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <?php $this->load->view('layout/banner'); ?>
    <div class="card">
        <div class="card-header">
            <p class="pull-left">Students Violations</p> 
            <div class="pull-right">
                <a href="<?= base_url('violation_history'); ?>" target="__blank">
                    <button class="btn btn-success"><i class="fa fa-history"></i> Resolved</button> 
                </a>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addViolationModal">
                    <i class="fa fa-plus"></i> Violation
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="violationTable" class="table table-sm table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date Happened</th>
                        <th>LRN</th>
                        <th>Student Name</th>
                        <th>Nature of Abuse</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Date Happened</th>
                        <th>LRN</th>
                        <th>Student Name</th>
                        <th>Nature of Abuse</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addViolationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Violation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='new_violation' id="newViolationForm">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="datehappend" class="col-md-3 col-form-label">Date</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="datehappend" id="datehappend" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lrn" class="col-md-3 col-form-label">LRN No.</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN No." />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student" class="col-md-3 col-form-label">Student</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="student" id="student" placeholder="Student Name" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abuse" class="col-md-3 col-form-label">Abuse Type</label>
                        <div class="col-md-9">
                            <select class="form-control" name="abuse" id="abuse">
                                <option value="">Type of Abuse</option>
                                <option value="physical">Physical</option>
                                <option value="verbal">Verbal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-3 col-form-label">Case Status</label>
                        <div class="col-md-9">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                <option value="0">Not Solve</option>
                                <option value="1">Solved</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="response" class="col-md-3 col-form-label">Response</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="response" id="response" placeholder="Response" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="resolveModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resolve Violation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='resolve_violation' id="resolveForm">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group row">
                        <label for="status" class="col-md-3 col-form-label">Case Status</label>
                        <div class="col-md-9">
                            <select class="form-control status" name="status">
                                <option value="">Select Status</option>
                                <option value="0">Not Solve</option>
                                <option value="1">Solved</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="response" class="col-md-3 col-form-label">Response</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control response" name="response" placeholder="Response" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
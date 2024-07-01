                <div class="main-panel">
                    <div class="content-wrapper">

                        <?php if (session() -> get('message')) { ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>User</strong> <?= session() -> getFlashdata('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php } ?>

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="belum-lunas-tab" data-toggle="pill" data-target="#belum-lunas" type="button" role="tab" aria-controls="belum-lunas" aria-selected="true">Belum lunas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="lunas-tab" data-toggle="pill" data-target="#lunas" type="button" role="tab" aria-controls="lunas" aria-selected="false">Lunas</button>
                            </li>
                            
                            <?php if (in_array(session() -> get('level'),[1,2])) { ?>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="bottom" title="Add Invoice"><i class="fas fa-sack-dollar" style="color: #5cb85c"></i></button>
                                </div>
                            <?php } ?>
                        </ul>

                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Tab : Belum lunas -->
                                            <div class="tab-pane fade show active" id="belum-lunas" role="tabpanel" aria-labelledby="belum-lunas-tab">
                                                <div class="table-responsive">
    
                                                    <table class="table table-striped">
        
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th></th>
                                                                <th>Invoice</th>
                                                                <th>Description</th>
                                                                <th>Due Date</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
        
                                                        <tbody>
                                                            
                                                        </tbody>
        
                                                    </table>
    
                                                </div>
                                            </div>
                                            <!-- End -->
                                            <!-- Tab : Lunas -->
                                            <div class="tab-pane fade" id="lunas" role="tabpanel" aria-labelledby="lunas-tab">
                                                <div class="table-responsive">
    
                                                    <table class="table table-striped">
        
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th>#</th>
                                                                <th>Invoice</th>
                                                                <th>Description</th>
                                                                <th>Date</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
        
                                                        <tbody>
                                                            
                                                        </tbody>
        
                                                    </table>
    
                                                </div>
                                            </div>
                                            <!-- End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
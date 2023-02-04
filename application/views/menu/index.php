<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
            
    <div class="container-fluid flex-grow-1 container-p-y">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb fw-bold py-3 mb-4">
          <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);">User</a>
            </li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </nav>

        <!-- Start -->
        <div class="row">
            <div class="col-lg-6 col-md col-sm col">
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-folder bx-tada"></i> Menu Management</h5>
                        </div>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                          Add Menu
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap" style="height: 350px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu Name</th>
                                        <th style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">    
                                    
                                    <?php $i=1; ?>
								    <?php foreach($menu as $m) : ?>
                                
                                    <tr>
                                        <th scope="row" width="2%" style="text-align: center;"><?= $i; ?></th>
                                        <td width="20%"><?= $m['menu']; ?></td>
                                        <td width="4%" style="text-align: center;">
                                            <a href="" class="btn btn-icon btn-success">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </a>
                                            <a href="" class="btn btn-icon btn-danger">
                                                <span class="tf-icons bx bx-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
									<?php endforeach; ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- End -->

    </div>
    <!-- / Content -->    

    <!-- Modal Add -->
    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Add Menu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Menu Name</label>
                                <input type="text" id="menu" name="menu" class="form-control" placeholder="Enter Menu Name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->
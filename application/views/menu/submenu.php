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
            <div class="col-lg col-md col-sm col">
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-folder bx-tada"></i> Submenu Management</h5>
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
                                        <th scope="col-sm" style="text-align: center;">#</th>
										<th scope="col-sm">Submenu Name</th>
										<th scope="col-sm" style="text-align: center;">Menu</th>
										<th scope="col-sm" style="text-align: center;">Url</th>
										<th scope="col-sm" style="text-align: center;">Icon</th>
										<th scope="col-sm" style="text-align: center;">Status Menu</th>
										<th scope="col-sm" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">    
                                    <?php $i=1; ?>
									<?php foreach ($subMenu as $sm) :  ?>
                                    <tr>
                                        <th scope="row" width="2%" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td style="text-align: center;"><?= $sm['menu']; ?></td>
                                        <td style="text-align: center;"><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td style="text-align: center;">
											<?php
												if ($sm['is_active']==1) {
													echo '<span class="badge bg-label-primary me-1">Active</span>';
												} else {
													echo '<span class="badge bg-label-danger me-1">Not Active</span>';
											    }
											?>
										</td>
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
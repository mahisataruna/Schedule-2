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
                <!-- Pesan error validation-->
			<?php if(validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-folder bx-tada"></i> Submenu Management</h5>
                        </div>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubmenuModal">
                          Add Submenu
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap" style="height: 350px">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-light">
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
                                            <div class="btn-group">
                                                <a href="" class="btn btn-icon btn-success" data-bs-toggle="modal" data-bs-target="#editSubmenuModal<?= $sm['id']; ?>">
                                                    <span class="tf-icons bx bx-edit"></span>
                                                </a>
                                                <a href="<?= base_url('menu/delete_submenu/'). $sm['id'];?>" class="btn btn-icon btn-danger" onclick="return confirm('Are you sure delete this submenu?')">
                                                    <span class="tf-icons bx bx-trash"></span>
                                                </a>
                                            </div>    
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

    <!-- Modal Add submenu -->
    <div class="modal fade" id="addSubmenuModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Add Submenu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu/subMenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Submenu Name</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Submenu Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="menu_id" class="form-label">Choose Menu</label>
                                <select class="form-select" id="menu_id" name="menu_id" aria-label="Default select example">
                                    <option selected="">-- Menu --</option>
                                    <?php foreach($menu as $m) : ?>
								    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>	
							        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="url" class="form-label">URL Submenu</label>
                                <input type="text" id="url" name="url" class="form-control" placeholder="Enter Submenu URL">
                            </div>
                        </div>
                         <div class="row">
                            <div class="col mb-3">
                                <label for="icon" class="form-label">Icon Submenu</label>
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter Submenu Icon">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="is_active" class="form-label">Active Submenu?</label>
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Modal Edit submenu Here -->
    <?php $i = 0;
        foreach($subMenu as $sm) : $i++;
    ?>
    <div class="modal fade" id="editSubmenuModal<?= $sm['id']; ?>" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubmenuModal">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Edit Submenu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open_multipart('menu/edit_submenu');?>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $sm['id']; ?>">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Submenu Name</label>
                                <input type="text" id="title" name="title" class="form-control" value="<?= $sm['title']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="menu_id" class="form-label">Choose Menu</label>
                                <select class="form-select" id="menu_id" name="menu_id" aria-label="Default select example" value="<?= $sm['menu_id']; ?>">
                                    <option selected="">-- Menu --</option>
                                    <?php foreach($menu as $m) : ?>
								    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>	
							        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="url" class="form-label">URL Submenu</label>
                                <input type="text" id="url" name="url" class="form-control" value="<?= $sm['url']; ?>">
                            </div>
                        </div>
                         <div class="row">
                            <div class="col mb-3">
                                <label for="icon" class="form-label">Icon Submenu</label>
                                <input type="text" id="icon" name="icon" class="form-control" value="<?= $sm['icon']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="is_active" class="form-label">Active Submenu?</label>
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- End -->
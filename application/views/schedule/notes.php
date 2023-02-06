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
            <!-- Card notes -->
            <div class="col-lg-8 col-md col-sm col">
                <!-- Pesan error validation-->
			    <?php if(validation_errors()) : ?>
				  <div class="alert alert-danger" role="alert">
					  <?= validation_errors(); ?>
				  </div>
			    <?php endif; ?>
                <!-- Set flash data message -->
			    <?= $this->session->flashdata('message'); ?>
                <!-- Start card -->
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-book bx-tada"></i> My Notes</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Star here -->
                        <div class="row">
                            <?php
                                foreach ($notesMember as $nm) {
                            
                            ?>
                            <div class="col-lg-6">
                                <!-- Notes 1 -->
                                <div class="card bg-light">
                                    <div class="card-header text-end mb-0">
                                        <small class="badge rounded-pill bg-label-primary">
                                            <i class="bx bx-calendar"></i>
                                            <?= date('d F Y', $nm['date_created']); ?>
                                        </small>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $nm['title']; ?></h5>
                                        <p class="card-text">
                                            <?= $nm['description']; ?>
                                        </p>
                                        <a href="" class="btn btn-icon btn-outline-success btn-sm"><span class="tf-icons bx bx-edit"></span></a>
                                        <a href="" class="btn btn-icon btn-outline-danger btn-sm"><span class="tf-icons bx bx-trash"></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card statistic -->
            <div class="col-lg-4 col-md col-sm col">
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-chart bx-tada"></i> Statistic</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Start here -->
                        <div class="card bg-light text-center mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><span class="bx bx-book"></span> Notes Count</h5>
                                <h3 class="card-text mb-4">0</h3>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNotes" class="btn btn-primary"><span class="bx bx-plus bx-flashing"></span> Add New Notes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End -->

    </div>
    <!-- / Content --> 

    <!-- Modal Add -->
    <div class="modal fade" id="addNotes" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Add New Notes
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('schedule/notes'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $user['id']; ?>">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Notes Title">
                                <?= form_error('title', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="description" class="form-label">Create Note</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Notes"></textarea>
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
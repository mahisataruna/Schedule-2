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
        <!-- Set flash data message -->
		<?= $this->session->flashdata('message'); ?>

        <!-- Start -->
        <div class="row mb-5">
            <!-- Card statistic -->
            <div class="col-md col-lg-4 mb-3">
                <div class="row mb-5">
                    <div class="col-md col-lg-12 col-sm mb-3">
                        <div class="card bg-light text-center">
                            <?php
                                include 'conn.php';
                                $id = $user['id'];
                                $data_nt = mysqli_query($koneksi, "SELECT * FROM notes WHERE user_id=$id");
                                $jnt = mysqli_num_rows($data_nt);
                            ?> 
                            <div class="card-header d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 mt-2">
                                  <h5 class="card-title"><i class="bx bx-fw bx-chart bx-tada"></i> Notes Count</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <h2 class="card-text mb-4"><?= $jnt; ?></h2>
                                <div class="col">
                                <button
                                    type="button"
                                    class="btn btn-outline-primary"
                                    data-bs-toggle="popover"
                                    data-bs-offset="0,14"
                                    data-bs-placement="right"
                                    data-bs-html="true"
                                    data-bs-content="<p>This notes for you, you can add new notes or edit this note here.</p>"
                                    title="Read me first."
                                >
                                <span class="bx bx-fw bx-bell bx-tada"></span>  
                                    View Details
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md col-lg-12 col-sm">
                        <div class="card bg-light text-center">
                            <div class="card-body">
                                <h5 class="card-title">Hello <?= $user['name']; ?>! 🎉</h5>
                                <p class="mb-4">
                                    You have <span class="fw-bold"><?= $jnt; ?></span> notes. Check or add your notes here.
                                </p>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNotes" class="btn btn-primary"><span class="bx bx-plus bx-flashing"></span> Add New Notes</a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card notes -->
            <div class="col-md col-lg-8 mb-3">
                <!-- Pesan error validation-->
			    <?php if(validation_errors()) : ?>
				  <div class="alert alert-danger" role="alert">
					  <?= validation_errors(); ?>
				  </div>
			    <?php endif; ?>
                
                <!-- Start card -->
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-book bx-tada"></i> My Notes</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Star here -->
                        <div class="row mb-4">
                            <?php
                                foreach ($notesMember as $nm) {
                            
                            ?>
                            <div class="col-md col-lg-6 mb-3">
                                <!-- Notes 1 -->
                                <div class="card bg-light">
                                    <div class="card-header text-end mb-0">
                                        <small class="badge rounded-pill bg-label-primary">
                                            <i class="bx bx-calendar"></i>
                                            <?= date('d F Y', $nm['notes_created']); ?>
                                        </small>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $nm['title']; ?></h5>
                                        <p class="card-text">
                                            <?= $nm['description']; ?>
                                        </p>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-icon btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editNotes"><span class="tf-icons bx bx-edit"></span></a>
                                            <a href="" class="btn btn-icon btn-outline-danger btn-sm"><span class="tf-icons bx bx-trash"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Modal Edit -->
    <div class="modal fade" id="editNotes" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Edit Notes
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->

    
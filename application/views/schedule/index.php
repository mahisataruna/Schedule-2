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
                <!-- Set flash data message -->
			    <?= $this->session->flashdata('message'); ?>
                <!-- Start card -->
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                          <h5 class="card-title"><i class="bx bx-fw bx-calendar bx-tada"></i> My Schedule</h5>
                        </div>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSchedule">
                          Add Schedule
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive text-nowrap" style="height: 350px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col-sm" style="text-align: center;">#</th>
										<th scope="col-sm" style="text-align: center;">Date</th>
										<th scope="col-sm">Location</th>
										<th scope="col-sm">Schedule</th>
										<th scope="col-sm" style="text-align: center;">Status</th>
										<th scope="col-sm" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Start foreach -->
                                    <?php $i=1; ?>
								    <?php foreach ($scheduleMember as $sm) :  ?>
                                    <tr id="tabelschedule">
                                        <th scope="row" width="2%" style="text-align: center;"><?= $i; ?></th>
                                        <td width="20%" style="text-align: center;"><?= $sm['tanggal']; ?></td>
                                        <td width="30%"><?= $sm['lokasi']; ?></td>
                                        <td width="30%"><?= $sm['kegiatan']; ?></td>
                                        <td style="text-align: center;">
                                        <?php 
                                            if ($sm['status'] == 1) {
                                                echo '<i class="bx bx-fw bx-solid bx-check bx-sm text-primary">';
                                            } else {
                                                echo '<i class="bx bx-fw bx-solid bx-x bx-sm text-danger"></i>';
                                            }
                                        ?>
                                        </td>
                                        <td width="10%" style="text-align: center;">
										  <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEditSubMenu"><i class="tf-icons bx bx-edit"></i></a>
										  <a href="" onclick="return confirm('Apakah anda yakin ingin menghapus submenu ini?')" class="btn btn-sm btn-danger"><i class="tf-icons bx bx-trash"></i></a>
									    </td>
                                    </tr>
                                    <?php $i++; ?>
									<?php endforeach ; ?>  
                                <!-- End foreach -->
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
    <div class="modal fade" id="addSchedule" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Add Schedule
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('schedule/index'); ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Date</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control">
                                <?= form_error('tanggal', '<small class="text-danger">', '</small>');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="lokasi" class="form-label">Location</label>
                                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Enter Location">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="lokasi" class="form-label">Schedule</label>
                                <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" class="form-control" placeholder="Enter Schedule Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="lokasi" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option>Choose</option>
                                    <option value="1">Pergi</option>
                                    <option value="0">Tidak</option>
                                </select>
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
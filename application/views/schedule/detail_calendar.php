<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
            
    <div class="container-fluid flex-grow-1 container-p-y">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb fw-bold py-3 mb-4">
          <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);">Schedule</a>
            </li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </nav>

        <!-- Start -->
        <div class="row mb-5">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('schedule/calendar') ?>">
                            <i class="bx bx-calendar me-1"></i> Event
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class="bx bx-show bx-flashing me-1"></i> Detail Calendar
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md col-lg-12 mb-3">
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
                          <h5 class="card-title"><i class="bx bx-fw bx-show"></i> Detail Event/Calendar</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap" style="height: 350px">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col-sm" style="text-align: center;">#</th>
						                <th scope="col-sm" style="text-align: center;">Description</th>
							            <th scope="col-sm">Start</th>
							            <th scope="col-sm">End</th>
						            	<th scope="col-sm" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Start foreach -->
                                <?php $i=1; ?>
						        <?php foreach ($detailEvents as $de) :  ?>
                                    <tr id="tabelschedule">
                                        <th scope="row" width="2%" style="text-align: center;"><?= $i; ?></th>
                                        <td width="20%" style="text-align: center;"><?= $de['description']; ?></td>
                                        <td width="30%"><?= $de['start']; ?></td>
                                        <td width="30%"><?= $de['end']; ?></td>
                                        <td width="10%" style="text-align: center;">
									        <div class="btn-group">
                                                <a href="" class="btn btn-icon btn-success" data-bs-toggle="modal" data-bs-target="#editEventModal">
                                                    <span class="tf-icons bx bx-edit"></span>
                                                </a>
                                                <a href="" onclick="return confirm('Apakah anda yakin menghapus event ini?')" class="btn btn-icon btn-danger"><i class="tf-icons bx bx-trash"></i></a>
                                            </div>
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

    <!-- Modal Edit Event -->
    <?php $i = 0;
        foreach ($detailEvents as $de) : $i++;
    ?>
    <div class="modal fade" id="editEventModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal">
                        <i class="bx bx-fw bx-plus bx-flashing"></i>
                        Edit Events
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $de['description']; ?>">
                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="start" class="form-label">Start Event</label>
                            <input type="datetime-local" class="form-control" name="start" id="start">
                          </div>
                        
                          <div class="col-lg-6 mb-3">
                            <label for="end" class="form-label">End Event</label>
                            <input type="datetime-local" class="form-control" name="end" id="end">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="description" class="form-label">Event Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Add Events Description"></textarea>
                            <?= form_error('description', '<small class="text-danger">', '</small>');?>  
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
    <?php endforeach; ?>
    <!-- End -->

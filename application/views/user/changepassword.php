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
        <!-- End -->

        <!-- Start content -->
        <div class="row">
            <div class="col-lg-6 col-md col-sm">
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <?= $this->session->flashdata('message');?>
                        <form action="<?= base_url('user/changepassword');?>" method="post">
                            <div class="mb-3 col-md form-password-toggle">
                                <label for="current_password" class="form-label">Recent Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="current_password" name="current_password" placeholder="••••••" autofocus />
                                    <?= form_error('current_password','<small class="text-danger">','</small>'); ?>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>    
                            </div>
                            <div class="mb-3 col-md form-password-toggle">
                                <label for="new_password1" class="form-label">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="new_password1" name="new_password1" placeholder="••••••" autofocus />
                                    <?= form_error('new_password1','<small class="text-danger">','</small>'); ?>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>    
                            </div>
                            <div class="mb-3 col-md form-password-toggle">
                                <label for="new_password2" class="form-label">Replace New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="new_password2" name="new_password2" placeholder="••••••" autofocus />
                                    <?= form_error('new_password2','<small class="text-danger">','</small>'); ?>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>    
                            </div>
                            <div class="col-12 mb-4">
                                <p class="fw-semibold mt-2">Password Requirements:</p>
                                <ul class="ps-3 mb-0">
                                    <li class="mb-1">
                                        Minimum 8 characters long - the more, the better
                                    </li>
                                    <li class="mb-1">At least one lowercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-memory-card me-1"></i>
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>

        <!-- End -->

    </div>
    <!-- / Content -->  
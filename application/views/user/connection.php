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

        <!-- Start content -->
        <div class="row">
                <div class="col-md-12 col-md">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('user/edit'); ?>"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li>
                  </ul>
                  <div class="col-lg-6 col-md col">
                        <div class="card mb-4">
                    <h5 class="card-header">Social media connection</h5>
                    <!-- Account -->
                    
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        
                          <div class="mb-3 col-md">
                            <label for="firstName" class="form-label">Facebook</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="John" autofocus />
                          </div>
                          <div class="mb-3 col-md">
                            <label for="firstName" class="form-label">Twitter</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="John" autofocus />
                          </div>
                          <div class="mb-3 col-md">
                            <label for="firstName" class="form-label">Instagram</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="John" autofocus />
                          </div>
                          
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-memory-card me-1"></i>
                                Save changes
                            </button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  </div>
                  
                  
                </div>
              </div>

        <!-- End -->

    </div>
    <!-- / Content -->    
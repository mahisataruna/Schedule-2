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
        
        <!-- Profile card -->
        <div class="card mb-4">
          <div class="user-profile-header-banner">
            <img src="<?= base_url('assets/img/banner/banner.png'); ?>" alt="Banner image" class="rounded-top" style="width : 100%;">
          </div>
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="width : 100px;">
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                <div class="user-profile-info">
                  <h4>
                    <?= $user['name']; ?>
                    <span class="badge badge-center rounded-pill bg-primary" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-fw bxs-bell bx-tada bx-xs' ></i> <span> Your account is active and verified.</span>" aria-describedby="tooltip753344">
                      <?php 
                        if ($user['is_active'] == 1) {
                          echo '<i class="bx bx-check text-white"></i>';
                        } else {
                          echo '<i class="bx bx-close text-primary"></i>';
                        }
                      ?>
                    </span>
                  </h4>
                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                    <li class="list-inline-item fw-semibold">
                      <i class="bx bx-fw bx-laptop"></i> UX Designer
                    </li>
                    <li class="list-inline-item fw-semibold">
                      <i class="bx bx-map"></i> Padang City, Indonesia
                    </li>
                    <li class="list-inline-item fw-semibold">
                      <i class="bx bx-calendar-alt"></i> Joined <?= date('d F Y', $user['date_created']); ?>
                    </li>
                  </ul>
                </div>
                <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary text-nowrap">
                  <i class="bx bx-cog me-1"></i> Setting
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- End -->
        
        <!-- Start content -->
        
        <div class="row">
            <div class="col-lg-6 col-md col-sm">
                  <!-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li>
                  </ul> -->
                  <div class="card mb-4">
                    <!-- Account -->
                    <div class="card-body">
                      <!-- Start -->
                      <div class="col-lg">
                        <div class="demo-inline-spacing mt-3">
                          <div class="list-group list-group-horizontal-md text-md-center">
                            <a
                              class="list-group-item list-group-item-action active"
                              id="profile-list-item"
                              data-bs-toggle="list"
                              href="#horizontal-profile"
                              >
                              <span class="bx-fw bx bx-user me-1"></span> 
                              Profile</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="messages-list-item"
                              data-bs-toggle="list"
                              href="#horizontal-messages"
                              >
                              <span class="bx-fw bx bx-grid-alt me-1"></span>
                              Project</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="settings-list-item"
                              data-bs-toggle="list"
                              href="#horizontal-settings"
                              >
                              <span class="bx-fw bx bx-link me-1"></span>
                              Connection</a
                            >
                            
                          </div>
                          <div class="tab-content px-0 mt-0">
                            <!-- Profile -->
                            <div class="tab-pane fade show active" id="horizontal-profile">
                              <!-- Start -->
                              <div class="card-body">
                                <small class="text-muted text-uppercase">About</small>
                                
                                <ul class="list-unstyled mb-4 mt-3">
                                  
                                  <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Role:</span> <span>Developer</span></li>
                                  <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>USA</span></li>
                                  <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Languages:</span> <span>English</span></li>
                                </ul>
                                <small class="text-muted text-uppercase">Contacts</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                  <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>(123) 456-7890</span></li>
                                  <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span><?= $user['email']; ?></span></li>
                                </ul>
                                <!-- <small class="text-muted text-uppercase">Teams</small>
                                <ul class="list-unstyled mt-3 mb-0">
                                  <li class="d-flex align-items-center mb-3"><i class="bx bxl-github text-primary me-2"></i>
                                    <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Backend Developer</span><span>(126 Members)</span></div>
                                  </li>
                                  <li class="d-flex align-items-center"><i class="bx bxl-react text-info me-2"></i>
                                    <div class="d-flex flex-wrap"><span class="fw-semibold me-2">React Developer</span><span>(98 Members)</span></div>
                                  </li>
                                </ul> -->
                              </div>
                              <!-- End -->
                            </div>
                            <!-- End -->
                            <!-- Tab message -->
                            <div class="tab-pane fade" id="horizontal-messages">
                              <div class="row">
                                <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-start">
          <div class="d-flex align-items-start">
            <div class="avatar me-3">
              <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/brands/social-label.png" alt="Avatar" class="rounded-circle">
            </div>
            <div class="me-2">
              <h5 class="mb-1"><a href="javascript:;" class="h5 stretched-link">Social Banners</a></h5>
              <div class="client-info d-flex align-items-center">
                <h6 class="mb-0 me-1">Client:</h6><span>Christian Jimenez</span>
              </div>
            </div>
          </div>
          <div class="ms-auto">
            <div class="dropdown zindex-2">
              <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <ul class="dropdown-menu dropdown-menu-end" style="">
                <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap">
          <div class="bg-lighter p-2 rounded me-auto mb-3">
            <h6 class="mb-1">$24.8k <span class="text-body fw-normal">/ $18.2k</span></h6>
            <span>Total Budget</span>
          </div>
          <div class="text-end mb-3">
            <h6 class="mb-1">Start Date: <span class="text-body fw-normal">14/2/21</span></h6>
            <h6 class="mb-1">Deadline: <span class="text-body fw-normal">28/2/22</span></h6>
          </div>
        </div>
        <p class="mb-0">We are Consulting, Software Development and Web Development Services.</p>
      </div>
      <div class="card-body border-top">
        <div class="d-flex align-items-center mb-3">
          <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6>
          <span class="badge bg-label-success ms-auto">28 Days left</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-1">
          <small>Task: 290/344</small>
          <small>95% Completed</small>
        </div>
        <div class="progress mb-3" style="height: 8px;">
          <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center">
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt="Avatar">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png" alt="Avatar">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up me-2" aria-label="Julee Rossignol" data-bs-original-title="Julee Rossignol">
                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png" alt="Avatar">
              </li>
              <li><small class="text-muted">280 Members</small></li>
            </ul>
          </div>
          <div class="ms-auto">
            <a href="javascript:void(0);" class="text-body"><i class="bx bx-chat"></i> 15</a>
          </div>
        </div>
      </div>
    </div>
                              </div>
                            </div>
                            <!-- End -->
                            <!-- Tab connection -->
                            <div class="tab-pane fade" id="horizontal-settings">
                              <div class="col-lg col-md col-sm col-12">
                                <div class="card">
                                  <h5 class="card-header">Accounts connection</h5>
                                  <div class="card-body">
                                    <!-- Facebook -->
                                    <div class="d-flex mb-3">
                                      <div class="flex-shrink-0">
                                          <img
                                            src="<?= base_url('assets/'); ?>img/icons/brands/facebook.png"
                                            alt="facebook"
                                            class="me-3"
                                            height="30"
                                          />
                                      </div>
                                      <div class="flex-grow-1 row">
                                        <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                          <h6 class="mb-0">Facebook</h6>
                                          <small class="text-muted">Not Connected</small>
                                        </div>
                                        <div class="col-4 col-sm-5 text-end">
                                          <button type="button" class="btn btn-icon btn-outline-secondary">
                                            <i class="bx bx-link-alt"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Twitter -->
                                    <div class="d-flex mb-3">
                                      <div class="flex-shrink-0">
                                          <img
                                            src="<?= base_url('assets/'); ?>img/icons/brands/twitter.png"
                                            alt="twitter"
                                            class="me-3"
                                            height="30"
                                          />
                                      </div>
                                      <div class="flex-grow-1 row">
                                        <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                          <h6 class="mb-0">Twitter</h6>
                                          <small class="text-muted">Not Connected</small>
                                        </div>
                                        <div class="col-4 col-sm-5 text-end">
                                          <button type="button" class="btn btn-icon btn-outline-secondary">
                                            <i class="bx bx-link-alt"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Instagram -->
                                    <div class="d-flex mb-3">
                                      <div class="flex-shrink-0">
                                          <img
                                            src="<?= base_url('assets/'); ?>img/icons/brands/instagram.png"
                                            alt="instagram"
                                            class="me-3"
                                            height="30"
                                          />
                                      </div>
                                      <div class="flex-grow-1 row">
                                        <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                          <h6 class="mb-0">Instagram</h6>
                                          <small class="text-muted">Not Connected</small>
                                        </div>
                                        <div class="col-4 col-sm-5 text-end">
                                          <button type="button" class="btn btn-icon btn-outline-secondary">
                                            <i class="bx bx-link-alt"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End -->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End -->
                          </div>
                        </div>
                      </div>
                      <!-- End -->
                    </div>
                    <!-- /Account -->
                  </div>
                  
            </div>
            <!-- New col -->
            <div class="col-lg-6 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulation <?= $user['name']; ?>! 🎉</h5>
                          <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p>

                          <div class="col">
                            <button
                              type="button"
                              class="btn rounded-pill btn-outline-primary"
                              data-bs-toggle="popover"
                              data-bs-offset="0,14"
                              data-bs-placement="right"
                              data-bs-html="true"
                              data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                              title="Congratulation! 🎉"
                            >
                              <span class="bx bx-fw bx-bell bx-tada"></span>  
                              View Details
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?= base_url('assets/'); ?>img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>

        <!-- End -->

    </div>
    <!-- / Content -->    
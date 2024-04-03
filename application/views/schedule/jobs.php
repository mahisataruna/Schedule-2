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
            <div class="col-md-8">
                
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0 mt-2">
                            <h5 class="card-title"><i class="bx bx-fw bx-chart bx-tada"></i> Add Catatan Kerja</h5>
                        </div>
                    </div>
                    <!-- Account -->
                    <div class="card-body">
                        <!-- Form input tele.js -->
                        <form id="formAccountSettings">
                            <div class="row">
                                <!-- Judul -->
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Judul</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-pen"></i></span>
                                        <input class="form-control" type="text" id="judul" required autofocus />
                                    </div>
                                </div>
                                <!-- Lokasi -->
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Lokasi</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-pin"></i></span>
                                        <input class="form-control" type="text" id="lokasi" required autofocus />
                                    </div>
                                </div>
                                <!-- Tanggal -->
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Tanggal</label>
                                    <input class="form-control" type="date" id="tanggal" required autofocus />
                                </div>
                                <!-- Pukul -->
                                <div class="mb-3 col-md-6">
                                    <label for="pukul" class="form-label">Waktu</label>
                                    <input class="form-control" type="time" id="jam" required autofocus />
                                </div>
                                <!-- Kegiatan -->
                                <div class="mb-3 col-12">
                                    <label for="kegiatan" class="form-label">Kegiatan</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                        <textarea class="form-control" id="kegiatan" required></textarea>                    
                                    </div>
                                </div>
                          
                            </div>
                            <div class="mt-2">
                                <input type="button" class="btn btn-primary" id="kirim" value="KIRIM" onclick="kirimPesan()" />
                            </div>
                            <!-- <div class="mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-memory-card me-1"></i>
                                Save 
                            </button>
                            </div> -->
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>

            <div class="col-md col-lg-4 mb-3">
                <!-- Here code -->
                <div class="row mb-5">
                    <div class="col-md col-lg-12 col-sm mb-3">
                        <div class="card bg-light">
                             
                            <div class="card-header d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 mt-2">
                                  <h5 class="card-title"><i class="bx bx-fw bx-chart bx-tada"></i> Lihat selengkapnya</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-12 mb-4 text-center">
                                <img src="<?= base_url('assets/'); ?>img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                                
                                <div class="col text-center">
                                <button
                                    type="button"
                                    class="btn btn-outline-primary"
                                    data-bs-toggle="popover"
                                    data-bs-offset="0,14"
                                    data-bs-placement="right"
                                    data-bs-html="true"
                                    data-bs-content="<p>Check telegram group 'MY JOBS' untuk melihat detail kegiatan</p>"
                                    title="Telegram Requirement."
                                >
                                <span class="bx bx-fw bx-bell bx-tada"></span>  
                                    Touch Me!
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
        </div>

        <!-- End -->

    </div>
    <!-- BotTele -->
    <script src="tele.js"></script>

    
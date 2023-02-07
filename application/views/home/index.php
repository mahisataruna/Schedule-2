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
        <div class="row mb-5">
            <div class="col-lg-3">
                  <div
                    id="carouselExample-cf"
                    class="carousel carousel-dark slide carousel-fade"
                    data-bs-ride="carousel"
                  >
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card h-100">
                                <img class="card-img-top" src="<?= base_url('assets/'); ?>img/elements/2.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card h-100">
                                <img class="card-img-top" src="<?= base_url('assets/'); ?>img/elements/2.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card h-100">
                                <img class="card-img-top" src="<?= base_url('assets/'); ?>img/elements/2.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
        </div>
        <!-- End -->

    </div>
    <!-- / Content -->
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                <div class="card" style="height: auto;">
                    <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active" aria-current="true"></li>
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1" class=""></li>
                      <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url('assets/img/banner/banner.png'); ?>" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>First slide</h3>
                          <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('assets/img/banner/banner.png'); ?>" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>Second slide</h3>
                          <p>In numquam omittam sea.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('assets/img/banner/banner.png'); ?>" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>Third slide</h3>
                          <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
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
            <!-- Row 2 -->
            <div class="col-lg-3 col-md col-sm col-12 mb-3">
                <div class="card bg-light">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome <?= $user['name']; ?>! 🎉</h5>
                                <p class="mb-4">
                                    You can see <span class="fw-bold">New Update</span> at this place. 
                                </p>
                                <div class="col text-center">
                                    <button type="button"
                                    class="btn rounded-pill btn-outline-primary"
                                    data-bs-toggle="popover"
                                    data-bs-offset="0,14"
                                    data-bs-placement="right"
                                    data-bs-html="true"
                                    data-bs-content="<p>This is a very beautiful popover, show some love.</p> <div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-secondary'>Skip</button><button type='button' class='btn btn-sm btn-primary'>Read More</button></div>"
                                    title="Welcome! 🎉"
                                    >
                                    <span class="bx bx-fw bx-bell bx-tada"></span> Take Me!
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Row 3 -->
            <div class="col-lg-9 col-md col-sm col-12 mb-3">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                          <i class="tf-icons bx bx-fw bx-home"></i> News
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                          <i class="tf-icons bx bx-fw bx-user"></i> For You
                        </button>
                      </li>
                      <!-- <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
                          <i class="tf-icons bx bx-message-square"></i> Messages
                        </button>
                      </li> -->
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
                        <p>
                          Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps
                          powder. Bear claw candy topping.
                        </p>
                        <p class="mb-0">
                          Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                          jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                          jujubes sweet.
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                        <p>
                          Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                          cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                          cheesecake fruitcake.
                        </p>
                        <p class="mb-0">
                          Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                          cotton candy liquorice caramels.
                        </p>
                      </div>
                      <!-- <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                        <p>
                          Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                          cupcake gummi bears cake chocolate.
                        </p>
                        <p class="mb-0">
                          Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                          roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                          jelly-o tart brownie jelly.
                        </p>
                      </div> -->
                    </div>
                  </div>
            </div>
        </div>
        <!-- End -->

    </div>
    <!-- / Content -->
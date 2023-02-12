<!-- Footer -->
            <footer class="footer bg-light">
                  <div
                    class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
                  >
                    <div>
                      <a
                        href="https://github.com/mahisataruna"
                        target="_blank"
                        class="footer-text fw-bolder"
                        >Schedule 2 Web </a
                      >
                      - Alpha Version 1.2.23 |
                      ©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                    </div>
                    <div>
                      
                      <div class="dropdown dropup footer-link me-3">
                        <button
                          type="button"
                          class="btn btn-sm btn-outline-secondary dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          Theme Mode
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item active" href="javascript:void(0);"><i class="bx bx-fw bxs-sun bx-tada"></i> Light Mode</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-fw bx-moon bx-tada"></i> Dark Mode</a>
                        </div>
                      </div>
                      <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                          data-bs-target="#logoutModal"
                        ><i class="bx bx-log-out-circle"></i> Logout</a
                      >
                    </div>
                  </div>
                </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Ready to leave?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('assets/'); ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('assets/'); ?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/'); ?>vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/'); ?>js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/'); ?>js/dashboards-analytics.js"></script>
    <script src="<?= base_url('assets/'); ?>js/ui-popover.js"></script>

    <!-- Fullcalendar -->
    <script src="<?= base_url('assets/'); ?>vendor/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/fullcalendar/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Fullcalendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                    events: [ 
                        <?php 
                            include 'conn.php';
                            $id=$user['id'];
                            $data_ev = mysqli_query($koneksi, "SELECT * FROM events WHERE user_id=$id");
                            //melakukan looping
                            while($d = mysqli_fetch_array($data_ev)){     
                        ?>
                        {
                            title: '<?php echo $d['description']; ?>', 
                            start: '<?php echo $d['start']; ?>', 
                            end: '<?php echo $d['end']; ?>'
                            },
                        <?php } ?>
                    ],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
            calendar.render();
        });
    </script>

  </body>
</html>

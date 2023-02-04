<!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <!-- Start Logo -->
              <span class="app-brand-logo demo">
                <img src="<?= base_url('assets/img/profile/sch.jpg') ?>" style="width: 50px">
              </span>
              <!-- End -->
              <span class="app-brand-text menu-text ms-2">Schedule 2</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Query menu -->

            <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
            $menu = $this->db->query($queryMenu)->result_array();            
            ?>

            <!-- Looping menu -->
            <?php foreach ($menu as $m) : ?>
            <!-- End -->
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">
                <?= $m['menu']; ?>
              </span>
            </li>
            <!-- Looping SubMenu -->
            <?php
              $menuId = $m['id'];
              $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu`
                               ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                               WHERE `user_sub_menu`.`menu_id` = $menuId 
                               AND `user_sub_menu`.`is_active` = 1   
                              ";
              $subMenu = $this->db->query($querySubMenu)->result_array();                
            ?>

            <?php foreach ($subMenu as $sm) :?>
                    <?php if ($title == $sm['title']) : ?>  
                    <!-- Nav Item - Dashboard -->
                    <li class="menu-item active">
                      <?php else : ?>
                    <li class="menu-item">
                      <?php endif ; ?>

                      <a href="<?= base_url($sm['url']); ?>" class="menu-link">
                      <i class="<?= $sm['icon']; ?>"></i>
                      <div data-i18n="Analytics"><?= $sm['title']; ?></div>
                  </a>
              </li>    
                    <!--  -->
                        
              <?php endforeach; ?>
              
            <?php endforeach; ?>
            
          </ul>
        </aside>
        <!-- / Menu -->
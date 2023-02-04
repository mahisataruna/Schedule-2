<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  
                  <span class="app-brand-text demo text-body fw-bolder"><?= $title; ?></span>
                </a>
              </div>
              <p class="mb-4">Make your app management easy and fun!</p>

              <form id="formAuthentication" accept-charset="utf-8" class="mb-3" action="<?= base_url('auth/registration'); ?>" method="POST">
                <!-- Fullname  -->
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Enter your fullname"
                    autofocus
                  />
                  <!-- Form error -->
                  <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>  
                </div>
                <!-- Email -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                  <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <!-- Password 1 -->
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password1">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password1"
                      class="form-control"
                      name="password1"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- Password 2 -->
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Replace Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password2"
                      class="form-control"
                      name="password2"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>    
                <!-- Submit -->
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="<?= base_url('auth'); ?>">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->
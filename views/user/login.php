<section class="vh-100 card bg-dark vh-100">
    <div class="container-fluid h-custom vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="/assets/img/images/login.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="<?php echo App\Route\RouteRegistry::getRegisteredRoute('login') ?>" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo App\Service\CsrfTokenService::generate('login') ?>">
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" class="form-control form-control-lg" name="email" placeholder="Enter a valid email address" value="<?php echo $formData['email'] ?? ''; ?>"  required />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Enter password" required />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo App\Route\RouteRegistry::getRegisteredRoute('register') ?>" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2023. All rights reserved.
        </div>
        <div>
            <a href="https://www.linkedin.com/company/recman-as" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</section>

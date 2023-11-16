<div class="card bg-dark vh-100">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <form action="<?php echo App\Route\RouteRegistry::getRegisteredRoute('register') ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo App\Service\CsrfTokenService::generate('register') ?>">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" placeholder="First name" type="text"  value="<?php echo $formData['name'] ?? ''; ?>"  required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="surname" class="form-control" placeholder="Last name" type="text" value="<?php echo $formData['surname'] ?? ''; ?>" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $formData['email'] ?? ''; ?>" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select class="custom-select" style="max-width: 120px;">
                    <option selected="">+971</option>
                    <option value="1">+972</option>
                    <option value="2">+198</option>
                    <option value="3">+701</option>
                </select>
                <input name="mobilePhone" class="form-control" placeholder="Phone number" type="text" value="<?php echo $formData['mobilePhone'] ?? ''; ?>" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control" placeholder="Create password" type="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account</button>
            </div>
            <p class="text-center">Have an account? <a href="<?php echo App\Route\RouteRegistry::getRegisteredRoute('login') ?>">Log In</a> </p>
        </form>
    </article>
</div>

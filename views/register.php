<form class="form-signin needs-validation" method="post" action="/register/register" novalidate oninput='passwordConfirmation.setCustomValidity(passwordConfirmation.value !== password.value ? "Passwords do not match." : "")'>
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <div class="mb-3">
        <label for="username">Username</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
                The username is required.
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="fullname">Full Name</label>
        <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Full Name" required>
        <div class="invalid-feedback" style="width: 100%;">
            The full name is required.
        </div>
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
        <div class="invalid-feedback">
            The password is required.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="passwordConfirmation">Password</label>
        <input name="passwordConfirmation" type="password" class="form-control" id="passwordConfirmation" placeholder="confirme your password" required>
        <div class="invalid-feedback">
            Password confirmation is required.
        </div>
    </div>
    <?php
    if (!empty(\App\Core\Session::exists('register.errors'))) {
        echo '<p class="text-danger text-center">'.\App\Core\Session::flash('register.errors').'</p>';
    }
    ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>

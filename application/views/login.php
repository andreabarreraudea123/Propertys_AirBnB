<div class="containerr">
    <div class="forms-containerr">
        <div class="signin-signup">
            <!-- formulario para inicio -->
            <form action="<?php echo base_url() .'api/signIn'; ?>" method="POST"" class="sign-in-form">
                <h2 class="title">Sign in</h2>

                 <?php
            // foreach ($users as $user) {
            //     $userRow = "<tr>
            // <th scope='row'>{$user->id}</th>
            //  <td>{$user->email}</td>
            //  <td>{$user->password}</td>
            //  </tr>";
            //     echo $userRow;
            // }
            ?> 

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" />
                </div>
                <input type="submit" value="Login" class="btn solid"/>
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>


            <!-- Formuario para registro -->
            <form action="<?php echo base_url() .'api/signup'; ?>" method="POST" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fas fa-id-card"></i>
                            <input type="text" name="type_identification" id="type_identification" list="listidentification" placeholder="typeidentification">
                            <datalist id="listidentification">
                                <option>Pas</option>
                                <option>Cc</option>
                            </datalist>
                        </div>
                        <div class="input-field">
                            <i class="fab fa-creative-commons-by"></i>
                            <input type="text" name="identification" id="identification" placeholder="identification" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" id="name" placeholder="name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <i class="fas fa-user-circle"></i>
                            <input type="text" name="lastname" id="lastname" placeholder="lastname" />
                        </div>

                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" placeholder="email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="password" />
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn" value="Sign up" />

                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- panel para la animación entre endpoints -->
    <div class="panels-containerr">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                    ex ratione. Aliquid!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </div>
            <img src="<?php echo base_url(); ?>/assets/images/signuplogmen.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                    laboriosam ad deleniti.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="<?php echo base_url(); ?>/assets/images/sinlogwo.svg" class="image" alt="" />
        </div>
    </div>
</div>
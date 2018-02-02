 <div class="page" id="page-sign_in">
                    <header class="ak-header">
                            <h1 class="ak-header__title">Sign In</h1>
                            <div class="sign_in-form">
                                <form  action="" method="POST">
                                        
                                    <div class="form-group row form-row">
                                        <div class="form-group  col-md-5 col-xs-6 col-sm-6 col-10   ">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username/Email" >
                                    </div>
                                    </div>
                                    <div class="form-group row form-row">
                                        <div class="form-group  col-md-5 col-xs-6 col-sm-6 col-10   ">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                            
                                    <button class="btn btn-primary" type="submit" name="sign_in">Sign In</button>
                                    <p class="ak-header__qus">New user?  <a href="#signup" id="goto_signup">Signup here</a></p>
                                    <a href="#"><p class="small">Forgot your password?</p></a>
                                </form>
                            </div>
                        </header>
                    
                    </div>


                    <div class="page" id="page-signup" style="display:none">
                        <header class="ak-header signup">
                            <h1 class="ak-header__title">Sign Up</h1>
                            <div class="signup-form">
                                <form action="" method="POST">
                                    <div class="form-group row form-row"> 
                                        <div class="form-group  col-md-2 col-xs-6 col-sm-6 col-6  ">
                                        <input type="text" class="form-control" name="firstname" placeholder="First" required="required">
                                        </div>
                                        <div class="form-group   col-md-2 col-xs-6 col-sm-6 col-6 ">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row form-row">
                                        <div class="form-group col-md-4 col-xs-12 col-12">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row form-row">
                                        <div class="form-group col-md-2 col-xs-6 col-sm-6 col-6 ">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                                        </div>
                                        <div class="form-group col-md-2 col-xs-6 col-sm-6 col-6  ">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row form-row">
                                        <div class="form-group col-md-4 col-xs-12 col-12">
                                        <input type="number" class="form-control" name="phone" placeholder="Phone no.">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row form-row" >
                                        <div class="form-group col-md-2 col-xs-6 col-sm-6 col-6 ">
                                        <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
                                        <p class="ak-header__qus">Already a user?<a href="#sign_in" id="goto_sign_in">Sign In here!</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </header>
                    </div>
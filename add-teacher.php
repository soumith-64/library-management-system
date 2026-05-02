<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    include 'inc/header.php';
    include 'inc/connection.php';
include 'inc/tfunction.php';
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>dashboard</span>Control panel</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<a href="add-student.php"><i class="fas fa-user"></i>add student</a>
							<span class="disabled">add teacher</span>
						</div>
					</div>
				</div>

				<div class="addUser">
					<div class="gap-40"></div>
					<div class="reg-body user-content">
                        <?php if(isset($error_m)):?>
                            <span class="errort"> <?php echo $error_m; ?></span>
                        <?php endif ?>
                        <h4 style="text-align: center; margin-bottom: 25px;">Teacher registration form</h4>
                        <form action="" class="form-inline" method="post">
                            <div class="form-group">
                                <label for="name" class="text-right">Name <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Full Name" name="name"/>
                            </div>

                            <?php if(isset($error_ua)):?>
                                <span class="error"> <?php echo $error_ua; ?></span>
                            <?php endif ?>
                            <?php if(isset($error_uname)):?>
                                <span class="error"> <?php echo $error_uname; ?></span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" class="form-control custom" placeholder="Password" name="password"/>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">DOB <span>*</span></label>
                                <input type="date" class="form-control custom" placeholder="DOB" name="DOB"/>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">Subject <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Subject" name="lecturer"/>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">Class <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="class" name="dept"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Email" name="email"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Eligibility <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Eligibility" name="eligibility"/>
                            </div>
                            <?php if(isset($e_msg)):?>
                                <span class="error"><?php echo $e_msg; ?> </span>
                            <?php endif ?>
                            <?php if(isset($error_email)):?>
                                <span class="error"><?php echo $error_email; ?> </span>
                            <?php endif ?>
                            <?php if(isset($error_eligibility)):?>
                                <span class="error"><?php echo $error_eligibility; ?> </span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="phone">Phone No <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Phone No" name="phone"/>
                            </div>
                            <?php if(isset($error_phone)):?>
                                <span class="error"><?php echo $error_phone; ?></span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="session">Id No <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Id No" name="idno"/>
                            </div>
                            <?php if(isset($error_id)):?>
                                <span class="error"><?php echo $error_id; ?></span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="lecturer">Date of Joining <span>*</span></label>
                                <input type="date" class="form-control custom" placeholder="Date of joining" name="Date_of_Joining"/>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">Date of Exit <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Date of Exit" name="Date_of_exit"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span>*</span></label>
                                <textarea name="address" id="address"  class="form-control custom" placeholder="Your address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lecturer">Remark <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Remark" name="remark"/>
                            </div>
                            <div class="submit">
                                <input type="submit" value="Register" class="btn change" name="submit">
                            </div>
                        </form>
					</div>
				</div>
			</div>					
		</div>
	</div>
    <div class="gap-40"></div>
	<?php 
		include 'inc/footer.php';
	 ?>
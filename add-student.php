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
    include 'inc/function.php';
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
                            <a href="add-teacher.php"><i class="fas fa-user"></i>add teacher</a>
							<span class="disabled">add student</span>
						</div>
					</div>
				</div>
				<div class="addUser">
					<div class="gap-40"></div>
					<div class="reg-body user-content">
                        <?php if(isset($s_msg)):?>
                            <span class="success"> <?php echo $s_msg; ?></span>
                        <?php endif ?>
                        <?php if(isset($error_m)):?>
                            <span class="error"> <?php echo $error_m; ?></span>
                        <?php endif ?>
                        <h4 style="text-align: center; margin-bottom: 25px;">Student registration form</h4>
                        <form action="" class="form-inline" method="post">
                            <div class="form-group">
                                <label for="name" class="text-right">Name <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Your Name" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="username">Father Name <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Father Name" name="Father_Name" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" class="form-control custom" placeholder="Password" name="password"/>
                            </div>
                            <div class="form-group">
                                <label for="password">DOB <span>*</span></label>
                                <input type="date" class="form-control custom" placeholder="DOB" name="DOB"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Email" name="email"/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile No <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Mobile No" name="phone"/>
                            </div>
                            <div class="form-group">
                                <label for="sem"> Grade <span>*</span></label>
                                <select class="form-control custom" name="sem">
                                    <option>1st</option>
                                    <option>2nd</option>
                                    <option>3rd</option>
                                    <option>4th</option>
                                    <option>5th</option>
                                    <option>6th</option>
                                    <option>7th</option>
                                    <option>8th</option>
                                    <option>9th</option>
                                    <option>10th</option>
                                    <option>11th</option>
                                    <option>12th</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dept">Department <span>*</span></label>
                                <select class="form-control custom" name="dept">
                                    <option>Iplay</option>
                                    <option>Idiscover junior</option>
                                    <option>Idiscover senior</option>
                                    <option>Ilead</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="session">Eligibility <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Eligibility" name="eligibility"/>
                            </div>
                            <div class="form-group">
                                <label for="regno">Student Id <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Student Id" name="regno"/>
                            </div>
                            <div class="form-group">
                                <label for="regno"> Date of Joining <span>*</span></label>
                                <input type="date" class="form-control custom" placeholder="Date of Joining" name="Date_of_Joining"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Date of Exit <span>*</span></label>
                                <input name="Date_of_exit" id="doe"  class="form-control custom" placeholder="Date of Exit" type="text"></input>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span>*</span></label>
                                <textarea name="address" id="address"  class="form-control custom" placeholder="Your address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Remark <span>*</span></label>
                                <textarea name="Remark" id="remark"  class="form-control custom" placeholder="Remark"></textarea>
                            </div>
                            <div class="submit">
                                <input type="submit" value="Add Student" name="submit" class="btn change text-center">
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
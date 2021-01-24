<!DOCTYPE html>
<html>

<head>
	<title>Lab6.5 - Nguyễn Tuấn Anh - 1733403</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.error {
			color: #FF0000;
		}
	</style>
</head>

<body>
	<?php
	$firstname = $lastname = $email = $password = $gender = $summary = "";
	$day = $month = $year = "";
	$err_firstname = $err_lastname =  $err_email = $err_password = $err_dob = $err_summary = "";
	$count = 0;
	$country == "vietnam";
	if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) ) {
		if (empty(trim($_POST['firstname'])) ||  strlen($_POST['firstname']) < 2 || strlen($_POST['firstname']) > 30 ) {
			$err_firstname = "Do dai ten phai tu 2 den 30 ky tu";
		} else {
			$firstname = $_POST['firstname'];
			$count++;
		}
		if (empty(trim($_POST['lastname'])) ||  strlen($_POST['lastname']) < 2 || strlen($_POST['lastname']) > 30 ) {
			$err_lastname = "Do dai ho phai tu 2 den 30 ky tu";
		} else {
			$lastname = $_POST['lastname'];
			$count++;
		}
		if (empty(trim($_POST['password'])) ||  strlen($_POST['password']) < 2 || strlen($_POST['password']) > 30 ) {
			$err_password = "Do dai mat khau phai tu 2 den 30 ky tu";
		} else {
			$password = $_POST['password'];
			$count++;
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$email = $_POST['email'];
			$count++;
		} else {
			$err_email = "email khong dung dinh dang";
		}
		if (strlen($_POST['summary']) > 10000 ) {
			$err_summary = "Do dai khung gioi thieu khong duoc qua 10000 ky tu";
		} else {
			$summary = $_POST['summary'];
			$count++;
		}
		if (!checkdate( $_POST['month'] , $_POST['day'] , $_POST['year'])) {
			$err_dob = "Ngay nhap khong hop le";
		} else {
			$count++;
			$day = intval($_POST['day']);
			$month = intval($_POST['month']);
			$year = intval($_POST['year']);
		}
		$gender = $_POST['gender'];
	}

	?>
	<div class="container mt-5">
		<h1 class="text-center mb-4">Form đăng ký thành viên đơn giản</h1>
		<form id="frmRegister" style="padding: 0.5rem 3rem;margin: 0 10rem;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right" for="firstname">Tên <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" placeholder="Nhập tên" id="firstname">
					<div class="error" name="err_firstname"><?php echo $err_firstname; ?></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right" for="lastname">Họ <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname" placeholder="Nhập họ" id="lastname">
					<div class="error" name="err_lastname"><?php echo $err_lastname; ?></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right" for="email">Email <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Nhập email" id="email">
					<div class="error"><?php echo $err_email; ?></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right" for="pwd">Mật khẩu <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Nhập mật khẩu" id="password">
					<div class="error"><?php echo $err_password; ?></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right" for="day">Ngày sinh <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class=" input-group">
						<div class="form-group col-md-3 pl-0">
						<select id="day" name="day" class="form-control">
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "1") echo "selected"; ?> value="1">1</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "2") echo "selected"; ?> value="2">2</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "3") echo "selected"; ?> value="3">3</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "4") echo "selected"; ?> value="4">4</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "5") echo "selected"; ?> value="5">5</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "6") echo "selected"; ?> value="6">6</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "7") echo "selected"; ?> value="7">7</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "8") echo "selected"; ?> value="8">8</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "9") echo "selected"; ?> value="9">9</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "10") echo "selected"; ?> value="10">10</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "11") echo "selected"; ?> value="11">11</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "12") echo "selected"; ?> value="12">12</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "13") echo "selected"; ?> value="13">13</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "14") echo "selected"; ?> value="14">14</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "15") echo "selected"; ?> value="15">15</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "16") echo "selected"; ?> value="16">16</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "17") echo "selected"; ?> value="17">17</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "18") echo "selected"; ?> value="18">18</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "19") echo "selected"; ?> value="19">19</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "20") echo "selected"; ?> value="20">20</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "21") echo "selected"; ?> value="21">21</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "22") echo "selected"; ?> value="22">22</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "23") echo "selected"; ?> value="23">23</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "24") echo "selected"; ?> value="24">24</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "25") echo "selected"; ?> value="25">25</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "26") echo "selected"; ?> value="26">26</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "27") echo "selected"; ?> value="27">27</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "28") echo "selected"; ?> value="28">28</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "29") echo "selected"; ?> value="29">29</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "30") echo "selected"; ?> value="30">30</option>
							<option <?php if (isset($_POST['day']) && $_POST['day'] == "31") echo "selected"; ?> value="31">31</option>
						</select>
						</div>
						<div class="form-group col-md-3">
							<select id="month" name="month" class="form-control">
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "1") echo "selected"; ?> value="1">Tháng 1</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "2") echo "selected"; ?> value="2">Tháng 2</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "3") echo "selected"; ?> value="3">Tháng 3</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "4") echo "selected"; ?> value="4">Tháng 4</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "5") echo "selected"; ?> value="5">Tháng 5</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "6") echo "selected"; ?> value="6">Tháng 6</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "7") echo "selected"; ?> value="7">Tháng 7</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "8") echo "selected"; ?> value="8">Tháng 8</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "9") echo "selected"; ?> value="9">Tháng 9</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "10") echo "selected"; ?> value="10">Tháng 10</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "11") echo "selected"; ?> value="11">Tháng 11</option>
								<option <?php if (isset($_POST['month']) && $_POST['month'] == "12") echo "selected"; ?> value="12">Tháng 12</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<select id="year" name="year" class="form-control">
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2021") echo "selected"; ?> value="2021">2021</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2020") echo "selected"; ?> value="2020">2020</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2019") echo "selected"; ?> value="2019">2019</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2018") echo "selected"; ?> value="2018">2018</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2017") echo "selected"; ?> value="2017">2017</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2016") echo "selected"; ?> value="2016">2016</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2015") echo "selected"; ?> value="2015">2015</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2014") echo "selected"; ?> value="2014">2014</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2013") echo "selected"; ?> value="2013">2013</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2012") echo "selected"; ?> value="2012">2012</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2011") echo "selected"; ?> value="2011">2011</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2010") echo "selected"; ?> value="2010">2010</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2009") echo "selected"; ?> value="2009">2009</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2008") echo "selected"; ?> value="2008">2008</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2007") echo "selected"; ?> value="2007">2007</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2006") echo "selected"; ?> value="2006">2006</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2005") echo "selected"; ?> value="2005">2005</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2004") echo "selected"; ?> value="2004">2004</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2003") echo "selected"; ?> value="2003">2003</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2002") echo "selected"; ?> value="2002">2002</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2001") echo "selected"; ?> value="2001">2001</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "2000") echo "selected"; ?> value="2000">2000</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1999") echo "selected"; ?> value="1999">1999</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1998") echo "selected"; ?> value="1998">1998</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1997") echo "selected"; ?> value="1997">1997</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1996") echo "selected"; ?> value="1996">1996</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1995") echo "selected"; ?> value="1995">1995</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1994") echo "selected"; ?> value="1994">1994</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1993") echo "selected"; ?> value="1993">1993</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1992") echo "selected"; ?> value="1992">1992</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1991") echo "selected"; ?> value="1991">1991</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1990") echo "selected"; ?> value="1990">1990</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1989") echo "selected"; ?> value="1989">1989</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1988") echo "selected"; ?> value="1988">1988</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1987") echo "selected"; ?> value="1987">1987</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1986") echo "selected"; ?> value="1986">1986</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1985") echo "selected"; ?> value="1985">1985</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1984") echo "selected"; ?> value="1984">1984</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1983") echo "selected"; ?> value="1983">1983</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1982") echo "selected"; ?> value="1982">1982</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1981") echo "selected"; ?> value="1981">1981</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1980") echo "selected"; ?> value="1980">1980</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1979") echo "selected"; ?> value="1979">1979</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1978") echo "selected"; ?> value="1978">1978</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1977") echo "selected"; ?> value="1977">1977</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1976") echo "selected"; ?> value="1976">1976</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1975") echo "selected"; ?> value="1975">1975</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1974") echo "selected"; ?> value="1974">1974</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1973") echo "selected"; ?> value="1973">1973</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1972") echo "selected"; ?> value="1972">1972</option>
								<option <?php if (isset($_POST['year']) && $_POST['year'] == "1971") echo "selected"; ?> value="1971">1971</option>
							</select>
						</div>
					</div>
					<div class="error"><?php echo $err_dob; ?></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Giới tính <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<label class="form-check-label" for="male">
							<input type="radio" id="male" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> class="form-check-input" value="male">Nam
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label" for="female">
						<input type="radio" id="female" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> class="form-check-input" value="female">
						Nữ</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label" for="other">
							<input type="radio" id="other" name="gender"  <?php if (isset($gender) && $gender == "other") echo "checked"; ?> class="form-check-input" value="other">
						Khác</label>
					</div>
				</div>

			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">Nước <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select class="custom-select mr-sm-2" name="country" id="country">
						<option <?php if (isset($country) && $country == "vietnam") echo "selected"; ?> value="vietnam">Vietnam</option>
						<option <?php if (isset($country) && $country == "australia") echo "selected"; ?> value="australia">Australia</option>
						<option <?php if (isset($country) && $country == "unitedstate") echo "selected"; ?> value="unitedstate">United States</option>
						<option <?php if (isset($country) && $country == "india") echo "selected"; ?> value="india">India</option>
						<option <?php if (isset($country) && $country == "other") echo "selected"; ?> value="other">Other</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right">About <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<textarea class="form-control" id="txt-about" name="summary"><?php echo $summary; ?></textarea>
					<div class="error" value="<?php echo $err_summary; ?>"></div>
				</div>
			</div>
			<div id="about-count"></div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label text-right"></label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary mr-2" value="Summit">
					<input type="submit" name="reset" class="btn btn-secondary  ml-2" value="Reset">
				</div>
			</div>
		</form>
		<?php
		if ($count == 6) {
			echo "<div class=\"text-success text-center\" style=\"padding: 0.5rem 3rem;margin: 0 10rem;\">complete!</div>";
		}
		?>
	</div>
</body>

</html>
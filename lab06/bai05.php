<!DOCTYPE html>
<html>

<head>
  <title>Lab 6.5 - Nguyễn Tuấn Anh - 1733403</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
    form {
      margin-left: 16.6665%;
    }

    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <?php
  $no_a = $no_b = $calcOpt = $result = "";
  $error_a = $error_b = "";
  if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) ) {
    if (empty($_POST['no_a']) && $_POST['no_a'] !== '0') {
      $error_a = "Số a không được để trống";
    } else if (!is_numeric($_POST['no_a'])) {
      $error_a = "Giá trị nhập không phải số.";
    } else {
      $no_a = get_numeric($_POST['no_a']);
    }
    if (empty($_POST['no_b']) && $_POST['no_b'] !== '0') {
      $error_b = "Số b không được để trống";
    } else if (!is_numeric($_POST['no_b'])) {
      $error_b = "Giá trị nhập không phải số.";
    } else {
      $no_b = get_numeric($_POST['no_b']);
    }
    if (is_numeric($_POST['no_b']) && is_numeric($_POST['no_b'])) {
      $calcOpt = $_POST['calc_type'];
      if ($calcOpt == '+') {
        $result = $no_a + $no_b;
      } else if ($calcOpt == '-') {
        $result = $no_a - $no_b;
      } else if ($calcOpt == '*') {
        $result = $no_a * $no_b;
      } else if ($calcOpt == '/') {
        if ($no_b == 0) {
          $error_b = "Thương số b phải khác 0";
        } else {
          $result = $no_a / $no_b;
        }
      } else if ($calcOpt == '^') {
        $result = pow($no_a, $no_b);
      }
    }
  }

  // https://www.php.net/manual/en/function.is-numeric.php
  function get_numeric($val)
  {
    if (is_numeric($val)) {
      return $val + 0;
    }
    return 0;
  }

  ?>

  <div class="container mt-5">
    <h1 class="text-center mb-3">Form tính đơn giản</h1>
    <form class="text-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="text-left">
        <label class="col-sm-2"></label>
        <span class="error"><?php echo $error_a; ?></span>
      </div>
      <div class="form-group row">
        <label for="no_a" class="col-sm-2 col-form-label text-right">Số a <span class="text-danger">*</span>:</label>
        <div class="col-sm-6">
          <input type="text" name="no_a" value="<?php echo $no_a; ?>" class="form-control" id="no_a">
        </div>
      </div>
      <div class="text-left">
        <label class="col-sm-2"></label>
        <span class="error"><?php echo $error_b; ?></span>
      </div>
      <div class="form-group row">
        <label for="no_b" class="col-sm-2 col-form-label text-right">Số b <span class="text-danger">*</span>:</label>
        <div class="col-sm-6">
          <input type="text" name="no_b" value="<?php echo $no_b; ?>" class="form-control" id="no_b">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label text-right" for="calc_type">Phép tính</label>
        <div class="col-sm-2">
          <select id="calc_type" class="form-control" name="calc_type">
            <option <?php if (isset($calcOpt) && $calcOpt == "+") echo "selected"; ?> value="+">Cộng</option>
            <option <?php if (isset($calcOpt) && $calcOpt == "-") echo "selected"; ?> value="-">Trừ</option>
            <option <?php if (isset($calcOpt) && $calcOpt == "*") echo "selected"; ?> value="*">Nhân</option>
            <option <?php if (isset($calcOpt) && $calcOpt == "/") echo "selected"; ?> value="/">Chia</option>
            <option <?php if (isset($calcOpt) && $calcOpt == "^") echo "selected"; ?> value="^">Lũy thừa</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2 col-form-label"></div>
        <div class="col-sm-3">
          <input type="submit" name="submit" class="btn btn-primary float-left" value="Tính">
          <input type="submit" name="reset" class="btn btn-secondary" value="Reset">
        </div>
      </div>
      <div class="form-group row">
        <label for="result" class="col-sm-2 col-form-label text-right">Kết quả:</label>
        <div class="col-sm-6">
          <input type="text" name="result" class="form-control" id="result" value="<?php echo $result; ?>">
        </div>
      </div>
    </form>

  </div>

  </form>
</body>

</html>
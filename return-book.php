<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="">
<script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnX11h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
</head>
<body>
<button type="button" id="click">ClickMe</button>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
$('#click').on('click',function(){
Swal.fire('Good job!','You clicked the button!','success')
});
</script>
</html>
// Hàm gửi dữ liệu
function Join() {
	// Khai báo các biến dữ liệu trong form
	$username = $('#username').val();
	$password = $('#password').val();

	// Gửi dữ liệu
	$.ajax({
		url : 'join.php', // Đường dẫn file xử lý
		type : 'POST', // Phương thức
		// Các dữ liệu
		data : {
			username : $username,
			password : $password
		// Thực thi khi gửi dữ liệu thành công
		}, success : function(result) {
			$('#formJoin .btn-submit').html('Bắt đầu');
			$('#formJoin .alert').html(result); // Thông báo
		}
	});
}

// Bắt sự kiện click vào nút bắt đầu của form
$('#formJoin .btn-submit').click(function() {
	$(this).html('Đang tải ...');
	// Thực thi gửi dữ liệu
	Join();
});

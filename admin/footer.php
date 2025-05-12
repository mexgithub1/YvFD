<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/moment/moment.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>




<script>
	$('#example1').DataTable({})
	$('#example2').DataTable({})
	$('#example3').DataTable({})
    $(document).on('click', '#updateprofile', function(e){
	    e.preventDefault();
	    $('#profile').modal('show');
	    var users_id = $(this).data('users_id');
	    var firstname = $(this).data('firstname');
	    var lastname = $(this).data('lastname');
	    var phone_number = $(this).data('phone_number');
	    var age = $(this).data('age');
	    var gender = $(this).data('gender');
	    var email = $(this).data('email');
	    var password = $(this).data('password');

	    $('#users_id').val(users_id)
	    $('#firstname').val(firstname)
	    $('#lastname').val(lastname)
	    $('#phone_number').val(phone_number)
	    $('#age').val(age)
	    $('#gender').val(gender)
	    $('#email').val(email)
	    $('#password').val(password)
	});

	$(function(){
		var url = window.location;
		$('ul.sidebar-menu a').filter(function() {
		    return this.href == url;
		}).parent().addClass('active');
		$('ul.treeview-menu a').filter(function() {
		    return this.href == url;
		}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
	});

    $.ajax({
	  	url: 'notification.php',
	  	type: 'POST',
	  	success:function(data){
	  		$('.datanotification').html(data)
	  	}
    })

    $('.btnnotif').click(function(){
        $('.notification-container').toggleClass('notification-container-show')
        $('.notification-indicator').hide();
        $.ajax({
	        url: 'notification_status_update.php', // Create this PHP file
	        type: 'POST',
	        data: { status: 1 }, // Assuming 1 means "read" or "hidden"
	        success: function(response) {
	            console.log(response);
	        }
        });
    })

	$.ajax({
	  	url: 'notification_status.php',
	  	type: 'POST',
	  	success:function(data){
	  		if (data == 0) {
	  			$('.notification-indicator').show();
	  		} else {
	  			$('.notification-indicator').hide();
	  		}
	  	}
	})


	$('.dropdownli').click(function(){
		$('.dropdown-wrapper').toggleClass('dropdown-wrapper-show')
	})

	$('.dropdownli2').click(function(){
		$('.dropdown-wrapper2').toggleClass('dropdown-wrapper-show2')
	})
</script>
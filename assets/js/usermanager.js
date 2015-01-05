	
	function deleteUser(user_id) {
		if(confirm("Are you sure you want to delete this user?")) {
			document.location.href = apitesterurl + "delete/id/" + user_id;
		}
	}
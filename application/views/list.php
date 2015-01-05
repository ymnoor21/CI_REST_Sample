		
	    <div class="container">
	      	<div class="starter-template">
	      		<div style="text-align: left"><a href="<?php echo $this->_apitesterBaseURL . 'add'; ?>">Add New</a></div>
	      		<section id="no-more-tables">
		      		<table class='table table-bordered table-striped table-hover cf'>
		      			<thead>
							<tr>
								<th style="text-align: center">ID</th>
								<th style="text-align: center">First Name</th>
								<th style="text-align: center">Last Name</th>
								<th style="text-align: center">Email</th>
								<th style="text-align: center">User Type</th>
								<th style="text-align: center">Action</th>
							</tr>
						</thead>
						<tbody>
		      			<?php
						foreach($list as $item) {
							echo "<tr>";
							echo "<td data-title='ID'>" . $item->id . "</td>";
							echo "<td data-title='First Name'>" . $item->first_name . "</td>";
							echo "<td data-title='Last Name'>" . $item->last_name . "</td>";
							echo "<td data-title='Email'>" . $item->email . "</td>";
							echo "<td data-title='User Type'>" . $item->type . "</td>";
							echo "<td data-title='Action'><a href='" . $this->_apitesterBaseURL . "edit/id/{$item->id}'>Edit</a> | <a href='javascript:void(0);' onclick='deleteUser({$item->id});'>Delete</a></td>";
							echo "</tr>";
						}
						?>
						</tbody>
					</table>
				</section>
	      	</div>
	    </div>
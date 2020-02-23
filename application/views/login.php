<?php $this->load->view("includes/header.php"); ?>
<body>
	<div class="page">
		<div class="sw_back loginBlock">
			<san><?php echo $error; ?></span>
			<?php
			echo validation_errors('<span>', '</span>');
			$attrs = array('id' => 'loginForm', 'name' => 'loginForm');
			echo form_open('login', $attrs); ?>
				<p><label for="user_name">Username:</label><input type="text" name="user_name" ng-model="logCont.login.user_name" autofocus required/></p>
				<p><label for="password">Password:</label><input type="password" name="password" ng-model="logCont.login.password" required/></p>
				<button type="submit" name="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>

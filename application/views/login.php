<?php $this->load->view("includes/header.php"); ?>
<body ng-controller="loginController as logCont" ng-cloak>
	<div class="page">
		<div class="sw_back loginBlock">
			<form class="login" id="loginForm" name="loginForm" ng-submit="loginForm.$valid && logCont.tryLogin()" novalidate>
				<p><label for="user_name">Username:</label><input type="text" name="user_name" ng-model="logCont.login.user_name" autofocus required/></p>
				<p><label for="password">Password:</label><input type="password" name="password" ng-model="logCont.login.password" required/></p>
				<button type="submit" name="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>

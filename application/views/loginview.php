<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript">
			$(function () {
			    var body = $('body');
			    var backgrounds = [
			      'url(assets/images/asdas.jpg)',
			      'url(assets/images/campus.jpg)'];
			    var current = 0;

			    function nextBackground() {
			    	body.fadeTo('slow', 0.1, function(){
			    		body.css(
			            'background',
			        backgrounds[current = ++current % backgrounds.length]);

			        setTimeout(nextBackground, 50000000);
			    	}).fadeTo('slow', 1);
			    }

			    setTimeout(nextBackground, 5000000000);
			    body.css('background', backgrounds[0]);

			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="login-body">
				<div class="row">
					<div class="col s8">
						<div class="card n/a transparent z-depth-0">
							<div class="card-content white-text">
								<span class="card-title1">Welcome to Groupie!</span>
								<p class="p1">
									 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut luctus quam eu erat sodales, sed laoreet felis consectetur. Mauris semper euismod nunc, ac egestas dui fringilla vitae. Phasellus pulvinar iaculis malesuada. Integer id mollis est. Donec non condimentum odio. Praesent porttitor diam a quam ultrices, eu cursus eros commodo. Suspendisse justo augue, tempus id faucibus a, posuere at dolor. Aliquam condimentum leo et sem sollicitudin, eu fringilla massa varius. Mauris consectetur velit vitae dui finibus, feugiat scelerisque risus feugiat. Duis luctus quam in sollicitudin luctus. Curabitur nec condimentum mi, eget scelerisque dolor. Maecenas et ante quam. Praesent at diam sit amet felis feugiat consequat.
								</p>
							</div>
						</div>
					</div>
					<div class="col s4">
						<div class="card-panel grey lighten-4">
							<div class="row">
								<form class="login-form" method="POST" action="<?php echo base_url('newsfeed');?>">
									<div class="row">
										<div class="input-field">
											<input name ="studentID" id="studentID" type="text" class="validate" required>
											<label for="studentID">ID</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field">
											<input name ="password" id="password" type="password" class="validate" required>
											<label for="password">Password</label>
										</div>
									</div>
									<div class="row">
										<button class="btn waves-effect waves-light red col s12" type="submit" name="action">Sign In
											<i class="material-icons right">send</i>
										</button>
									</div>
									<div class="row">
										<a href="#" style="color:red">Forgot Password?</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
  		<div>
	</body>
</html>

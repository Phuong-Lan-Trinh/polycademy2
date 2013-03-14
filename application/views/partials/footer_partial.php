		<footer>
			<div class="container">
				<p><?= $copyright ?></p>
			</div>
		</footer>
		
		<!-- Client Side Templates -->
		<? Template::partial('home/home_index') ?>
		<? Template::partial('blog/blog_index') ?>
		
		<!-- Pass in PHP variables to Javascript -->
		<script>
			var serverVars = {
				baseUrl: '<?= base_url() ?>',
				csrfCookieName: '<?= $this->config->item('cookie_prefix') . $this->config->item('csrf_cookie_name') ?>'
			};
		</script>
		
		<!-- Vendor Javascripts -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<!-- <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script> -->
		<script>window.angular || document.write('<script src="js/vendor/angular.js"><\/script>')</script>
		<script src="js/vendor/angular-resource.min.js"></script>
		<script src="js/vendor/angular-cookies.min.js"></script>
		
		<!-- AngularJS Front Controller, Bootstrap and Router -->
		<script src="js/app.js"></script>
		
		<!-- Page Level Controllers -->
		<script src="js/controllers/Nav.Controllers.js"></script>
		<script src="js/controllers/Home.Controllers.js"></script>
		<script src="js/controllers/Blog.Controllers.js"></script>
		
		<!-- Reusable Services -->
		<script src="js/services/Version.Service.js"></script>
		<script src="js/services/BlogData.Service.js"></script>
		
		<!-- Reusable Directives -->
		<script src="js/directives/NewsItem.Directive.js"></script>
		
		<!-- Reusable Filters -->
		<script src="js/filters/Interpolate.Filter.js"></script>

		<script>
			var _gaq=[['_setAccount','<?= $google_analytics_key ?>'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
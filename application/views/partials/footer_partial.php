		<footer ng-controller="FooterCtrl">
			<div class="container">
				<article class="row footer_grid" equalise-heights-dir="section > p">
					<section class="blog_panel span4">
						<h3><a href="blog">Blog</a></h3></h3>
						<p>
							<span ng-repeat="posts in [1, 2, 3, 4]">
								&#8226; <em class="footer_dates">2012/02/01</em> - Awesome Blog Post!<br /><br />
							</span>
						</p>
					</section>
					<section class="fbtwitter_panel span4">
						<h3><a href="<?=$facebook?>">FB</a>.<a href="<?=$twitter?>">Twitter</a></h3>
						<p>
							<span ng-repeat="status in [1, 2, 3, 4]">
								&#8226; <em class="footer_dates">2012/02/01</em> - Awesome Tweet!<br /><br />
							</span>
						</p>
					</section>
					<section class="notices_panel span4">
						<h3>Notices</h3>
						<p>
							We're looking for companies, mentors and advisors. If you are interested in getting involved and checking out our students, check our partners page and contact us.
							<br />
							<br />
							You can contact us at <a href='http://www.google.com/recaptcha/mailhide/d?k=01q-bJV3WQrMYWD2quLJ7VPA==&c=FsmnfqaQraWCMzZB6tsagBZd557LPBLlxh80gaenMSo='>@polycademy.com</a> or phone us at +61 (0)420 925 975
						</p>
					</section>
				</article>
				<ul class="footer_links">
					<li><a href="terms_of_service">Terms of Service & Privacy Policy</a></li>
					<li><a href="refund_policy">Refund Policy</a></li>
				</ul>
				<p class="copyright"><?=$copyright?></p>
			</div>
			
			<!-- XHR Messages other than GET-->
			<div class="http_messages">
				<em class="http_message" ng-repeat="httpmessage in httpMessages" fade-in-out-dir="2000">{{httpmessage.message}}</em>
			</div>
			
		</footer>
		
		<!-- AJAX Loader Screen -->
		<div class="ajax_loader"></div>
		
		<!-- Client Side Templates -->
		<? Template::partial('home/home_index') ?>
		<? Template::partial('blog/blog_index') ?>
		<? Template::partial('courses/courses_index') ?>
		
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
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
		<script>window.angular || document.write('<script src="js/vendor/angular.min.js"><\/script>')</script>
		<script src="js/vendor/angular-resource.min.js"></script>
		<script src="js/vendor/angular-cookies.min.js"></script>
		
		<!-- AngularJS Front Controller, Bootstrap and Router -->
		<script src="js/app.js"></script>
		
		<!-- Page Level Controllers -->
		<script src="js/controllers/Header.Controllers.js"></script>
		<script src="js/controllers/Footer.Controllers.js"></script>
		<script src="js/controllers/Home.Controllers.js"></script>
		<script src="js/controllers/Courses.Controllers.js"></script>
		<script src="js/controllers/Blog.Controllers.js"></script>
		
		<!-- Reusable Services -->
		<script src="js/services/AjaxLoader.Service.js"></script>
		<script src="js/services/ErrorResponse.Service.js"></script>
		<script src="js/services/Courses.Service.js"></script>
		
		<!-- Reusable Directives -->
		<script src="js/directives/EqualiseHeight.Directive.js"></script>
		<script src="js/directives/Fade.Directive.js"></script>
		
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
		<footer>
			<div class="container">
				<p><?= $copyright ?></p>
			</div>
		</footer>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?= base_url() ?>js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<script src="<?= base_url() ?>js/vendor/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>js/vendor/angular.min.js"></script>
		
		<script src="<?= base_url() ?>js/app.js"></script>

		<script>
			var _gaq=[['_setAccount','<?= $google_analytics_key ?>'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
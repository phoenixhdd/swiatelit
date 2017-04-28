		<?php wp_footer(); ?>
		<footer>
	        <div class="container px-0">
	            <div class="top_foot">
	                <div class="newsletter">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('newsletter')): ?>
						<?php endif; ?>
	                </div>
	                <div class="logo_footer">
	                    <a href="#">
	                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_footer.png" alt="Logo">
	                    </a>

	                    <ul class="social">
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook_footer.png" alt="Facebook"></a></li>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram_footer.png" alt="Instagram"></a></li>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter_footer.png" alt="Twitter"></a></li>
	                    </ul>
	                </div>
	                <div class="prenumerata">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('prenumerata')): ?>
						<?php endif; ?>
	                </div>
	            </div>
	        </div>
	        <div class="copyright">
	            <div class="container">
	                Projektowanie stron <a href="http://sgr.pl/" class="semibold">Studio Graficzne</a>
	            </div>
	        </div>
	    </footer>

		<script type="text/javascript">
			ragadjust('p, li, h3', 'all');
		</script>
	</body>
</html>

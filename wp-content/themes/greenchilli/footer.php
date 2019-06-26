<?php $options = get_option('greenchilli'); ?>
	
</div><!--.container-->
        <div class="wrapper">
            <div class="progress">
                <img src="<?php echo get_template_directory_uri(); ?>/images/progress.png" alt="" />
            </div>
        </div>
</div>
	<footer>
	<div class="for_bckg_footer_menu">
            <div class="wrapper">
		<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer_menu', 'container' => '' ) ); ?>
            </div>
        </div>
        <div class="wrapper">
            <div class="sub_footer">
                <div class="information">
                    <p>220030 Минск,</p>
                    <p>ул.Октябрьская, 4. </p>
                    <p>Тел.: +375 (17) 2104106,</p>
                    <p>Моб. тел.: +375 (29) 1114106</p>
                </div>
                <div class="footer_logo">
                    <a href="/" class="footer_logo_img"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_footer.png" alt="" /></a>
                    <a class="link_footer" href="/">Учреждение образования<br />Белорусский государственный<br />университет физической культуры</a>
                    <p>Copyright © <?php echo date("Y"); ?>  УО БГУФК.</p>		   
                </div>
                <div class="subscribe clearfix">                   
		    <?php widgetized_footer(); ?>
                </div>
            </div>
        </div>	
	</footer><!--footer-->
<?php mts_footer(); ?>
<?php wp_footer(); ?>
</div>
</body>
</html>
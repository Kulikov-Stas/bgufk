	<div class="left_content">
                <ul class="menu">
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/message.png" alt="" /></a><a class="text_menu" href="/category/abiturientu/">Абитуриенту</a></li>
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/student.png" alt="" /></a><a class="text_menu" href="/category/studentu/">Студенту</a></li>
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/auditor.png" alt="" /></a><a class="text_menu" href="/category/slushatelyu/">Слушателю</a></li>
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/teacher.png" alt="" /></a><a class="text_menu" href="/category/prepodavatelyu/">Преподавателю</a></li>
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/forum.png" alt="" /></a><a class="text_menu" href="/forum/">Форум</a></li>
                    <li><a href="#"><img class="img_menu" src="<?php echo get_template_directory_uri(); ?>/images/contact.png" alt="" /></a><a class="text_menu" href="/kontakty/">Контакты</a></li>
                </ul>
                <div class="for_preview">
                    <div class="anons"><a href="#">АНОНСЫ</a></div>
                    <ul class="preview">
			<?php $query = new WP_Query('category_name=novosti-sporta');
			
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
			} else {
				// Постов не найдено
			}
			
			wp_reset_postdata();
			 ?>                        
                    </ul>
                    <div class="for_all_preview"><a class="all_preview" href="/category/novosti-sporta/">Все анонсы</a></div>
                </div>
        </div>
<aside class="sidebar c-4-12">
<div id="sidebars" class="g">
	<div class="sidebar">
	<ul class="sidebar_list">
		<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>	

		<?php //молчание - золото ?>
	
		<?php endif; ?>
	</ul>
	</div>
</div><!--sidebars-->
</aside>
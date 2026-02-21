<?php

get_header(); ?>

<main class="wrapper new_one_container">
	<p class="flex gap_10 items_center"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
			<path d="M4.5 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.9004 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M0.900391 6.422H14.5004" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M14.9 5.95001V12.75C14.9 15.15 13.7 16.75 10.9 16.75H4.5C1.7 16.75 0.5 15.15 0.5 12.75V5.95001C0.5 3.55001 1.7 1.95001 4.5 1.95001H10.9C13.7 1.95001 14.9 3.55001 14.9 5.95001Z" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.6554 10.11H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M10.6554 12.51H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M7.69541 10.11H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M7.69541 12.51H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M4.73643 10.11H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M4.73643 12.51H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg><span class="date">20.10.2025</span></p>
	<h1 class="animate fade-up show" data-delay="100"><?php echo get_the_title(); ?></h1>
	<picture class="animate fade-up show" data-delay="100">
		<?php the_post_thumbnail('full'); ?>
	</picture>
	<div class="description_news">
		<?php echo get_the_content(); ?>
	</div>
</main>
<?php get_footer(); ?>
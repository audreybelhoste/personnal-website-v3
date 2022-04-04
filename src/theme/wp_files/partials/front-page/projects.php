<?php 

$args = [
	'post_type' => 'projet',
	'posts_per_page' => -1, 
	'post_status' => 'publish'
];

$projects = new WP_Query( $args );


?>
<section id="projects" class="section project right">

	<h2 class="mainTitle">Projets</h2>

	<?php if($projects->have_posts()): ?>
	<div class="section__content">

		<?php $i=1;
		foreach($projects->get_posts() as $project){
			get_template_part("partials/project", "item", ['project' => $project, 'order' => $i++]);
		}
		?>


	</div>
	<?php endif; ?>

</section>
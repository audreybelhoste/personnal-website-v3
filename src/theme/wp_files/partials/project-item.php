<?php
$project = $args['project'];
$order = sprintf("%02d", $args['order']);
$title = $project->post_title;
$year = get_field('project_year', $project->ID);
$stack = get_field('project_stack', $project->ID);
$content = get_field('project_content', $project->ID);
$image = get_field('project_img', $project->ID);
$links = get_field('project_link', $project->ID);

?>

<div class="project__item">
	<h3 class="project__item__title"><span class="project__item__title__number"><?= $order ?></span><?= $title ?></h3>
	<div class="project__item__container">
		<div class="project__item__img">
			<img src="<?= $image['sizes']['image_tablet'] ?>" alt="<?= $image['alt'] ?>">
		</div>
		<div class="project__item__informations">
			<div class="project__item__details">
				<div>
					<p class="project__item__details__title">Année</p>
					<p class="project__item__details__text"><?= $year ?></p>
				</div>
				<div>
					<p class="project__item__details__title">Technologies utilisées</p>
					<p class="project__item__details__text"><?= $stack ?></p>
				</div>
			</div>
			<div class="project__item__description">
				<div class="project__item__description__content">
					<?= $content ?>
				</div>
				<?php if($links): ?>
					<div class="btnGroup">
						<?php foreach($links as $link): $link = $link['project_link_item']; ?>
							<a href="<?= $link['url'] ?>" <?php if(!empty($link['target'])){ echo 'target="' . $link['target'] .'"'; } ?> class="btn-primary"><?= $link['title'] ?></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
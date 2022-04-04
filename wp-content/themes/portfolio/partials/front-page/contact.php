<section id="contact" class="section contact right">
    <h2 class="mainTitle">Contact</h2>
    <div class="section__content">
		<form action="/pages/success" name="contact" method="POST" data-netlify="true">
			<div class="postcardLeft">
				<label for="message" class="required">Message</label>
				<textarea id="message" name="message" required="true"></textarea>
			</div>
			<div class="postcardRight">
				<div class="postcardRight__formRow desktopOnly">
					<label for="from">Pour</label>
					<input type="text" id="from" name="from" value="Audrey BELHOSTE" disabled>
				</div>
				<div class="postcardRight__formRow">
					<label for="from" class="required">De</label>
					<input type="text" id="from" name="from" required="true">
				</div>
				<div class="postcardRight__formRow">
					<label for="email">Email</label>
					<input type="email" id="email" name="email">
				</div>
				<button type="submit" class="btn-primary">Envoyer le message</button>
			</div>
		</form>
		<div class="contact__linkedin">
			<a href="https://www.linkedin.com/in/audrey-belhoste-096b8118a/" target="_blank">
				<img src="<?= get_template_directory_uri(); ?>/images/linkedin.svg" alt="Me connacter sur Linkedin">
			</a>
		</div>
    </div>
</section>
<?php
/*
* Theme Name: © Portfolio Audrey Belhoste
* Author: Audrey Belhoste
* Version: 0.0.1
* Text Domain: portfolio
* Description: Front page template
*			   Portfolio website for Audrey Belhoste
*/

get_header(); ?>


<?php //------------MAIN CONTENT-----------------------
?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

<div class="container">
      <section id="presentation" class="section presentation active">
        <h2 class="mainTitle">Accueil</h2>
        <div class="section__content">
        <div class="presentation__container" id="scene">
          <div>
            <h1 class="presentation__title">Bonjour, je suis <span class="presentation__name">Audrey Belhoste</span></h1>
            <p class="presentation__text">Je suis <span class="presentation__underline">développeuse web</span>, intéressée à la fois par le <span class="presentation__bold">front-end</span> et le <span class="presentation__bold">back-end</span>.</p>
          </div>
          <img class="presentation__container__oval" src="<?= get_template_directory_uri(); ?>/images/oval.svg" alt="" data-depth="0.9">
          <img class="presentation__container__sparkle" src="<?= get_template_directory_uri(); ?>/images/sparkle.svg" alt="" data-depth="0.1">
        </div>
          <ul class="presentation__competences">
            <li class="presentation__competences__item">HTML</li>
            <li class="presentation__competences__item">CSS (Sass)</li>
            <li class="presentation__competences__item">Bootstrap</li>
            <li class="presentation__competences__item">PHP/Symfony</li>
            <li class="presentation__competences__item">Javascript/JQuery/React</li>
            <li class="presentation__competences__item">SQL</li>
            <li class="presentation__competences__item">Git/Github</li>
            <li class="presentation__competences__item">Qualité web : Certification Opquast (865 points)</li>
          </ul>
        </div>
      </section>
      <section id="projects" class="section project right">
        <h2 class="mainTitle">Projets</h2>
          <div class="section__content">
            <div class="project__item">
            <h3 class="project__item__title"><span class="project__item__title__number">01</span>OhMyFood</h3>
            <div class="project__item__container">
              <div class="project__item__img">
                <img src="<?= get_template_directory_uri(); ?>/images/ohmyfood.png" alt="Capture d'écran OhMyFood">
              </div>
              <div class="project__item__informations">
                <div class="project__item__details">
                  <div>
                    <p class="project__item__details__title">Année</p>
                    <p class="project__item__details__text">2021</p>
                  </div>
                  <div>
                    <p class="project__item__details__title">Technologies utilisées</p>
                    <p class="project__item__details__text">HTML / Sass</p>
                  </div>
                </div>
                <div class="project__item__description">
                  <p class="project__item__description__title">Le besoin (fictif)</p>
                  <p>Ohmyfood! est une jeune startup qui voudrait s'imposer sur le marché de la restauration. L'objectif est de développer un site 100% mobile qui répertorie les menus de restaurants gastronomiques. En plus des systèmes classiques de réservation, les clients pourront composer le menu de leur repas pour que les plats soient prêts à leur arrivée. Finis, les temps d'attente au restaurant ! </p>
                  <div class="btnGroup">
                    <a href="https://audreybelhoste.github.io/AudreyBelhoste_3_05022021/index.html" target="_blank" class="btn-primary">Accéder au site</a>
                    <a href="https://github.com/audreybelhoste/AudreyBelhoste_3_05022021" target="_blank" class="btn-primary">Accéder au code</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="project__item">
            <h3 class="project__item__title"><span class="project__item__title__number">02</span>SportSee</h3>
            <div class="project__item__container">
              <div class="project__item__img">
                <img src="<?= get_template_directory_uri(); ?>/images/sportsee.png" alt="Capture d'écran OhMyFood">
              </div>
              <div class="project__item__informations">
                <div class="project__item__details">
                  <div>
                    <p class="project__item__details__title">Année</p>
                    <p class="project__item__details__text">2021</p>
                  </div>
                  <div>
                    <p class="project__item__details__title">Technologies utilisées</p>
                    <p class="project__item__details__text">React : utilisation de Recharts et Axios</p>
                  </div>
                </div>
                <div class="project__item__description">
                  <p class="project__item__description__title">Le besoin (fictif)</p>
                  <p>SportSee est une startup dédiée au coaching sportif. En pleine croissance, l’entreprise va aujourd’hui lancer une nouvelle version de la page profil de l’utilisateur. Cette page va notamment permettre à l’utilisateur de suivre le nombre de sessions réalisées ainsi que le nombre de calories brûlées. </p>
                  <div class="btnGroup">
                    <a href="https://github.com/audreybelhoste/AudreyBelhoste_12_06012022" target="_blank" class="btn-primary">Accéder au code</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="project__item">
            <h3 class="project__item__title"><span class="project__item__title__number">03</span>Qui veut quoi ?</h3>
            <div class="project__item__container">
              <div class="project__item__img">
                <img src="<?= get_template_directory_uri(); ?>/images/quiveutquoi.png" alt="Capture d'écran Qui veut quoi ?">
              </div>
              <div class="project__item__informations">
                <div class="project__item__details">
                  <div>
                    <p class="project__item__details__title">Année</p>
                    <p class="project__item__details__text">2022</p>
                  </div>
                  <div>
                    <p class="project__item__details__title">Technologies utilisées</p>
                    <p class="project__item__details__text">A venir </p>
                  </div>
                </div>
                <div class="project__item__description">
                  <p class="project__item__description__title">Le besoin</p>
                  <p>A venir</p>
                  <p class="project__item__description__title">L'avancement du projet</p>
                  <p>Les maquettes sont presques finalisées. Date de sortie prévue pour la première version : avant la fin du mois d'avril.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="project__item">
          <h3 class="project__item__title"><span class="project__item__title__number">04</span>Learning-Mate</h3>
            <div class="project__item__container">
              <div class="project__item__img">
                <img src="<?= get_template_directory_uri(); ?>/images/learning-mate.png" alt="Capture d'écran page de connexion Learning-mate">
              </div>
              <div class="project__item__informations">
                <div class="project__item__details">
                  <div>
                    <p class="project__item__details__title">Année</p>
                    <p class="project__item__details__text">2021-2022</p>
                  </div>
                  <div>
                    <p class="project__item__details__title">Technologies utilisées</p>
                    <p class="project__item__details__text">PHP 8 / Symfony 5 / Bootstrap / Sass / Javascript Vanilla </p>
                  </div>
                </div>
                <div class="project__item__description">
                  <p class="project__item__description__title">Le besoin</p>
                  <p>Permettre au stagiaire de voir son avancement dans sa prestation, d’avoir une vision de son parcours, l’accompagner au mieux dans son apprentissage. C’est la volonté de l’IBEP qui a donc choisi d’internaliser sa plateforme de suivi pédagogique. 
                    Le développement en interne permet de répondre au plus vite aux besoins des stagiaires et des formateurs et de proposer régulièrement de nouvelles fonctionnalités. </p>
                  <p class="project__item__description__title">Mes réalisations durant ce projet</p>
                  <ul>
                    <li>Analyse de l’existant et recueil du besoin </li>
                    <li>Rédaction du cahier des charges </li>
                    <li>Réalisation des maquettes avec Adobe XD</li>
                    <li>Développement front et back de certaines fonctionnalités</li>
                    <li>Suivi du projet avec Notion</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
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
    </div>

</main>
<?php //------------END MAIN CONTENT-------------------
?>

<?php get_footer();

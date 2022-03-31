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
            <p class="presentation__text">Je vous présente ici <span class="presentation__italic">mon parcours</span>.</p>
            <a class="presentation__cv" href="./files/cv_audrey_belhoste.pdf" download target="_blank">
              <img src="img/badgecv.svg">
            </a>
          </div>
          <img class="presentation__container__oval" src="<?= get_template_directory_uri(); ?>/images/oval.svg" alt="" data-depth="0.9">
          <img class="presentation__container__sparkle" src="img/sparkle.svg" alt="" data-depth="0.1">
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
      <section id="projects" class="section projects right">
        <h2 class="mainTitle">Projets</h2>
          <div class="section__content">
            <a href="pages/entrepriseProject.html" class="projects__item">
              <h3 class="projects__item__title"><span class="projects__item__title__number">01</span>Projet en entreprise</h3>
              <div class="projects__item__img">
                <img src="img/learning-mate.png" alt="Capture d'écran page de connexion Learning-mate">
              </div>
              <div class="projects__item__description">
                <p>Learning-mate : plateforme d’accompagment pédagogique pour les stagiaires Ibep Formation.</p>
                <span class="btn-primary">Voir plus</span>
              </div>
            </a>

            <a href="pages/schoolProjects.html" class="projects__item">
              <h3 class="projects__item__title"><span class="projects__item__title__number">02</span>Projets de formation</h3>
              <div class="projects__item__img">
                <img src="img/sportsee.png" alt="Capture d'écran projet SportSee">
              </div>
              <div class="projects__item__description">
                <p>Sélection de différents projets réalisées durant ma formation OpenClassrooms et de challenges issus du site Frontend Mentor.</p>
                <span class="btn-primary">Voir plus</span>
              </div>
            </a>

            <a href="pages/personnalProject.html" class="projects__item">
              <h3 class="projects__item__title"><span class="projects__item__title__number">03</span>Projet personnel</h3>
              <div class="projects__item__img">
                <img src="img/quiveutquoi.png" alt="Capture d'écran Qui veut quoi">
              </div>
              <div class="projects__item__description">
                <p>Qui veut quoi ? Création et partage de listes de cadeaux.</p>
                <span class="btn-primary">Voir plus</span>
              </div>
            </a>
        </section>
        <section id="experiences" class="section experiences right">
          <h2 class="mainTitle">Expériences</h2>
          <div class="section__content">
            <div class="experiences__item">
              <p class="experiences__item__date experiences__item__date--double"><span>2021</span><span>/</span><span>2022</span></p>
              <div class="experiences__item__details experiences__item__details--first">
                <p><span class="experiences__item__details--bold">Développeur d'application front-end</span></p>
                <p>OpenClassrooms</p>
              </div>
              <div class="experiences__item__details experiences__item__details--second">
                <p><span class="experiences__item__details--bold">Alternance</span></p>
                <p>IBEP Formation</p>
              </div>
            </div>
            <div class="experiences__item">
              <p class="experiences__item__date"><span>20</span><span>20</span></p>
              <div class="experiences__item__details experiences__item__details--first">
                <p><span class="experiences__item__details--bold">Développeur web et web mobile</span></p>
                <p>Eni Ecole Informatique</p>
              </div>
              <div class="experiences__item__details experiences__item__details--second">
                <p><span class="experiences__item__details--bold">Stage</span></p>
                <p>IBEP Formation</p>
              </div>
            </div>
            <div class="experiences__item">
              <p class="experiences__item__date experiences__item__date--double"><span>2016</span><span>/</span><span>2019</span></p>
              <div class="experiences__item__details">
                <p><span class="experiences__item__details--bold">Professeure des écoles</span></p>
              </div>
            </div>
            <div class="experiences__item">
              <p class="experiences__item__date experiences__item__date--double"><span>2015</span><span>/</span><span>2017</span></p>
              <div class="experiences__item__details">
                <p><span class="experiences__item__details--bold">Master Métiers de l’enseignement, de l’éducation et de la formation</span></p>
                <p>Université de Caen</p>
              </div>
            </div>
            <div class="experiences__item">
              <p class="experiences__item__date"><span>20</span><span>15</span></p>
              <div class="experiences__item__details experiences__item__details--first">
                <p><span class="experiences__item__details--bold">Licence 3 Sciences de l'éducation</span></p>
                <p>Université de Caen</p>
              </div>
              <div class="experiences__item__details experiences__item__details--second">
                <p><span class="experiences__item__details--bold">Mission de service civique</span></p>
                <p>AFEV Caen</p>
              </div>
            </div>
            <div class="experiences__item">
              <p class="experiences__item__date"><span>20</span><span>14</span></p>
              <div class="experiences__item__details">
                <p><span class="experiences__item__details--bold">DUT Information-Communication</span></p>
                <p>Université de Caen</p>
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
              <img src="img/linkedin.svg" alt="Me connacter sur Linkedin">
            </a>
          </div>
        </div>
      </section>
    </div>

</main>
<?php //------------END MAIN CONTENT-------------------
?>

<?php get_footer();

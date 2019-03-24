<footer class="page-footer mt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-lg-4 col-md-4 mx-auto">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">A propos</h5>
        <p class="text-justify"></p>
      </div>
      <div class="col-lg-4 col-md-6 mx-auto tcolor text-center">
      <!--Maps Google-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10365.226445541946!2d0.1141593!3d49.4976036!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfe4b0c42f3814072!2sLabel+Bulles+%26+Pile+et+Face!5e0!3m2!1sfr!2sfr!4v1552903459275" width="60%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-lg-4 col-md-2 mx-auto text-center">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Menu</h5>
        <ul class="list-unstyled">
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->getFullUrl('showShonen'); ?>" title="Manga pour garçon">Shōnen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->getFullUrl('showShojo'); ?>" title="Manga pour fille">Shōjo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->getFullUrl('showSeinen'); ?>" title="manga pour jeune homme">Seinen</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p class="ptext"><a href="<?= $router->getFullUrl('privaty-polity'); ?>">Politique de confidentialité</a></p>
      </div>
      <div class="col-12">
        <p class="ptext">Made by Lemahieu Luc</p>
      </div>
    </div>
  </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<?php if(isset($page) && $page === 'register') { ?>
<script src="<?= PROJECT_LINK; ?>/public/assets/js/register.js"></script>
<?php } ?>
<?php if(isset($page) && $page === 'management') { ?>
  <script src="<?= PROJECT_LINK; ?>/public/assets/js/management.js"></script>
<?php } ?>
</body>
</html>

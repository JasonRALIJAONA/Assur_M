<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/login.css">
  <link rel="shortcut icon" href=" <?php echo base_url(); ?>assets/img/logo2.png" >
  <title>Login</title>
</head>

<body>
  <div class="panel_blur"></div>
  <div class="panel">
    <div class="panel__form-wrapper">



      <ul class="panel__headers">

        <li class="panel__header active"><a href="#login-form" class="panel__link" role="button">Connection</a></li>
      </ul>

      <div class="panel__forms">

        <!-- Login Form -->
        <form class="form panel__login-form" id="login-form" method="post" action="<?php echo site_url('form_controller/checkLogin'); ?>">
          <div class="form__row">
            <input type="text" id="email" class="form__input" name="login-mail" data-validation="email" data-error="Invalid email address." required>
            <span class="form__bar"></span>
            <label for="email" class="form__label">E-mail</label>
            <span class="form__error"></span>
          </div>
          <div class="form__row">
            <input type="password" id="password" class="form__input" name="login-pass" data-validation="length" data-validation-length="8-25" data-error="Password must contain 8-25 characters." required>
            <span class="form__bar"></span>
            <label for="password" class="form__label">Mot de passe</label>
            <span class="form__error"></span>
          </div>
          <div class="form__row">
            <input type="submit" class="form__submit" value="Se Connecter">
            <a href="<?php echo base_url("form_controller/inscription_personne"); ?>" class="form__retrieve-pass" role="button">Vous n'avez pas encore de compte?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <?php if (isset($erreur)) : ?>
    <div style="color: red;">
      <script>
        Swal.fire({
          icon: "error",
          text: '<?= $erreur ?>'
        });
      </script>
    </div>
  <?php endif; ?>
  <script src="<?php echo base_url(); ?>assets/js_client/login.js"></script>
</body>

</html>
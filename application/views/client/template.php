<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Assur_M</title>
  <link rel="stylesheet" href= "<?php echo base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css_client/style_model.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body>
<?php 
    $this->load->view("client/partial/nav_template.php");
?>
<section id="content-model">
    <?php $this->load->view("client/".$content); ?>
</section>

<script src="<?php echo base_url(); ?>assets/js_client/model.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>
  
</body>
</html>
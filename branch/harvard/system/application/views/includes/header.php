<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <title><?php echo $this->lang->line('site_title'); ?></title>

        <!-- GLOBAL CSS and Javascript -->
        <link href="<?php echo base_url('css/layout.css');?>" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo base_url('images/favicon.ico');?>" rel="Shortcut Icon" type="image/x-icon" />
        <link href="//fonts.googleapis.com/css?family=Ovo" rel="stylesheet" type="text/css">
        <!-- Template CSS -->
        <link href="<?php echo base_url('css/custom-theme/jquery-ui-1.8.19.custom.css');?>" rel="stylesheet" type="text/css" media="screen" /> 
        <link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/style.css');?>" rel="stylesheet" type="text/css" media="screen" /> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('js/jquery-ui-1.8.19.custom.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/jqueryForm.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/publicAjax.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/ieSucks.js');?>" type="text/javascript"></script>
        <script>
            var basepath = "<?php echo site_url(); ?>";
        </script>
    </head>
    <body>
        <header>
            <hgroup>
                <h2 id="tagline"><?php echo $this->lang->line('tagline'); ?></h2>
                <h1 id="logo" title="<?php echo $this->lang->line('app_name'); ?>"><a href="<?php echo site_url(); ?>"></a></h1>
            </hgroup>
                <div id="auth">
                <?php if ($this->ion_auth->logged_in()): ?>
                    <span><?php echo htmlentities(str_replace('$username', $this->ion_auth->user()->row()->username, $this->lang->line('logged_in_as'))); ?></span> &mdash;
                    <?php echo anchor('auth/logout', $this->lang->line('logout')); ?>
                <?php else: ?>
                    <?php echo anchor('auth/login', $this->lang->line('login')); ?>
                <?php endif; ?>
                </div>
        </header>

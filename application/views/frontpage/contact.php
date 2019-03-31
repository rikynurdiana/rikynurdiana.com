<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <meta name="keywords" content="web application developer php codeigniter laravel mysql bootstrap sass nginx aws ruby article blog live love story">
    <meta name="description" content="The more that you read, the more things you will know. The more that you learn, the more places you'll go.">

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@riky_nurdiana" />
    <meta name="twitter:title" content="rikynurdiana.com" />
    <meta name="twitter:description" content="Life is too short to do the things you don't love doing." />
    <meta name="twitter:image" content="<?php echo base_url('/assets/images/logo.png'); ?>" />

    <meta property="og:url" content="<?php echo base_url('/'); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Life is too short to do the things you don't love doing." />
    <meta property="og:description" content="The more that you read, the more things you will know. The more that you learn, the more places you'll go." />
    <meta property="og:image" content="<?php echo base_url('/assets/images/logo.png'); ?>" />
    <meta property="og:site_name" content="rikynurdiana.com" />
    <meta property="fb:app_id" content="187586878342246" />

    <title>Contact Me - rikynurdiana.com</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo base_url(''); ?>">
    <link rel="alternate" href="http://rikynurdiana.com/" hreflang="en-us">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/clean-blog.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/hover-min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pace.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/googletag_head.js'); ?>"></script>
</head>
<body>
    <?php $this->load->view('frontpage/partial_navigation'); ?>
    <script src="<?php echo base_url('assets/js/analytics.js'); ?>"></script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW3GZD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('assets/images/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <div class="heading-big">
                            Contact Me
                        </div>
                        <hr class="small">
                        <span itemprop="caption" class="subheading"><h1>Have questions? I have answers (maybe).</h1></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
                <?php if ($this->session->flashdata('email_success')): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('email_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('email_fail')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('email_fail'); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('frontpage/sendMail'); ?>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?php echo $widget;?>
                            <?php echo $script;?>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default" id="button1">Send</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
    <script async src="<?php echo base_url('assets/js/contact_me.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jqBootstrapValidation.js'); ?>"></script>
</body>
</html>

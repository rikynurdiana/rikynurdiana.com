<!DOCTYPE html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="author" content="riky nurdiana">

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

    <title>About Me - rikynurdiana.com</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo base_url(''); ?>">
	<?php $this->load->view('frontpage/assets_header'); ?>
</head>
<body>
    <?php $this->load->view('frontpage/partial_navigation'); ?>
    <script src="<?php echo base_url('assets/js/analytics.js'); ?>"></script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW3GZD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <header class="intro-header" style="background-image: url('assets/images/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <div class="heading-big">
                            About Me
                            <h1 class="hidden">About Me</h1>
                        </div>
                        <hr class="small">
                        <span class="subheading">"This is what I do."</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div id="about-me" class="col-lg-12 text-center">
                <div class="title-about-me">
                    this is my activity
                    <h2 class="hidden" >this is my activity</h2>
                </div>
                <div class="strip1"></div>
                <div class="desc-icon">
                    do what you love. don't do what you hate
                    <h3 class="hidden" >do what you love. don't do what you hate</h3>
                </div>
                <div class="clearfix"></div>
                <br><br>
                <div class="activity-icon col-lg-4">
                    <span class="hvr-float-shadow badge-coding"><i class="fa fa-file-code-o fa-5x" aria-hidden="true"></i></span>
                    <div class="clearfix"></div>
                    <div class="title-icon hvr-pulse-shrink">
                        coding
                    </div>
                    <div class="strip"></div>
                    <div class="clearfix"></div>
                    <div class="decs-icon">
                        Coding for me like eat. I do every day and i like this activity because coding make me can talk to computer.
                    </div>
                </div>
                <div class="activity-icon col-lg-4">
                    <span class="hvr-float-shadow badge-bloging"><i class="fa fa-pencil-square-o fa-5x" aria-hidden="true"></i></span>
                    <div class="clearfix"></div>
                    <div class="title-icon hvr-pulse-shrink">
                        blogging
                    </div>
                    <div class="strip"></div>
                    <div class="clearfix"></div>
                    <div class="decs-icon">
                        For me blogging just hoby to excite feelings only. Instead of writing in social media, it's better to write in blog.
                    </div>
                </div>
                <div class="activity-icon col-lg-4">
                    <span class="hvr-float-shadow badge-gaming"><i class="fa fa-gamepad fa-5x" aria-hidden="true"></i></span>
                    <div class="clearfix"></div>
                    <div class="title-icon hvr-pulse-shrink">
                        gaming
                    </div>
                    <div class="strip"></div>
                    <div class="clearfix"></div>
                    <div class="decs-icon">
                        Gaming just for fun. Not addict but I'm a PRO. Do you ready for battle? Maybe i can beat you after finish my code.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden">
        <p class="h-card">
          <img class="u-photo" src="<?php echo base_url('assets/images/riky2.png'); ?>" alt="" />
          <a class="p-name u-url" href="http://rikynurdiana.com">Riky Nurdiana</a>
          <a class="u-email" href="mailto:nurdiana.riky@gmail.com">nurdiana.riky@gmail.com</a>,
          <span class="p-street-address">padalarang</span>
          <span class="p-locality">jawa barat</span>
          <span class="p-country-name">indonesia</span>
        </p>
        <span class="vcard">
         <span class="fn">Riky Nurdiana</span>,
         <span class="org">PT. Ebizu Prima Indonesia</span>
        </span>
    </div>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Person",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Bandung",
        "addressRegion": "Jawa Barat",
        "postalCode": "40553",
        "streetAddress": "JL. Kebon Kelapa No.16 RT.04 RW.02 Desa Kertajaya, Kecamatan Padalarang, Kabupaten Bandung Barat., 40553"
      },
      "colleague": [
        "http://www.unpas.ac.id/"
      ],
      "email": "mailto:nurdiana.riky@gmail.com",
      "image": "<?php echo base_url('/assets/images/riky.jpg'); ?>",
      "jobTitle": "Web Developer",
      "name": "Riky Nurdiana",
      "url": "http://rikynurdiana.com"
    }
    </script>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</body>
</html>

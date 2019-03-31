<!DOCTYPE html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <meta itemprop="keywords" name="keywords" content="<?php echo $caption; ?>">
    <meta itemprop="description" name="description" content="<?php echo $caption; ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@riky_nurdiana">
    <meta name="twitter:creator" content="@riky_nurdiana">
    <meta name="twitter:title" content="<?php echo $caption; ?>">
    <meta name="twitter:description" content="<?php echo $caption; ?>">
    <meta name="twitter:image" content="<?php echo base_url('/').$thumbnail; ?>">

    <meta property="og:url" content="<?php echo base_url('/imagecloud').'/'.$this->uri->segment(2); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $caption; ?>" />
    <meta property="og:description" content="<?php echo $caption; ?>" />
    <meta property="og:image" content="<?php echo base_url('/imagecloud').'/'.$thumbnail; ?>" />
    <meta property="og:site_name" content="rikynurdiana.com" />
    <meta property="fb:app_id" content="187586878342246" />

    <title><?php echo $caption; ?> - rikynurdiana.com</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo base_url('/imagecloud').'/'.$slug; ?>">
    <?php $this->load->view('frontpage/assets_header'); ?>
</head>
<body>
    <?php $this->load->view('frontpage/partial_navigation'); ?>
    <script src="<?php echo base_url('assets/js/analytics.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/fbsdk.js'); ?>"></script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW3GZD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <header class="intro-header" style="background-image: linear-gradient( rgba(0,0,0,.5), rgba(0,0,0,.5) ), url('/assets/images/home-bg.jpg'); background-attachment: fixed; background-size : cover;">
        <div class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <div class="icon-r">
                            <span class="badge">R</span>
                        </div>
                        <hr class="small">
                        <span itemprop="caption" class="subheading hidden-xs"><h1>The more that you read, the more things you will know.</h1></span>
                        <span itemprop="caption" class="subheading hidden-xs"><h2>The more that you learn, the more places you'll go.</h2></span>
                        <span itemprop="caption" class="subheading hidden-lg hidden-md hidden-sm"><h3>Life is too short to do the things you don't love doing.</h3></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <amp-img class="hidden" src="<?php echo base_url('/').$thumbnail; ?>" alt="<?php echo $caption; ?>" height="400" width="800"></amp-img>

    <article class="hentry">
        <div class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="row">
                <div itemprop="articleBody" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <img src="<?php echo '/'.$thumbnail ?>" alt="" />
                </div>
            </div>
        </div>
    </article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="social-button">
                    <?php $this->load->view('fb/follow'); ?>
                    <span class="likebtn-wrapper"
                          data-theme="github"
                          data-white_label="true"
                          data-identifier="<?php echo $id; ?>"
                          data-dislike_enabled="false"
                          data-item_url="<?php echo base_url('/post').'/'.$slug; ?>"
                          data-item_title="<?php echo $caption; ?>"
                          data-item_description="<?php echo $caption; ?>"
                          data-item_image="<?php echo base_url('/imagecloud').'/'.$crop; ?>"
                          data-item_date="<?php echo date('d M Y', strtotime($created_at)); ?>"
                          data-lazy_load="true"
                          data-loader_show="true">
                    </span>
                </div>
                <hr>
                <?php $this->load->view('fb/comment'); ?>
                <?php $this->load->view('fb/send'); ?>
            </div>
        </div>
    </div>
    <h2 class="hidden">Artikel <?php echo $caption; ?></h2>
    <h3 class="hidden">Blog <?php echo $caption; ?></h3>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</script>
</body>
</html>

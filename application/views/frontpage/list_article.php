<!DOCTYPE html>
<html amp lang="en">
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

    <title>rikynurdiana.com</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo base_url(''); ?>">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <div class="icon-r">
                            <span class="hvr-pulse badge">R</span>
                        </div>
                        <hr class="small">
                        <span itemprop="caption" class="subheading hidden-xs"><h1>"The more that you read, the more things you will know.</h1></span>
                        <span itemprop="caption" class="subheading hidden-xs"><h2>The more that you learn, the more places you'll go."</h2></span>
                        <span itemprop="caption" class="subheading hidden-lg hidden-md hidden-sm"><h3>Life is too short to do the things you don't love doing.</h3></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <amp-img class="hidden" src="<?php echo base_url('/assets/images/logo.gif'); ?>" alt="Life is too short to do the things you don't love doing." height="400" width="400"></amp-img>

    <div class="container" itemscope itemtype="http://schema.org/Blog">
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div id="blog" class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                    <article class="hentry">
                        <div class="post-preview col-lg-12 thumbnail">
                            <div class="hvr-float-shadow avatar pull-left">
                                <img itemprop="image" src="/assets/images/riky.png" alt="author" class="img-circle" width="50px"/>
                            </div>
                            <div class="author">
                                <span itemprop="author" class="name author hcard">Riky Nurdiana</span>
                            </div>
                            <div class="article-date">
                                <span datetime="<?php echo date('d M Y', strtotime($article->create_at)); ?>" class="date published">
                                    <?php echo date('d M Y', strtotime($article->create_at)); ?>
                                </span>
                            </div>
                            <div class="article-image-small">
                                <div class="box-image">
                                    <a href="<?php echo base_url('/post').'/'.$article->slug; ?>">
                                        <img itemprop="image" data-original="<?php echo '/'.$article->crop; ?>" alt="<?php echo $article->caption; ?>" class="img-responsive lazy-big" width="100%">
                                    </a>
                                </div>
                            </div>
                            <div class="article-title-small">
                                <a href="<?php echo base_url('/post').'/'.$article->slug; ?>">
                                    <span class="entry-title"><?php echo $article->caption; ?></span>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="social-button">
                                <br>
                                <!-- <span class="likebtn-wrapper"
                                      data-theme="github"
                                      data-white_label="true"
                                      data-identifier="<?php echo $article->id; ?>"
                                      data-dislike_enabled="false"
                                      data-item_url="<?php echo base_url('/post').'/'.$article->slug; ?>"
                                      data-item_title="<?php echo $article->caption; ?>"
                                      data-item_description="<?php echo $article->excerpt; ?>"
                                      data-item_image="<?php echo $article->crop; ?>"
                                      data-item_date="<?php echo date('d M Y', strtotime($article->create_at)); ?>"
                                      data-lazy_load="true"
                                      data-loader_show="true">
                                </span> -->
                            </div>
                            <div class="category">
                                <?php if ($article->editor_pick == 1): ?>
                                    <span class="hvr-float-shadow"><i class="fa fa-star-o"></i>&nbsp;Editors' Pick</span>&nbsp;&nbsp;
                                <?php endif; ?>
                                <span class="hvr-float-shadow"><i class="fa fa-folder-open-o"></i>&nbsp;<a href="#" data-toggle="tooltip" title="category"><?php echo $article->category; ?></a></span>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Pager -->
    <div class="clearfix"></div>
    <div class="text-center">
        <?php echo $this->pagination->create_links(); ?>
    </div>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</body>
</html>

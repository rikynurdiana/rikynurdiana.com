<!DOCTYPE html>
<html amp lang="en">
<head>
    <?php $this->load->view('frontpage/partial_meta'); ?>
    <link rel="canonical" href="<?php echo base_url(''); ?>">
    <meta name="keywords" content="web application developer php codeigniter laravel mysql bootstrap sass nginx aws ruby article blog live love story">
    <meta name="description" content="The more that you read, the more things you will know. The more that you learn, the more places you'll go.">

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@riky_nurdiana" />
    <meta name="twitter:title" content="rikynurdiana.com" />
    <meta name="twitter:description" content="Life is too short to do the things you don't love doing." />
    <meta name="twitter:image" content="<?php echo base_url('/assets/images/logo.gif'); ?>" />

    <meta property="og:url" content="<?php echo base_url('/'); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Life is too short to do the things you don't love doing." />
    <meta property="og:description" content="The more that you read, the more things you will know. The more that you learn, the more places you'll go." />
    <meta property="og:image" content="<?php echo base_url('/assets/images/logo.gif'); ?>" />
    <meta property="og:site_name" content="rikynurdiana.com" />

    <title>rikynurdiana.com</title>
	<?php $this->load->view('frontpage/assets_header'); ?>
</head>
<body>
    <?php $this->load->view('analyticstracking'); ?>
    <?php $this->load->view('frontpage/partial_navigation'); ?>

    <!-- Page Header -->
    <header class="intro-header"
            style="background-image: linear-gradient( rgba(0,0,0,.5), rgba(0,0,0,.5) ), url('/assets/images/home-bg.jpg');
                   background-attachment: fixed;
                   background-size : cover;">
        <div class="container" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <div class="icon-r">
                            <span class="badge">R</span>
                        </div>
                        <hr class="small">
                        <span itemprop="caption" class="subheading"><h1>Life is too short to do the things you don't love doing.</h1></span>
                        <span itemprop="caption" class="hidden"><h2>The more that you read, the more things you will know.</h2></span>
                        <span itemprop="caption" class="hidden"><h3>The more that you learn, the more places you'll go.</h3></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <amp-img class="hidden" src="<?php echo base_url('/assets/images/logo.gif'); ?>" alt="Life is too short to do the things you don't love doing." height="400" width="400"></amp-img>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php foreach ($articles as $article): ?>
                    <article class="hentry">
                        <div itemprop="articleBody" class="post-preview">
                            <a href="post/<?php echo $article->slug; ?>">
                                <div itemprop="caption" class="post-title entry-title">
                                    <span class="entry-title"><?php echo $article->caption; ?></span>
                                </div>
                                <div itemprop="articleSection" class="post-subtitle">
                                    <span class="entry-content" itemprop="articleSection"><?php echo $article->excerpt; ?></span>
                                </div>
                            </a>
                            <p class="post-meta"><i class="fa fa-user"></i> <a itemprop="author" class="author vcard" href="<?php echo base_url('/about') ?>">Riky</a> &nbsp;&nbsp;
                            <i class="fa fa-clock-o"></i>
                                <span class="published" datetime="<?php echo date('d M Y', strtotime($article->create_at)); ?>">
                                    <?php echo date('d M Y', strtotime($article->create_at)); ?> &nbsp;&nbsp;
                                </span>
                            <i class="fa fa-folder-open-o"></i> <a href="#"><?php echo $article->category ?></a> </p>
                        </div>
                    </article>
                    <hr>
                <?php endforeach; ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="<?php echo base_url('/blog')?>">Another Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</body>
</html>

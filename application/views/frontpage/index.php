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
    <?php $this->load->view('analyticstracking'); ?>
    <?php $this->load->view('fb/sdk'); ?>
    <?php $this->load->view('frontpage/partial_navigation'); ?>
    <?php $this->load->view('googletag_body'); ?>

    <header class="intro-header" style="background-image: linear-gradient( rgba(0,0,0,.5), rgba(0,0,0,.5) ), url('/assets/images/home-bg.jpg'); background-attachment: fixed; background-size : cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <div class="icon-r">
                            <span class="hvr-pulse badge">R</span>
                        </div>
                        <hr class="small">
                        <span class="subheading "><h1>"Life is too short to do the things you don't love doing."</h1></span>
                        <span class="subheading hidden-lg hidden-md hidden-sm hidden-xs"><h2>The more that you read, the more things you will know.</h2></span>
                        <span class="subheading hidden-lg hidden-md hidden-sm hidden-xs"><h3>The more that you learn, the more places you'll go.</h3></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <amp-img class="hidden" src="<?php echo base_url('/assets/images/logo.gif'); ?>" alt="Life is too short to do the things you don't love doing." height="400" width="400"></amp-img>

    <div class="container" itemscope itemtype="http://schema.org/Blog">
        <div class="row">
            <div id="blog" class="col-lg-7 col-md-7 col-sm-7 col-sx-12">

                <?php foreach ($articles as $article): ?>
                    <article class="hentry">
                        <div class="post-preview col-lg-12 thumbnail">
                            <div class="hvr-float-shadow avatar pull-left">
                                <img src="/assets/images/riky.png" alt="author" class="img-circle" width="50px"/>
                            </div>
                            <div class="author">
                                <span itemprop="author" class="author name vcard">Riky Nurdiana</span>
                            </div>
                            <div class="article-date">
                                <span datetime="<?php echo date('d M Y', strtotime($article->create_at)); ?>" class="date published">
                                    <i class="fa fa-clock-o"></i> <?php echo date('d M Y', strtotime($article->create_at)); ?>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="article-image">
                                <div class="box-image">
                                    <a href="<?php echo base_url('/post').'/'.$article->slug; ?>">
                                        <img itemprop="image" src="/assets/images/loading.gif" data-original="<?php echo $article->crop; ?>" alt="<?php echo $article->caption; ?>" class="img-responsive lazy-big" width="100%">
                                    </a>
                                </div>
                            </div>
                            <div class="article-title">
                                <a href="<?php echo base_url('/post').'/'.$article->slug; ?>">
                                    <span class="entry-title"><?php echo $article->caption; ?></span>
                                </a>
                            </div>
                            <div class="article-exerpt">
                                <span class="entry-content"><?php echo $article->excerpt; ?></span>
                            </div>
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
                <?php endforeach; ?>

                <ul class="pager">
                    <li class="next">
                        <a class="hvr-underline-from-left" href="<?php echo base_url('/frontpage/blog')?>">Another Article &rarr;</a>
                    </li>
                </ul>

                <div class="clearfix"></div><hr>

                <footer>
                    <div class="col-lg-12 text-center">
                        <ul class="list-inline text-center">
                            <li>
                                <a class="hvr-float-shadow " href="https://twitter.com/riky_nurdiana" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="hvr-float-shadow " href="https://www.facebook.com/RikyNurdiana-633024016858379/" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="hvr-float-shadow " href="https://id.linkedin.com/in/riky-nurdiana-394871b8" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-linkedin-square fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="hvr-float-shadow " href="https://github.com/rikynurdiana" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="hvr-float-shadow " href="https://bitbucket.org/rikynurdiana/" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-bitbucket fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; rikynurdiana.com 2016</p>
                        <p class="copyright text-muted"><small>| R {elapsed_time}Second | M {memory_usage} |</small></p>
                    </div>
                </footer>
            </div>

            <div id="sidebar" class="sidebar col-lg-5 col-md-5 col-sm-5 hidden-xs">
                <div class="afix-sidebar" data-spy="affix" data-offset-top="600">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="title">
                                    Editors' picks
                                </div>
                                <div class="sub-title">
                                    Stories worth talking about
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php foreach ($editorspicks as $editor): ?>
                                <article>
                                    <div class="sidebar-article">
                                        <div class="sidebar-image pull-left">
                                            <a class="hvr-float-shadow" href="<?php echo base_url('/post').'/'.$editor->slug; ?>">
                                                <img src="/assets/images/loading.gif" data-original="<?php echo $editor->icon; ?>" alt="<?php echo $editor->caption ?>" class="img-circle lazy-small" width="50px" height="50px">
                                            </a>
                                        </div>
                                        <div class="sidebar-title">
                                            <a href="<?php echo base_url('/post').'/'.$editor->slug; ?>">
                                                <?php echo $editor->caption; ?>
                                            </a>
                                        </div>
                                        <div class="sidebar-date">
                                            <?php echo date('d M Y', strtotime($editor->create_at)); ?>
                                        </div>
                                    </div>
                                </article>
                                <div class="clearfix"></div>
                            <?php endforeach; ?>
                        </div>

                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="title">
                                    Latest Tutorials
                                </div>
                                <div class="sub-title">
                                    How to be a good programer
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php foreach ($tutorials as $tutorial): ?>
                                <article>
                                    <div class="sidebar-article">
                                        <div class="sidebar-image pull-left">
                                            <a class="hvr-float-shadow" href="<?php echo base_url('/post').'/'.$tutorial->slug; ?>">
                                                <img src="/assets/images/loading.gif" data-original="<?php echo $tutorial->icon; ?>" alt="<?php echo $tutorial->caption ?>" class="img-circle lazy-small" width="50px" height="50px">
                                            </a>
                                        </div>
                                        <div class="sidebar-title">
                                            <a href="<?php echo base_url('/post').'/'.$tutorial->slug; ?>">
                                                <?php echo $tutorial->caption; ?>
                                            </a>
                                        </div>
                                        <div class="sidebar-date">
                                            <?php echo date('d M Y', strtotime($tutorial->create_at)); ?>
                                        </div>
                                    </div>
                                </article>
                                <div class="clearfix"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</body>
</html>

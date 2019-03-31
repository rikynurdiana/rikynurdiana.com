<!DOCTYPE html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <meta itemprop="keywords" name="keywords" content="<?php echo $article->caption; ?>">
    <meta itemprop="description" name="description" content="<?php echo substr($article->meta_description, 0, 150); ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@riky_nurdiana">
    <meta name="twitter:creator" content="@riky_nurdiana">
    <meta name="twitter:title" content="<?php echo $article->caption; ?>">
    <meta name="twitter:description" content="<?php echo $article->meta_description; ?>">
    <meta name="twitter:image" content="<?php echo base_url('').$article->crop; ?>">

    <meta property="og:url" content="<?php echo base_url('/post').'/'.$this->uri->segment(2); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $article->caption; ?>" />
    <meta property="og:description" content="<?php echo $article->meta_description; ?>" />
    <meta property="og:image" content="<?php echo base_url('').$article->crop; ?>" />
    <meta property="og:site_name" content="rikynurdiana.com" />
    <meta property="fb:app_id" content="187586878342246" />

    <title><?php echo $article->caption; ?> - rikynurdiana.com</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico')?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo base_url('/post').'/'.$this->uri->segment(2); ?>">
    <?php $this->load->view('frontpage/assets_header'); ?>
</head>
<body>
    <?php $this->load->view('frontpage/partial_navigation'); ?>
    <script src="<?php echo base_url('assets/js/analytics.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/fbsdk.js'); ?>"></script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TW3GZD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <header class="intro-header" style="background-image: linear-gradient( rgba(0,0,0,.5), rgba(0,0,0,.5) ), url('/<?php echo $article->file; ?>'); background-attachment: fixed; background-size : cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1 class="entry-title" itemprop="caption"><?php echo $article->caption; ?></h1>
                        <div class="entry-summary" itemprop="articleSection"><?php echo $article->excerpt; ?></div>
                        <hr>
                        <span class="meta">Posted by <a itemprop="author" class="author vcard">Riky</a> on
                            <span class="published" datetime="<?php echo date('d M Y', strtotime($article->create_at)); ?>">
                                <?php echo date('d M Y', strtotime($article->create_at)); ?>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <amp-img class="hidden" src="<?php echo base_url('/').$article->file; ?>" alt="<?php echo $article->caption; ?>" height="400" width="800"></amp-img>

    <article class="hentry">
        <div class="container" itemscope itemtype="http://schema.org/Blog">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <span class="entry-content"><?php echo $article->description; ?></span>
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
                          data-identifier="<?php echo $article->id; ?>"
                          data-dislike_enabled="false"
                          data-item_url="<?php echo base_url('/post').'/'.$article->slug; ?>"
                          data-item_title="<?php echo $article->caption; ?>"
                          data-item_description="<?php echo $article->meta_description; ?>"
                          data-item_image="<?php echo base_url('').$article->crop; ?>"
                          data-item_date="<?php echo date('d M Y', strtotime($article->create_at)); ?>"
                          data-lazy_load="true"
                          data-loader_show="true">
                    </span>
                </div>
                <hr>
                <?php $this->load->view('fb/comment'); ?>
                <!-- <?php $this->load->view('fb/send'); ?> -->
                <hr>
                <div id="more-article" class="more-article">
                    <?php foreach ($editorspicks as $editor): ?>
                        <article class="hentry">
                            <div class="post-preview col-lg-6">
                                <div class="thumbnail">
                                    <div class="article-image">
                                        <div class="box-image">
                                            <a itemprop="<?php echo base_url('/post').'/'.$editor->slug; ?>" href="<?php echo base_url('/post').'/'.$editor->slug; ?>">
                                                <img itemprop="image" src="/assets/images/loading.gif" data-original="<?php echo base_url('').'/'.$editor->crop; ?>" alt="<?php echo $editor->caption; ?>" class="img-responsive lazy-medium" width="100%">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div itemprop="caption" class="article-title">
                                        <a href="<?php echo base_url('/post').'/'.$editor->slug; ?>">
                                            <span class="entry-title"><?php echo $editor->caption; ?></span>
                                        </a>
                                    </div>
                                    <hr>
                                    <div class="article-date">
                                        <span datetime="<?php echo date('d M Y', strtotime($editor->create_at)); ?>" class="date published">
                                            <i class="fa fa-clock-o"></i>&nbsp;<?php echo date('d M Y', strtotime($editor->create_at)); ?>
                                        </span>
                                    </div>
                                    <div class="categories">
                                        <span><i class="fa fa-folder-open-o"></i>&nbsp;<a href="#" data-toggle="tooltip" title="category"><?php echo $editor->category; ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <div class="more-button">
                        <ul class="pager">
                            <li class="next">
                                <a class="hvr-underline-from-left" href="<?php echo base_url('/frontpage/blog')?>">Another Article &rarr;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="hidden">Artikel <?php echo $article->caption; ?></h2>
    <h3 class="hidden">Blog <?php echo $article->caption; ?></h3>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</script>
</body>
</html>

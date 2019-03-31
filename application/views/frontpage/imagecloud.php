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

    <title>Images Cloud - rikynurdiana.com</title>

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
                        <span itemprop="caption" class="subheading "><h1>"Your future is determined by what you start today."</h1></span>
                        <span class="subheading hidden-lg hidden-md hidden-sm hidden-xs"><h2>The more that you read, the more things you will know.</h2></span>
                        <span class="subheading hidden-lg hidden-md hidden-sm hidden-xs"><h3>The more that you learn, the more places you'll go.</h3></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <amp-img class="hidden" src="<?php echo base_url('/assets/images/logo.gif'); ?>" alt="Life is too short to do the things you don't love doing." height="400" width="400"></amp-img>

    <div class="container" id="imagecloud" itemscope itemtype="http://schema.org/Blog">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
                <?php foreach ($images as $image): ?>
                        <div itemprop="articleBody" class="hentry image-box thumbnail">
                            <a itemprop="<?php echo base_url('/imagecloud').'/'.$image->slug; ?>" href="javascript:void(0)" data-toggle="modal" data-target="<?php echo '#'.$image->slug; ?>">
                                <div class="social-button">
                                    <!-- <span class="likebtn-wrapper"
                                          data-theme="github"
                                          data-white_label="true"
                                          data-identifier="<?php echo $image->id; ?>"
                                          data-dislike_enabled="false"
                                          data-item_url="<?php echo base_url('/imagecloud').'/'.$image->slug; ?>"
                                          data-item_title="<?php echo $image->caption; ?>"
                                          data-item_description="<?php echo $image->caption; ?>"
                                          data-item_image="<?php echo base_url('/imagecloud').'/'.$image->crop; ?>"
                                          data-item_date="<?php echo date('d M Y', strtotime($image->created_at)); ?>"
                                          data-lazy_load="true"
                                          data-loader_show="true">
                                    </span> -->
                                </div>
                                <img itemprop="image" src="/assets/images/loading.gif" data-original="<?php echo '/'.$image->crop; ?>" alt="<?php echo $image->caption; ?>" class="img-responsive lazy" width="100%"/>
                            </a>
                        </div>
                        <div class="author hidden">
                            <span itemprop="author" class="name author vcard">Riky Nurdiana</span>
                        </div>
                        <div class="article-date hidden">
                            <span datetime="<?php echo date('d M Y', strtotime($image->created_at)); ?>" class="date published">
                                <?php echo date('d M Y', strtotime($image->created_at)); ?>
                            </span>
                        </div>

                    <div class="modal fade" id="<?php echo $image->slug; ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo '/'.$image->thumbnail; ?>"  alt="<?php echo $image->caption; ?>" class="img-responsive" width="100%"/>
                                </div>
                                <div class="modal-footer">
                                    <div class="image-title text-left">
                                        <?php echo $image->caption; ?>
                                    </div>
                                    <div class="create-time text-left">
                                        <i class="fa fa-clock-o"> <?php echo date('d M Y', strtotime($image->created_at)); ?></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Pager -->
                <div class="clearfix"></div>
                <div class="text-center">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php $this->load->view('frontpage/partial_footer'); ?>
    <?php $this->load->view('frontpage/assets_footer'); ?>
</body>
</html>

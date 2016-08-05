<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo lang("webTitle"); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/mysite.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- datatable -->
    <link href="<?php echo base_url();?>css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <?php 
        # Echo this param for add_css function
        echo $_styles;
    ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php base_url($this->lang_code); ?>"><?php echo lang("webTitle"); ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php $this->load->view("navbar"); ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?>
                    <?php if(isset($this->_aUser["username"])){ ?>
                    <small><?php echo lang("welcome_text").$this->_aUser["username"]; ?></small>
                    <?php } ?>
                </h1>
                <?php if($this->current_page!=$this->_menu[0]["title"]){ ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url($this->lang_code."/".$this->_menu[0]["href"]);?>"><?php echo $this->_menu[0]["title"];?></a>
                    </li>
                    <?php 
                    if(isset($_toplink))
                    {
                        echo '<li><a href="'.$_toplink["link"].'">'.$_toplink["text"].'</a>
                    </li>';
                    }
                    ?>
                    <li class="active"><?php echo $title; ?></li>
                </ol>
                <?php } ?>
            </div>
        </div>
        <!-- /.row -->

        <?php echo $content; ?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo lang("webTitle"); ?> 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>js/mysite.js"></script>
    <!-- notification -->
    <script src="<?php echo base_url();?>js/notify.js"></script>
    <!-- datatable -->
    <script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
    <?php 
        # Echo this param for add_js function
        echo $_scripts;
    ?>

    <script type="text/javascript">
    $(document).ready(function () {
      <?php
      # Show notification session
      $aNotification = $this->session->userdata('notification');
      $this->session->unset_userdata('notification');
      if(isset($aNotification["message"])){
        #type [ success | info | warn | error ]
        echo "$.notify(\"".$aNotification['message']."\",\"".strtolower($aNotification['type'])."\");" ;
      }
      ?>
    });
    </script>
</body>

</html>

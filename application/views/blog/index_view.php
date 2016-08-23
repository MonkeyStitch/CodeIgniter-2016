<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">



        <!-- First Blog Post -->
        <h2>
            <a href="#">Blog Post Title</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>



        <!-- second Blog Post -->
        <h2>
            <a href="#">Blog Post Title</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>


        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">← Older</a>
            </li>
            <li class="next">
                <a href="#">Newer →</a>
            </li>
        </ul>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


        <!-- Blog Search Well -->
        <div class="well">
            <h4><?php echo lang('blog_blog_search') ?></h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>


        <!-- Blog Insert Post -->

        <?php
            if($this->_aUser['permission'] == "ADMIN"){
        ?>
            <div class="well">
                <h4><?php echo lang('blog_insert_blog') ?></h4>
                <div class="form-group">
                        <a type="button" class="btn btn-primary btn-lg form-control" style="height: 45px;"
                           href="<?php echo base_url($this->lang_code.'/blog/create') ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <?php echo lang('blog_add_blog') ?>
                        </a>
                </div>
            </div>
        <?php
            }
        ?>



        <!-- Blog Categories Well -->
        <div class="well">
            <h4><?php echo lang('blog_list_authors') ?></h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a></li>
                        <li><a href="#">Category Name</a></li>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a></li>
                        <li><a href="#">Category Name</a></li>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>


    </div>

</div>





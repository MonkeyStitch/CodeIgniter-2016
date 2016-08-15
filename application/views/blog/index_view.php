<?php
    if($this->_aUser['permission'] == "ADMIN"){
?>
    <p>
        <a type="button" class="btn btn-primary btn-lg"
           href="<?php echo base_url($this->lang_code.'/blog/create') ?>">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <?php echo lang('blog_add_blog') ?>
        </a>
    </p>
<?php
    }
?>





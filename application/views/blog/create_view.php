

<div class="row">
    <div class="col-md-12">
        <div class="bg-danger text-error">
            <?php echo validation_errors(); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo form_open_multipart($this->lang_code."/blog/do_create"); ?>

        <div class="control-group form-group">
            <label for="subject_blog"><?php echo lang("blog_subject"); ?></label>
            <input type="text" id="subject_blog" name="subject_blog" class="form-control"
                   data-validation-required-message="<?php echo lang("blog_subject_error"); ?>">
        </div>

        <div class="control-group form-group">
            <label for="image_blog"><?php echo lang("blog_image"); ?></label>
            <input type="file" id="image_blog" name="image_blog" >
        </div>
        
        <div class="control-group form-group">
            <label for="details_blog"><?php echo lang("blog_details"); ?></label>
            <textarea id="details_blog" name="details_blog"></textarea>
        </div>


        <button type="submit" class="btn btn-primary"><?php echo lang("button_save"); ?></button>
        <button type="reset" class="btn btn-warning"><?php echo lang("button_clear"); ?></button>

        <?php echo form_close(); ?>
    </div>
</div>
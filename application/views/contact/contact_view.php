<div class="row">
    <div class="bg-danger text-error">
        <?php echo validation_errors(); ?>
    </div>
</div>

<form action="<?php echo base_url($this->lang_code."/contact/do_contact");?>"
      method="post">

    <input type="hidden" name="_checkForm" value="true">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="student_id"><?php echo lang('contact_student_id') ?></label>
                <input type="text" name="student_id" id="student_id" value="<?php echo $student_id ?>"
                       class="form-control"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name">
                    <?php echo lang('contact_first_name'); ?> :
                </label>
                <input type="text" name="first_name" id="first_name"
                       class="form-control"
                       value="<?php echo $first_name; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name">
                    <?php echo lang('contact_last_name'); ?> :
                </label>
                <input type="text" name="last_name" id="last_name"
                       class="form-control"
                       value="<?php echo $last_name; ?>"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email"><?php echo lang('contact_email'); ?> : </label>
                <input type="email" name="email" id="email"
                       class="form-control"
                       value="<?php echo $email; ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="mobile"><?php echo lang('contact_mobile'); ?> : </label>
                <input type="text" name="mobile" id="mobile"
                       class="form-control"
                       value="<?php echo $mobile; ?>"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="topic"><?php echo lang('contact_topic'); ?> : </label>
                <input type="text" id="topic" name="topic" class="form-control"
                       value="<?php echo $topic; ?>">
            </div>
            <div class="form-group">
                <label for="details"><?php echo lang('contact_details'); ?> : </label>
                <textarea id="details" name="details" class="form-control">
                    <?php echo $details; ?>
                </textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <button class="btn btn-success" type="submit">
                <?php echo lang('contact_button'); ?>
            </button>
        </div>
    </div>

</form>
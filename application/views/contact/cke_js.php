
<script>
    $(document).ready(function() {
        CKEDITOR.editorConfig = function( config ) {
            // Define changes to default configuration here. For example:
             config.language = '<?php echo $this->lang_code ?>';
             config.uiColor = '#AADC6E';
        };

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('details');
    } );
</script>
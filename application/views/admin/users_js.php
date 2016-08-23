<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url($this->lang_code.'/admin/users/ajax_list_users');?>"
    } );
} );
function editData(username) {
    location.href='<?php echo base_url($this->lang_code.'/admin/users/edit'); ?>/'+username;
}
function deleteData(username) {
    if(confirm('Would you like to delete "'+username+'"?'))
    location.href='<?php echo base_url($this->lang_code.'/admin/users/delete'); ?>/'+username;
}
</script>
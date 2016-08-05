$(function() {

    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});
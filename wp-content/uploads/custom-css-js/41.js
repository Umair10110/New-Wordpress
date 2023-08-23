<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 
jQuery(document).ready(function($) {
    $('#store_data_submit').click(function(e) {
        e.preventDefault();

        var dataToSend = $('#comment_store').val();

        $.post('/store-data/', { data_to_store: dataToSend }, function(response) {
            // Handle response if needed
        });
    });
});
</script>
<!-- end Simple Custom CSS and JS -->

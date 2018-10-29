<?php foreach($lists as $list) { ?>
    <a href="<?php echo site_url('lists/show/') . $list->id; ?>"><?php echo $list->name; ?></a> <span list-id="<?php echo $list->id; ?>" style="margin-left: 10px; cursor:pointer;" class="remove-from-list-button">x</span>
    <br/>
<?php } ?>

<script>
    $(function() {
        var rButtons = $('.remove-from-list-button');
        console.log(rButtons);
        rButtons.each(function(index) {
            var listId = $(this).attr('list-id');
            console.log(listId);
            $(this).on('click', function() {
                $.post("<?php echo site_url('lists/delete/'); ?>", { 'list-id': listId })
                    .done(function(data) {
                        window.location = "<?php echo site_url('lists/'); ?>";
                    });
            });
           
        });
    })
</script>
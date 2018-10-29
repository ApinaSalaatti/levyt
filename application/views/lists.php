<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <?php foreach($lists as $list) { ?>
                <a href="<?php echo site_url('lists/show/') . $list->id; ?>"><?php echo $list->name; ?></a> <span list-id="<?php echo $list->id; ?>" style="margin-left: 10px; cursor:pointer;" class="remove-from-list-button">x</span>
                <br/>
            <?php } ?>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

<script>
    $(function() {
        var rButtons = $('.remove-from-list-button');
        console.log(rButtons);
        rButtons.each(function(index) {
            var listId = $(this).attr('list-id');
            $(this).on('click', function() {
                $.post("<?php echo site_url('lists/delete/'); ?>", { 'list-id': listId })
                    .done(function(data) {
                        window.location = "<?php echo site_url('lists/'); ?>";
                    });
            });
           
        });
    })
</script>
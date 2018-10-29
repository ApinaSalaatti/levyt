<h3><?php echo $name; ?></h3>

<?php foreach($records as $record) { ?>
    <div class="list-view-record">
        <strong><?php echo $record->artist; ?></strong>: 
        <?php echo $record->name; ?>
    </div>
<?php } ?>
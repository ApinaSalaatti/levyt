<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <ul class="record-list">
                <?php foreach($records as $record) { ?>
                <li class="record-list-item" record-id="<?php echo $record->id; ?>" record-artist="<?php echo htmlentities($record->artist); ?>" record-name="<?php echo htmlentities($record->name); ?>">
                    <div class="record-list-info">
                        <strong><?php echo $record->artist; ?></strong><br/>
                        <?php echo $record->name; ?>
                    </div>
                    <div class="record-list-actions">
                        <?php if($this->ion_auth->logged_in()) { ?>
                        <button class="btn btn-lg btn-success record-to-list-add-button" record-id="<?php echo $record->id; ?>" style="float:right; margin-left:2px; display:none;">+</button>
                        <form action="<?php echo site_url('records/delete'); ?>" method="POST" style="float: right">
                            <input type="hidden" name="record-id" value="<?php echo $record->id; ?>" />
                            <input type="submit" value="X" class="btn btn-lg btn-danger delete-record-button" />
                        </form>
                        <div class="float-clear"></div>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-6">
            <div class="page-actions">
                <?php if($this->ion_auth->logged_in()) { ?>
                <div class="page-action" id="record-add-div">
                    <h3>Lisää albumi</h3>
                    <form action="<?php echo site_url('records/add'); ?>" method="POST">
                        <div class="form-group">
                            <input id="record-artist" type="text" name="record[artist]" class="form-control" placeholder="Artisti..." />
                        </div>
                        <div class="form-group">
                            <input id="record-name" type="text" name="record[name]" class="form-control" placeholder="Nimi..." />
                        </div>
                        <input type="submit" value="Lisää" class="btn btn-lg btn-success" />
                    </form>
                </div>

                <div style="display:none" class="page-action">
                    <h3>Lisää tiedostosta</h3>
                    <form action="<?php echo site_url('records/addFromFile'); ?>" method="POST" enctype="multipart/form-data">
                        Tiedosto: <input type="file" name="records-file" />
                        <input type="submit" value="Lisää" />
                    </form>
                </div>

                <div class="page-action">
                    <h3>Luo lista</h3>
                    <button class="btn btn-lg btn-primary" id="list-create-button">Luo</button>

                    <div class="new-list-info" style="display:none">
                        <div class="form-group">
                            <input id="list-name" type="text" name="list-name" class="form-control" placeholder="Listan nimi..." />
                        </div>

                        <h4>Albumit</h4>
                        <div id="selected-records"></div>
                        <button class="btn btn-lg btn-primary" id="all-records-to-list-add-button">Lisää kaikki levyt</button>
                        <button class="btn btn-lg btn-success" id="list-save-button">Tallenna lista!</button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    var newListURL = "<?php echo site_url('lists/add/'); ?>";
    var showListURL = "<?php echo site_url('lists/show/'); ?>";
</script>

<script src="<?php echo base_url(); ?>js/recordlist.js"></script>
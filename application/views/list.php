<div id="modal-bg" style="display: none; width: 100%; height: 100%; position: fixed; left: 0px; top: 0px; background-color: #000000aa; z-index: 100;">
        <div class="modal-stuff" style="padding: 20px; position: relative; text-align: center; width:600px; height: 300px; border: 1px solid #bbb; margin-left: auto; margin-right: auto; margin-top: 100px; background-color: #fff;">
            <h4>Valintani on:</h4>
            <span style="font-size: 30px;" id="randomly-selected"></span>
            <br/>
            <div class="modal-btns">
                <button style="width: 200px;height: 60px; position: absolute; bottom: 5px; left: 200px;" class="select-random-button btn btn-lg btn-primary">Valitse uusi</button>
            </div>

            <button id="close-modal-button" class="btn btn-primary" style="position:absolute; top: 5px; right: 5px;">X</button>
        </div>
    </div>

<div class="container-fluid">
    <h3><?php echo $name; ?></h3>
    <div class="row">
        <div class="col-sm-6">
        <?php foreach($records as $record) { ?>
            <div class="list-view-record" id="<?php echo $record->id; ?>" name="<?php echo $record->name; ?>" artist="<?php echo $record->artist; ?>">
                <strong><?php echo $record->artist; ?></strong>: 
                <?php echo $record->name; ?>
            </div>
        <?php } ?>
        </div>
        <div class="col-sm-6">
            <div id="random-selection">
                <button class="select-random-button btn btn-lg btn-primary">Valitse satunnainen levy</button>
                <div id="randomly-selecte"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var records = [];
    $(function() {
        var recs = $('.list-view-record');
        recs.each(function(index) {
            var elem = $(this);
            var id = elem.attr("id");
            var name = elem.attr("name");
            var artist = elem.attr("artist");
            records.push({
                id: id,
                name: name,
                artist: artist,
                element: elem
            });
        });

        $('.select-random-button').each(function() {
            $(this).on("click", function() {
                var rand = Math.floor(Math.random() * records.length);
                var rec = records[rand];
                $('#randomly-selected').html('<strong>' + rec.artist + '</strong><br/>' + rec.name);
                $('#modal-bg').show();
            });
        });

        $('#close-modal-button').on("click", function() {
            $('#modal-bg').hide();
        });
    })
</script>
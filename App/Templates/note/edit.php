<?php /** @var \App\Data\NoteDTO $data */ ?>
<h1>Edit Note</h1>
<form method="post">
    <div>
        Comment: <label>
            <input type="text" name="comment" value="<?= $data->getComment()?>"/>
        </label>
    </div>
    <div>
        Open <label>
            <input type="radio" name="status" value="open"
            <?php echo ($data->getStatus() =='open')?'checked':''?>
        </label>
        <br/>
        In Progress<label>
            <input type="radio" name="status" value="inProgress"
                <?php echo ($data->getStatus() =='inProgress')?'checked':''?>>
        </label>
        <br/>
        Finished <label>
            <input type="radio" name="status" value="finished"
                <?php echo ($data->getStatus() =='finished')?'checked':''?>>
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit!">
    </div>
</form>
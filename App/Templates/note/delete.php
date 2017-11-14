<?php /** @var \App\Data\NoteDTO $data */ ?>
<h1>Delete Note</h1>
<form method="post">
    <div>
        Comment: <label>
            <input disabled type="text" name="comment" value="<?= $data->getComment()?>"/>
        </label>
    </div>
    <div>
        Open <label>
            <input  disabled type="radio" name="status" value="open"
                <?php echo ($data->getStatus() =='open')?'checked':''?>>
        </label>
        <br/>
        In Progress<label>
            <input disabled type="radio" name="status" value="inProgress"
                <?php echo ($data->getStatus() =='inProgress')?'checked':''?>>
        </label>
        <br/>
        Finished <label>
            <input disabled type="radio" name="status" value="finished"
                <?php echo ($data->getStatus() =='finished')?'checked':''?>>
        </label>
    </div>
    <div>
        <input type="submit" name="delete" value="Delete!">
    </div>
</form>
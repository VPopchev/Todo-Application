<?php /** @var \App\Data\NoteDTO[] $data */ ?>
<h1>All Notes</h1>
<div>
    <a href="create.php">Create Note</a>
</div>
<div >
    <div class="category">
        <h3>Open Notes</h3>
        <?php foreach ($data['openNotes'] as $note): ?>
            <div class="element"><?= $note->getComment()?>
                <br/><br/>
                <a href="edit.php?id=<?=$note->getId()?>">Edit</a>
                <a href="delete.php?id=<?=$note->getId()?>">Delete</a></div>

        <?php endforeach; ?>
    </div>
    <div class="category">
        <h3>In Progress Notes</h3>
        <?php foreach ($data['inProgressNotes'] as $note): ?>
            <div class="element"><?= $note->getComment()?>
                <br/><br/>
                <a href="edit.php?id=<?=$note->getId()?>">Edit</a>
                <a href="delete.php?id=<?=$note->getId()?>">Delete</a></div>
        <?php endforeach; ?>
    </div>
    <div class="category">
        <h3>Finished Notes</h3>
        <?php foreach ($data['finishedNotes'] as $note): ?>
            <div class="element"><?= $note->getComment()?>
                <br/><br/>
                <a href="edit.php?id=<?=$note->getId()?>">Edit</a>
                <a href="delete.php?id=<?=$note->getId()?>">Delete</a></div>
        <?php endforeach; ?>
    </div>
</div>
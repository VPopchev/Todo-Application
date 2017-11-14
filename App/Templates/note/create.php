<h1>Create Note</h1>
<form method="post">
    <div>
        Comment: <label>
            <input type="text" name="comment"/>
        </label>
    </div>
    <div>
        Open <label>
            <input type="radio" name="status" value="open" checked>
        </label>
        <br/>
        In Progress<label>
            <input type="radio" name="status" value="inProgress">
        </label>
        <br/>
        Finished <label>
            <input type="radio" name="status" value="finished">
        </label>
    </div>
    <div>
        <input type="submit" name="create" value="Create!">
    </div>
</form>
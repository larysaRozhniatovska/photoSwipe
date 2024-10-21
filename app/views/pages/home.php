<form action="/process.php" method="POST" enctype="multipart/form-data" novalidate>
    <label for="file">Upload photos</label>
    <div class="form-row">
        <input type="file" name="photo[]" accept="image/*" id="file" required multiple>
        <button type="submit">Upload</button>
    </div>
</form>

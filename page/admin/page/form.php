<form method="POST" action="">
  <div class="mb-3">
    <label for="" class="form-label">Nama Genre</label>
    <input name="nama" type="text" class="form-control" id="" aria-describedby="" value="<?php echo (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($edit['nama'])) ? htmlspecialchars($edit['nama'], ENT_QUOTES) : '' ?>">
    
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
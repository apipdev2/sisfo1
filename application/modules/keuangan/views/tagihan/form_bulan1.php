<div class="mb-3 row id">
   <label class="col-3">Pilih Bulan</label>
<div class="col">
  
  <?php for ($i=7; $i < 13 ; $i++):?>

  <label class="form-check">
    <input class="form-check-input" type="checkbox" name="bulan[]" value="<?= $i;?>">
    <span class="form-check-label"><?= bulan($i); ?></span>
  </label>

  <?php endfor ?>
</div>
</div>
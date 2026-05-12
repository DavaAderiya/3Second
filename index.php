<!DOCTYPE html>
<html lang="en">
<?php
include "komponen/header.php";
?>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
   <?php
   include "komponen/navbar.php";
      

   // konten
   $page = isset($_GET['page']) ? $_GET['page'] : 'home';

   if ($page == 'home') {
      include "page/home.php";
   } else if ($page == 'shopall') {
      include "page/shopall.php";
   } else if ($page == 'detail') {
      include "page/detail.php";
   } else if ($page == 'men') {
      include "page/men.php";
   }else if ($page == 'ladies') {
      include "page/ladies.php";
   } else if ($page == 'kids') {
      include "page/kids.php";
   } else if ($page == '3s') {
      include "page/3s.php";
   } else if ($page == 'gt') {
      include "page/gt.php";
   } else if ($page == 't2') {
      include "page/t2.php";
   } else if ($page == 'mt') {
      include "page/mt.php";
   } else if ($page == 'collab') {
      include "page/collab.php";
   }


   include "komponen/footer.php";
   ?>
  <!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>

<!-- Script Dashboard -->
<script>
  const totalProduk = document.querySelectorAll('.show-produk').length;
  document.getElementById('total-items').textContent = totalProduk;

  function navigateSelect(selectElement) {
      const selectedValue = selectElement.value;
      if (selectedValue) {
          window.location.href = selectedValue;
      }
  }
</script>
</body>


</html>
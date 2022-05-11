<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
   AOS.init();

   function imageValidation() {
      var fileInput = document.getElementById("img");
      var filePath = fileInput.value;
      var allowedExtension = /(\.jpg|\.png|\.bmp|\.gif|\.jpeg)$/i;
      var peringatan = document.getElementById("ekstensi");

      if (!allowedExtension.exec(filePath)) {
         peringatan.classList.remove("text-muted");
         peringatan.classList.add("text-danger");
         fileInput.classList.remove("is-valid");
         fileInput.classList.add("is-invalid");
         fileInput.value = '';
         return false;
      } else {
         peringatan.classList.remove("text-danger");
         peringatan.classList.add("text-muted");
         fileInput.classList.remove("is-invalid");
         fileInput.classList.add("is-valid");
      }
   }
</script>
</body>

</html>
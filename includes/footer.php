  <footer>
    <ul>
      <li>&copy; 2017 <a href="index.html">Guillaume Wilmotte</a></li>
      <li>Créé à l'aide de  <a href="https://code.visualstudio.com/" target="_blank">Visual Studio Code</a></li>
    </ul>
  </footer>

<!-- TinyMCE -->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  <script>
    delLinks = document.querySelectorAll("a.del-btn");
    for (i=0; i<delLinks.length; i++) {
      delLinks[i].addEventListener('click', function(e) {
        if (!confirm("supprimer ? ") ) {
          e.preventDefault();
        }
      });
    }
  </script>

</body>
</html>

<?php echo debug(); ?>
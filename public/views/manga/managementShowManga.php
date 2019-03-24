<main class="container-fluid">
  <h1 class="text-center pb-2">Tome de la collection.</h1>
  <div class="container col-8">
  <table class="table table-hover col-12">
    <tbody>
  <?php foreach ($mangas as $manga) { ?>
      <tr class="table-active">
        <td><?= $manga->getMangaTomeNumber(); ?></td>
        <td><?= $manga->getMangaName(); ?><td>
        <td><?= $manga->getMangaPrice(); ?>€</td>
      </tr>
  <?php } ?>
</tbody>
</table>
</div>
</main>

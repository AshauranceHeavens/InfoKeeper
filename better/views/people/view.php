<p class="pt-3 mt-3">
 <a href="/" class="btn btn-secondary text-white">Go Home</a>
</p>
<h1 class="pb-3"><?php echo $person['name']; ?></h1>

<a class="btn btn-success" href='/people/update?id=<?php echo $person['id']; ?>'>Update <?php echo $person['name']; ?></a>

<div class='py-4 mb-5'>
  <?php require_once __DIR__."/_form_p.php"; ?>
</div>

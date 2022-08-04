<h1 class="mt-3">People</h1>
<p>
  <a href="/people/add_person" class="btn btn-outline-success">Add Person</a>
</p>
  <form method="post">
    <div class="input-group mb-3">
      <input type="text" name="name" value="<?php echo $search ?? ''; ?>" class="form-control">
      <input type="submit" name="submit-search-p" value="Submit" class="btn btn-success">
    </div>
  </form>
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
        <p>
          <?php echo $error; ?>
        </p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<div class="table-responsive">
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th scope="col"> Name </th>
        <th scope="col"> ID  </th>
        <th scope="col"> Second Name  </th>
        <th scope="col"> Surname </th>
      </tr>
    </thead>
    <tbody>

      <?php foreach($people as $person){ ?>

        <tr>
          <td> <?php echo $person['id']; ?> </td>
          <td><img src='/images/<?php echo $person['img'];?> ' alt='None' class="rounded" height='50px'></td>
          <td><?php echo $person['name'] ;?></td>
          <td><?php echo $person['second_name'];?></td>
          <td><?php echo  $person['surname'] ?></td>
          <td class='buttons'>
            <div class="d-flex justify-content-around align-items-center">

              <a href="/people/view?id=<?php echo $person['id']; ?>" class="btn btn-primary">View</a>

              <a href="/people/update?id=<?php echo $person['id']; ?>" class="btn btn-success">Update</a>

              <form method='post' action='/people/delete' class='table-form'>
                <input type='hidden' name='id' value ="<?php echo $person['id'];?>">
                <input class="btn btn-danger" type='submit' name='delete-person' value='Delete' id='delete-person'>
              </form>
            </div>
          </td>
        </tr>

      <?php } ?>

    </tbody>

   </table>
 </div>

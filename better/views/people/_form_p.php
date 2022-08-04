<form  method='post' enctype="multipart/form-data" >
  <div class="form-group <?php echo $person['name'] ? 'd-md-flex align-items-center' :null ?> ">

    <?php if(isset($person['img'])){ ?>
      <div class="w-25 px-2">
        <img class="img rounded" src='/images/<?php echo $person['img'] ?? null;?>' alt='<?php echo $person['name'] ?? null; ?>' height='150px'>
      </div>
    <?php }else{ ?>
       <input type="file" name="image" class="my-3">
    <?php } ?>

    <div class="w-100">
      <div class="form-group">
        <Label class="form-label" >Name:</Label>
        <input class="form-control" type='text' name='name' value='<?php echo $person['name'] ?? null; ?>'>
      </div>
      <div class="form-group">
        <Label class="form-label" >Second name:</Label>
        <input class="form-control" type='text' name='second_name' value='<?php echo $person['second_name'] ?? null; ?>'>
      </div>
    </div>

  </div>

  <div class="d-md-flex mt-3">

    <div class="w-100">
      <div class="form-group">
        <Label class="form-label" >Surname:</Label>
        <input class="form-control" type='text' name='surname' value='<?php echo $person['surname'] ?? null; ?>'>
      </div>
      <div class="form-group">
        <Label class="form-label" >DOB:</Label>
        <input class="form-control" type='text' name='DOB' value='<?php echo $person['DOB'] ?? null; ?>'>
      </div>

      <input type="hidden" name="id" value="<?php echo $person['id']; ?>">

    </div>
  </div>
  <div class="form-group">
    <?php if ($route === 'people/update' || $route === 'people/add_person'): ?>
      <input class="btn btn-success text-white my-4" type='submit' name='Update-person' value='Update'>
    <?php endif; ?>
  </div>
</form>

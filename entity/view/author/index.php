<section class="author" id="authordata">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo OUR_CATALOG_OF_AUTHORS;?></h2>
        </div>
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th><?php echo NAME;?></th>
                  <th><?php echo AGE;?></th>
                  <th><?php echo COUNTRY;?></th>
                  <th><?php echo NUMBER_OF_BOOKS;?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($AuthorsData as $author):?>
                <tr class="active">
                  <td><a href="?c=author&a=GetAuthorByid&id=<?php echo $author->idauthor;?>"><?php echo $author->name;?></a></td>
                  <?php if ($author->authorisdead == 0) { ;?>
                      <th><?php echo $author->age;?></th>
                    <?php } else {; ?>
                      <th><?php echo $author->ageatdead;?> <small>(<?php echo DIED_IN;?> <?php echo $author->deathdata;?></small>)</th>
                  <?php } ;?>
                  <td><?php echo $author->namecountry;?></td>
                  <td><?php $NumberOfBooks = $this->model->CountBooks($author->idauthor); echo $NumberOfBooks->r;?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

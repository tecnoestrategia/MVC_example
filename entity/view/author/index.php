<section class="author" id="authordata">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo OUR_CATALOG_OF_AUTHORS;?>
            <span class="pull-right small">
              <a href="?c=author&a=CreateAuthor" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus"></span> <?php echo CREATE_AUTHOR ?>
              </a>
            </span>
          </h2>
        </div>
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="table">
              <thead>
                <tr>
                  <th><?php echo NAME;?></th>
                  <th><?php echo AGE;?></th>
                  <th><?php echo COUNTRY;?></th>
                  <th><?php echo NUMBER_OF_BOOKS;?></th>
                  <th><?php echo ACTIONS ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($AuthorsData as $author):?>
                <tr>
                  <td><a href="?c=author&a=GetAuthorByid&id=<?php echo $author->idauthor ?>"><?php echo $author->name ?></a></td>
                  <?php if ($author->authorisdead == 0) { ?>
                      <th><?php echo $author->age ?></th>
                    <?php } else { ?>
                      <th><?php echo $author->ageatdead ?> <small>(<?php echo DIED_IN ?> <?php echo $author->deathdata ?></small>)</th>
                  <?php } ?>
                  <td><?php echo $author->namecountry ?></td>
                  <td><?php $NumberOfBooks = $this->model->CountBooks($author->idauthor); echo $NumberOfBooks->r ?></td>
                  <td>
                    <a href="?c=author&a=UpdateAuthor&id=<?php echo $author->idauthor ?>" class="btn btn-info btn-xs">
                      <span class="glyphicon glyphicon-edit"></span> <?php echo UPDATE?>
                    </a>
                    <a href="?c=author&a=DeleteAuthor&id=<?php echo $author->idauthor ?>" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove"></span> <?php echo DELETE ?>
                    </a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

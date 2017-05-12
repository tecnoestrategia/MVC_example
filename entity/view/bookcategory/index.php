<section class="books" id="bookscategory">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo ALL_CATEGORIES;?></h2>
          <span class="pull-right small">
            <a href="?c=bookcategory&a=CreateCategory" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-plus"></span> <?php echo ADD_CATEGORY;?>
            </a>
          </span>
        </div>
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th><?php echo CATEGORY;?></th>
                  <th><?php echo NUMBER_OF_BOOKS;?></th>
                  <th class="text-right"><?php echo ACTIONS;?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ListCategories as $book):?>
                <tr class="active">
                  <td><a href="?c=bookcategory&a=GetCategoryByid&id=<?php echo $book->idcategory;?>"><?php echo $book->categorytitle;?></a></td>
                  <td><?php $NumberOfBooks = $this->model->CountBooks($book->idcategory); echo $NumberOfBooks->r;?></td>
                  <td class="text-right">
                      <a href="?c=bookcategory&a=DeleteCategory&id=<?php echo $book->idcategory;?>" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span> <?php echo DELETE_CATEGORY;?>
                      </a>
                      <a href="?c=bookcategory&a=UpdateCategory&id=<?php echo $book->idcategory;?>" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-edit"></span> <?php echo UPDATE_CATEGORY;?>
                      </a>
                  </td>
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

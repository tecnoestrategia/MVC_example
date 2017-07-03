<section class="authordetail" id="<?php echo $AuthorData->idauthor?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container-fluid">
            <div class="row">
          		<div class="col-md-12 tab-content">
          			<div role="tabpanel" class="tab-pane fade in active" id="seite1">
          				<book class="panel panel-default">
          					<header class="panel-heading">
          						<h2><?php echo $AuthorData->name?></h2>
          					</header>
          						<div class="panel-body">
          						   <figure class="pull-left ">
                            <img src="data/images/entitys/author/<?php echo $AuthorData->photo?>" class="img-responsive img-rounded" alt="<?php echo $AuthorData->name?>">
          						        <figcaption class="text-center">
                                <strong><small></small></strong>
                              </figcaption>
          							  </figure>
                          <h5><a href="?c=author&GetAuthorByid&id=<?php echo $AuthorData->idauthor?>"><?php echo $AuthorData->authorname?></a></></h5>
          								<p><?php echo $AuthorData->bio?></p>
          						</div>
                          <div class="clearfix ">
                            <h3><?php echo PERSONAL_DATA?></h3>
                              <span class="pull-left">
                                <?php
                                  if ($AuthorData->authorisdead == 0) {
                                      #author live
                                      ?>
                                      <h5><b><?php echo AGE?>:</b> <?php echo $AuthorData->age?> <?php echo YEARS_OLD?></h5>
                                      <h5><b><?php echo BORN_IN?>:</b> <?php echo $AuthorData->borndata?></h5>
                                  <?php
                                    } else {
                                      #author die
                                      ?>
                                      <h5><b><?php echo BORN_IN?>:</b> <?php echo $AuthorData->borndata?></h5>
                                      <h5><b><?php echo DIED_IN?>:</b> <?php echo $AuthorData->deathdata?></h5>
                                      <h5><b><?php echo DIED_AT_THE_AGE?>:</b> <?php echo $AuthorData->ageatdead?></h5>
                                  <?php
                                    }?>
                                <h5><b><?php echo BORN_ON?>:</b> <?php echo $AuthorData->namecountry?></h5>
                                <h5><b><?php echo NUMBER_OF_BOOK;?>:</b> <?php echo $NumberBooks->r?></h5>
                              </span>
                            </div>
                    </book>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12 tab-content">
                <h3><?php echo LIST_OF_BOOKS?></h3>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th><?php echo BOOK_TITLE?></th>
                        <th><?php echo CATEGORY?></th>
                        <th><?php echo N_OF_PAGES?></th>
                        <th><?php echo YEAR_OF_PUBLISH?></th>
                        <th><?php echo ISBN?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($BooksAuthor as $book):?>
                      <tr class="active">
                        <td><a href="?c=book&a=GetBookById&id=<?php echo $book->idbook?>"><?php echo $book->title?></td>
                        <td><a href="?c=bookcategory&a=GetCategoryByid&id=<?php echo $book->idcategory?>"><?php echo $book->categorytitle?></a></td>
                        <td><?php echo $book->numberofpages?></td>
                        <td><?php echo $book->year?></td>
                        <td><?php echo $book->isbn?></td>
                      </tr>
                      <?php endforeach?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

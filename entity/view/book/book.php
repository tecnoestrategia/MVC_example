<section class="bookdetail" id="<?php echo $BookData->idbook?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container-fluid">
            <div class="row">
          		<div class="col-md-12 tab-content">
          			<div role="tabpanel" class="tab-pane fade in active" id="seite1">
          				<book class="panel panel-default">
          					<header class="panel-heading">
          						<h2><?php echo $BookData->title?></h2>
                      <span class="pull-right small">
                        <a href="index.php?c=book&a=UpdateBook&id=<?php echo $BookData->idbook?>" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                            <?php echo EDIT_BOOK?>
                        </a>
                    </span>
          					</header>
          						<div class="panel-body">
          						   <figure class="pull-left ">
                            <img src="data/images/entitys/books/<?php echo $BookData->photo?>" class="img-responsive img-rounded" alt="<?php echo $BookData->title?>">
          						        <figcaption class="text-center">
                                <strong><small></small></strong>
                              </figcaption>
          							  </figure>
                          <h5><b><?php echo AUTHOR?>: </b><a href="?c=author&a=GetAuthorByid&id=<?php echo $BookData->idauthor?>"><?php echo $BookData->authorname?></a></></h5>
          								<p><?php echo $BookData->description?></p>
          						</div>
                          <p class="panel-footer clearfix ">
                              <span class="pull-left">
                                <h5><b><?php echo CATEGORY?>:</b> <a href="?c=bookcategory&a=GetCategoryByid&id=<?php echo $BookData->idcategory?>"><?php echo $BookData->categorytitle?></a></h5>
                                <h5><b><?php echo N_OF_PAGES?>:</b> <?php echo $BookData->numberofpages?></h5>
                                <h5><b><?php echo PUBLISHED_ON?>:</b> <?php echo $BookData->year?></h5>
                                <h5><b><?php echo ISBN?>:</b> <?php echo $BookData->isbn?></h5>
                              </span>
                            </p>
                    </book>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

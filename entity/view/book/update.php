<section class="books" id="bookscategory">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo UPDATE_BOOK?></h2>
        </div>
        <div class="col-sm-12">
          <div class="well well-sm">
            <form id="frm-updatebook" action="?c=book&a=EditBook" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $BookData->idbook?>" />
              <input type="hidden" name="OriginalCover" value="<?php echo $BookData->photo?>" />
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label><?php echo BOOK_TITLE?></label>
                  <input type="text" name="title" value="<?php echo $BookData->title?>" class="form-control"  required="required" />
                </div>
                <div class="form-group">
                  <label><?php echo NAME_OF_CATEGORY?></label>
                  <select name="idcategory" class="form-control" required="required">
                    <?php foreach ($GetListCategories as $category):?>
                        <?php if ($category->idcategory == $BookData->idcategory){ ?>
                          <option value="<?php echo $category->idcategory?>" selected><?php echo $category->categorytitle ?></option>
                        <?php } else { ?>}
                          <option value="<?php echo $category->idcategory?>" ><?php echo $category->categorytitle ?></option>
                        <?php }
                      endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label><?php echo AUTHOR?></label>
                  <select name="idauthor" class="form-control selectpicker"  required="required">
                    <?php foreach ($GetListAuthors as $author):?>
                      <?php if ($author->idauthor == $BookData->idauthor){ ?>
                        <option value="<?php echo $author->idauthor ?>" selected ><?php echo $author->authorname ?></option>
                      <?php } else { ?>}
                        <option value="<?php echo $author->idauthor?>" ><?php echo $author->authorname ?></option>
                    <?php }
                     endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label><?php echo N_OF_PAGES?></label>
                  <input type="number" value="<?php echo $BookData->numberofpages?>" name="npages" class="form-control"  required="required" />
                </div>
                <div class="form-group">
                    <label><?php echo IMAGE_OF_COVER?></label>
                    <input type="file" name="cover" class="form-control" />
                    <!-- <img src="data/images/entitys/books/<?php echo $BookData->photo?>" class="img-responsive img-rounded" alt="<?php echo $BookData->title?>"> -->
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label><?php echo YEAR_OF_PUBLISH?></label>
                    <input type="number" name="ypublish" value="<?php echo $BookData->year?>" class="form-control" required="required" />

                </div>
                <div class="form-group">
                  <label><?php echo ISBN?></label>
                  <input type="text" name="isbn" value="<?php echo $BookData->isbn?>" class="form-control"  required="required" />

                </div>
                <div class="form-group">
                  <label for="description"><?php echo DESC?>:</label>
                  <textarea class="form-control" rows="8" name="description"  required="required">
                    <?php echo $BookData->description?>
                  </textarea>
              </div>

            </div>
              <hr />
              <div class="text-right">
                  <button class="btn btn-primary"><?php echo SAVE?></button>
              </div>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script>
  $(document).ready(function(){
      $("#frm-updatebook").submit(function(){
          return $(this).validate();
      });
  })
</script>

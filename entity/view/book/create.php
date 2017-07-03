<?php
/**
* This file is = entity/view/book/create.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
?>
<section class="books" id="bookscrud">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo CREATE_BOOK?></h2>
        </div>
        <div class="col-sm-12">
          <div class="well well-sm">
            <form id="frm-createbook" action="?c=book&a=NewBook" method="post" enctype="multipart/form-data">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label><?php echo BOOK_TITLE?></label>
                  <input type="text" name="title" value=" " class="form-control"  required="required" />
                </div>
                <div class="form-group">
                  <label><?php echo NAME_OF_CATEGORY?></label>
                  <select name="idcategory" class="form-control">
                    <?php foreach ($GetListCategories as $category):?>
                      <option value="<?php echo $category->idcategory?>"><?php echo $category->categorytitle ?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group">
                  <label><?php echo AUTHOR?></label>
                  <select name="idauthor" class="form-control"  required="required">
                    <?php foreach ($GetListAuthors as $author):?>
                      <option value="<?php echo $author->idauthor?>"><?php echo $author->authorname ?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group">
                  <label><?php echo N_OF_PAGES?></label>
                  <input type="number" name="npages" class="form-control"  required="required" />
                </div>
                <div class="form-group">
                    <label><?php echo IMAGE_OF_COVER?></label>
                    <input type="file" name="cover" class="form-control"  required="required"/>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label><?php echo YEAR_OF_PUBLISH?></label>
                    <input type="number" name="ypublish" class="form-control date-picker" data-date-format="yyyy" required="required" />

                </div>
                <div class="form-group">
                  <label><?php echo ISBN?></label>
                  <input type="text" name="isbn" class="form-control"  required="required" />

                </div>
                <div class="form-group">
                  <label for="description"><?php echo DESC?>:</label>
                  <textarea class="form-control" rows="8" name="description"  required="required"></textarea>
              </div>

            </div>
              <hr />
              <div class="text-right">
                  <button class="btn btn-primary"><?php echo SAVE?></button>
              </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    $(document).ready(function(){
        $("#frm-createbook").submit(function(){
            return $(this).validate();
        });
    })
</script>

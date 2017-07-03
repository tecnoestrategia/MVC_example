<section class="books" id="bookscategory">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo UPDATE_CATEGORY?></h2>
        </div>
        <div class="col-sm-12">
          <div class="well well-sm">
            <form id="frm-updatebookcategory" action="?c=bookcategory&a=ModCategory" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $CategoryInfo->id?>" />
              <div class="form-group">
                <label><?php echo NAME_OF_CATEGORY?>:</label>
                <input type="text" name="name" required="required" value="<?php echo $CategoryInfo->title ?>" class="form-control" placeholder="<?php echo $CategoryInfo->title ?>" />
              </div>
              <div class="form-group">
                  <label><?php echo DESC_OF_CATEGORY?>:</label>
                  <textarea class="form-control" rows="8" name="desc" required="required">
                    <?php echo $CategoryInfo->description ?>
                  </textarea>
              </div>
              <hr />
              <div class="text-right">
                  <button class="btn btn-success"><?php echo SAVE?></button>
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
        $("#frm-updatebookcategory").submit(function(){
            return $(this).validate();
        });
    })
</script>

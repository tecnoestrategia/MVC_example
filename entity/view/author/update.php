<section class="author" id="authorupdate">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo UPDATE_AUTHOR?></h2>
        </div>
        <div class="col-sm-12">
          <div class="well well-sm">
            <form id="frm-updateauthor" action="?c=author&a=EditAuthor" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $AuthorData->idauthor?>" />
              <input type="hidden" name="OriginalPhoto" value="<?php echo $AuthorData->photo?>" />
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label><?php echo AUTHOR_NAME?></label>
                  <input type="text" name="name" value="<?php echo $AuthorData->name?>" class="form-control"  required="required" />
                </div>
                <div class="form-group">
                  <label><?php echo NAME_OF_COUNTRY?></label>
                  <select name="idcountry" class="form-control">
                    <?php foreach ($GetListCountrys as $country):?>
                        <?php if ($AuthorData->idcountry == $country->idcountry){ ?>
                          <option value="<?php echo $country->idcountry?>" selected ><?php echo $country->countryname ?></option>
                        <?php } else { ?>
                          <option value="<?php echo $country->idcountry?>"><?php echo $country->countryname ?></option>
                        <?php };?>
                    <?php endforeach?>
                  </select>
                </div>
              <div class="form-group">
                  <label for="photo"><?php echo PHOTO_OF_AUTHOR?></label>
                  <input type="file" name="photo" class="form-control"/>
              </div>
              </div>
              <div class="col-md-6 col-sm-6">
              <div class="form-group">
                  <label for="deathdata"><?php echo DATE_OF_DEATH?></label>
                  <input type="date" name="deathdata" value="<?php echo $AuthorData->deathdata?>" class="form-control date-picker" data-date-format="yyyy-mm-dd"/>
              </div>
              <div class="form-group">
                  <label for="borndata"><?php echo DATE_OF_BORN?></label>
                  <input type="date" name="borndata" value="<?php echo $AuthorData->borndata?>" class="form-control date-picker" data-date-format="yyyy-mm-dd" required="required" />
              </div>
              <div class="form-group">
                <label for="bio"><?php echo BIO?>:</label>
                <textarea class="form-control" rows="8" name="bio"  required="required"><?php echo $AuthorData->bio?></textarea>
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
      $("#frm-updateauthor").submit(function(){
          return $(this).validate();
      });
  })
</script>

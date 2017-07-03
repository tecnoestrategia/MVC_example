<?php
/**
* This file is = entity/view/author/create.php
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
          <h2><?php echo CREATE_AUTHOR?></h2>
        </div>
        <div class="col-sm-12">
          <div class="well well-sm">
            <form id="frm-createauthor" action="?c=author&a=NewAuthor" method="post" enctype="multipart/form-data">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label><?php echo AUTHOR_NAME?></label>
                  <input type="text" name="name" value=" " class="form-control"  required="required" />
                </div>
                <div class="form-group">
                <label><?php echo NAME_OF_COUNTRY?></label>
                  <select name="idcountry" class="form-control">
                    <?php foreach ($GetListCountrys as $country):?>
                      <option value="<?php echo $country->idcountry?>"><?php echo $country->countryname ?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="photo"><?php echo PHOTO_OF_AUTHOR?></label>
                    <input type="file" name="photo" class="form-control"  required="required"/>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="deathdata"><?php echo DATE_OF_DEATH?></label>
                    <input type="date" name="deathdata" value="" class="form-control date-picker" data-date-format="yyyy-mm-dd"/>
                </div>
                <div class="form-group">
                    <label for="borndata"><?php echo DATE_OF_BORN?></label>
                    <input type="date" name="borndata" class="form-control date-picker" data-date-format="yyyy-mm-dd" required="required" />
                </div>
                <div class="form-group">
                  <label for="bio"><?php echo BIO?>:</label>
                  <textarea class="form-control" rows="8" name="bio"  required="required"></textarea>
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
        $("#frm-createauthor").submit(function(){
            return $(this).validate();
        });
    })
</script>

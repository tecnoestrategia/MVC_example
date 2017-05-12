<section class="books" id="bookscategory">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><?php echo CREATE_CATEGORY;?></h2>
        </div>
        <div class="col-sm-12">
          <form id="frm-createbookcategory" action="?c=bookcategory&a=NewCategory" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label><?php echo NAME_OF_CATEGORY;?></label>
                <input type="text" name="name" value=" " class="form-control" placeholder="Nombre del proyecto (por este se conocera)" data-validacion-tipo="requerido|min:20" />
              </div>
              <div class="form-group">
                  <label><?php echo DESC_OF_CATEGORY;?></label>
                  <input type="text" name="desc" value=" " class="form-control" placeholder="" data-validacion-tipo="requerido|min:100" />
              </div>
              <hr />
              <div class="text-right">
                  <button class="btn btn-success"><?php echo SAVE;?></button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    $(document).ready(function(){
        $("#frm-createbookcategory").submit(function(){
            return $(this).validate();
        });
    })
</script>

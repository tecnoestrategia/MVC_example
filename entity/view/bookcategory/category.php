<section class="bookcategory" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="wow bounceInLeft" data-wow-delay="0.1s">
          <h2><b><?php echo CATEGORY;?>:</b><?php echo $CategoryInfo->title;?></h2>
        </div>
        <div class="col-sm-12">
          <p><?php echo $CategoryInfo->description;?></p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th><?php echo BOOK_TITLE;?></th>
                  <th><?php echo AUTHOR;?></th>
                  <th><?php echo N_OF_PAGES;?></th>
                  <th><?php echo YEAR_OF_PUBLISH;?></th>
                  <th><?php echo ISBN;?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($CategoryData as $book):?>
                <tr class="active">
                  <td><a href="?c=book&a=GetBookById&id=<?php echo $book->idbook;?>"><?php echo $book->title;?></td>
                  <td><a href="?c=author&a=GetAuthorByid&id=<?php echo $book->idauthor;?>"><?php echo $book->authorname;?></td>
                  <td><?php echo $book->numberofpages;?></td>
                  <td><?php echo $book->year;?></td>
                  <td><?php echo $book->isbn;?></td>
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

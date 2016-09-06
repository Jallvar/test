<div style="margin-top: 20px;">
 <form class="form-horizontal" role="form" method="post" action="<? echo base_url();?>edit/<? echo $book['id'];?>">
  <div class="form-group">
    <label class="col-sm-3 control-label">Название книги</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputBookName" name="bookname" value="<? echo $book['name'];?>" placeholder="Название книги">
      <?php echo form_error('bookname'); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">Автор</label>
    <div class="col-sm-9">
      <select class="form-control" name="author[]" id="authors" multiple>
          <? if($authors):
             foreach($authors as $author):?>
          <option value="<? echo $author['id'];?>" <? foreach($book['authors'] as $book_author): if($author['id'] == $book_author['id']) echo' selected="selected"'; endforeach;?>><? echo $author['name'];?></option>
         <? endforeach;
            endif;?>
      </select>
      
      </select>
      <?php echo form_error('author'); ?>
      <span class="pull-right" style="margin-top: 5px;"><a href="#" id="addLink">Добавить автора</a></span>
    </div>
  </div>
  <div class="form-group" id="addAuthor" style="display: none;">
    <label class="col-sm-3 control-label">Добавление автора</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="AuthorName" id="authorName" placeholder="Введите имя автора">
      <p style="margin-top: 5px;" class="pull-right"><a href="#" class="btn btn-default" id="addBtn">Добавить автора</a></p>
    </div>
  </div>
  <button type="submit" class="btn btn-success pull-right" style="margin-top: 20px;">Изменить</button>
</form>
</div>

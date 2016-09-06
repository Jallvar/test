<a href="<? echo base_url();?>add" class="pull-right"><i class="glyphicon glyphicon-plus"></i> Добавить книгу</a>
     <table class="table table-striped" style="margin-top: 50px;">
      <thead>
        <tr>
          <th>#</th>
          <th>Название книги</th>
          <th>Автор</th>
          <th>Дата добавления</th>
        </tr>
      </thead>
      <tbody>
        <? if(!$books):?>
        <tr>
          <td>В базе книг нет</td>
        </tr>
        <? else:
          foreach($books as $book):?>
        <tr>
          <td><? echo $book['id'];?></td>
          <td><? echo $book['name'];?></td>
          <td>
              <? foreach($book['authors'] as $author):
              echo $author['name'].', ';
              endforeach;?>
          </td>
          <td><? echo date("d.m.Y", $book['date']);?></td>
          <td><a href="<? echo base_url();?>edit/<? echo $book['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a> <a href="<? echo base_url();?>delete/<? echo $book['id'];?>"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
        <? endforeach; 
          endif;?>
      </tbody>
    </table>
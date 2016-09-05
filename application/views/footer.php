      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        var aa = false;
        $(function() {
            $('#addLink').click(function () {
               if(!aa) {
                   $('#addAuthor').show();
                    aa = true;
               }
                else {
                    $('#addAuthor').hide();
                    aa = false;
                }
            });
            
            $('#addBtn').click(function () {
                $('#addBtn').hide();
               $.ajax({
                    url: "<? echo base_url();?>ajax/",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'action': 'addAuthor',
                        'name': $('#authorName').val()
                    },
                    success: function(data) {
                        if(data.status == 'success')
                        {
                            if(!data.result)
                            {
                                alert("Ошибка в бд!");
                                return;
                            }
                            
                            $('#authors').append('<option value="'+data.result+'">'+$('#authorName').val()+'</option>');
                            $("#authors :last").prop('selected', true);
                            $('#addAuthor').hide();
                            aa = false;
                            $('#addBtn').show();
                        }
                        else
                            alert(data.msg);
                    },
                    error: function() {
                    }
                });
 
            });
        });
    </script>
  </body>
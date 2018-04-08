<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <base href="<?php echo strtolower( substr ($_SERVER['SERVER_PROTOCOL'], 0, strpos ( $_SERVER['SERVER_PROTOCOL'], '/'))) .'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

    <title>Lista Telefônica</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="vendor/components/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Lista Telefonica</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Contatos <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="position-fixed flex-row-reverse" style="bottom: 45px; right: 24px;">
        <button type="button" class="badge badge-pill badge-primary btn btn-lg" style="width: 45px; height: 45px;" data-toggle="modal" data-target=".modal-contact" data-title="Novo Contato"><i class="fa fa-plus"></i></button>
      </div>

      <div class="modal fade modal-contact" tabindex="-1" role="dialog" aria-labelledby="show-create-contact" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">Modal Title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form>
              <div class="modal-body">
                <div class="form-group row">
                  <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tipo_telefone" class="col-sm-2 col-form-label">Tipo telefone</label>
                  <div class="col-sm-10">
                      <select name="tipo_telefone" class="form-control" required>
                        <option value="casa">Casa</option>
                        <option value="celular">Celular</option>
                        <option value="principal">Principal</option>
                        <option value="trabalho">Trabalho</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                  <div class="col-sm-10">
                      <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="required">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tipo_email" class="col-sm-2 col-form-label">Tipo e-mail</label>
                  <div class="col-sm-10">
                      <select name="tipo_email" class="form-control" required>
                        <option value="pessoal">Pessoal</option>
                        <option value="principal">Principal</option>
                        <option value="trabalho">Trabalho</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="save-form">Salvar contato</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Contatos</h6>
          <small>Lista telefônica</small>
        </div>
      </div>

      <div class="template-contato hide hidden" hidden="true">
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <a href="#" data-toggle="modal" data-target=".modal-show-contact" data-title="Visualizar Contato"><strong class="text-gray-dark nome">Nome Contato</strong></a>
              <span class="button-area">
                <button type="button" onclick="editContato(this)" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-pencil-alt"></i> Editar</button>
                <button type="button" onclick="deleteContato(this)" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-times"></i> Excluir</button>
              </span>
            </div>
            <span class="d-block telefone">Fixo +55 (XX) XXXX-XXXX</span>
          </div>
        </div>
      </div>

      <div class="modal fade modal-show-contact" tabindex="-1" role="dialog" aria-labelledby="show-contact" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">Modal Title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="nome">
                </div>
              </div>
              <div class="form-group row">
                <label for="tipo_telefone" class="col-sm-2 col-form-label">Tipo telefone</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="tipo_telefone">
                </div>
              </div>
              <div class="form-group row">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                <div class="col-sm-10">
                    <input type="tel" readonly class="form-control-plaintext" name="telefone">
                </div>
              </div>
              <div class="form-group row">
                <label for="tipo_email" class="col-sm-2 col-form-label">Tipo e-mail</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="tipo_email">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" readonly class="form-control-plaintext" name="email">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="my-3 p-3 bg-white rounded box-shadow area-lista-contatos">
      </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="vendor/twbs/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/twbs/bootstrap/assets/js/vendor/holder.min.js"></script>
    <script src="vendor/robinherbots/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="vendor/robinherbots/jquery.inputmask/dist/phone-codes/phone.js"></script>
    <script src="vendor/robinherbots/jquery.inputmask/dist/inputmask/bindings/inputmask.binding.js"></script>
    <script src="offcanvas.js"></script>
    <script type="text/javascript">
      
      $('input[type="tel"]').inputmask('(99) 9999[9]-9999');
      $('input[type="email"]').inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
          pastedValue = pastedValue.toLowerCase();
          return pastedValue.replace("mailto:", "");
        },
        definitions: {
          '*': {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
            casing: "lower"
          }
        }
      });

      var getContatos = function(){
        $.get('./ws/contato/getListaContatos', function(contatos){
          let
            template_area = $('.template-contato'),
            template = $(template_area.children().get(0)),
            area_contatos = $('.area-lista-contatos');
          if(contatos.length > 0){
            area_contatos.html('');
            $.each(contatos, function(key, contato){
              let nome = template.find('.nome'),
                  link = nome.closest('a');

              nome.text(contato.nome);
              link.attr('data-id', contato.id);

              template.find('.telefone').text(contato.telefone);
              template.find('.edit-btn').attr('data-id', contato.id);
              template.find('.delete-btn').attr('data-id', contato.id);

              area_contatos.append(template.get(0).outerHTML);

              link = area_contatos.find('a[data-target=".modal-show-contact"]:last');
              console.log(link);
              link.off('click');
              link.on('click', function(){
                let modal_name_class = $(this).data('target'),
                    modal = $(modal_name_class),
                    id = $(this).data('id');
                $( modal_name_class + ' #modal-title').text($(this).data('title'));

                $.get('./ws/contato/get/' + id, function(data){
                  if(data.data) {
                    $.each(data.data, function(k, v){
                      modal.find('[name="'+ k +'"]').val(v);
                    });
                  }
                });

              });

            });
          } else {
            area_contatos.html('Nenhum contato a exibir');
          }
        });
      }

      function editContato(btn) {
        btn = $(btn);
        let id = btn.data('id');
        
        $.get('./ws/contato/get/' + id, function(data){
          if(data.data) {
            var modal = $('.modal-contact').first();
              modal.find('form')[0].reset();
            $.each(data.data, function(k, v){
              modal.find('[name="'+ k +'"]').val(v);
            });
            modal.modal('show');

            setActionForm(modal.find('form').first(), './ws/contato/update/' + id);

          }
        });

      }

      function deleteContato(btn) {
        btn = $(btn);
        let id = btn.data('id');

        if(confirm('Tem certeza que deseja excluir este contato?')){
          $.ajax({
            url: './ws/contato/delete/'+id,
            type: 'DELETE',
            success: function(result) {
              getContatos();
            }
          });
        }
      }

      $(function(){
        getContatos();
      });

      $('[data-target=".modal-contact"]').on('click', function(){
        let 
          target = $(this).data('target'),
          form = $(target).find('form');

        $(target + ' #modal-title').text($(this).data('title'));

        form[0].reset();
        setActionForm(form, './ws/contato/create');

      });

      function setActionForm(objForm, url){
        objForm.off('submit');
        objForm.on('submit', function(event) {
          event.preventDefault();
          $.post(
            url,
            objForm.serialize(),
            function(data) {
              if(data.success){
                $('.modal-contact').modal('hide');
                objForm[0].reset();
                getContatos();
              }
            }
          );
        });
        
      }
    </script>
  </body>
</html>
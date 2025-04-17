 
    
<div id="exclusive-modal-referido" class="uk-flex-top" uk-modal>
    <div class="tas-modal uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="modal_title"><?php echo echoOutput($translation['tr_22']); ?></h2>
        </div>

        <div class="uk-modal-body">
<form method="POST" action="https://cliente.alianzateamcaribe.com/referidos.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Escribe tu email</label>
    <input type="text" class="form-control" name="email" id="email"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Codigo del referido</label>
    <input type="text" class="form-control" name="referido" id="referido" >
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">No tengo referido</label>
  </div>
  
  <button type="submit" class="btn btn-primary">Comprar</button>
  
</form>




        </div>

    </div>
</div>


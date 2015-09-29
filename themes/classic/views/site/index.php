<!--<div class="container-principal">-->
    <div class="row">
    
        <div class="col-sm-6">
            <h2 style="font-size: 70px">Online Assitive Tagging</h2>
            <p  style="font-size: 21px" >eu só quero é ser feliz!!!</p>
            
        </div>
        
        <div class="col-sm-6 ">
            <form method="post" action="index.php?r=acesso/login">
                <?php if(!empty($tipo_maq)){ ?>
                    <input name="LoginForm[tipo_maq]" type="hidden" value = <?php echo $tipo_maq; ?> >
                <?php } ?>     
                <!--<div class="row">-->
                <div class="form-group col-lg-10">
                    <h2>Informe o email ou cadastre-se</h2>
                </div>    
                <div class="form-group  col-lg-10">
                    <input class="form-control"  name="LoginForm[email]" type="email" required placeholder="Email">
                </div>

                <div class="form-group col-lg-1"></div>

                <div class="form-group  col-lg-10">
                    <input name="LoginForm[senha]" class="form-control" placeholder="Senha" type="password" required>
                </div>
                <!--</div>-->        
                <div class="form-group  col-lg-5">
                    <input class ="btn btn-sm btn-primary form-control" id="login" value="Entrar" type="submit" >
                </div>
                <div class="form-group  col-lg-5">    
                    <button class ="btn btn-sm btn-primary form-control" id="cadastrar" value="Cadastre-se" type="button">Cadastrar</button>
                </div>
            </form>    
                
                <div class="form-group  col-lg-6"> 
                    
                    <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal">
                      Esqueci Minha Senha
                    </a>
                    
                    <!-- Modal -->
                    <form id="form_email" method="post" action="index.php?r=administrador/recoverpassword" >
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Digite seu email:</h4>
                              </div>
                              <div class="modal-body">
                                  <input id="rec_senha_email" name="rec_senha_email" type="email" size="69" required="required">
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="recover_email" class="btn btn-primary">Enviar email</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                    </form>
                </div>    
                
                <?php if (Yii::app()->user->hasFlash('error')) { ?>
                    <span class="control-label alerta-erro"><?php echo Yii::app()->user->getFlash('error', null, true); ?></span>
                <?php } ?>
            </form>
        
        </div>
    
    </div>
<!--</div>-->
<script>
    document.getElementById("cadastrar").addEventListener('click',function(){
    //$('#cadastrar').on('click',function(){
       window.location = "index.php?r=usuarios/create";  
//       waitingDialog.show();
    });     
    
//    $('#cadastrar').click(
</script>



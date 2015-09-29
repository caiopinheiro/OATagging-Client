<div class="container-principal">
    <div class="row">
    
        <div class="col-sm-6">
            <h2>Instruções</h2>
            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            
        </div>
        
        <div class="col-sm-6">
            <form method="post" action="index.php?r=site/maquina">
                <div class="row">
                    <h2>Escolha a Máquina de recomendação.</h2>
                    <?php  echo CHtml::dropDownList('tipo_maq','', array(1=>'Método 1 - Coocorrencia Janiel - MySql',
                                                                        2=>'Método 2 - Coocorrencia Janiel - Mongo',  
                                                                        3=>'Método 3 - Coocorrencia Invertida'),  
                                                                       array("class"=> 'form-control', 'prompt'=>'Selecione', 'id'=>'tipo_maq'));?>
                    </br>
                    <input class ="btn btn-sm btn-primary" id="login" value="Salvar" type="submit" >
                    
                </div>
                
                <?php // echo $form->hiddenField("tipo_user", array("value"=>2))?>
            </form>
        
        </div>
    
    </div>
</div>
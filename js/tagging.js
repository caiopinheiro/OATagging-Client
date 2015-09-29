var tagsSuggested=[];

function allowDrop(ev) {
	ev.preventDefault();

}

function drag(ev) {
	ev.dataTransfer.setData("text", ev.target.id);

}

function drop(ev) {
	ev.preventDefault();

	var data = ev.dataTransfer.getData("text");

	elem = document.getElementById(data);
	if ((ev.target.id == 'tag-recommended') || (ev.target.id == 'tag-selected')) 
		ev.target.appendChild(elem);
	else{
		parent = ev.target.parentNode;
		if ((parent.id == 'tag-recommended') || (parent.id=='tag-selected')){
			parent.appendChild(elem);
		}	

	}
        
        enableButton();
}

function dragend(ev, status) {
	ev.preventDefault();

	if (status == 1) {
		classLbl = "label label-success label-tag";
		idTab = "tag-selected";
	} else {
		classLbl = "label label-primary label-tag";
		idTab = "tag-recommended";
	}
	el = document.getElementById(idTab).lastChild;
	el.setAttribute("class", classLbl);
	console.log(classLbl+":"+idTab);
}

function getTags(title) {
        var tipo_maq = $("#tipo_maq").val();
    //title = "Melhores Momentos";
	var xmlhttp = new XMLHttpRequest();
	
	var url = 'http://localhost:3030/src/server.php?maxTags=5&title='+title+'&machine='+tipo_maq;
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//alert(xmlhttp.responseText);
			inflateTags(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function inflateTags(response) {
        console.log(response);
	var arr = JSON.parse(response);
	var i;
	
	for ( i = 0; ((i < arr.length) && (i < 10)); i++) {

		tag = document.createElement("span");
		tag.setAttribute("class", "label label-tag-hidden");
		tag.setAttribute("draggable", "true");
		tag.setAttribute("ondragstart", "drag(event)");
		tag.setAttribute("id", arr[i].tag);
		tag.textContent = arr[i].tag;
                tagsSuggested[i] = arr[i].tag;
		document.getElementById("tag-recommended").appendChild(tag);


	}

}

function enableButton(){
//    recomendados = jQuery('#tag-recommended').find('span');
    selecionados = jQuery('#tag-selected').find('span');
//    if(selecionados.size()== 0 && recomendados.size() ==0 ){
//        jQuery(".panel-footer a").attr("disabled", true);
//    }
    
    if(selecionados.size() == 1){
          jQuery(".panel-footer a").attr("disabled", false);  
    }
    else if((selecionados.size() == 0)){
          jQuery(".panel-footer a").attr("disabled", true);  
    }
}

function showTags() {
         
	recommended = document.getElementById("tag-recommended");
	tags = recommended.getElementsByClassName("label");

	for ( i = 0; i < tags.length; i++) {
		tag = tags[i];
                tag.setAttribute("class", "label label-primary label-tag");
	}
}

function clearTags(){

	$("#tag-recommended").empty();
	$("#tag-selected").empty();
	

}

function saveTags(){
        
//        alert(playing);
//        var getClick = jQuery(".panel-footer a").attr("value");
//        if(getClick<=2){
//           jQuery(".panel-footer a").attr("value", getClick + 1);
//        }
        
        confirmacao = window.confirm("Você tem certeza?");
        
        if(confirmacao == true){
        
            var arrayTagsSelected = [];
            stringArray = "";

            tag_selected = jQuery('#tag-selected').find('span');

            for(i = 0; i< tag_selected.size(); i++ ){
                arrayTagsSelected[i] = tag_selected[i].attributes['id'].value;

            }


            jQuery.ajax({
                'url': 'index.php?r=avaliacoes/senddata/tagSelected/'+arrayTagsSelected+'/tagSuggested/'+ tagsSuggested + '/idVideo/'+videos[playing].id +'/playing/'+playing ,
                'data': '',
                'dataType': 'json',
                success: function(data) {
                    $.each(data, function(i, item) {
                        jQuery('.mes' + item).removeClass('hidden');
                    });
                    
                    if(data.playing == 2)
                    { 
                        window.location = ("index.php?r=site/index")
                    }
                }
            });

            clearTags();	
            changeVideo();
            jQuery(".panel-footer a").attr("disabled", true);
        }
}
function filtrarTabela(){

var table = document.getElementById("tabela");

for (var r = 1; r < table.rows.length; r++){ 
    linhasFicaramInvisiveisPeloFiltro[r] = "";
}

var filt = [];

filt[0] = document.getElementById('data').value.toLowerCase();
filt[1] = "";
filt[2] = "";
filt[3] = "";
filt[4] = "";
filt[5] = "";
filt[6] = "";

var ele; 

for(var r = 1; r < table.rows.length; r++){
table.rows[r].style.display = '';  
}

var linhaDeveAparecer = [];

for(var r = 1; r < table.rows.length; r++){
linhaDeveAparecer[r] = '';  
}

for(var y = 0; y <= 6; y++){
    suche = filt[y];
    if(y != 6){
        if(y != 5 && y != 4){
            for (var r = 1; r < table.rows.length; r++){  	
            ele = table.rows[r].cells[4].innerHTML.replace(/<[^>]+>/g,"");  	
            if (ele.toLowerCase().indexOf(suche)>=0 ){
                if(table.rows[r].style.display != 'none'){
                    table.rows[r].style.display = '';
                }			
            }else{ 
                table.rows[r].style.display = 'none'; 
                linhasFicaramInvisiveisPeloFiltro[r] = r;
            }	
            }
        }
    }else{
        for (var r = 1; r < table.rows.length; r++){  
            for (var c = 0; c < 4; c++){  
            ele = table.rows[r].cells[c].innerHTML.replace(/<[^>]+>/g,"");  	
            if (ele.toLowerCase().indexOf(suche)>=0 ){ 
                if(table.rows[r].style.display != 'none'){
                    table.rows[r].style.display = '';
                    linhaDeveAparecer[r] = r;
                    break;
                }
            }
            }
            
            if(linhaDeveAparecer[r] != r){
            table.rows[r].style.display = 'none'; 
            linhasFicaramInvisiveisPeloFiltro[r] = r;
        }
            
        }
    }
}
}
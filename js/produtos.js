function EditarExcluir(id, nome, sku, qtd){
  
enviar = "id="+id+"&nome="+nome+"&sku="+sku+"&qtd="+qtd;  
  
var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

  if (xhttp.readyState == 4 && xhttp.status == 200) {

  window.open('editarexcluirproduto.php','_self');

  }

};

xhttp.open("POST", "PassarIDSessionProduto.php", true);

xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhttp.send(enviar);
  
}	

function mudarImagem(Numero){

 var filt = document.getElementById('filt').value;
 var filt2 = document.getElementById('filt2').value;
 var filt3 = document.getElementById('filt3').value;
 var filt4 = document.getElementById('filt4').value;
 //var filt5 = document.getElementById('filt5').value;
 
  document.getElementById('filt').value = "";
  document.getElementById('filt2').value = "";
  document.getElementById('filt3').value = "";
  document.getElementById('filt4').value = "";
  //document.getElementById('filt5').value = "";

filter ('nãoUtilizadoMais', 'lista', 'nãoUtilizadoMais');

var coluna;
var Numero;

if(Numero == 1){
    coluna = 'id';
}
if(Numero == 2){
    coluna = 'nome';
}
if(Numero == 3){
    coluna = 'sku';
}
if(Numero == 4){
    coluna = 'qtd';
}

//alert(document.getElementById('img'+Numero).src);

var table = document.getElementById('lista');  

var tabela = [];

//Passando dados da tabela para objeto
for(i = 1; i < table.rows.length; i++){
    
    var objeto = {id:table.rows[i].cells[0].innerHTML, nome:table.rows[i].cells[1].innerHTML, sku:table.rows[i].cells[2].innerHTML, qtd:table.rows[i].cells[3].innerHTML, click:table.rows[i].onclick};
    
    tabela.push(objeto);
}

//Organizar a tabela
//Para organizar números

for(i = 1; i <= 4; i++){
    document.getElementById('img'+i).src = 'imagens/setadesativada.jpg';
}

if(coluna == 'id'){
    if(coluna == 'id' && (colunaUltima == "" || colunaUltima == 'idbaixo' || colunaUltima != 'idcima')){
        tabela.sort(function(a, b){return a.id - b.id});
        document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
        colunaUltima = 'idcima';
    }else if(coluna == 'id' && colunaUltima == 'idcima'){
        tabela.sort(function(a, b){return b.id - a.id});
        document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
        colunaUltima = 'idbaixo';
    }
}

if(coluna == 'nome'){
    if(coluna == 'nome' && (colunaUltima != "nomecima" || colunaUltima == 'nomebaixo')){
        tabela.sort(function(a,b) {
        return a.nome.toLowerCase() < b.nome.toLowerCase() ? -1 : a.nome.toLowerCase() > b.nome.toLowerCase() ? 1 : 0;
        });
        document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
        colunaUltima = 'nomecima';
    }else if(coluna == 'nome' && colunaUltima == 'nomecima'){
        tabela.sort(function(a,b) {
        return a.nome.toLowerCase() > b.nome.toLowerCase() ? -1 : a.nome.toLowerCase() < b.nome.toLowerCase() ? 1 : 0;
        });
        document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
        colunaUltima = 'nomebaixo';
    }
}

if(coluna == 'sku'){
    if(coluna == 'sku' && (colunaUltima != "skucima" || colunaUltima == 'skubaixo')){
        tabela.sort(function(a,b) {
        return a.sku.toLowerCase() < b.sku.toLowerCase() ? -1 : a.sku.toLowerCase() > b.sku.toLowerCase() ? 1 : 0;
        });
        document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
        colunaUltima = 'skucima';
    }else if(coluna == 'sku' && colunaUltima == 'skucima'){
        tabela.sort(function(a,b) {
        return a.sku.toLowerCase() > b.sku.toLowerCase() ? -1 : a.sku.toLowerCase() < b.sku.toLowerCase() ? 1 : 0;
        });
        document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
        colunaUltima = 'skubaixo';
    }
}

if(coluna == 'qtd'){
    if(coluna == 'qtd' && (colunaUltima == "" || colunaUltima == 'qtdbaixo' || colunaUltima != 'qtdcima')){
        tabela.sort(function(a, b){return a.qtd - b.qtd});
        document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
        colunaUltima = 'qtdcima';
    }else if(coluna == 'qtd' && colunaUltima == 'qtdcima'){
        tabela.sort(function(a, b){return b.qtd - a.qtd});
        document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
        colunaUltima = 'qtdbaixo';
    }
}

for(i = 1; i < table.rows.length; i++){
    y = i - 1; 
    table.rows[i].onclick = tabela[y].click;
    table.rows[i].cells[0].innerHTML = tabela[y].id;
    table.rows[i].cells[1].innerHTML = tabela[y].nome;
    table.rows[i].cells[2].innerHTML = tabela[y].sku;
    table.rows[i].cells[3].innerHTML = tabela[y].qtd;
}

 document.getElementById('filt').value = filt;
 document.getElementById('filt2').value = filt2;
 document.getElementById('filt3').value = filt3;
 document.getElementById('filt4').value = filt4;
 //document.getElementById('filt5').value = filt5;
    
 filter ('nãoUtilizadoMais', 'lista', 'nãoUtilizadoMais');
 
}

function filter (phrase, _id, cellNr){ 

var table = document.getElementById(_id);

for (var r = 1; r < table.rows.length; r++){ 
linhasFicaramInvisiveisPeloFiltro[r] = "";
}

var filt = [];

filt[0] = document.getElementById('filt').value.toLowerCase();
filt[1] = document.getElementById('filt2').value.toLowerCase();
filt[2] = document.getElementById('filt3').value.toLowerCase();
filt[3] = document.getElementById('filt4').value.toLowerCase();
filt[4] = "";
filt[5] = "";
filt[6] = document.getElementById('filt7').value.toLowerCase();

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
            ele = table.rows[r].cells[y].innerHTML.replace(/<[^>]+>/g,"");  	
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
  
mostrardividido('lista', paginaAtual);	  

}

function mostrardividido(_id, pagina){
 
paginaAtual = 1;	

var table = document.getElementById(_id);

var limite = document.getElementById("Mostrar").value;

if(limite == 'Todos'){
    limite = table.rows.length;
}

var numeroregistrosmostrados = table.rows.length - 1;

for (var r = 1; r < table.rows.length; r++){ 
    if(linhasFicaramInvisiveisPeloFiltro[r] == r){
        numeroregistrosmostrados -= 1;
    }
}

var limitepaginaSuperior = [];
var QuantidadeLinhaTabelaPagina = [];
var contadorLimite;
contadorLimite = 1;
var b = 1;

var NumeroPaginas = (numeroregistrosmostrados) / limite;
NumeroPaginas = Math.ceil(NumeroPaginas);

for(var y = 1; y <= NumeroPaginas; y++){
    limitepaginaSuperior[y] = 0;
    QuantidadeLinhaTabelaPagina[y] = 0;
}

for (var y = 1; y <= NumeroPaginas; y++){	
    for (var r = b; r < table.rows.length; r++){
        if(linhasFicaramInvisiveisPeloFiltro[r] != r && limitepaginaSuperior[y] <= limite){
            limitepaginaSuperior[y] += 1;
        }
        
        QuantidadeLinhaTabelaPagina[y] += 1;
         
        if(limitepaginaSuperior[y] == limite){
            b = r + 1;
            break;
        }
    }
}

for (var y = 2; y <= NumeroPaginas; y++){
    x = y - 1;
    QuantidadeLinhaTabelaPagina[y] += QuantidadeLinhaTabelaPagina[x];
}

var limiteSuperior = QuantidadeLinhaTabelaPagina[pagina];

var limitepaginaInferior = [];

if(pagina == 1){
    limitepaginaInferior[1] = 1;
}else{
    for(var y = 2; y <= NumeroPaginas; y++){
        x = y - 1;
        limitepaginaInferior[y] = QuantidadeLinhaTabelaPagina[x] + 1;
    }
}	

var limiteInferior = limitepaginaInferior[pagina];

for (var r = 1; r < table.rows.length; r++){  	
    if (r <= limiteSuperior && r >= limiteInferior){
        if(linhasFicaramInvisiveisPeloFiltro[r] != r){	
            table.rows[r].style.display = ''; 
        }
    }else{
        table.rows[r].style.display = 'none'; 
    }
}

var list = document.getElementById("myDIV");

while (list.hasChildNodes()) {  
  list.removeChild(list.firstChild);
}

var NumeroBotoes = (numeroregistrosmostrados) / limite;

NumeroBotoes = Math.ceil(NumeroBotoes);

//Criar botão anterior
var para = document.createElement("span");   
para.id = "anterior";
para.style.cssText = 'border:solid 1px gray;padding:5px;padding-right:10px;padding-left:10px;background-color:white;cursor:pointer;';
var t = document.createTextNode('Anterior');      
para.appendChild(t);                                          
document.getElementById("myDIV").appendChild(para);
if(pagina != 1){
    var anterior = pagina - 1;	
}else{
    var anterior = 1;
}
document.getElementById("anterior").addEventListener("click", mostrardividido.bind(null, 'lista', anterior));

//Limite dos botões
var limiteSuperiorBotao = pagina + 5;
var limiteInferiorBotao = pagina - 5;

//Criar botões intermediários
for(i = 1; i <= NumeroBotoes; i++){
    if(pagina == 1 || pagina == 2 || pagina == 3 || pagina == 4){
        limiteSuperiorBotao = 10;
    }
    var paginafinal = NumeroBotoes - pagina;
    if(paginafinal == 1 || paginafinal == 2 || paginafinal == 3 || paginafinal == 4 || paginafinal == 0){
        limiteInferiorBotao = pagina - 10 + paginafinal + 1;
    }
    if(i <= limiteSuperiorBotao && i >= limiteInferiorBotao){
        var para = document.createElement("div");   
        para.id = "mosres"+i;
        if(pagina != i){
            para.style.cssText = 'width:10px;display:inline-block;border:solid 1px gray;padding:5px;padding-right:15px;padding-left:10px;background-color:white;cursor:pointer;';
        }else{
            para.style.cssText = 'width:10px;display:inline-block;border:solid 1px darkblue;padding:5px;padding-right:15px;padding-left:10px;background-color:blue;cursor:pointer;color:white;';
        }
        var t = document.createTextNode(i);      
        para.appendChild(t);                                          
        document.getElementById("myDIV").appendChild(para); 
        document.getElementById("mosres"+i).addEventListener("click", mostrardividido.bind(null, 'lista', i));
    }
}

//Criar botão seguinte
var para = document.createElement("span");   
para.id = "seguinte";
para.style.cssText = 'border:solid 1px gray;padding:5px;padding-right:10px;padding-left:10px;background-color:white;cursor:pointer;';
var t = document.createTextNode('Seguinte');      
para.appendChild(t);                                          
document.getElementById("myDIV").appendChild(para);
if(pagina != NumeroBotoes){
    var seguinte = pagina + 1;	
}else{
    var seguinte = NumeroBotoes;
}
document.getElementById("seguinte").addEventListener("click", mostrardividido.bind(null, 'lista', seguinte));

//Escrever texto em myDIVdois
if(pagina != NumeroBotoes){
    var limiteSuperiorFinal = (pagina * limite);	
    var limiteInferiorFinal = limiteSuperiorFinal - limite + 1;	
}else if(pagina == NumeroBotoes){
    var limiteSuperiorFinal = numeroregistrosmostrados;
    var limiteInferiorFinal = (pagina - 1) * limite + 1;	
}
    
document.getElementById("myDIVdois").innerHTML = "Mostrando de " + limiteInferiorFinal + " até " + limiteSuperiorFinal + " de " + numeroregistrosmostrados + " registros.";
}

function MudarOpacity(id){
document.getElementById(id).style.opacity = 0.5;	
} 

function MudarOpacityRetorno(id){
document.getElementById(id).style.opacity = 1;	
}    
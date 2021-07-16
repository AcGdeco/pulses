<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script type="text/javascript" src="js/produtos.js"></script>

<?php
require_once 'Partes iguais/Cabecalho.php';
require_once 'Partes iguais/menu.php';
?>
<br><br>

<style>
	tr:nth-child(even) {background: #E8E8E8}
	tr:nth-child(odd) {background: #FFF}
</style>

<div class = "flex" >
	<table class = "lista" >
		<tr>
			<td class = "tituloPrincipal" >
				&equiv; Gerenciamento de Produtos
			</td>
		</tr>
		<tr>
			<td class = "botoes" >
				<span class = "voltar" onclick="window.open(document.referrer,'_self');">&lt; Voltar</span>
				<a href = "novoProduto.php" style = "text-decoration:none;" ><span class = "botaoNovo" > + Novo </span></a>
			</td>
		</tr> 
		<tr>
			<td style = "padding:5px;" class = "corvermelha" >
				Para editar ou exluir um registro clique na linha da tabela do registro correspondente.
			</td>
		</tr>
		<tr>
			<td style = "padding:5px;" >
				<table style = "border:1px solid gray;border-collapse:collapse;" >
					<tr>
						<td colspan = "2" style = "padding-left:7px;padding-bottom:2px;" >
							Mostrar<br>
							<select id = "Mostrar" style = "width:75px;" onchange = "mostrardividido('lista', 1)"  >
							<option value="10">10</option>
							<option value="15" selected >15</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="Todos">Todos</option>
							</select>
							<br>
							Registros
						</td>
						<td style = "text-align:right;" >
							<img src = "imagens/lupa.jpg" height = "20" />
						</td>
						<td style = "padding:5px;width:135px;" >
							<input style = "width:135px;" id = "filt7" name="filt7" type="text" onKeyUp="filter(this, 'lista', 'indefinido')">
						</td>
					</tr>
					<tr>
						<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
							ID<img onclick = "mudarImagem(1)" id = "img1" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
						</td>
						<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
							NOME<img onclick = "mudarImagem(2)" id = "img2" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
						</td>
						<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
							SKU<img onclick = "mudarImagem(3)" id = "img3" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
						</td>
						<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
							QUANTIDADE<img onclick = "mudarImagem(4)" id = "img4" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
						</td>
					</tr>
					<tr>    
						<td style = "width:50px;padding:5px;border:solid 1px black;" >
							<input style = "width:50px;"  name="filt" id = "filt" type="text" onKeyUp="filter(this, 'lista', '0')">
						</td>
						<td style = "width:200px;padding:5px;border:solid 1px black;" > 
							<input style = "width:200px;" name="filt2" id = "filt2" type="text" onKeyUp="filter(this, 'lista', '1')">
						</td>    
						<td style = "width:200px;padding:5px;border:solid 1px black;" >
							<input style = "width:200px;" name="filt3" id = "filt3" type="text" onKeyUp="filter(this, 'lista', '2')">
						</td>    
						<td style = "width:135px;padding:5px;border:solid 1px black;" >
							<input style = "width:135px;" name="filt4" id = "filt4" type="text" onKeyUp="filter(this, 'lista', '3')">
						</td>    
					</tr>
				</table>

				<table style = "border:1px solid gray;border-collapse:collapse;" id="lista" >
					<tr>
						<td>

						</td>
					</tr>
					<?php
					require_once 'Partes iguais/dbmysql.php';

					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);

					$sql = "SELECT id, nome, sku, quantidade FROM produtos ORDER BY id ASC";

					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {

					echo "<tr style = 'cursor:pointer;' id = ".$row["id"]." onMouseOver = 'MudarOpacity(".$row["id"].")' onMouseOut = 'MudarOpacityRetorno(".$row["id"].")' onclick = 'EditarExcluir(&apos;".$row["id"]."&apos;, &apos;".$row["nome"]."&apos;, &apos;".$row["sku"]."&apos;, &apos;".$row["quantidade"]."&apos;)' >
							<td style = 'border:solid 1px gray;padding:5px;width:50px;' >".$row["id"]."</td>";
						echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >".$row["nome"]."</td>";
						echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >".$row["sku"]."</td>";
						echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;' >".$row["quantidade"]."</td>";
					echo "</tr>";
						}
					}

					mysqli_close($conn);

					?>
				</table>
			</td>
		</tr>
		<tr>
			<td style = "padding:20px;" >
				<span style = "float:left;font-size:10px;" id="myDIVdois" ></span>
				<span style = "float:right;" id="myDIV" ></span>
			</td>
		</tr>
	</table>
</div>

<script>

var paginaAtual = 1;	

var table = document.getElementById('lista');

var linhasFicaramInvisiveisPeloFiltro = [];

for (var r = 1; r < table.rows.length; r++){  	
	linhasFicaramInvisiveisPeloFiltro[r] = '';
}

var pag = 1;
mostrardividido('lista', pag);
var colunaUltima = "";
mudarImagem(1);

</script>

<?php
require_once 'Partes iguais/Rodape.php';
?>
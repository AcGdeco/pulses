<style>
span#menu{
	font-size:20px;
}
</style>
<br>

<div style = "position:fixed;background-color:white;top:0px;padding:0px;margin:0px;z-index:5;" >
	<nav style = "font-size:14px;"> 
		<ul class="menu">
			<li><a href="index.php" style = "font-size:14px;font-weight:bolder;" >HOME</a></li>
			<?php if(!empty($_SESSION["idUsuario"])){ ?>
				<li><a href="produtos.php" style = "font-size:14px;font-weight:bolder;" >MODIFICAR ESTOQUE</a></li>
				<li><a href="darbaixa.php" style = "font-size:14px;font-weight:bolder;" >ADICIONAR QTD/ DAR BAIXA</a></li>
				<li><a href="" style = "font-size:14px;font-weight:bolder;" >RELATÓRIOS</a>
					<ul>
						<li style = 'background-color:white;opacity:1;z-index:5;position:relative;width:200px;font-weight:bolder;' ><a href="relatorio.php">ESTOQUE</a></li>
						<li style = 'background-color:white;opacity:1;z-index:5;position:relative;width:200px;font-weight:bolder;' ><a href="relatorioDois.php">BAIXAS / INCREMENTOS</a></li>
					</ul>
				</li>
			<?php } ?>
		</ul>
	</nav>
</div>


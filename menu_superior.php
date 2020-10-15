<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="#">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAMAAABiM0N1AAAAXVBMVEUiiub///8AfuQOheXx9v2TvfCVv/CvzfT6/P4Ag+UAgeS81fUbiOb3+v7Z5/lmpevU5PnM3/fk7vuixvI+lOh4ru2Ete8zj+dNmum20fQAduPr8vyLuO9boOqnyfJb9hb0AAABuUlEQVRYhe3YXZeCIBAGYGDUYlDxK6Wt9f//zBVSS6NNxE43vhdddI7PGRUdRkL7BKuSDIdTYn7Liq0MnIo7lMZAVidm0QCluJ7RwbqHYj+nk4SBSo/z6tMYqPJ2CGYaYv4QtB0UbAFFW0HhR6GYI3dcEVYIpcjEiXtDmJsFXxCXoiyQWaRGcrl0z1CsxtfCyaGkZwjKERIOl8kCnUcod3gnWKDoXpHDs2y52M0ISa9rRHg5PbPYZH7g/B/bOmL9OtIOICoppWoYwsOhwOVsldkgOBgoQ2BNlPXlJXlYMWPFgKRM6AUWQz91Sie5lIQhg9pUfFwMBdSSoBja2HLoTXZoh3Zoh3bo41DgCBXnq1RKXsVl6qRqcV/TStggB91ogaM6jHNQclC4oNMOUK7wsfyuMf62eZqJUE267lvozJ4bfleYLnH+//+QyzZrh74Ptbfb7zRW2qB+y+6yFX0x1EB9pDT0H2r0FrTijvPyhwe/r0PJVlM2dbtB1nChIZcJ70Uw0ZDT0GkN6M81pFt9np99YnK8QbT2koCYHmM+jYkGYWU46kdqgLppqI1WpRRDmyJLGuuSbAb9ATTAGoQUBUI4AAAAAElFTkSuQmCC" width="30" height="30" class="d-inline-block align-top" alt="">
    Gestor de Escalas 
 <?   if(isset($_SESSION['session'])&&($_SESSION['session']!='')){ ?>

  <li class="nav">
 <?=$_SESSION['nome'];?> <?=$_SESSION['sobrenome'];?> 
 </li>
<? }?>
  </a>


  <?   if(isset($_SESSION['session'])&&($_SESSION['session']!='')){ ?>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler bg-ringt" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

   



      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gerenciar Trocas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?cadastro_user">Cadastrar membro da equipe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="?cadastrar_equpe">Criar equipe </a>
      </li>
      <?   if(isset($_SESSION['session'])&&($_SESSION['session']!='')){ ?>

        <li class="nav-item">
        <a class="nav-link " href="logout.php">Sair  </a>
      </li>
<? }?>
</ul>
      <? } else { ?>  
         <? }?>
 
  </div>
</nav>
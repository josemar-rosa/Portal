<!DOCTYPE html>
<?php
    require("../includes/conexao.php");
    require("../includes/read_data.php");
    include("../includes/check_token.php");

    if(isset($_SESSION['usuario_id']) && ($_SESSION['usuario_tipo']=='gestprojecto')){
        $id = $_SESSION['usuario_id'];
        
        $query = "select * from tb_usuarios where usuario_id='$id'";
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        
        $usuario_nome = $row['usuario_nome'];
        $usuario_sobrenome = $row['usuario_sobrenome'];
        $usuario_departamento = $row['usuario_departamento'];
        $usuario_login = $row['usuario_login'];
        $usuario_email = $row['usuario_email'];
        $usuario_contacto = $row['usuario_contacto'];
        $usuario_movel = $row['usuario_movel'];
        $usuario_tipo = $row['usuario_tipo'];
        $_SESSION['usuario_foto'] = $row['usuario_foto'];
    }else{
        header('location: ../403');
    }

    if(isset($_SESSION['usuario_id'])){
        if((time() - $_SESSION['ultimo_login']) > 1800){
            header("location: ../includes/logout.php");
        }else{
            $_SESSION['ultimo_login'] = time();
        }
    }

?>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Colaborador - Projectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../imagens/icons/INACOM.ico">  
    <link rel="stylesheet" href="../css/col_base.css">
    <link rel="stylesheet" href="../css/col_projectos.css">
     <link rel="stylesheet" href="../css/coming_soon.css">
    <script type="text/javascript" src="../js/jquery/341/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery/dataTables/jquery.dataTables.js"></script>
    
    <script type="text/javascript" src="../js/amdcharts/lib/4/core.js"></script>
    <script type="text/javascript" src="../js/amdcharts/lib/4/charts.js"></script>
    <script type="text/javascript" src="../js/amdcharts/lib/4/animated.js"></script>
    <script src="https://kit.fontawesome.com/004db0217c.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('../includes/loader.php')?>
    <?php include('../includes/dashboard_gestproj.php')?>
    
    <div class="container3">
        <h1 style="font-size:2.7rem;">Projectos</h1>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DACA</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_daca($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DEETI</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_deeti($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DEC</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_dec($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DRMSU</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_drmsu($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DFM</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_dfm($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DEGER</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_deger($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DAFSG</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_dafsg($db); ?>
            </tbody>
        </table>
    </div>
    
    <div class="container">
        <div class="table_menu">
            <h2><i class="material-icons">business_center</i> Projectos do DRHTI</h2>
        </div>
        <hr class="gray--hr">
        
        <table class="content-table" id="tableProjectos">
            <thead>
                <tr>
                    <th width="20%">Nome</th>
                    <th width="8%">( % )</th>
                    <th width="15%">Responsável</th>
                    <th width="20%">Fase</th>
                    <th width="10%">Início</th>
                    <th width="10%">Chef. Dpto.</th>
                    <th width="10%">C.A.</th>
                    <th width="13%">Status</th>
                    <th width="5%"><i class="material-icons">settings</i></th>
                </tr>
            </thead>
            <tbody>
                <?php echo listar_projectos_drhti($db); ?>
            </tbody>
        </table>
    </div>
    
    
    <!----Modal para visualizar projecto---->
    <div class="modal-project">
        
        <div class="modal-project-content">
            
            <div class="project">
                <div class="project__header">
                    <div class="project__imgBox">
                        <div class="" id="modal_view_pimage">
                            
                        </div>
                        <div class="project__titleBox" id="modal_view_pname">
                            
                        </div>
                    </div>
                    <div class="project__inacomBox">
                        <div class="institutName_box">
                            <span>Instituto Angolano das Comunicações</span>
                        </div>
                        <div class="institutStreet_box">
                            <span>Avenida Dr. António Agostinho Neto, Nº 25-zona C, Praia do Bispo Caixa Postal 1459</span>
                        </div>
                    </div>
                </div>
                
                <div class="project__body">
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>1. Contextualização</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pcontext">
                            
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>2. Missão e Âmbito do Projecto</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pmission">
                            
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>3. Objectivos</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pgoal">
                            
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>4. Metodologia</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pmetodology">
                            
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>5. Entregáveis</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pentregaveis">
                            
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>6. Riscos do Projecto</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__table">
                            <table class="content-modal-table">
                                <thead>
                                    <tr valign='top'>
                                        <th width="15%">Nome do Risco</th>
                                        <th width="30%">Descricção do Risco e Causa</th>
                                        <th width="20%">Impacto</th>
                                        <th width="20%">Accão de Mitigação</th>
                                        <th width="5%">Prob</th>
                                        <th width="5%">Imp</th>
                                    </tr>
                                </thead>
                                <tbody id="modal_view_priscos">
                                    <tr valign='top'>
                                        <td>1.	Implementação errada do portal.</td>
                                        <td>Erro na resolução das páginas do portal sem levar em conta o acesso por outros navegadores.</td>
                                        <td>Falta de harmonia nos componentes da página do portal.</td>
                                        <td>Reconfiguração da página para diferentes resoluções ou navegadores.</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>7. Equipa do Projecto</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" id="modal_view_pmembers">
                            <ul class="project__members" id="modal_view_pmembers">
                                <li>Benedito Calulo</li>
                                <li>Josemar Rosa</li>
                                <li>Tolávio Silva</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="project__details">
                        <div class="header__box">
                            <span>8. Cronograma</span>
                            <hr class="title__line">
                        </div>
                        <div class="project__text" >
                            
                            <div class="project__table">
                            <table class="content-modal-table">
                                <thead>
                                    <tr valign='top'>
                                        <th>Nº</th>
                                        <th>Fases do Projecto</th>
                                        <th>Data de Início</th>
                                        <th>Duração</th>
                                        <th>Data de Fim</th>
                                    </tr>
                                </thead>
                                <tbody id="modal_view_pfases_table">
                                    <tr valign='top'>
                                        <td>1.	Implementação errada do portal.</td>
                                        <td>Erro na resolução das páginas do portal sem levar em conta o acesso por outros navegadores.</td>
                                        <td>Falta de harmonia nos componentes da página do portal.</td>
                                        <td>Reconfiguração da página para diferentes resoluções ou navegadores.</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <div id="modal_view_pfases"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal para visualizar os comentários -->
    <div class="modal_view_comments">
        <div class="modal-content">
            <span class="close-view-comments">×</span>
            <h1 style="font-size: 2rem;">Ponto de situação</h1>
            <hr>
            
            <div class="comment__body">
               <div class="comment__holder" id="comment__view__holder">
                  <div class="comment">
                      <div class="comment__img--box">
                          <div class="comment__img">
                              <img src="../imagens/teste/apple-business-computer-connection-392018.jpg" class="comment__usr--img" alt="Imagem do usuario">
                              <div class="comment_userDetails">
                                  <span>Tolávio Silva</span>
                              </div>
                          </div>
                      </div>
                      <div class="comment__text--box">
                          <div class="comment__text">
                              <h4>Fase 4: Levantamento de Requisitos</h4>    
                              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat sed nobis, temporibus. Nostrum voluptatum minus, consequatur ab vero ea, fugit non illo, excepturi eligendi saepe.</span>
                          </div>
                          <div class="comment__time">
                              <span>10/03/2020 13:12</span>
                          </div>
                      </div>
                  </div>
                  <div class="comment">
                      <div class="comment__img--box">
                          <div class="comment__img">
                              <img src="../imagens/teste/adult-african-american-afro-black-female-1181519.jpg" class="comment__usr--img" alt="Imagem do usuario">
                              <div class="comment_userDetails">
                                  <span>Manuel Domingos</span>
                              </div>
                          </div>
                      </div>
                      <div class="comment__text--box">
                          <div class="comment__text">
                             <h4>Fase 4: Levantamento de Requisitos</h4>
                              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, accusantium, doloribus. Exercitationem dolorum blanditiis quo corporis ex nam molestiae alias architecto doloribus saepe illum odio voluptates, necessitatibus quasi provident deserunt, cumque? Sed consequuntur accusamus, deserunt ex, eveniet veniam vitae neque.</span>
                          </div>
                          <div class="comment__time">
                              <span>15/03/2020 13:12</span>
                          </div>
                      </div>
                  </div>
                  
                  <div class="comment">
                      <div class="comment__img--box">
                          <div class="comment__img">
                              <img src="../imagens/teste/adult-african-american-afro-black-female-1181519.jpg" class="comment__usr--img" alt="Imagem do usuario">
                              <div class="comment_userDetails">
                                  <span>Manuel Domingos</span>
                              </div>
                          </div>
                      </div>
                      <div class="comment__text--box">
                          <div class="comment__text">
                              <h4>Fase 3: Implementação do Protótipo</h4>
                              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, blanditiis.</span>
                          </div>
                          <div class="comment__time">
                              <span>15/03/2020 13:52</span>
                          </div>
                      </div>
                  </div>
                  
                  <div class="comment">
                      <div class="comment__img--box">
                          <div class="comment__img">
                              <img src="../imagens/teste/musician-349790_640.jpg" class="comment__usr--img" alt="Imagem do usuario">
                              <div class="comment_userDetails">
                                  <span>Elieser Almeida</span>
                              </div>
                          </div>
                      </div>
                      <div class="comment__text--box">
                          <div class="comment__text">
                              <h4>Fase 2: Ajustes Finais</h4>
                              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque sunt ipsum ullam iusto esse eligendi culpa aspernatur tenetur earum perferendis necessitatibus praesentium vero doloremque ut debitis dolore eius harum, aliquid quod cupiditate illo, nobis neque dignissimos. Eius perspiciatis, vitae sit.</span>
                          </div>
                          <div class="comment__time">
                              <span>16/03/2020 10:33</span>
                          </div>
                      </div>
                  </div>  
               </div> 
            </div>
            
            <div class="modal__footer">
                <div class="footer__container">
                    
                </div>
            </div>
        </div>
    </div>
    
    </section>
    <script src="../js/dropdown-menu.js"></script>
    <script src="../js/check_token.js"></script>
    <script src="../js/table.js"></script>
    <script src="../js/json/ckeditor/ckeditor.js"></script>
    <!--script>
        CKEDITOR.replace('project__context');
        CKEDITOR.replace('project__mission');
        CKEDITOR.replace('project__goal');
        CKEDITOR.replace('project__metodology');
        CKEDITOR.replace('project__entregaveis');
        CKEDITOR.replace('projectUpdt__context');
        CKEDITOR.replace('projectUpdt__mission');
        CKEDITOR.replace('projectUpdt__goal');
        CKEDITOR.replace('projectUpdt__metodology');
        CKEDITOR.replace('projectUpdt__entregaveis');
        
    </script-->
    <script src="../js/gestor_projectos.js"></script>
    <script src="../js/check_project.js"></script>
    <script>
        /*****************************************************
        *Script para trocar as cores em função das priorida -*
        *des
        *****************************************************/
        document.querySelectorAll('.status').forEach(i => {
            i.textContent.indexOf("Parado") !== -1 ?
            i.classList.add('yellow') :
            i.innerText.indexOf("Em atraso") !== -1 ?
            i.classList.add('orange') :
            i.innerText.indexOf("Por iniciar") !== -1 ?
            i.classList.add('blue') :
            i.innerText.indexOf("Concluido") !== -1 ?
            i.classList.add('green') :
            i.innerText.indexOf("Suspenso") !== -1 ?
            i.classList.add('red') :
            null;
        });
    </script>
    <script>
        function fileValidation(){
            var fileInput = document.getElementById('projectUpdtImage');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.png|\.jpg|\.gif|\.jfif|\.jpeg)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert("Somente imagens no formato: png, jpg, gif, jfif e jpeg são aceites. Obrigado!");
                fileInput.value = '';
                return false;
            }
        }
    </script>
    <!--script src="../js/check_msg.js"></script-->
</body>
</html>

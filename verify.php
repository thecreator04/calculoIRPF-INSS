<html>
    <head>

    <meta charset = "utf-8"/>
    <meta name="viewport" content="width=device=width, initial-scale=0.5   ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body background="./img/fundo.jpg"  background-attachment="fixed";>
<div class="container-fluid">
            
            <?php
           ini_set('display_errors', 0 );
            error_reporting(0);
            
            $var_nome = isset($_POST["nome"])?$_POST["nome"]:"[Nome não informado]";
            $var_salario = isset($_POST["salario"])?$_POST["salario"]:"[Salário não informado]";
            $var_dependente = isset($_POST["dependente"])?$_POST["dependente"]:"[Nº de dependentes não foi informado]";
            $registrados;
            $conteudo;
            $var_cont = 0;
           
 // condições na inserção de dados do formulario
                if(empty($var_nome)){
                //caso não seja informado o nome será redirecionado para página até que insira um nome.
                        header('location:index.php');

                }

                if(empty($var_salario)){
                //caso não seja informado o nome será redirecionado para página até que insira um valor.
                    header('location:index.php');

                }
               
                if(empty($var_dependente)){
                    //caso não seja informado o nome será redirecionado para página até que insira um valor.
                        $var_dependente = 0;
    
                    }
                

                if(!empty($var_salario))
                { 
                    
                    
                        //início dos cálculos


                        if($var_salario <= 1045)
                        {
                             

                        $valor_INSS = ($var_salario * 7.5)/100;

                        $salariomenos_INSS = $var_salario - $valor_INSS;
                        $valor_IRPF = 0;
                        $salarioliq = $salariomenos_INSS;

                      

                        }
                        if($var_salario >=1046 && $var_salario<=2089.60)
                        {
                                if($var_salario >=1046 && $var_salario<=1425.56)
                                {
                                    
                                    $valor_INSS = ($var_salario * 9)/100;
                                    $salariomenos_INSS = $var_salario - $valor_INSS;
                                    $valor_IRPF = 0;
                                    $salarioliq = $salariomenos_INSS;
                                    $var_cont = $var_cont +1;
                                }
                           
                             $valor_INSS = ($var_salario * 9)/100;
                            $salariomenos_INSS = $var_salario - $valor_INSS;
                            $valorp_dependente = $var_dependente*48.62;
                            $desconto_pdependente = $salariomenos_INSS - $valorp_dependente;
                           

                                if($desconto_pdependente <=1903.98){

                                    $salarioliq = $salariomenos_INSS;
                                    $valor_IRPF = 0;
                                    $var_cont = $var_cont +1;

                                }
                                if($desconto_pdependente >= 1903.98 && $desconto_pdependente <= 2826.65){

                                    $valor_IRPF = ($desconto_pdependente * 7.5)/100;
                                    $parcela_deduzir = 142.80;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;

                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;
                                    
                                    $var_cont = $var_cont +1;
                                    

                                }
                                
                        }
                        if($var_salario >= 2089.61 && $var_salario <= 3134.40)
                        {
                             
                            $valor_INSS = ($var_salario * 12)/100;
                            $salariomenos_INSS = $var_salario - $valor_INSS;
                            $valorp_dependente = $var_dependente*48.62;
                            $desconto_pdependente = $salariomenos_INSS - $valorp_dependente;
                                if($desconto_pdependente <=1903.98){

                                    $salarioliq = $salariomenos_INSS;
                                    $valor_IRPF = 0;
                                    $var_cont = $var_cont +1;
                                }
                                if($desconto_pdependente >= 1903.98 && $desconto_pdependente <= 2826.65)
                                {

                                    $valor_IRPF = ($desconto_pdependente * 7.5)/100;
                                    $parcela_deduzir = 142.80;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;

                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;
                                    
                                    $var_cont = $var_cont +1;
                                    

                                }
                                
                               
                        }
                        if($var_salario >= 3134.41 && $var_salario< 6101.06)
                        {
                            
                            $valor_INSS = ($var_salario * 14)/100;
                            $salariomenos_INSS = $var_salario - $valor_INSS;
                            $valorp_dependente = $var_dependente*48.62;
                            $desconto_pdependente = $salariomenos_INSS - $valorp_dependente;
                            $desconto_pdependente = $salariomenos_INSS - $valorp_dependente;

                                if($desconto_pdependente >= 1903.98 && $desconto_pdependente <= 2826.65)
                                {

                                    $valor_IRPF = ($desconto_pdependente * 7.5)/100;
                                    $parcela_deduzir = 142.80;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;

                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;
                                    $var_cont = $var_cont +1;
                                }

                                if($desconto_pdependente >= 2826.66 && $desconto_pdependente <= 3751.05)
                                {

                                    $valor_IRPF = ($desconto_pdependente * 15)/100;
                                    $parcela_deduzir = 354.80;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;
                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;

                                    $var_cont = $var_cont +1;
                                }
                                if($desconto_pdependente >= 3751.06 && $desconto_pdependente <= 4664.68)
                                {

                                    $valor_IRPF = ($desconto_pdependente * 22.5)/100;
                                    $parcela_deduzir = 636.13;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;
                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;

                                    $var_cont = $var_cont +1;
                                }
                                if($desconto_pdependente > 4664.68)
                                {

                                    $valor_IRPF = ($desconto_pdependente * 27.5)/100;
                                    $parcela_deduzir = 869.36;
                                    $valor_IRPF = $valor_IRPF - $parcela_deduzir;
                                    $salarioliq = $salariomenos_INSS-$valor_IRPF;
                                    
                                    $var_cont = $var_cont +1;
                                }
                        }
                        
                        if ($var_salario > 6101.07){

                            $valor_INSS = 0;

                            $valor_IRPF = ($var_salario*27.5)/100;
                            $valor_IRPF =   $valor_IRPF-869.36;

                            $salarioliq = $var_salario - $valor_IRPF;


                        }
                    //fim dos cálculos
                   
                    //variável que concatena os dados dos usuários
                              
                    $dados =  $var_nome."/". number_format($var_salario,2,",",".") . "/" . $var_dependente."/".number_format($valor_IRPF,2,",",".")."/".number_format($valor_INSS,2,",",".")."/".number_format($salarioliq,2,",",".")."\r\n";

                    $registrados = "registrados.txt";
                    //variável que simboliza que o arquivo esta aberto
                    $open_file = fopen($registrados,'a');
                    //função para escrever o resultado da variavel dados no documento dos registrados.
                    fwrite($open_file,$dados);
                    //função para fechar o documento aberto.
                    fclose($open_file);

                        // variável que importa os dados do arquivo .txt
                     $importando = file('./registrados.txt');
                           
                        

                           echo" <a href='index.php' id='back' > <img id='back' src='./img/botao.png' style=';margin:10px;,'></a>";
                           echo"<div id='space'> Tabela das Últimas Consultas<br></div>";

                           echo" <table class='table table-dark'>
                                 <thead>
                                 <tr>
                           
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Nº dependentes</th>
                                    <th scope='col'>Salário Bruto</th>
                                    <th scope='col'>IRRF</th>
                                    <th scope='col'>INSS</th>
                                    <th scope='col'>Salário líquido</th>
                                    </tr>
                                    </thead>";

                //variável para importar os dados do arquivo para a tabela no documento
                foreach($importando as $linha)
                          {
       
                          $separador = explode('/',$linha);

                         
       
                               echo" 
                                 
                                 <td>$separador[0]</td>
                                 <td>$separador[2]</td>
                                 <td>$separador[1]</td>
                                 <td>$separador[3]</td>
                                 <td>$separador[4]</td>
                                 <td>$separador[5]</td>
                               </tr>
                               <tr>";
                              
                               
       
                              // $ocult = <th scope='row'>1</th>
       
                        }
                        echo"</table>
                             </table>";


                }  

            ?>

            <table class="table table-dark"  >
            <thead>
   
            </tr>
            </thead>
         
            </table>
            </table>



           
</div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>


</html>
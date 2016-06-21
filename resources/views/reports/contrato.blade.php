<?php
// leitura das datas automaticamente
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
//$cidade = "Digite aqui sua cidade";

// configuração mes

switch ($mes){

    case 1: $mes = "Janeiro"; break;
    case 2: $mes = "Fevereiro"; break;
    case 3: $mes = "Março"; break;
    case 4: $mes = "Abril"; break;
    case 5: $mes = "Maio"; break;
    case 6: $mes = "Junho"; break;
    case 7: $mes = "Julho"; break;
    case 8: $mes = "Agosto"; break;
    case 9: $mes = "Setembro"; break;
    case 10: $mes = "Outubro"; break;
    case 11: $mes = "Novembro"; break;
    case 12: $mes = "Dezembro"; break;

}


// configuração semana

switch ($semana) {

    case 0: $semana = "Domingo"; break;
    case 1: $semana = "Segunda Feira"; break;
    case 2: $semana = "Terça Feira"; break;
    case 3: $semana = "Quarta Feira"; break;
    case 4: $semana = "Quinta Feira"; break;
    case 5: $semana = "Sexta Feira"; break;
    case 6: $semana = "Sábado"; break;

}

$countServico = 0;
$countSubservico = 0;

//Agora basta imprimir na tela...
//echo ("$cidade, $semana, $dia de $mes de $ano");
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title></title>
    <style type="text/css" class="init">

        body {
            font-family: arial;
        }
        .paragrafo
        {
            text-align: justify;
        }
        .table-principal, .tr, .td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table-principal , .tr , .td {
            font-size: small;
        }

    </style>
    <link href="" rel="stylesheet" media="screen">
</head>

<body>

<p class="paragrafo">
    <b>CONTRATADA:</b> (nome, endereço e inscrição perante o CRC da sociedade prestadora
    de serviços contábeis ou do escritório individual de contabilidade), neste ato por seu
    representante legal (se o caso de sociedade), {{$empresa->nome}} ,
    portador da Cédula de Identidade RG _______________________.
</p>

<p class="paragrafo">
    <b>CONTRATANTE:</b> (razão social, endereço, CNPJ), neste ato por seu representante
    legal (se o caso de sociedade), Sr. {{$contrato->fornecedor->nome_fantasia}}, portador
    da Cédula de Identidade RG {{$contrato->fornecedor->rg}}.
</p>

<p>1. DO OBJETO</p>

<p class="paragrafo">
    O objeto do presente consiste na prestação pela CONTRATADA à CONTRATANTE,
    dos seguintes serviços profissionais:
</p>

@for($i = 0; $i < count($servicos); $i++)
    <p>1.<?php $countServico++; echo $countServico; ?> - {{$servicos[$i]['nome']}}</p>
    @for($j = 0; $j < count($contrato->subservico); $j++)
        @if($contrato->subservico[$j]->servico_id == $servicos[$i]['id'])
            <p class="paragrafo"> 1.{{$countServico}}.<?php $countSubservico++; echo $countSubservico; ?> - {{$contrato->subservico[$j]->nome}} </p>
        @endif
    @endfor
    <?php $countSubservico = 0;?>
@endfor

<p>2. DAS CONDIÇÕES DE EXECUÇÃO DOS SERVIÇOS</p>

<p class="paragrafo">
    Os serviços serão executados nas dependências da CONTRATADA, em obediência às seguintes condições:
</p>

<p class="paragrafo">
    2.1. - A documentação indispensável para o desempenho dos serviços arrolados na
    cláusula 1 será fornecida pela CONTRATANTE, consistindo, basicamente, em:
</p>

<p class="paragrafo">
    2.1.1 - Boletim de caixa e documentos nele constantes;
</p>

<p class="paragrafo">
    2.1.2 - Extratos de todas as contas correntes bancárias, inclusive aplicações; e documentos relativos aos lançamentos, tais como depósitos, cópias de cheques,
    borderôs de cobrança, descontos, contratos de crédito, avisos de créditos, débitos, entre outros necessários à conciliação;
</p>

<p class="paragrafo">
    2.1.3 – Notas Fiscais de compra (entradas) e de venda (saídas), bem como comunicação de eventual cancelamento das mesmas;
</p>

<p class="paragrafo">
    2.1.4 - Controle de frequência dos empregados e eventual comunicação para concessão de férias, admissão ou rescisão contratual, bem como correções salariais espontâneas.
</p>

<p class="paragrafo">
    2.2. - A documentação deverá ser enviada pela CONTRATANTE de forma completa e em boa ordem nos seguintes prazos:
</p>

<p class="paragrafo">
    2.2.1 - Até 5 (cinco) dias após o encerramento do mês, os documentos relacionados nos itens 2.1.1 e 2.1.2, acima;
</p>

<p class="paragrafo">
    2.2.2 - Semanalmente, os documentos mencionados no item 2.1.3 acima, sendo que os relativos à última semana do mês, no 1° (primeiro) dia útil do mês seguinte;
</p>

<p class="paragrafo">
    2.2.3 - Até o dia 25 do mês de referência quando se tratar dos documentos do item
</p>

<p class="paragrafo">
    2.1.4, para elaboração da folha de pagamento;
</p>

<p class="paragrafo">
    2.1.4, para elaboração da folha de pagamento;
</p>

<p class="paragrafo">
    2.2.4 - No mínimo 48 (quarenta e oito) horas antes a comunicação para dação de aviso
    de férias e aviso prévio de rescisão contratual de empregados acompanhada do Registro de Empregados.
</p>

<p class="paragrafo">
    2.3 - A CONTRATADA compromete-se a cumprir todos os prazos estabelecidos na
    legislação de regência quanto aos serviços contratados, especificando-se, porém, os prazos abaixo:
</p>

<p class="paragrafo">
    2.3.1 - A entrega das guias de recolhimento de tributos e encargos trabalhistas à
    CONTRATANTE se fará com antecedência de 2 (dois) dias do vencimento da obrigação.
</p>

<p class="paragrafo">
    2.3.2 - A entrega da Folha de Pagamento, recibos de pagamento salarial, de férias e
    demais obrigações trabalhistas far-se- á até 72 (setenta e duas) horas após o recebimento
    dos documentos mencionados no item 2.1.4.
</p>

<p class="paragrafo">
    2.3.3 - A entrega de Balancete se fará até o dia 20 do 2° (segundo) mês subseqüente ao período a que se referir.
</p>

<p class="paragrafo">
    2.3.4 - A entrega do Balanço Anual se fará até 30 (trinta) dias após a entrega de todos os
    dados necessários à sua elaboração, principalmente o Inventário Anual de Estoques, por
    escrito, cuja execução é de responsabilidade da CONTRATANTE.
</p>

<p class="paragrafo">
    2.4. - A remessa de documentos entre os contratantes deverá ser feita sempre sob protocolo.
</p>

<p>3. DOS DEVERES DA CONTRATADA</p>

<p class="paragrafo">
    3.1 - A CONTRATADA desempenhará os serviços enumerados na cláusula 1 com todo
    zelo, diligência e honestidade, observada a legislação vigente, resguardando os
    interesses da CONTRATANTE, sem prejuízo da dignidade e independência
    profissionais, sujeitando-se, ainda, às normas do Código de Ética Profissional do
    Contabilista, aprovado pela Resolução N° 803/96 do Conselho Federal de Contabilidade.
</p>

<p class="paragrafo">
    3.2 - Responsabilizar-se- á a CONTRATADA por todos os prepostos que atuarem nos
    serviços ora contratados, indenizando à CONTRATANTE, em caso de culpa ou dolo.
</p>

<p class="paragrafo">
    3.2.1. - A CONTRATADA assume integral responsabilidade por eventuais multas
    fiscais decorrentes de imperfeições ou atrasos nos serviços ora contratados, excetuando-
    se os ocasionados por força maior ou caso fortuito, assim definidos em lei, depois de
    esgotados os procedimentos, de defesa administrativa, sempre observado o disposto no item 3.5.
</p>

<p class="paragrafo">
    3.2.1.1. - Não se incluem na responsabilidade assumida pela CONTRATADA os juros e
    a correção monetária de qualquer natureza, visto que não se tratam de apenamento pela
    mora, mas sim recomposição e remuneração do valor não recolhido.
</p>

<p class="paragrafo">
    3.3 - Obriga-se a CONTRATADA a fornecer à CONTRATANTE, no escritório dessa e
    dentro do horário normal de expediente, todas as informações relativas ao andamento dos serviços ora contratados.
</p>

<p class="paragrafo">
    3.4 - Responsabilizar-se- á a CONTRATADA por todos os documentos a ela entregues
    pela CONTRATANTE, enquanto permanecerem sob sua guarda para a consecução dos
    serviços pactuados, respondendo pelo seu mau uso, perda, extravio ou inutilização,
    salvo comprovado caso fortuito ou força maior, mesmo se tal ocorrer por ação ou
    omissão de seus prepostos ou quaisquer pessoas que a eles tenham acesso.
</p>

<p class="paragrafo">
    3.5 - A CONTRATADA não assume nenhuma responsabilidade pelas consequências de
    informações, declarações ou documentação inidôneas ou incompletas que lhe forem
    apresentadas, bem como por omissões próprias da CONTRATANTE ou decorrentes do desrespeito à orientação prestada.
</p>

<p>4. - DOS DEVERES DA CONTRATANTE</p>

<p>HONORÁRIOS E REEMBOLSOS</p>

<p class="paragrafo">
    4.1. - Obriga-se a CONTRATANTE a fornecer à CONTRATADA todos os dados,
    documentos e informações que se façam necessários ao bom desempenho dos serviços
    ora contratados, em tempo hábil, nenhuma responsabilidade cabendo à segunda acaso recebidos intempestivamente.
</p>

<p class="paragrafo">
    <?php
    $data = \DateTime::createFromFormat('Y-m-d', $contrato->data_pagamento);
    $dataFromat = $data->format('d');
    ?>
    4.2. - Para a execução dos serviços constantes da cláusula 1 a CONTRATANTE pagará à CONTRATADA os honorários profissionais correspondentes a R${{$contrato->valor_contrato}}
    (______ reais) mensais, até o dia {{$dataFromat}} do mês subsequente ao vencido, podendo a
    cobrança ser veiculada através da respectiva duplicata de serviços, mantida em carteira ou via cobrança bancária.
</p>

<p class="paragrafo">
    4.2.1 - Além da parcela acima avençada, a CONTRATANTE pagará à CONTRATADA
    uma adicional anual, correspondente ao valor de uma parcela mensal, para atendimento
    ao acréscimo de serviços e encargos próprios do período final do exercício, tais como o
    encerramento das demonstrações contábeis anuais, Declaração de Rendimentos da
    Pessoa Jurídica, Declaração de Movimento Fiscal Estadual, elaboração de informes de
    rendimento, &quot;RAIS&quot;, Folhas de Pagamento do 13° (décimo terceiro) Salário, &quot;DIRF&quot; e demais obrigações acessórias.
</p>

<p class="paragrafo">
    4.2.1.1 - A mensalidade adicional mencionada no item anterior será paga em duas
    parcelas vencíveis nos dias 20 de novembro e 15 de dezembro de cada exercício e seu
    valor será equivalente ao dos honorários vigentes no mês de pagamento.
</p>

<p class="paragrafo">
    4.2.1.2 - Mesmo no caso de início do contrato em qualquer mês do exercício, a parcela
    adicional será devida integralmente.
</p>

<p class="paragrafo">
    4.2.1.3 - Caso o presente envolva a recuperação de serviços não realizados - atrasados -
    a mensalidade adicional será integralmente devida desde o primeiro mês de atualização.
</p>

<p class="paragrafo">
    4.2.2 - Os honorários pagos após a data avençada no item 4.2. acarretarão à
    CONTRATANTE o acréscimo de multa de 2% (dois por cento), sem prejuízo de juros
    moratórios de 1% (um por cento) ao mês ou fração, acrescidos de correção monetária equivalente ao IGP-M.
</p>

<p class="paragrafo">
    4.2.3 – Os honorários serão reajustados anualmente e automaticamente segundo a
    variação do ____________ (índice de correção eleito pelas partes) no período,
    considerando-se como mês a fração igual ou superior a 15 (quinze) dias.
</p>

<p class="paragrafo">
    4.2.4 - O valor dos honorários previstos no item 4.2 foi estabelecido segundo o número
    de lançamentos contábeis, o número de funcionários e o número de notas fiscais abaixo
    relacionados no item 4.2.5, ficando certo que se a média trimestral dos mesmos for
    superior aos parâmetros mencionados na proporção de 20% (vinte por cento), passará a
    vigir nova mensalidade no mesmo patamar de aumento do volume de serviço,
    automaticamente, a partir do primeiro dia após o trimestre findo.
</p>

<p class="paragrafo">
    4.2.5 - Os parâmetros de fixação dos honorários tiveram como base o volume de papéis
    e informações fornecidas pela CONTRATANTE, como segue:
</p>

<center>
<table class="table-principal" style="width: 70%;">
    <tr class="tr">
        <td class="td" style="width: 90%">Quantidade de Funcionários</td>
        <td><center>( <?php if($contrato->qtd_funcionarios == '1'){ echo 'X';} ?> ) </center></td>
    </tr>
    <tr class="tr">
        <td class="td" style="width: 60%">Quantidade de Notas Fiscais/mês (Entrada/Saída/Serviços)</td>
        <td><center>( <?php if($contrato->qtd_notas_fiscais == '1'){ echo 'X';} ?> )</center></td>
    </tr>
    <tr class="tr">
        <td class="td" style="width: 60%">Quantidade de Lançamentos Contábeis</td>
        <td><center>( <?php if($contrato->qtd_lancamentos_contabeis == '1'){ echo 'X';} ?> )</center></td>
    </tr>
</table>
</center>

<p class="paragrafo">
    4.2.6 - O percentual de reajuste anual previsto no item 4.2.3 incidirá sobre o valor
    resultante da aplicação do critério de revisão pelo volume de serviços, conforme item 4.2.4.
</p>

<p class="paragrafo">
    4.3 - A CONTRATANTE reembolsará à CONTRATADA o custo de todos os materiais
    utilizados na execução dos serviços ora ajustados, tais como formulários contínuos,
    impressos fiscais, trabalhistas e contábeis, bem como livros fiscais, pastas, cópias
    reprográficas, autenticações, reconhecimento de firmas, custas, emolumentos e taxas
    exigidas pelos serviços públicos, sempre que utilizados e mediante recibo discriminado
    acompanhado dos respectivos comprovantes de desembolso.
</p>

<p class="paragrafo">
    4.4. - Os serviços solicitados pela CONTRATANTE não especificados na cláusula 1
    serão cobrados pela CONTRATADA em apartado, como extraordinários, segundo valor
    específico constante de orçamento previamente aprovado pela primeira, englobando
    nessa previsão toda e qualquer inovação da legislação relativamente ao regime tributário, trabalhista ou previdenciário.
</p>

<p class="paragrafo">
    4.4.1 - São considerados serviços extraordinários ou para-contábeis,
    exemplificativamente: 1) alteração contratual; 2) abertura de empresa ou filial; 3)
    certidões negativas do INSS, FGTS, Federais, ICMS e ISS; 4) Certidão negativa de
    falências ou protestos; 5) Homologação junto à DRT; 6) Autenticação/Registro de
    Livros; 7) Encadernação de livros; 8) Declaração de ajuste do imposto de renda pessoa física; 9) Preenchimento de fichas cadastrais/IBGE.
</p>

<p>5. - DA VIGÊNCIA E RESCISÃO</p>

<p class="paragrafo">
    <?php
    $data = \DateTime::createFromFormat('Y-m-d', $contrato->data_contrato);
    $dataContrato = $data->format('d/m/Y');
    ?>
    5.1 - O presente contrato vigorará a partir de {{$dataContrato}}, por prazo
    indeterminado, podendo a qualquer tempo ser rescindido mediante pré-aviso de 60
    (sessenta) dias, por escrito.
</p>

<p class="paragrafo">
    5.1.1 - A parte que não comunicar por escrito a rescisão ou efetuá-la de forma sumária,
    desrespeitando o pré-aviso previsto, ficará obrigada ao pagamento de multa
    compensatória no valor de 2 (duas) parcelas mensais dos honorários vigentes à época.
</p>

<p class="paragrafo">
    5.1.2 - No caso de rescisão, a dispensa pela CONTRATANTE da execução de quaisquer
    serviços, seja qual for a razão, durante o prazo do pré-aviso, deverá ser feita por escrito,
    não a desobrigando do pagamento dos honorários integrais até o termo final do contrato.
</p>

<p class="paragrafo">
    5.2 - Ocorrendo a transferência dos serviços para outra Empresa Contábil, a
    CONTRATANTE deverá informar à CONTRATADA, por escrito, seu nome, endereço,
    nome do responsável e número da inscrição junto ao Conselho Regional de
    Contabilidade, sem o que não será possível à CONTRATADA cumprir as formalidades
    ético-profissionais, inclusive a transmissão de dados e informações necessárias à
    continuidade dos serviços, em relação às quais, diante da eventual inércia da
    CONTRATANTE, estará desobrigada de cumprimento.
</p>

<p class="paragrafo">
    5.2.1 - Entre os dados e informações a serem fornecidos não se incluem detalhes
    técnicos dos sistemas de informática da CONTRATADA, os quais são de sua exclusiva propriedade.
</p>

<p class="paragrafo">
    5.3 - A falta de pagamento de qualquer parcela de honorários faculta à CONTRATADA
    suspender imediatamente a execução dos serviços ora pactuados, bem como considerar
    rescindido o presente, independentemente de notificação judicial ou extrajudicial, sem
    prejuízo do previsto no item 4.2.2.
</p>

<p class="paragrafo">
    5.4 - A falência ou a concordata da CONTRATANTE facultará a rescisão do presente
    pela CONTRATADA, independentemente de notificação judicial ou extrajudicial, não
    estando incluídos nos serviços ora pactuados a elaboração das peças contábeis arroladas
    no artigo 159 do Decreto-Lei 7.661/45 e demais decorrentes.
</p>

<p class="paragrafo">
    5.5 - Considerar-se- á rescindido o presente contrato, independentemente de notificação
    judicial ou extrajudicial, caso qualquer das partes CONTRATANTES venha a infringir cláusula ora convencionada.
</p>

<p class="paragrafo">
    5.5.1 - Fica estipulada a multa contratual de uma parcela mensal vigente relativa aos
    honorários, exigível por inteiro em face da parte que der causa à rescisão motivada, sem
    prejuízo da penalidade específica do item 4.2.2., se o caso.
</p>

<p class="paragrafo">
    5.6 – A assistência da CONTRATADA á CONTRATANTE, após a denúncia do
    contrato, ocorrerá no prazo de 30 (trinta) dias.
</p>

<p>6. - DO FORO</p>

<p class="paragrafo">
    Fica eleito o Foro da Cidade de {{$contrato->foro_cidade}}, com expressa renúncia a qualquer
    outro, por mais privilegiado que seja, para dirimir as questões oriundas da interpretação
    e execução do presente contrato.
</p>

<p class="paragrafo">
    E, por estarem justos e contratados, assinam o presente, em 2 (duas) vias de igual teor e
    para um só efeito, na presença de 02 (duas) testemunhas.
</p>

<p class="paragrafo">
    Local e Data:
</p>


<table border="0" style="width: 100%">
    <tr>
        <td>
            <hr style="width: 100%">
            CONTRATANTE
        </td>
        <td>
            <hr style="width: 100%">
            CONTRATADA
        </td>
    </tr>
</table>

<p>TESTEMUNHAS:</p>

<table border="0" style="width: 100%">
    <tr>
        <td>
            <hr style="width: 100%">
            NOME E RG:
        </td>
        <td>
            <hr style="width: 100%">
            NOME E RG:
        </td>
    </tr>
</table>

</body>
</html>
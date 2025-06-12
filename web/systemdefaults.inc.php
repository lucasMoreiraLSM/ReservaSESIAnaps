<?php
namespace MRBS;

/************************************************* *************************
  * Arquivo padrão do sistema MRBS
  *
  * NÃO MODIFIQUE ESTE ARQUIVO. É APENAS PARA USO INTERNO.
  *
  * PARA CONFIGURAR MRBS PARA O SEU SISTEMA E ADICIONAR PARÂMETROS DE CONFIGURAÇÃO
  * ESTE ARQUIVO EM config.inc.php, _NOT_Editar este arquivo.
  *
  **************************************************** ************************/

/**********
 * Timezone
 **********/
 
// O fuso horário em que as salas de reunião são executadas. É especialmente importante
// para definir isso se você estiver usando o PHP 5 no Linux. Nesta configuração
// caso contrário, reuniões em um horário de verão diferente do que você está atualmente
// in são deslocados incorretamente pelo deslocamento do horário de verão.
//
// Observe que os fusos horários podem ser definidos por área, portanto, falando estritamente
// a configuração deve estar em areadefaults.inc.php, mas como é muito importante definir
// o fuso horário correto está incluído aqui.
//
// Ao atualizar uma instalação existente, isso deve ser definido como o
// fuso horário no qual o servidor da web é executado. Consulte o documento INSTALAR para obter mais informações.
//
// Uma lista de fusos horários válidos pode ser encontrada em http://php.net/manual/timezones.php
// A linha a seguir deve ser descomentada removendo o  '//' at the beginning
//$timezone = "Europe/London";

// If you are using iCalendar notifications of bookings (see mail settings below)
// then the iCalendar attachment includes a definition of your timezone in
// VTIMEZONE format. This defines the timezone, including the rules for Daylight
// Saving Time transitions. This information is included in the MRBS distribution.
// However, governments can change the rules periodically, MRBS will check from
// time to time to see if there is a later version available on the web. If your
// site prevents external access to the web, this check will time out. However
// you can avoid the timeout and stop MRBS checking for up to date versions by
// setting $ zoneinfo_update = false;
$zoneinfo_update = true;

// As definições do VTIMEZONE existem em duas formas - normal e compatível com o Outlook.
// $zoneinfo_outlook_compatible determinando quais usar.
$zoneinfo_outlook_compatible = true;

// As definições de VTIMEZONE são armazenadas em cache no banco de dados com um tempo de expiração
// de $ zoneinfo_expiry segundos. Se o seu servidor não possui internet externa
// acesse o conjunto $ zoneinfo_expiry como PHP_INT_MAX para impedir que o MRBS tente
// atualize as definições de VTIMEZONE.
$zoneinfo_expiry = 60*60*24*7;    // 7 dias

/*******************
  * Configurações do banco de dados
  ******************/
// Qual sistema de banco de dados: "pgsql" = PostgreSQL, "mysql" = MySQL
$dbsys = "mysql";
// Nome do host do servidor de banco de dados. Para pgsql, pode usar "" em vez de localhost
// para usar soquetes de domínio Unix em vez de TCP / IP. Para o mysql "localhost"
// diz ao sistema para usar soquetes de domínio Unix, e $db_port será ignorado;
// se você deseja forçar a conexão TCP, pode usar "127.0.0.1".
$db_host = "localhost";
// Se você precisar usar uma porta não padrão para a conexão com o banco de dados,
// pode descomentar a seguinte linha e especificar o número da porta
// $db_port = 1234;
// Nome do banco de dados:
$db_database = "mrbs";
// Nome do esquema. Isso se aplica apenas ao PostgreSQL e só é necessário se você tiver mais
// de um esquema em seu banco de dados e você também está usando os mesmos nomes de tabela MRBS em
// vários esquemas.
//$db_schema = "public";
// Database login user name:
$db_login = "root";
// Database login password:
$db_password = 's3s1sup0rt3';
// Prefixo para nomes de tabelas. Isso permitirá várias instalações onde apenas
// um banco de dados está disponível
$db_tbl_prefix = "mrbs_";
// Configure $ db_persist como TRUE para usar conexões de banco de dados persistentes (em pool) do PHP. Nota
// que conexões persistentes não são recomendadas, a menos que seu sistema sofra
// problemas de desempenho sem eles. Eles podem causar problemas com transações e
// bloqueios (consulte http://php.net/manual/en/features.persistent-connections.php) e embora
// MRBS tenta evitar esses problemas, geralmente é melhor não usar persistente
// conexões, se puder.
$db_persist = FALSE;

/*********************************
 * Site identification information
 *********************************/
$mrbs_admin = "Your Administrator";
$mrbs_admin_email = "admin_email@your.org";
// NOTA: há mais endereços de email em $mail_settings abaixo. Você também pode dar
// endereços de email no formato 'Nome completo <endereço>', por exemplo:
// $mrbs_admin_email = 'Sistema de reservas <admin_email@your.org>';
// se a seção de nome tiver caracteres "peculiares", você precisará
// para colocar o nome entre aspas duplas, por exemplo:
// $mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';

// O nome da empresa é obrigatório. É usado no cabeçalho e também para notificações por email.
// O logotipo da empresa, informações adicionais e URL são opcionais.

$mrbs_company = "Your Company";   //Essa linha deve sempre ser descomentada ($mrbs_company é usado em vários lugares)

// Remova o comentário desta próxima linha para usar um logotipo em vez de texto para sua organização no cabeçalho
// $mrbs_company_logo = "your_logo.gif"; // nome do seu arquivo de logotipo. Este exemplo assume que ele está no diretório MRBS

// Remova o comentário desta próxima linha para obter informações adicionais após o nome ou logotipo da sua empresa
// $mrbs_company_more_info = "Você pode colocar informações adicionais aqui"; // por exemplo. "Departamento XYZ"

// Remova o comentário desta próxima linha para ter um link para sua organização no cabeçalho
// $mrbs_company_url = "http://www.your_organisation.com/";

// Isso é para corrigir problemas de URL ao usar um proxy no ambiente.
// Se os links dentro do MRBS parecerem quebrados, especifique aqui o URL de
// seu diretório raiz do MRBS, conforme visto pelos usuários. Por exemplo:
// $url_base = "http://webtools.uab.ericsson.se/oam";
// Também é recomendável que você defina isso se pretender usar o email
// notificações, para garantir que o URL correto seja exibido no
// notificação.
$url_base = "";


/*******************
 * Temas
 *******************/

// Escolha um tema para o MRBS. O tema controla dois aspectos da aparência:
// (a) o estilo: as cores, dimensões e fontes mais comumente alteradas foram
// extraído do arquivo CSS principal e inserido no arquivo styling.inc no diretório apropriado
// no diretório Temas. Se você deseja alterar o esquema de cores, deve
// pode fazê-lo alterando os valores no arquivo do tema. Alterações de estilo mais avançadas
// pode ser feito alterando as regras no arquivo CSS.
// (b) o cabeçalho: o arquivo header.inc que contém a função usada para produzir o cabeçalho.
// Isso permite que as organizações conectem suas próprias funções de cabeçalho com bastante facilidade, nos casos em que
// a aparência corporativa desejada não pode ser alterada usando apenas o CSS e a marcação
// em si precisa ser alterado.
//
// O MRBS procurará os arquivos "styling.inc" e "header.inc" no diretório Themes / $ theme e
// se não conseguir encontrá-los, usará os arquivos em Temas / padrão. Um diretório de temas pode conter
// um arquivo styling.inc de substituição ou um arquivo header.inc de substituição ou ambos.

// As opções disponíveis são:

// "default"        Default MRBS theme
// "classic126"     Same colour scheme as MRBS 1.2.6

$theme = "default";

// Use o $custom_css_url para substituir o CSS MRBS padrão.
// $custom_css_url = 'css / custom.css';


/*******************
 * Configurações de Calendario
 *******************/
 
// MRBS possui dois modos diferentes de operação: "tempos" e "períodos". "Times"
// reservas baseadas permitem definir intervalos regulares regulares de reserva, por exemplo, todos
// meia hora das 7:00 às 19:00. Reservas baseadas em "períodos" são úteis
// em, por exemplo, escolas em que os horários das reservas são de diferentes comprimentos
// e não são consecutivos devido ao tempo de mudança ou interrupções.

// Não é possível alternar entre essas duas opções após a reserva
// foi criado e tem entradas significativas. Isto é devido a diferenças
// da maneira que os dados são armazenados.

// No entanto, é possível configurar o sistema para que algumas áreas operem em
// modo "períodos" e outros no modo "tempos". Portanto, a variável de configuração
// que determina que a configuração padrão para novas áreas apareça junto com outras
// variáveis ​​que podem ser definidas por área no arquivo areadefaults.inc.php.
// Isso é feito para chamar a atenção para o fato de serem configurações padrão para novos
// somente áreas e para evitar frustrações ao tentar alterar as configurações dos
// areas: isso é feito editando as configurações de uma área usando um navegador da web
// seguindo o link "Salas" no MRBS.


// CONFIGURAÇÕES GERAIS
// ----------------

// Este é o número máximo de linhas (períodos ou períodos) que se pode
// espera ver nas visualizações de dia e semana. É usado pelo mrbs.css.php para
// criando classes. Não importa se é muito grande, exceto pelo
// fato de que mais CSS do que o necessário será gerado. (A variável é ignorada
// se $times_along_top estiver definido como true).

$max_slots = 60;


// CONFIGURAÇÕES DE TEMPOS
// --------------

// As configurações de tempos podem ser definidas por área, portanto, essas variáveis
// aparece no arquivo areadefaults.inc.php.


// CONFIGURAÇÕES DE PERÍODOS
// ----------------

// As configurações de "Períodos" são usadas apenas em áreas onde o modo foi
// foi definido como "Períodos".


/******************
 * Políticas de reservas
 ******************/

// A maioria das políticas de reserva pode ser configurada por área, portanto, essas variáveis
// aparece no arquivo areadefaults.inc.php.

// As configurações abaixo são configurações de política global

// Defina o número máximo de reservas que podem ser feitas por qualquer usuário, em um intervalo,
// que pode ser um dia, semana, mês ou ano ou no futuro. (Uma semana é definida
// pela configuração $ weekstarts). Essas são configurações globais, mas você também pode
// configura as configurações por área. Isso permitiria definir políticas como permitir
// no máximo 10 reservas por mês no total, com um máximo de 1 por dia na área A.
$max_per_interval_global_enabled['day']    = false;
$max_per_interval_global['day'] = 1;      // no máximo 1 reserva por dia no total

$max_per_interval_global_enabled['week']   = false;
$max_per_interval_global['week'] = 5;     // no máximo 5 reservas por semana no total

$max_per_interval_global_enabled['month']  = false;
$max_per_interval_global['month'] = 10;   // no máximo 10 reservas por mês no total

$max_per_interval_global_enabled['year']   = false;
$max_per_interval_global['year'] = 50;    // no máximo 50 por ano no total

$max_per_interval_global_enabled['future'] = false;
$max_per_interval_global['future'] = 100; // no máximo, 100 reservas no futuro no total

// Defina a data mais recente para a qual você pode fazer uma reserva. Isso pode ser útil se você
// deseja definir uma data absoluta, por exemplo, o final do período, além do qual as reservas não podem ser feitas.
// Se você deseja definir uma data relativa, por exemplo, não mais de uma semana, isso pode ser feito
// usando as configurações da área. Observe que é possível ter um valor relativo e um valor absoluto.
// data, por exemplo, "não mais de uma semana fora e, em qualquer caso, não após o final do período".
// Observe que as reservas são permitidas no $max_booking_date, mas não depois dele.
$max_booking_date_enabled = false;
$max_booking_date = "2012-07-23";  //Deve ser uma sequência no formato "yyyy-mm-dd"

// Defina a data mais antiga para a qual você pode fazer uma reserva. Isso pode ser útil se você
// deseja definir uma data absoluta, por exemplo, o início do período, antes do qual as reservas não podem ser feitas.
// Se você deseja definir uma data relativa, por exemplo, não mais de uma semana, isso pode ser feito
// usando as configurações da área. Observe que é possível ter um valor relativo e um valor absoluto.
// data, por exemplo, "não antes de uma semana fora e, em qualquer caso, não antes do início do período"
// Observe que as reservas são permitidas no $min_booking_date, mas não antes dele.
$min_booking_date_enabled = false;
$min_booking_date = "2012-04-23";  // Must be a string in the format "yyyy-mm-dd"

/******************
 * Configurações do visor
 ******************/

// [Essas são todas as variáveis que controlam a aparência das páginas e poderiam
// tornar-se configurações por usuário]

// Início da semana: 0 para domingo, 1 para segunda-feira etc.
$weekstarts = 0;

// Dias da semana que são dias da semana
$weekdays = array(1, 2, 3, 4, 5);

// Dias da semana que devem ser ocultados da exibição
// 0 para domingo, 1 para segunda-feira etc.
// Por exemplo, se você deseja que os sábados e domingos sejam ocultos, configure $ hidden_days = array (0,6);
//
// Por padrão, os dias ocultos serão removidos completamente da tabela principal na semana e no mês
// visualizações. Como alternativa, você pode fazer com que elas sejam mostradas como colunas estreitas e acinzentadas
// editando o arquivo CSS. Procure por $column_hidden_width em mrbs.css.php.
//
// [Observe que, embora estejam ocultos da exibição nas visualizações de semana e mês, eles
// ainda pode ser reservado no formulário edit_entry e você pode exibir as reservas por
// pulando diretamente para a exibição do dia a partir do seletor de data.]
$hidden_days = array();

// Formato da hora em páginas. FALSO para mostrar datas no formato de 12 horas, VERDADEIRO para mostrá-las
// no formato de 24 horas
$twentyfourhour_format = true;

// Formatos usados para datas e horas. Para opções de formatação
// see http://php.net/manual/function.strftime.php
$strftime_format['date']         = "%A %d %B %Y";  // Used in Day view
$strftime_format['date_short']   = "%x";           // Used in Search results
$strftime_format['dayname']      = "%A";           // Used in Month view
$strftime_format['dayname_edit'] = "%a";           // Used in edit_entry form
$strftime_format['dayname_cal']  = "%a";           // Used in mini calendars
$strftime_format['month_cal']    = "%B";           // Used in mini calendars
$strftime_format['mon']          = "%b";           // Used in date selectors
$strftime_format['ampm']         = "%p";
$strftime_format['time12']       = "%I:%M%p";      // 12 hour clock
$strftime_format['time24']       = "%H:%M";        // 24 hour clock
$strftime_format['datetime']     = "%c";           // Used in Help
$strftime_format['datetime12']   = "%I:%M%p - %A %d %B %Y";  // 12 hour clock
$strftime_format['datetime24']   = "%H:%M - %A %d %B %Y";    // 24 hour clock
// If you prefer dates as "10 Jul" instead of "Jul 10" ($dateformat = true in
// MRBS 1.4.5 and earlier) then use
// $strftime_format['daymonth']     = "%d %b";
$strftime_format['daymonth']     = "%b %d";        // Used in trailer
$strftime_format['monyear']      = "%b %Y";        // Used in trailer
$strftime_format['monthyear']    = "%B %Y";        // Used in Month view

// Se deve ou não exibir o fuso horário
$display_timezone = false;

// Resultados por página para pesquisa:
$search["count"] = 20;

// Tempo de atualização da página (em segundos). Defina como 0 para desativar
// (Observe que se o MRBS detectar que um cliente está em uma rede medida
// conexão, desativará a atualização da página para esse cliente.)
$refresh_rate = 0;

// Taxa de atualização (em segundos) para verificação do Ajax de reservas válidas na página edit_entry
// Defina como 0 para desativar
$ajax_refresh_rate = 10;

// Tipo de reboque. false fornece um trailer completo com links para dias, semanas e meses antes
// e após a data atual. true fornece um trailer mais simples que apenas possui links para o
// dia atual, semana e mês.
$simple_trailer = false;

// as áreas devem ser mostradas como uma lista ou uma caixa de seleção suspensa?
$area_list_format = "list";
//$area_list_format = "select";

// As entradas na exibição mensal podem ser exibidas como slot de início / fim, breve descrição ou
// ambos. Defina como "descrição" para uma breve descrição, "slot" para o intervalo de tempo e
// "ambos" para ambos. O padrão é "ambos", mas são exibidas 6 entradas por dia.
// de 12.
$monthly_view_entries_details = "both";

// Para visualizar as semanas no trailer inferior como números de semanas (42) em vez de
// 'primeiro dia da semana' (13 de outubro), defina como verdadeiro. Também dará semana
// números na visualização mensal
$view_week_number = false;

// Para exibir os números da semana nos mini-calendários, defina-o como true. A semana
// os números são precisos apenas se você definir $ weekstarts como 1, ou seja, definir o
// início da semana a segunda-feira
$mincals_week_numbers = false;

// Para exibir horários no eixo x (na parte superior) e salas ou dias no eixo y (na lateral)
// definido como true; a versão padrão / tradicional do MRBS possui salas (ou dias) na parte superior e
// vezes ao longo do lado. A transposição da tabela pode ser útil se você tiver um grande número de
// quartos e não muitos horários.
$times_along_top = false;

// Para exibir os rótulos das linhas (horas, salas ou dias) no lado direito e também os
// lado esquerdo nas visualizações de dia e semana, definido como true;
// (foi chamado $times_right_side em versões anteriores do MRBS)
$row_labels_both_sides = false;

//Para exibir os cabeçalhos das colunas (horas, salas ou dias) na parte inferior da tabela como
// bem como o topo nas visualizações de dia e semana, definido como true;
$column_labels_both_ends = false;

// Para exibir os mini calendario  na parte inferior do dia, visualizações de semana e mês
// defina esse valor como true
$display_calendar_bottom = false; 

// Definir visualização inicial padrão (month, week or day)
// O padrão é dia
$default_view = "day";
// Defina a sala padrão para começar (usada por index.php)
// Os números dos quartos podem ser determinados consultando o URL Editar ou Excluir de um
// sala na página de administração.
// O padrão é 0
$default_room = 0;

// Define o comportamento de recorte para as células nas visualizações de dia e semana.
// Defina como true se desejar que as células nas visualizações de dia e semana sejam cortadas. este
// fornece uma tabela em que todas as linhas têm a mesma altura, independentemente do conteúdo.
// Alternativamente, defina como false se desejar que as células se expandam para se ajustarem ao conteúdo.
// (false não suportado no IE6 e IE7 devido ao suporte incompleto ao CSS)
$clipped = true;                

// Define o comportamento de recorte para as células na exibição do mês.
// Configure como true se desejar que todas as entradas tenham a mesma altura. o
// descrição curta pode ser cortada neste caso. Se definido como false,
// cada entrada da reserva será grande o suficiente para exibir todas as informações.
$clipped_month = true;

// Defina como true se desejar que as células na exibição mensal rolem se houver muito
// muitas reservas para exibir; defina como false se desejar que a célula da tabela se expanda para
// acomoda as reservas. (NOTA: (1) a rolagem não funciona no IE6 e, portanto, a tabela
// célula sempre se expandirá no IE6. (2) No IE8 Beta 2, a rolagem também não funciona e
// o conteúdo da célula é cortado quando $ month_cell_scrolling estiver definido como true.)
$month_cell_scrolling = true;

// Define o comprimento máximo de uma string que pode ser exibida em uma célula da tabela admin
// (por exemplo, listas de salas e usuários) antes de ser truncado. (Isso é necessário porque
// você não deseja que uma célula contenha, por exemplo, uma sequência de texto de 2 kbytes, o que pode acontecer
// com campos definidos pelo usuário).
$max_content_length = 20;  // characters

// O comprimento máximo de um campo de banco de dados para o qual uma entrada de texto pode ser usada em um formulário
// (por exemplo, ao editar um usuário ou sala). Se for maior que isso, uma área de texto será usada.
$text_input_max = 70;  // characters

// Para entradas com opções de preenchimento automático, por exemplo, a área e a sala correspondem às entradas
// na página do relatório, podemos definir quantos caracteres precisam ser inseridos antes do
// opções são exibidas. Isso nos permite evitar uma longa lista enorme de opções
// sendo apresentado. Definimos os pontos de interrupção em uma matriz. Por exemplo, se definirmos
// $ autocomplete_length_breaks = array (25, 250, 2500); isso significa que se o número de opções
// é menor que 25, então eles serão exibidos quando 0 caracteres forem inseridos, ou seja, a entrada
// recebe foco. Se o número de opções for menor que 250, elas serão exibidas
// quando 1 caractere é inserido e assim por diante. A matriz pode ter o tamanho que você desejar. Se isso
// está vazio, as opções são exibidas quando 0 caracteres são inseridos.

// [Nota: esta variável é aplicável apenas a navegadores antigos que não suportam o
// elemento <datalist> e, em vez disso, volte para uma emulação JavaScript. Navegadores que
// support <datalist> apresenta as opções em uma caixa de seleção rolável]
$autocomplete_length_breaks = array(25, 250, 2500);


/************************
 * Configurações Diversas
  ************************ /

/// Máximo de entradas repetidas (máximo necessário +1):
$max_rep_entrys = 365 + 1;

// Intervalo padrão do relatório em dias:
$default_report_days = 60;

$show_plus_link = false;   //Altere para true para sempre mostrar o link (+) como em
                           // MRBS 1.1.


// CONFIGURAÇÕES DE RESERVAS PRIVADAS

// Nota: algumas configurações para reservas particulares podem ser definidas por área e
// aparece no arquivo areadefaults.inc.php

// Escolha quais campos devem ser privados configurando
// $is_private_field['tablename.columnname'] = true
// No momento, apenas os campos na tabela de entrada podem ser marcados como privados,
// incluindo campos personalizados, mas com exceção dos seguintes campos:
// start_time, end_time, entry_type, repeat_id, room_id, timestamp, tipo, status,
// lembrado, info_time, info_user, info_text.

$is_private_field ['entry.name'] = true;
$is_private_field ['entry.description'] = true;
$is_private_field ['entry.create_by'] = true;
$is_private_field ['entry.modified_by'] = true;

                  
// CONFIGURAÇÕES PARA APROVAÇÃO DE RESERVAS - POR ÁREA

// Todas essas configurações podem ser definidas por área, portanto, essas variáveis
// aparece no arquivo areadefaults.inc.php.


// CONFIGURAÇÕES PARA APROVAÇÃO DE RESERVAS - GLOBAL

// Essas configurações são de todo o sistema e controlam o comportamento em todas as áreas.

// Intervalo antes que os lembretes possam ser emitidos (em segundos). Somente
// os dias úteis (veja abaixo) estão incluídos no cálculo
$reminder_interval = 60 * 60 * 24 * 2; // 2 dias úteis

// Dias da semana que são dias úteis (domingo = 0, etc.)
$working_days = array (1,2,3,4,5); // 2a. A 6a

// CONFIGURAÇÕES PARA CONFIRMAÇÃO DE RESERVA

// Todas essas configurações podem ser definidas por área, portanto, essas variáveis
// aparece no arquivo areadefaults.inc.php.

/***********************************************
* Valores do formulário
 ***********************************************/

 $select_options  = array();
// É possível restringir alguns valores de formulário a serem selecionados em uma lista suspensa.
// caixa de seleção para baixo, em vez de permitir a entrada de forma livre. Isso é feito por
// colocando as opções permitidas em uma matriz como parte das $select_options
// matriz bidimensional. O primeiro índice especifica o campo do formulário no
// formato tablename.columnname. Por exemplo, para restringir o nome de uma reserva
// para 'Física', 'Química' ou 'Biologia' descomente a linha abaixo.

//$select_options['entry.name'] = array('Physics', 'Chemistry', 'Biology');

// No momento, $select_options é suportado apenas da seguinte maneira:
// - Tabela de entrada: nome, descrição e campos personalizados
// - Tabela de usuários: campos personalizados

// Apenas para campos personalizados (será estendido posteriormente), também é possível usar
// uma matriz associativa para $select_options, por exemplo

//$select_options['entry.catering'] = array('c' => 'Coffee', 
//                                          's' => 'Sandwiches',
//                                          'h' => 'Hot Lunch');

// Nesse caso, a chave (por exemplo, 'c') é armazenada no banco de dados, mas o valor
// (por exemplo, 'Café') é exibido e pode ser pesquisado usando a Pesquisa e o Relatório.
// Isso permite alterar os valores exibidos, por exemplo, alterar 'Coffee'
// para 'Café, chá e biscoitos', sem precisar alterar o banco de dados. Também pode
// será útil se a tabela do banco de dados estiver sendo compartilhada com outro aplicativo.
// O MRBS detectará automaticamente se a matriz é associativa.
//
// Observe que uma matriz como
//
// $ select_options ['entry.catering'] = array ('2' => 'Café',
// '4' => 'Sanduíches',
// '5' => 'Almoço quente');
//
// será tratado como uma matriz indexada simples, e não como uma matriz associativa.
// Isso porque (a) o PHP estritamente falando não distingue entre indexado
// e matrizes associativas e (b) PHP lançará qualquer chave de string que se pareça com um
// número inteiro válido em um número inteiro.
//
// Se você deseja tornar o campo de seleção um campo obrigatório (veja abaixo), inclua
// uma string vazia como um dos valores, por exemplo
//
//$select_options['entry.catering '] = array (' '=>' Por favor, selecione uma opção ',
// 'c' => 'Café',
// 's' => 'Sanduíches',
// 'h' => 'Almoço quente');

$datalist_options = array();
// Em vez de restringir o usuário a um conjunto fixo de opções usando $select_options,
// você pode fornecer uma lista de opções que serão usadas como sugestões, mas o
// o usuário também poderá digitar sua própria entrada. (O MRBS apresenta esses
// um elemento <datalist> HTML5 em navegadores que o suportam, retornando a um
// Emulação de JavaScript em navegadores que não usam - exceto o IE6 e abaixo de onde
// é apresentado um campo de entrada de texto comum).
//
// Como $select_options, a matriz pode ser uma matriz indexada simples ou uma
// array associativo, por exemplo, array ('AL' => 'Alabama', 'AK' => 'Alaska', etc.). Contudo
// alguns usuários podem achar um array associativo confuso quando a chave é inserida na entrada
// campo quando o valor correspondente é selecionado.
//
// No momento, $datalist_options é suportado apenas pelos mesmos campos que
// $select_options (veja detalhes acima)


$is_mandatory_field = array();
// Você pode definir campos de entrada personalizados e alguns dos campos padrão (descrição
// e tipo) para ser obrigatório, definindo itens na matriz $ is_mandatory_field.
// (Observe que tornar obrigatório um campo da caixa de seleção significa que a caixa deve ser marcada.)
// Por exemplo:

// $is_mandatory_field['entry.type'] = true;
// $is_mandatory_field['entry.terms_and_conditions'] = true;

// Defina $ skip_default como true se desejar a caixa "Ignorar conflitos passados"
// no formulário edit_entry a ser verificado por padrão. (Isso significa que
// se você fizer uma reserva repetida e algumas das datas repetidas já estiverem
// reservado, o MRBS simplesmente ignorará esses).
$skip_default = false;

// $edit_entry_field_order can be used to change the order of fields in the 
// edit_entry page. This is useful to insert custom fields somewhere other than 
// the end.  The same order is used for the view_entry page.

// For example: To place a custom field 'in_charge' directly after the 
// booking name, set the following in config.inc.php:
// 
// $edit_entry_field_order = array('name', 'in_charge');
// 
// Valid entries in this array are: 'name', 'description', 'start_time',
// 'end_time', 'room_id', 'type', 'confirmation_status', 'privacy_status',
// plus any custom fields you may have defined. Fields that are not
// mentioned in the array are appended at the end, in their usual order.
$edit_entry_field_order = array();

// You can so the same for the fields in the Search Criteria section of the report
// form.  Valid entries in this array are 'report_start', 'report_end', 'areamatch',
// 'roommatch', 'typematch', 'namematch', 'descrmatch', 'creatormatch', 'match_private',
// 'match_confirmed', 'match_approved', plus any custom fields you may have defined.
$report_search_field_order = array();

// And the same for the fields in the Presentation Options section of the report form.
// Valid entries in this array are 'output', 'output_format', 'sortby' and 'sumby'.
$report_presentation_field_order = array();


/***********************************************
* Configurações de autenticação - leia AUTENTICATION
 ***********************************************/

// NOTA: se você estiver usando o tipo de autenticação 'joomla', 'saml' ou 'wordpress',
//, então você deve usar o esquema de sessão correspondente.

$auth["type"] = "db"; // How to validate the user/password. One of 
                      // "auth_basic", "cas", "config", "crypt", "db", "db_ext", "imap",
                      // "imap_php",  "joomla", "ldap", "nis", "none", "nw", "pop3",  
                      // "saml", "smtp" or "wordpress".
                      
$auth["session"] = "php"; // How to get and keep the user ID. One of
                          // "cas", "cookie", "host", "http", "ip", "joomla", "nt",
                          // "omni", "php", "remote_user", "saml" or "wordpress".

// Parâmetros de configuração para o esquema de sessão 'cookie'

// A chave secreta de criptografia dos tokens de sessão. Você é fortemente
// aconselhado a alterar isso se você usar este esquema de sessão
$auth["session_cookie"]["secret"] = "This isn't a very good secret!";
// O tempo de expiração de uma sessão, em segundos. Defina como 0 para usar cookies de sessão
$auth["session_cookie"]["session_expire_time"] = (60*60*24*30); // 30 days
// Se deseja incluir o endereço IP do usuário no cookie de sessão.
// Aumenta a segurança, mas pode causar problemas com proxies / IP dinâmico
// máquinas
$auth["session_cookie"]["include_ip"] = true;
// O algoritmo de hash a ser usado deve ser suportado pela sua versão do PHP,
// see http://php.net/manual/en/function.hash-algos.php
$auth["session_cookie"]["hash_algorithm"] = 'sha512';

$csrf_cookie["hash_algorithm"] = 'sha512';
$csrf_cookie["secret"] = "This still isn't a very good secret!";

// Parâmetros de configuração para o esquema de sessão 'php'

// O tempo de expiração de um cookie de sessão, em segundos
// N.B. Tempos de expiração longos da sessão dependem do PHP não retirar a sessão
// no servidor muito cedo. Se você deseja apenas usar cookies de sessão,
// defina como 0.
$auth["session_php"]["session_expire_time"] = (60*60*24*30); // 30 days

// Defina isso como o tempo de expiração de uma sessão após um período de inatividade
// em segundos. Definir como zero significa que a sessão não expirará após
// um período de atividade - mas observe que ele expirará se o cookie da sessão
// expira (veja acima). Observe que se você tiver $ refresh_rate definido e
// seu sistema não é capaz de fazer atualizações do Ajax, mas usa um <meta>
// para fazer a atualização, essas atualizações contarão como atividade - isso
// é o caso se você tiver o JavaScript desativado no cliente.
$auth["session_php"]["inactivity_expire_time"] = 0; // seconds


// Substituição do caminho do cookie. Se esse valor for definido, ele será usado pelo
// Esquemas de sessão 'php' e 'cookie' para substituir o comportamento padrão
// de determinar automaticamente o caminho do cookie a ser usado
// $cookie_path_override = '/ mrbs /';

// A lista de administradores (pode modificar as configurações de outras pessoas).
//
// Esta lista não é necessária ao usar o esquema de autenticação 'db' EXCEPT
// ao atualizar de um sistema anterior ao MRBS 1.4.2 que usava autenticação db.
// Antes da versão 1.4.2, o esquema de autenticação 'db' precisava dessa lista. Ao executar
// edit_users.php pela primeira vez em um sistema 1.4.2 ou posterior, com um diretório existente
// lista de usuários no banco de dados, o sistema adicionará automaticamente um campo ao
// a tabela para direitos de acesso e concede direitos de administrador a esses usuários no banco de dados
// para quem os direitos de administrador são definidos aqui. Depois disso, esta lista é ignorada.
unset($auth["admin"]);              // Inclua isso ao copiar para config.inc.phps
$auth["admin"][] = "127.0.0.1";     // endereço IP do host local. Útil com sessões IP.
$auth["admin"][] = "administrator"; // Um nome de usuário da lista de usuários. Útil
                                    //com a maioria dos outros esquemas de sessão.
//$auth["admin"][] = "10.0.0.1";
//$auth["admin"][] = "10.0.0.2";
//$auth["admin"][] = "10.0.0.3";

// 'auth_config' user database
// Format: $auth["user"]["name"] = "password";
unset($auth["user"]);              // Include this when copying to config.inc.php
$auth["user"]["administrator"] = "secret";
$auth["user"]["alice"] = "a";
$auth["user"]["bob"] = "b";

// 'session_http' configuration settings
$auth["realm"]  = "mrbs";

// 'session_remote_user' configuration settings
//$auth['remote_user']['login_link'] = '/login/link.html';
//$auth['remote_user']['logout_link'] = '/logout/link.html';

// 'auth_ext' configuration settings
$auth["prog"]   = "";
$auth["params"] = "";

// 'auth_db' configuration settings
// The highest level of access (0=none; 1=user; 2+=admin).    Used in edit_users.php
// In the future we might want a higher level of granularity, eg to distinguish between
// different levels of admin
$max_level = 2;
// The lowest level of admin allowed to view other users
$min_user_viewing_level = 2;
// The lowest level of admin allowed to edit other users
$min_user_editing_level = 2;

// Password policy.  Uncomment the variables and set them to the
// required values as appropriate.
// $pwd_policy['length']  = 6;  // Minimum length
// $pwd_policy['alpha']   = 1;  // Minimum number of alpha characters
// $pwd_policy['lower']   = 1;  // Minimum number of lower case characters
// $pwd_policy['upper']   = 1;  // Minimum number of upper case characters
// $pwd_policy['numeric'] = 1;  // Minimum number of numeric characters
// $pwd_policy['special'] = 1;  // Minimum number of special characters (not alpha-numeric)

// 'cas' configuration settings
$auth['cas']['host']    = 'cas.example.com';  // Full hostname of your CAS Server
$auth['cas']['port']    = 443;  // CAS server port (integer). Normally for a https server it's 443
$auth['cas']['context'] = '/cas';  // Context of the CAS Server
// Os hosts "reais" do servidor cas em cluster que enviam mensagens de logoff SAML
// Supõe que o servidor cas tenha carga balanceada em vários hosts.
// A falha em restringir as solicitações de logoff do SAML para hosts autorizados pode
// permite ataques de negação de serviço em que pelo menos o servidor está
// vinculado ao analisar mensagens XML falsas.
//$auth['cas']['real_hosts'] = array('cas-real-1.example.com', 'cas-real-2.example.com');

// Para uso em produção, defina o certificado da CA que é o emissor do certificado
// no servidor CAS
$auth['cas']['ca_cert_path'] = '/path/to/cachain.pem';

// Para testes rápidos, você pode desativar a validação SSL do servidor CAS.
// ESTA CONFIGURAÇÃO NÃO É RECOMENDADA PARA PRODUÇÃO.
// VALIDAR O SERVIDOR CAS É CRUCIAL PARA A SEGURANÇA DO PROTOCOLO CAS!
$auth['cas']['no_server_validation'] = false;

// Filtrando por atributo
// As próximas duas configurações permitem usar atributos CAS para exigir que um usuário tenha certos
// atributos, caso contrário, seu nível de acesso será zero. Em outras palavras, a menos que eles possuam os requisitos
// atributos, eles poderão fazer login com êxito, mas não terão mais direitos do que um
// não registrado no usuário.
// $auth['cas']['filter_attr_name'] = ''; // eg 'department'
// $auth['cas']['filter_attr_values'] = ''; // eg 'DEPT01', or else an array, eg array('DEPT01', 'DEPT02');

$auth['cas']['debug']   = false;  // Defina como true para ativar a saída de depuração. Desativar para produção.


// 'auth_db' configuration settings
// Lista de campos que somente os administradores podem editar. Por padrão, esses são os
// nível de usuário (ou seja, admin / usuário) e o nome de usuário. Campos personalizados podem ser adicionados
// as required.
$auth['db']['protected_fields'] = array('level', 'name');


// 'auth_db_ext' configuration settings
// A variável 'db_system' é equivalente à variável principal MRBS $dbsys,
// e permite usar qualquer uma das camadas de abstração do banco de dados do MRBS para
// autenticação db_ext.
$auth['db_ext']['db_system'] = 'mysql';
// Hostname of external database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$auth['db_ext']['db_host'] = 'localhost';
// Se você precisar usar uma porta não padrão para a conexão com o banco de dados,
// pode descomentar a seguinte linha e especificar o número da porta
//$auth['db_ext']['db_port'] = 1234;
$auth['db_ext']['db_username'] = 'authuser';
$auth['db_ext']['db_password'] = 'authpass';
$auth['db_ext']['db_name'] = 'authdb';
$auth['db_ext']['db_table'] = 'users';
$auth['db_ext']['column_name_username'] = 'name';
$auth['db_ext']['column_name_password'] = 'password';
$auth['db_ext']['column_name_email'] = 'email';
// Below is an example if you want to put the MRBS user level in the DB
//$auth['db_ext']['column_name_level'] = 'mrbs_level';
// Either 'password_hash' (from PHP 5.5.0), 'md5', 'sha1', 'crypt' or 'plaintext'
$auth['db_ext']['password_format'] = 'md5';

// 'auth_ldap' configuration settings

// Muitos dos parâmetros LDAP podem ser especificados como matrizes, a fim de
// especifique vários diretórios LDAP para pesquisar. Cada item abaixo
// especificará se o item pode ser especificado como uma matriz. Caso existam
// parâmetro é especificado como uma matriz, CADA configuração da matriz
// parâmetro deve ter o mesmo número de elementos. Você pode especificar um
// parâmetro como uma matriz, como no exemplo a seguir:
//
// $ldap_host = array('localhost', 'otherhost.example.com');

// Where is the LDAP server.
// This can be an array.
//$ldap_host = "localhost";

// If you have a non-standard LDAP port, you can define it here.
// This can be an array.
//$ldap_port = 389;

// If you do not want to use LDAP v3, change the following to false.
// This can be an array.
$ldap_v3 = true;

// If you want to use TLS, change the following to true.
// This can be an array.
$ldap_tls = false;

// LDAP base distinguish name.
// This can be an array.
//$ldap_base_dn = "ou=organizationalunit,dc=example,dc=com";

// Attribute within the base dn that contains the username
// This can be an array.
//$ldap_user_attrib = "uid";

// If you need to search the directory to find the user's DN to bind
// with, set the following to the attribute that holds the user's
// "username". In Microsoft AD directories this is "sAMAccountName"
// This can be an array.
//$ldap_dn_search_attrib = "sAMAccountName";

// If you need to bind as a particular user to do the search described
// above, specify the DN and password in the variables below
// These two parameters can be arrays.
// $ldap_dn_search_dn = "cn=Search User,ou=Users,dc=example,dc=com"; // Any compliant LDAP
// $ldap_dn_search_dn = "searchuser@example.com"; // A form which could work for AD LDAP
// $ldap_dn_search_password = "some-password";

// 'auth_ldap' extra configuration for ldap configuration of who can use
// the system
// If it's set, the $ldap_filter will be used to determine whether a
// user will be granted access to MRBS
// This can be an array.
// An example for Microsoft AD:
//$ldap_filter = "memberof=cn=whater,ou=whatver,dc=example,dc=com";

// If you need to filter a user by the group a user is in with an LDAP
// directory which stores group membership in the group object
// (like OpenLDAP) then you need to search for the groups they are
// in. If you want to do this, define the following two variables, an
// an appropriate $ldap_filter. e.g.:
// $ldap_filter_base_dn = "ou=Groups,dc=example,dc=com";
$ldap_filter_user_attr = "memberuid";
// $ldap_filter = "cn=MRBS Users";

// If you need to disable client referrals, this should be set to true.
// Note: Active Directory for Windows 2003 forward requires this.
// $ldap_disable_referrals = true;

// LDAP option for dereferencing aliases
// LDAP_DEREF_NEVER = 0 - (default) aliases are never dereferenced.
// LDAP_DEREF_SEARCHING = 1 - aliases should be dereferenced during the search
//      but not when locating the base object of the search.
// LDAP_DEREF_FINDING = 2 - aliases should be dereferenced when locating the base object but not during the search.
// LDAP_DEREF_ALWAYS = 3 - aliases should be dereferenced always.
//$ldap_deref = LDAP_DEREF_ALWAYS;

// Defina como true para dizer ao MRBS para procurar o endereço de email de um usuário no LDAP.
// Utiliza $ ldap_email_attrib abaixo
$ldap_get_user_email = false;
// The LDAP attribute which holds a user's email address
// This can be an array.
$ldap_email_attrib = 'mail';
// The LDAP attribute which holds a user's name. Another common attribute
// to use (with Active Directory) is 'displayname'.
// This can be an array.
$ldap_name_attrib = 'cn';

// The DN of the LDAP group that MRBS admins must be in. If this is defined
// then the $auth["admin"] is not used.
// This can be an array.
// $ldap_admin_group_dn = 'cn=admins,ou=whoever,dc=example,dc=com';

// The LDAP attribute that holds group membership details. Used with
// $ldap_admin_group_dn, above.
// This can be an array.
$ldap_group_member_attrib = 'memberof';
  
// Set to true if you want MRBS to call ldap_unbind() between successive
// attempts to bind. Unbinding while still connected upsets some
// LDAP servers
$ldap_unbind_between_attempts = false;

// Output debugging information for LDAP actions
$ldap_debug = false;

// 'auth_imap' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the IMAP server
$imap_host = "imap-server-name";
// The IMAP server port
$imap_port = "143";

// 'auth_imap_php' configuration settings
$auth["imap_php"]["hostname"] = "localhost";
// You can also specify any of the following options:
// Specifies the port number to connect to
//$auth["imap_php"]["port"] = 993;
// Use SSL
//$auth["imap_php"]["ssl"] = true;
// Use TLS
//$auth["imap_php"]["tls"] = true;
// Turn off SSL/TLS certificate validation
//$auth["imap_php"]["novalidate-cert"] = true;

// Restrict authentication to usernames from a particular domain.  Useful
// when authenticating against a server such as outlook.office365.com which
// supports usernames from many domains.
//$auth['imap_php']['user_domain'] = 'example.com';

// 'auth_pop3' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the POP3 server
$pop3_host = "pop3-server-name";
// The POP3 server port
$pop3_port = "110";

// 'auth_smtp' configuration settings
$auth['smtp']['server'] = 'myserver.example.org';


// 'auth_joomla' configuration settings
$auth['joomla']['rel_path'] = '..';   // Path to the Joomla! installation relative to MRBS.
// Be sure to set the cookie path in your Joomla administrator Global Configuration Site settings
// to cover both the Joomla and MRBS installations, eg '/'.

// [Note that although in Joomla! access levels are solely used for what users are allowed to *see*, we use
// them in MRBS to determine what they can see and do, ie we map them onto MRBS user levels.  While this
// does not strictly follow the Joomla! access control model, it does make it much simpler to give users
// MRBS permissions.]

// List of Joomla! viewing access level ids that have MRBS Admin capabilities.  You can if you wish use
// the existing viewing access levels.  However we recommend creating a new access level, eg
// "MRBS Administrator" and assigning that to user groups, as it will then be clearer which groups
// have what kind of access to MRBS.
$auth['joomla']['admin_access_levels'] = array(); // Can either be a single integer, or an array of integers.
// As above, but for ordinary user rights.  Create for example a viewing access level called "MRBS User"
// and assign that level to user groups as appropriate.
$auth['joomla']['user_access_levels'] = array(); // Can either be a single integer, or an array of integers.



// 'auth_wordpress' configuration settings
$auth['wordpress']['rel_path'] = '..';   // Path to the WordPress installation relative to MRBS.
// List of WordPress roles that have MRBS Admin capabilities.  The default is 'administrator'.
// Note that these role names are the keys used to store the name, which are typically in lower case
// English, eg 'administrator', and not the values which are displayed on the dashboard form, which will
// generally start with a capital and be translated, eg 'Administrator' or 'Administrateur' (French),
// depending on the site language you have chosen for WordPress.
// You can define more than one WordPress role that maps to the MRBS Admin role by using
// an array.   The comment below assumes that you have created a new WordPress role (probably by using
// a WordPress plugin) called "MRBS Admin", which will typically (depending on the plugin) have a key of
// 'mrbs_admin', and that you assigned that role to those users that you want to be MRBS admins.
$auth['wordpress']['admin_roles'] = 'administrator';  // can also be an array, eg = array('administrator', 'mrbs_admin');
// List of WordPress roles that have MRBS User capabilities.  This allows you to have some WordPress users
// who are authorised to use MRBS and some who are not. 
$auth['wordpress']['user_roles'] = array('subscriber', 'contributor', 'author', 'editor', 'administrator');

// Note - you are also advised to set the following in your wp-config.php so that the auth
// cookies can be shared between MRBS and WordPress:

/*
// Define cookie paths so that login cookies can be shared with MRBS
$domain_name = 'example.com';  // Set to your domain name
define('COOKIEPATH', '/');
define('SITECOOKIEPATH', '/');
// In the definition below the '.' is necessary for older browsers (see
// http://php.net/manual/en/function.setcookie.php).
define('COOKIE_DOMAIN', ".$domain_name");  
define('COOKIEHASH', md5($domain_name));
*/


// Configurações Gerais

// Permite que os usuários insiram apenas a parte local do endereço de e-mail (desde que
// o tipo de autenticação suporta validação por parte local). Por exemplo, se o usuário
// com o nome de usuário 'john' tem o endereço de e-mail 'jsmith@example.com', ele poderá
// para inserir 'john', 'jsmith' ou 'jsmith@example.com' ao fazer login.
$auth['allow_local_part_email'] = false;

// Se você deseja que apenas administradores possam fazer e excluir reservas,
// define esta variável como true
$auth['only_admin_can_book'] = false;

// Se você deseja que apenas administradores possam fazer reservas repetidas,
// define esta variável como true
$auth['only_admin_can_book_repeat'] = false;

// Se você deseja que apenas administradores possam fazer reservas abrangendo
// mais de um dia, defina essa variável como true.
$auth['only_admin_can_book_multiday'] = false;

// Se você deseja que apenas administradores possam selecionar várias salas
// no formulário de reserva, defina-o como true. (Ele não para usuários comuns
// fazendo reservas separadas para o mesmo horário, mas isso diminui a velocidade).
$auth['only_admin_can_select_multiroom'] = false;

// Se você não deseja que usuários comuns possam ver as
// detalhes, então defina isso como true. (Somente relevante ao usar autenticação 'db')
$auth['only_admin_can_see_other_users'] = false;

// Se você deseja impedir que o público (ou seja, usuários não logados)
// podendo visualizar reservas, defina esta variável como true
$auth['deny_public_access'] = false;

// Defina como true se você deseja que os administradores possam executar exclusões em massa
// na página Relatório. (Ele também aparece apenas se o JavaScript estiver ativado)
$auth['show_bulk_delete'] = false;

// Permite que os administradores insiram HTML personalizado nas páginas da área e da sala. Isso pode ser útil para
// exibir informações sobre uma área ou sala, por exemplo, com uma imagem ou um mapa. Mas isso
// também apresenta um risco de segurança, pois o HTML é produzido como está e, portanto, pode conter
// scripts maliciosos. Defina $ auth ['allow_custom_html'] como true se você confiar em seus administradores.
$auth['allow_custom_html'] = false;

// Configure como true se desejar permitir que o reserva SESI seja executado na linha de comando, por exemplo
// se você deseja produzir relatórios a partir de um trabalho cron. (É definido como false por padrão
// como medida de segurança, porque ao executar a partir da CLI, você assume
// acesso completo do administrador).
$allow_cli = false;


/**********************************************
  * Configurações de email
  **********************************************/

// CONFIGURAÇÕES BÁSICAS
// --------------

// Defina o endereço de email do campo De. Padrão e 'admin_email@your.org'
$mail_settings['from'] = 'admin_email@your.org';

//O endereço a ser usado para o ORGANIZADOR em um evento do iCalendar. Não faça
// este endereço de email é o mesmo que o endereço de email do administrador ou os destinatários
// endereço de email porque em alguns sistemas de correio, por exemplo, IBM Domino, o email do iCalendar
// a notificação é descartada silenciosamente se o endereço de email do organizador for o mesmo
// como do destinatário. Em outros sistemas, você pode receber a mensagem "Reunião não encontrada".
$mail_settings['organizer'] = 'mrbs@your.org';

// Defina o email do destinatário. O padrão é 'admin_email@your.org'. Você pode definir
// mais de um destinatário como este "john@doe.com, scott@tiger.com"
$mail_settings['recipients'] = 'admin_email@your.org';

// Defina o endereço de email do campo Carbon Copy. O padrão é ''. Você pode definir
// mais de um destinatário (consulte 'destinatários')
$mail_settings['cc'] = '';

// Configure como true se desejar que os endereços cc sejam anexados à linha to.
// (Alguns servidores de email estão configurados para não enviar emails se o cc ou cco
// campos estão definidos)
$mail_settings['treat_cc_as_to'] = false;


// QUEM EMAIL
// ------------
// As configurações a seguir determinam quem deve ser enviado por e-mail quando a reserva é feita,
// editado ou excluído (embora os dois últimos eventos dependam das configurações "Quando" abaixo).
// Defina como true ou false conforme necessário
// (Nota: os endereços de e-mail dos administradores de área e sala são definidos no
// edit_area.php e edit_room.php páginas no MRBS)
$mail_settings['admin_on_bookings']      = false;  // os endereços definidos por $mail_settings['recipients']abaixo
$mail_settings['area_admin_on_bookings'] = false;  // O administrador da area
$mail_settings['room_admin_on_bookings'] = false;  // O administrador da sala
$mail_settings['booker']                 = false;  // A pessoa que faz a reserva
$mail_settings['book_admin_on_approval'] = false;  // O administrador da reserva quando a aprovação da reserva estiver ativada
                                                   // (que é o administrador do MRBS, mas essa configuração permite que o MRBS
                                                   // ser estendido para ter aprovadores de reserva separados)     

// QUANDO ENVIAR E-MAIL
// -------------
// Essas configurações determinam quando um email deve ser enviado.
// Defina como true ou false conforme necessário
//
// (Nota: (a) as variáveis  $mail_settings['admin_on_delete'] e
// $mail_settings['admin_all'], utilizados nas versões 1.4.5 e MRBS do MRBS
// antes agora estão obsoletos. Eles ainda são suportados por razões de atraso
// compatibilidade, mas eles podem ser retirados no futuro. (b) o padrão
// o valor de $mail_settings['on_new'] é verdadeiro para compatibilidade com o MRBS 1.4.5
// e antes, onde não havia configuração explícita, mas sempre eram enviados emails
// para novas reservas, se houver alguém para quem as enviar)

$mail_settings['on_new']    = true;   // quando uma entrada é criada
$mail_settings['on_change'] = false;  // quando uma entrada é criada
$mail_settings['on_delete'] = false;  // quando uma entrada é excluída

// Também é possível permitir que todos os usuários ou apenas administradores escolham não enviar um
// e-mail ao criar ou editar uma reserva. Isso pode ser útil se um resultado inconseqüente
// mudanças estão sendo feitas ou muitas reservas estão sendo feitas no início de um período ou temporada.s
$mail_settings['allow_no_mail']        = false;
$mail_settings['allow_admins_no_mail'] = false;  // Ignorado se 'allow_no_mail' for verdadeiro
$mail_settings['no_mail_default'] = false; // Valor padrão para a caixa de seleção 'sem email'.  
                                           // true para verificado (ou seja, não envie e-mail),
                                           // false para desmarcado (ou seja, enviar e-mail)


// O QUE TEM NO  EMAIL
// -------------
// Essas configurações determinam o que deve ser incluído no email
// Defina como true ou false conforme necessário
$mail_settings['details']   = false; // Defina como true se você quiser detalhes completos da reserva;
                                      // caso contrário, você apenas obterá um link para a entrada
$mail_settings['html']      = false; //Defina como true se desejar o correio HTML
$mail_settings['icalendar'] = false; // Defina como true para incluir detalhes do iCalendar
                                     // que pode ser importado para um calendário. (Nota:
                                     // Os detalhes do iCalendar não serão enviados para áreas
                                    // que usam períodos porque não há um mapeamento entre
                                      // períodos e hora do dia, para que o calendário não
                                      // poder importar a reserva)

// QUAL LINGUAGEM UTILIZAR NO EMAIL
// -----------------------------------------
// Defina o idioma usado para e-mails (escolha um arquivo lang. * Disponível).
$mail_settings['admin_lang'] = 'en';   // O padrão é 'en'.


// COMO SÃO OS ENDEREÇÕES DE EMAIL
// --------------------------------
// Os endereços de e-mail do administrador do MRBS são definidos no arquivo de configuração e os de
// os administradores da sala e da área são definidos pelos edit_area.php e edit_room.php
// páginas no Reserva SESI. Mas se você configurou $mail_settings['booker'] acima como true, o MRBS irá
// precisa dos endereços de email dos usuários comuns. Se você estiver usando o "db"
// método de autenticação, o MRBS poderá obtê-los da tabela de usuários. Mas
// se você estiver usando outro esquema de autenticação, as seguintes configurações permitirão
// você especifica um nome de domínio que será anexado ao nome de usuário para produzir um
// endereço de e-mail válido (por exemplo, "@domain.com"). O MRBS adicionará o caractere '@' para você.
$mail_settings['domain'] = '';
// Se você usa $mail_settings ['domain'] acima e o nome de usuário retornado por mrbs contém extra
// sequências anexadas como o nome do domínio ('nome_do_usuário.domínio'), você precisa fornecer
// esta string extra aqui para que seja removida do nome de usuário.
$mail_settings['username_suffix'] = '';

// QUAL SERVIDOR DE EMAIL - BACKEND
// ----------------------
// Defina o nome do back-end usado para transportar seus e-mails. Ou 'mail',
// 'smtp', 'sendmail' ou 'qmail'. O padrão é 'email'.
$mail_settings['admin_backend'] = 'mail';

/*******************
 * Sendmail settings
 */
 
// Set the path of the Sendmail program (only used with "sendmail" backend).
// Default is '/usr/bin/sendmail'
$sendmail_settings['path'] = '/usr/bin/sendmail';
// Set additional Sendmail parameters (only used with "sendmail" backend).
// (example "-t -i"). Default is ''
$sendmail_settings['args'] = '';

/*******************
 * Qmail settings
 */

/* Configures the path to 'qmail-inject', if unset defaults to '/var/qmail/bin/qmail-inject' */
$mail_settings['qmail']['qmail-inject-path'] = '/usr/bin/qmail-inject';

/*******************
  * Configurações de SMTP
  */

// Essas configurações são usadas apenas com o back-end "smtp"
$smtp_settings['host'] = 'localhost';  // SMTP server
$smtp_settings['port'] = 25;           // SMTP port number
$smtp_settings['auth'] = false;        // Se deve usar autenticação SMTP
$smtp_settings['secure'] = '';         //Método de criptografia: '','tls' ou 'ssl' - observe que 'tls' significa TLS, mesmo que o SMTP
                                        // servidor não anuncia. Por outro lado, se você especificar "" e o servidor anunciar TLS, TLS
                                        // será usado, a menos que o parâmetro de configuração 'disable_opportunistic_tls' mostrado abaixo seja
                                        // definido como true.
$smtp_settings['username'] = '';       // Nome de usuário (se estiver usando autenticação)
$smtp_settings['password'] = '';       //Senha (se estiver usando autenticação)
$smtp_settings['disable_opportunistic_tls'] = false; // Configure como true para desativar
                                                      // TLS oportunista
                                                     // https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#opportunistic-tls
// Se estiver tendo problemas com o envio de email para um servidor SMTP habilitado para TLS * em que você confia *, você pode alterar o seguinte
// configurações, que reduzem a segurança do TLS.
// Veja https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#php-56-certificate-verification-failure
$smtp_settings['ssl_verify_peer'] = true;
$smtp_settings['ssl_verify_peer_name'] = true;
$smtp_settings['ssl_allow_self_signed'] = false;

// EMAIL - DIVERSOS
// ---------------------

// O nome do arquivo a ser usado para os anexos do iCalendar. Sempre terá o
// extensão '.ics'
$mail_settings['ics_filename'] = "booking";

// Configure como true se desejar que o MRBS produza informações de depuração ao enviar email.
// Se você não estiver recebendo e-mails, pode ser útil informar (a) se o e-mail funciona
// estão sendo chamados em primeiro lugar (b) se existem endereços para os quais enviar email e (c)
// o resultado da operação de envio de email.
$mail_settings['debug'] = false;
// Para onde enviar a saída de depuração. Pode ser 'browser' ou 'log' (para o error_log)
$mail_settings['debug_output'] = 'log';

// Defina como true se você não deseja que nenhum email seja enviado, independentemente das demais configurações.
// Essa é uma configuração global que substituirá qualquer outra coisa. Útil ao testar o MRBS.
$mail_settings['disabled'] = false;
 
 
/*********
  * IDIOMA
  **********/

// Defina como 1 para desativar o idioma automático que o MRBS executa
// com base nas configurações de idioma do navegador do usuário. Isso garantirá que
// o idioma exibido é sempre o valor de $ default_language_tokens,
// conforme especificado abaixo
$disable_automatic_language_changing = 0;

// Defina isso para um especificador de idioma diferente como padrão para diferente
// tokens de idioma. Isso deve ser igual a um arquivo lang. * No MRBS.
// por exemplo. use "fr" para usar as traduções em "lang.fr" como o padrão
// traduções. [NOTA: só é necessário alterar isso se você
// desativou a alteração automática de idioma acima]
$default_language_tokens = "en";

// Defina isso como um código de idioma válido (para o sistema operacional em que você executa o servidor MRBS)
// se você deseja substituir a determinação automática de localidade MRBS
// executa. Lembre-se de incluir o conjunto de códigos, se apropriado. Por exemplo,
// em um sistema UNIX, você usaria "en_GB.utf-8" para inglês / GB.
$override_locale = "";

// seleção do idioma do arquivo faq. Se não estiver definido, use o arquivo em inglês padrão.
// SE o arquivo faq do seu idioma estiver disponível, configure $ faqfilelang para corresponder ao
// final do nome do arquivo, incluindo o sublinhado (por exemplo, para site_faq_fr.html
// use "_fr"
$faqfilelang = ""; 

// Seleção de idioma quando executado na linha de comando
$cli_language = "en";

// Substituições de vocabulário
// ---------------

// Você pode substituir as seqüências de texto que aparecem nos arquivos lang.*Configurando
// $vocab_override [LANG] [TOKEN] no seu arquivo de configuração, em que LANG é o idioma,
// por exemplo 'en' e TOKEN é a chave da matriz $vocab. Por exemplo para
// altera a string "Sistema de reservas de salas de reuniões" em inglês
//
// $vocab_override ['en']['mrbs'] = "Meu sistema de reservas de recursos";
//
// Aplicando substituições de vocabulário no arquivo de configuração, em vez de editar os arquivos lang
// significa que suas alterações serão preservadas quando você atualizar para a próxima versão do
// MRBS e você não terá que reeditar o arquivo lang.

/*************
 * Reports
 *************/
 
// Default file names
$report_filename  = "report";
$summary_filename = "summary";

// Formato CSV
// Por padrão, o Excel espera uma guia como separador de colunas, portanto, se você estiver abrindo
// Arquivos CSV com Excel, você pode alterar $ csv_col_sep para "\ t" (observe que
// as aspas duplas são importantes para garantir que isso seja interpretado como um caractere de tabulação).
$csv_row_sep = "\n";  // Separator between rows/records
$csv_col_sep = ",";   // Separator between columns/fields

// CSV charset
// Set the character set to be used for CSV files.   If $csv_charset is not set
// then CSV files are written using the MRBS default charset (utf-8).
// Earlier versions of Microsoft Excel (at least up to Excel 2010 on Windows and 2011
// on Mac) are not guaranteed to recognise utf-8, but do recognise utf-16, so for those
// versions try setting $csv_charset to 'utf-16' and $csv_bom to true.
$csv_charset = 'utf-8';
$csv_bom = false;


/*************
 * iCalendar
 *************/

// The default delimiter for separating the area and room in the LOCATION property
// of an iCalendar event.   Note that no escaping of the delimiter is provided so
// it must not occur in room or area names.
$default_area_room_delimiter = '/';
 

/*************
 * Entry Types
 *************/

// Essa matriz lista os códigos de tipo de entrada configurados. Os valores são mapeados para um
// char único no banco de dados MRBS e, portanto, pode ser qualquer matriz PHP permitida
// personagem.
//
// As descrições padrão dos tipos de entrada são mantidas nos arquivos de idioma
// como "type.X", em que 'X' é o tipo de entrada. Se você deseja alterar a descrição
// você pode substituir as descrições padrão definindo a configuração $ vocab_override
// variável. Por exemplo, se você adicionar um novo tipo de reserva 'C', o mínimo necessário
// fazer é adicionar uma linha ao config.inc.php como:
// 
// $vocab_override["en"]["type.C"] =     "Novo tipo de reserva";
//
// Abaixo está uma matriz padrão básica que garante que haja pelo menos alguns tipos definidos.
// As definições de tipo adequadas devem ser feitas em config.inc.php.
//
//Cada tipo possui uma cor definida na matriz $ color_types no estilo.inc
// arquivo no diretório Temas

unset($booking_types);    // Include this line when copying to config.inc.php
$booking_types[] = "E";
$booking_types[] = "I";

// Se você não quiser usar tipos, remova o comentário da seguinte linha. (A reserva será
// ainda tem um tipo associado a ele no banco de dados, que será o tipo padrão.)
// unset($booking_types);

// Tipo padrão para novas reservas
// (Observe que o tipo padrão não se aplica se o campo type for obrigatório)
$default_type = "I";

//Descrição padrão para novas reservas
$default_description = "";

// Necessário apenas se a instalação do MRBS for executada a partir de um repositório Mercurial
// e você deseja que a página "Ajuda" mostre o ID do conjunto de alterações do Mercurial que você
// estão no. O padrão deve funcionar se "hg" estiver no seu caminho de pesquisa, no Windows
// pode ser necessário especificar o caminho completo para o executável "hg", por exemplo:
// "c: / Arquivos de Programas / TortoiseHg / hg.exe"
$hg_command = "hg";

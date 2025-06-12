<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

/**************************************************** ************************
  * Arquivo de configuração MRBS
  * Configure este arquivo para o seu site.
  * Você não precisa modificar nada fora deste arquivo.
  *
  * Este arquivo já foi preenchido com o conjunto mínimo de configurações
  * variáveis que você precisará alterar para colocar seu sistema em funcionamento.
  * Se você deseja alterar qualquer uma das outras configurações em systemdefaults.inc.php
  * ou areadefaults.inc.php, copie as linhas relevantes para este arquivo
  * e edite-os aqui. Este arquivo substituirá as configurações padrão e
  * quando você atualiza para uma nova versão do MRBS, o arquivo de configuração é preservado.
  *
  * NOTA: se você incluir ou precisar de outros arquivos desse arquivo, por exemplo
  * para armazenar os detalhes do banco de dados em um local separado, você deve
  * use um nome de caminho absoluto e não relativo.
  **************************************************** ************************ /

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
$timezone = "America/Sao_Paulo";


/*******************
 * Database settings
 ******************/
// Qual sistema de banco de dados: "pgsql"=PostgreSQL, "mysql"=MySQL
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
$db_database = "lsmsys66_mrbs";
// Nome do esquema. Isso se aplica apenas ao PostgreSQL e só é necessário se você tiver mais
// de um esquema em seu banco de dados e você também está usando os mesmos nomes de tabela MRBS em
// vários esquemas.
//$db_schema = "public";
// Database login user name:
$db_login = "lsmsys66_lsmsys6"; //lsmsys66_lsmsys6 para dominio

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

/* Adicione linhas de systemdefaults.inc.php e areadefaults.inc.php abaixo aqui
    para alterar a configuração padrão. _NÃO_ modifique  systemdefaults.inc.php
    ou areadefaults.inc.php. */

/******************************
* Inserção de Usuarios CONTROLE
*******************************/
$auth["admin"][] = "lab.informatica";
$auth["admin"][] = "brunosouza";
$auth["session"] = "php";
$auth["type"] = "config";
$auth["user"]["lab.informatica"] = "LA89864iaia";
$auth["user"]["brunosouza"] = "s3s1sup0rt3";
$auth["user"]["flavias.sesi"] = "123456";
$auth["user"]["luanybarbosa.sesi"] = "123456";
$auth["user"]["grislaine.sesi"] = "123456";
$auth["user"]["andreyakenya.sesi"] = "123456";
$auth["user"]["christianeribeiro"] = "123456";
$auth["user"]["alexandralucia.sesi"] = "123456";
$auth["user"]["airton.sesi"] = "123456";
$auth["user"]["marciana.sesi"] = "123456";
$auth["user"]["danilocunha.sesi"] = "123456";
$auth["user"]["cinthiaoliveira.sesi"] = "123456";

/****************************************
 * Informações de Identificação do Site
 ***************************************/
$mrbs_admin = "Administrador"; // nome do admistrador do sistema
$mrbs_admin_email = "lsm.system.suporte@gmail.com"; // define o endereço  a ser redirencionado ao clicar em ajuda contato administrador

$mrbs_company = "SESI Jundíai"; // Define nome TITULO da instituição

// caso queira usar uma logo em vez de Titulo descomentar essa linha e adicionar endereço pasta
$mrbs_company_logo = "marcasesi.png"; 

// Remova o comentário desta próxima linha para obter informações adicionais após o nome ou logotipo da sua empresa
$mrbs_company_more_info = "<small><small><i> By: Lsm.System </i></small></small>"; // por exemplo. "Departamento XYZ"

//Remova o comentário desta próxima linha para ter um link para sua organização no cabeçalho / logo
$mrbs_company_url = "https://sesi-jundiai.webnode.com/";
 
/******************
 * Configurações do display / Temas
 ******************/

$default_view = "week"; //Definir visualização inicial padrão (month, week or day)

// CONFIGURAÇÕES GERAIS
// ----------------

// Este é o número máximo de linhas (períodos ou períodos) que se pode
// espera ver nas visualizações de dia e semana. É usado pelo mrbs.css.php para
// criando classes. Não importa se é muito grande, exceto pelo
// fato de que mais CSS do que o necessário será gerado. (A variável é ignorada
// se $times_along_top estiver definido como true).

$max_slots = 240;


/**********************************************
  * Configurações de email
  **********************************************/
// CONFIGURAÇÕES BÁSICAS:

// Defina o endereço de email do campo De. Padrão e 'admin_email@your.org'
$mail_settings['from'] = 'lsm.system.suporte@gmail.com';

// Defina o email do destinatário. O padrão é 'admin_email@your.org'. Você pode definir
// mais de um destinatário como este "john@doe.com, scott@tiger.com"
$mail_settings['recipients'] = 'flavias.sesi@sistemafieg.org.br, grislaine.sesi@sistemafieg.org.br, 
christianeribeiro@sistemafieg.org.br, luanybarbosa.sesi@sistemafieg.org.br, alexandralucia.sesi@sistemafieg.org.br, andreakenya.sesi@sistemafieg.org.br';

/*lab.informatica.suporte@gmail.com,
lab.informatica@sistemafieg.org.br, 
flavias.sesi@sistemafieg.org.br,
grislaine.sesi@sistemafieg.org.br,
cristianesousa.sesi@sistemafieg.org.br,
luanybarbosa.sesi@sistemafieg.org.br,
alexandralucia.sesi@sistemafieg.org.br,
andreakenya.sesi@sistemafieg.org.br;

*/

// QUEM DEVE RECEBER E-MAIL 
// --------------------------
// As configurações a seguir determinam quem deve ser enviado por e-mail quando a reserva é feita,
// editado ou excluído (embora os dois últimos eventos dependam das configurações "Quando" abaixo).
// Defina como true ou false conforme necessário
// (Nota: os endereços de e-mail dos administradores de área e sala são definidos no
// edit_area.php e edit_room.php páginas no MRBS)
$mail_settings['admin_on_bookings']      = false;  // os endereços definidos por $mail_settings['recipients']abaixo
$mail_settings['area_admin_on_bookings'] = true;  // O administrador da area
$mail_settings['room_admin_on_bookings'] = false;  // O administrador da sala
$mail_settings['booker']                 = false;  // A pessoa que faz a reserva
$mail_settings['book_admin_on_approval'] = true;  /* O administrador da reserva quando a aprovação da reserva estiver ativada
													(que é o administrador do ReservaSESI, mas essa configuração permite que o MRBS  ser 
													estendido para ter aprovadores de reserva separados) */
// QUANDO ENVIAR E-MAIL
// -------------
// Essas configurações determinam quando um email deve ser enviado.
// Defina como true ou false conforme necessário
//
// (Nota: (a) as variáveis  $mail_settings['admin_on_delete'] e
// $mail_settings['admin_all'], utilizados nas versões 1.4.5 e 
// antes agora estão obsoletos. Eles ainda são suportados por razões de atraso
// compatibilidade, mas eles podem ser retirados no futuro. (b) o padrão
// o valor de $mail_settings['on_new'] é verdadeiro para compatibilidade com o MRBS 1.4.5
// e antes, onde não havia configuração explícita, mas sempre eram enviados emails
// para novas reservas, se houver alguém para quem as enviar)

$mail_settings['on_new']    = true;   // quando uma Reserva é criada!
$mail_settings['on_change'] = true;  // quando uma Reserva é editada!
$mail_settings['on_delete'] = true;  // quando uma Reserva é excluída!		

// Também é possível permitir que todos os usuários ou apenas administradores escolham não enviar um
// e-mail ao criar ou editar uma reserva. Isso pode ser útil sem um resultado inconseqüente
// mudanças estão sendo feitas ou muitas reservas estão sendo feitas no início de um período ou temporada.
$mail_settings['allow_no_mail']        = true;
$mail_settings['allow_admins_no_mail'] = false;  // Ignorado se 'allow_no_mail' for verdadeiro
$mail_settings['no_mail_default'] = false; // Valor padrão para a caixa de seleção 'sem email'.  
                                           // true para verificado (ou seja, não envie e-mail),
                                           // false para desmarcado (ou seja, enviar e-mail)	
// CONTEUDO DE E-MAIL
// -------------
// Essas configurações determinam o que deve ser incluído no email
// Defina como true ou false conforme necessário
$mail_settings['details']   = true; // Defina como true se você quiser detalhes completos da reserva;
                                     // caso contrário, você apenas obterá um link para a entrada
$mail_settings['html']      = true; //Defina como true se desejar o correio HTML
$mail_settings['icalendar'] = false; // Defina como true para incluir detalhes do iCalendar
                                     // que pode ser importado para um calendário. (Nota:
                                     // Os detalhes do iCalendar não serão enviados para áreas
                                     // que usam períodos porque não há um mapeamento entre
                                     // períodos e hora do dia, para que o calendário não
                                     // poder importar a reserva)	
// QUAL LINGUAGEM UTILIZAR NO EMAIL
// -----------------------------------------
// Defina o idioma usado para e-mails (escolha um arquivo lang. * Disponível).
$mail_settings['admin_lang'] = 'pt-br';   // O padrão é 'en'.

// QUAL SERVIDOR DE EMAIL - BACKEND
// ----------------------
// Defina o nome do back-end usado para transportar seus e-mails. Ou 'mail',
// 'smtp', 'sendmail' ou 'qmail'. O padrão é 'email'.S
$mail_settings['admin_backend'] = 'smtp';

/*******************
  * Configurações de SMTP
  */

// Essas configurações são usadas apenas com o back-end "smtp"
$smtp_settings['host'] = 'smtp.gmail.com';                        // SMTP server
$smtp_settings['port'] =  587;                                    // SMTP port number
$smtp_settings['auth'] = true;                                    // Se deve usar autenticação SMTP
$smtp_settings['secure'] = 'tls';                                 // Método de criptografia: '','tls' ou 'ssl' - observe que 'tls' significa TLS, mesmo que o SMTP
                                                                  // servidor não anuncia. Por outro lado, se você especificar "" e o servidor anunciar TLS, TLS
                                                                  // será usado, a menos que o parâmetro de configuração 'disable_opportunistic_tls' mostrado abaixo seja
                                                                  // definido como true.
$smtp_settings['username'] = 'lsm.system.suporte@gmail.com'; // Nome de usuário (se estiver usando autenticação)
$smtp_settings['password'] = 'LAs3s1sup0rt3';                        // Senha (se estiver usando autenticação)
$smtp_settings['disable_opportunistic_tls'] = false;              // Configure como true para desativar
                                                                  // TLS oportunista
// https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#opportunistic-tls
// Se estiver tendo problemas com o envio de email para um servidor SMTP habilitado para TLS * em que você confia *, você pode alterar o seguinte
// configurações, que reduzem a segurança do TLS.
// Veja https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#php-56-certificate-verification-failure

$smtp_settings['ssl_verify_peer'] = true;
$smtp_settings['ssl_verify_peer_name'] = true;
$smtp_settings['ssl_allow_self_signed'] = false;	

/*********
  * IDIOMA
  **********/
  
  
//Define o idioma do arquivo faq.html
//Que e usado para 
$faqfilelang = "_pt-br"; 		

/*********************************
* CONFIGURAÇÕES DIVERSAS -GERAIS 
********************************** */

/// Máximo de entradas repetidas (máximo necessário +1):
$max_rep_entrys = 365 + 1;

// Intervalo padrão do relatório em dias:
$default_report_days = 60;

// Intervalo antes que os lembretes possam ser emitidos (em segundos). Somente
// os dias úteis (veja abaixo) estão incluídos no cálculo
$reminder_interval = 60 * 60 * 24 * 1; // 1 dias úteis

				   
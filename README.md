Sistema de reservas para salas de reuniões

-------------------------------

O sistema de reservas de salas do Reserva SESI é um aplicativo baseado em PHP para
reserva de salas de reunião (surpreendentemente!). Fiquei irritado com as pilhas de livros
que estavam sendo usados ​​para agendar reuniões. Eles eram lentos, difíceis de editar e apenas
na recepção. Eu pensei que um bom sistema baseado na Web seria muito
Agradável.

Algumas partes disso são baseadas no WebCalender 0.9.4 de Craig Knudsen
(http://www.radix.net/~cknudsen/webcalendar/), e no Meeting Room Booking System, MRBS.

 mas agora há muito pouco o que é semelhante. Existem diferenças fundamentais nos objetivos do projeto entre
WebCalendar e i Reserva SESI.

------
Usar
------
Consulte o arquivo INSTALL para obter instruções de instalação.

Depois de instalado, tente acessar http: // yourhost /reservaSESI/

A primeira coisa que você precisa fazer é fazer login como administrador e criar
áreas e quartos.

O esquema de autenticação padrão usa uma tabela de banco de dados no MRBS
base de dados. Para criar o primeiro usuário, clique no link "Lista de usuários" no
canto superior direito da página. Se não houver usuários definidos no seu banco de dados
ainda, você poderá criar o primeiro administrador.

Depois de fazer login como administrador, clique em "Salas" e
crie primeiro uma "Área" e, em seguida, uma "Sala" dentro dessa área.

Existem outras maneiras de configurar a autenticação no reserva SESI, consulte o
arquivo AUTHENTICATION para uma descrição mais completa.

Deve ser bem fácil ajustá-lo às cores da sua empresa - você pode
modifique os temas em "Temas" ou (de preferência) copie um tema existente
para um novo diretório e modifique o novo tema.

Consulte COPYING para obter informações sobre licenciamento.

Veja NOTÍCIAS para obter um histórico de alterações.
(https://github.com/lukasSilva520/)

Consulte AUTENTICAÇÃO para obter informações sobre autenticação de usuário / senhas.

-------------
Requisitos:
-------------
- PHP 5.4.0 ou superior com suporte ao MySQL e / ou PostgreSQL
- MySQL (5.5.3 e superior) ou PostgreSQL 8.2 ou superior.
- Qualquer servidor da web suportado pelo PHP

Recomendado:
- Navegador habilitado para JavaScript
- Navegador habilitado para CSS
- Conexão do módulo PHP ao servidor (também chamado SAPI) se você quiser usar qualquer
  dos esquemas básicos de autenticação http fornecidos.



------
Uso:
------
O atual mantenedor do projeto relata usá-lo no trabalho com cerca de 150 clientes.
Muitos outros relatórios de uso bem-sucedido foram vistos na lista de discussão reserva SESI.

#Gerenciador de Tarefas Simples

Aplicação Simples para gerenciar tarefas, onde cada usuário poderá se cadastrar e criar suas próprias tarefas, podendo visualizá-las, editá-las, excluí-las, concluí-las, e reabrí-las.

Não está sendo utilizado nenhum Banco de Dados, os dados estão sendo persistidos em arquivos .json dentro do diretório {database}

Ao criar uma nova conta é criado um arquivo dentro de {database/users} utilizando o email do usuário como nome para o arquivo.

Ao criar sua primeira tarefa, é criado então um arquivo dentro de {database/tasks} utilizando também o email do usuário como nome para o arquivo.

**************************
Instalação
**************************
-  `Ter no minimo o PHP 5.4;`

-  `Após obter a aplicação abra o arquivo {application/config/config.php} e altere a linha 26 de acordo com o endereço web da aplicação onde você instalar;`

-  `Dê permissão de escrita para o diretório {database} pois é nele que ficarão os dados dos usuários e as tarefas de cada um.`


**************************
Aplicação Funcionando
**************************
http://feitozatech.com.br/taskpower

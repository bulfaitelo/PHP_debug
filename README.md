# PHP_debug

A classe PHP_debug tem a função de debugar variáveis ou classes, assim informando o tamanho em memória, tempo de execução, linha que está executando o debug e seu respectivo arquivo. 

### Mais Informações e configurações no Blog:
[Debugar variáveis e classes com o PHP_debug](http://www.bulfaitelo.com.br/2016/11/debugar-variaveis-e-classes-com-o.html) Clique para mais informações!

## Utilização:

instancie a classe PHP_debug(); 

```php
// Caso queria desabilitar ela em todo o código basta indtanciar ela com o parametro false;
$var = new PHP_debug();
```

## Parâmetros:

A classe PHP_debug só tem o objeto debug como publico então vamos os parametros:

```php
$var = new PHP_debug();

// $variavel: é a variável a qual vai ser testada
// $var_name: é o nome da variável, não é uma informação obrigatória
// $break: quando definida true ele faz com que o código de o break apos executa o debug por padrão ela está com false

public function debug($variavel = null, $var_name = null, $break = null);

```

## Exemplo de utilização: 

```php
$var = new PHP_debug();

// simple string
$var_test = 'variavevel_teste';
$var->debug($var_test, 'nome');

// int
$var->debug(12345, "name of var");

// array
$array = array('jujuba' => 'doce' , 'cafe'=> 'quente', 'carro' => 'sou pobre', 'sem chave' );
$var->debug($array);

// Class
$var -> debug($var);

```







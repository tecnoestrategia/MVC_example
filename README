# Example of MVC in php, with Bootstrap, PDO, jquery and CRUD by [TecnoEstrategia]

[![](https://img.shields.io/badge/php-%3E%3D%205.3-8892BF.svg?style=plastic)](https://php.net/) ![](https://img.shields.io/badge/SonarQube-security%20--%20A-brightgreen.svg?style=plastic) ![](https://img.shields.io/badge/SonarQube-Maintainability%20--%20A-brightgreen.svg?style=plastic) ![](https://img.shields.io/badge/SonarQube-Reliability%20--%20A-brightgreen.svg?style=plastic)
![](https://img.shields.io/badge/SonarQube-TechDebt%20--%20A-brightgreen.svg?style=plastic) ![](https://img.shields.io/badge/SonarQube-Duplications%20--%200%-brightgreen.svg?style=plastic) [![AUR](https://img.shields.io/aur/license/yaourt.svg?style=plastic)]()
---------------------------------------------

# Introduction

This is a example of MVC (Model View Controller architecture pattern) in [php] whit PDO ([MySql]) [bootstrap] and [jquery].

Also, this example is oriented with interfaces, namespaces, etc to explain a concept of CRUD aplications in modern php.

In the best way, that be used the most [PSR] fix, well as fas as possible (this not a example of standard).

[PSR]: <http://www.php-fig.org/>
[PHP]: <http://www.php.net/>
[mysql]: <https://www.mysql.com/>
[bootstrap]:<http://twitter.github.com/bootstrap/>
[jquery]:<http://jquery.com>
[tecnoEstrategia]: <http://www.tecnoestrategia.com>
# Installation

You can found the schema of DB in  [`files/sql/mvctest.sql`]
In `config/config.inc.php` you can set some constants like:

```
 database
 host_db
 charset_db
 database_user
 database_pass
```
Also you can set:
```
Language
Time zone
Name of cookie
```
The file with constants for english language = `lang/en.php` you can use the schema (constants) to set another language, for example to set spanish language:
- Create new file `lang/es.php`
- Copy inside the content of `lang/en.php`
- Modify the constants like this ``` define("TITLE", "your translation"); ```

Also, in the config file you find the autoload


@TODO = Implements a spl_autoload

That's all

-------------------------------
# Usage

### First, the front controller
We set the front controller in the `index.php` file

Well, the var **c**  = controller in the url, sets the controller like this:

`yoursite/index.php?c=YOU_CONTROLLER`
`yoursite/index.php?c=ANOTHER_CONTROLLER`
`yoursite/index.php?c=AND_ANOTHER_CONTROLLER`

All controllers in:
```
 entity/controller
 ```
###### Example of controllers and respective urls

| Controller file | URL to invoke |
| --- | --- |
| entity/controller/index.php | yoursite/index.php?c=index |
| entity/controller/author.php| yoursite/index.php?c=author |
| entity/controller/book.php| yoursite/index.php?c=book|

### Second, actions for controller

The next var  **a**  = action, set the methods for the controller, for example `yoursite/index.php?c=YOU_CONTROLLER&a=YOUR_ACTION`

Set `YOUR_ACTION` in the `entity/controller/file`

for example,if you want see the front controller for book type this url `yoursite/index.php?c=book` and if you want set some actions you can use `yoursite/index.php?c=booka=CreateBook` or `yoursite/index.php?c=booka=DeleteBook`  etc.

###### Example of controllers and action and respective urls

| Controller file | URL to invoke |
| --- | --- |
| entity/controller/index.php | yoursite/index.php?c=index&a=deletepage |
| entity/controller/author.php| yoursite/index.php?c=author&a=listallauthor |
| entity/controller/book.php| yoursite/index.php?c=book&a=createbook|

Ok, this actions are methods of `NAME_OF_CONTROLLER` Controller class.

#### Example for controller file
```php
 require_once 'entity/model/book.php'

 class BookController {
	private $model;

	public function __CONSTRUCT(){
        $this->model = new Book();
    }

  public function OneBook()  {
		/* Code for call actions, actions sets in the model files */
		/* you can inovke your views */
		/* Example */
		$ShowData = $this->model->ShowAllBooks();
		require_once 'dir/views/myview.php';

  }

  public function DeleteBook()  {
		/* Code for call actions, actions sets in the model files */
  }

  public function AnotherAction(){
  		/* Code for call actions, actions sets in the model files */

  }
 ```

### Third, the models
In the model file you can set the actions for the controller, all the models in:
```
 entity/model
 ```
#### Example for model file
```php

 class index {
	public function ShowAllBooks(){
  		$query = "select * from books";
  		$stmt = $this->pdo->prepare($query);
        $stmt->execute(array($data));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function DeleteBook($id){
        $sql = "DELETE FROM books WHERE books.id_book = $id";
        $this->pdo->prepare($sql)->execute();
    }
 ```

### At last, the views

You can find the views  in entity/views directory.

#### Example for view file
```html
 <div class="showtitle">
    <h2>Title: <?php echo $ShowData->title ?></h2>
</div>
 ```

-------------------------------

## License
[GPL]

[gpl]:<README>

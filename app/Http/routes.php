<?php

Route::get('login', 'login\loginController@viewDeLogin');

Route::get('create-login', 'login\loginController@viewDeCadastro');

Route::post('create-login', 'login\loginController@logicaDoCadastroDeUsuario');

Route::get('home', 'login\loginController@mostraApaginaHome');

Route::get('authentica', 'login\loginController@Authenticando');


Route::group(['middleware' => ['auth']], function () {

    Route::get('listar-usuários', 'login\loginController@logicaviewCadastroUser');

    Route::get('sair', 'login\loginController@SairDaSessao');

    Route::get('cadastrar-cobricao-fiv', 'cobricaoFiv\cobricaoFivController@mostrarViewDeCadastroCobricaoFiv');

    Route::post('cadastrar-cobricao-fiv', 'cobricaoFiv\cobricaoFivController@logicaDoCadastroDeCfIv');

    Route::get('view-dados-cobricao-fiv', 'cobricaoFiv\cobricaoFivController@mostrarFuncaoDadosController');

});

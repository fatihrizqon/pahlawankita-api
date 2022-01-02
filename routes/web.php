<?php
$router->get('/', 'AppController@index');

$router->group(['prefix' => 'api'], function() use ($router){
    $router->post('/hero/create', 'HeroController@store');
    $router->get('/heroes', 'HeroController@get_heroes');
    $router->get('/hero/{id}', 'HeroController@get_hero');
    $router->put('/hero/update/{id}', 'HeroController@update');
    $router->delete('/hero/delete/{id}', 'HeroController@delete');

    $router->get('/quiz', 'QuizController@index');
    $router->get('/quiz/results', 'QuizController@results');
    $router->get('/quiz/top10', 'QuizController@top10');
    $router->post('/quiz/saveresult', 'QuizController@saveresult');
});

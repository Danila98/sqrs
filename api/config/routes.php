<?php


use App\Http\Action\HomeAction;

return static function (\Slim\App $app): void {
    $app->get('/', HomeAction::class);
};

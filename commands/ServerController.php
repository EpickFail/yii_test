<?php

namespace app\commands;

use app\daemons\CommandsServer;
use yii\console\Controller;

class ServerController extends Controller
{
    public function actionStart($port = null)
    {
        $server = new CommandsServer();
        if ($port) {
            $server->port = $port;
        }
        $server->start();
    }
}
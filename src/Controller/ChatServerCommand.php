<?php


namespace App\Controller;


use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Security;

class ChatServerCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('tiflo:app:chat-server')
            ->setDescription('Start chat server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $chatServer = IoServer::factory(new HttpServer(new WsServer(new Chat())), 8080);
        $chatServer->run();
    }
}
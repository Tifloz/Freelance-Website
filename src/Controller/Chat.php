<?php

namespace App\Controller;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use const PHP_EOL;

/**
 * Class Chat
 * @package App\Server
 */
class Chat implements MessageComponentInterface
{
    protected $connections = [];

    /**
     * @param ConnectionInterface $conn
     */
    function onOpen(ConnectionInterface $conn): void
    {
        $this->connections[] = $conn;
        $conn->send('Welcome to chat !'.PHP_EOL);

    }


    /**
     * @param ConnectionInterface $conn
     */
    function onClose(ConnectionInterface $conn): void
    {
        foreach ($this->connections as $key => $connection) {
            if ($connection === $conn) {
                unset($this->connections[$key]);
                break;
            }
        }
        $conn->send('Bye, see u soon.'.PHP_EOL);
        $conn->close();
    }

    /**
     * @param ConnectionInterface $conn
     * @param \Exception          $e
     */
    function onError(ConnectionInterface $conn, \Exception $e): void
    {
        $conn->send('Error '.$e->getMessage().PHP_EOL);
        $conn->close();
    }

    /**
     * @param ConnectionInterface $from
     * @param string              $msg
     */
    function onMessage(ConnectionInterface $from, $msg): void
    {
        $messageData = json_decode(trim($msg));
        /**
         * @var ConnectionInterface $connection
         */
        foreach ($this->connections as $connection) {
            $connection->send($messageData);
        }
    }
}
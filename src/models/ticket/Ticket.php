<?php

namespace App\ZoorificsAnimals\models\ticket;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\ticket\TicketEntity;


    class Ticket extends Refactory
    {
        
        /**
         * @author aurel
         * @param class $ticket
         * @param string $rate
         * @return $job
        */
        public function createTicket(TicketEntity $ticket, $rate): void
        {
            $number = "";
            $price = "";
            if($this->pdo->lastInsertId()){
                $number = 0;
            }
            else{
                $number = $this->pdo->lastInsertId();
            }
            if ($rate == 'child'){
                $price = 5;
            }
            else{
                $price = 10;
            }
            $this->prepareAndExecute('INSERT INTO tickets (number, bought_at, price VALUES(:number, :bought_at, :price)', [
                ':number' => str_pad(($number + 1), 10, '0', STR_PAD_LEFT),
                ':bought_at' => date("d/m/Y"),
                ':price' => $price
            ]);
            $ticket->setId($this->pdo->lastInsertId());
        }

        /**
         * @author aurel
         * @return $tickets[]
        */
        public function getTickets(): array
        {
            $pdo = $this->prepareAndExecute('SELECT * FROM tickets ORDER BY name ASC');
            $tickets = [];
            foreach ($pdo->fetchAll() as $row) {
                $ticket = new TicketEntity();
                $ticket->getNumber($row['number']);
                $ticket->getBoughtAt($row['boughtAt']);
                $ticket->getPrice($row['price']);
                $tickets[] = $ticket;
            }

            return $tickets;
        }

        /**
         * @author aurel
         * @param int $id
         * @return $ticket
        */
        public function getTicket(int $id): ?TicketEntity
        {
            $this->prepareAndExecute('SELECT * FROM tickets WHERE id = ?', [
                $id
            ]);
            $ticket = new TicketEntity();
            $ticket->getNumber($_POST['number']);
            $ticket->getBoughtAt($_POST['boughtAt']);
            $ticket->getPrice($_POST['price']);
            return $ticket;
        }

     }

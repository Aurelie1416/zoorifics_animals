<?php

namespace App\ZoorificsAnimals\controllers;

use app\zoorificsAnimals\controllers\AbstractController;
use App\ZoorificsAnimals\models\Ticket\Ticket;
use App\ZoorificsAnimals\models\ticket\TicketEntity;
use Fpdf\Fpdf;

class TicketController extends AbstractController
{

    public function __construct()
    {
        // if($_SESSION['user'] && (in_array('ADMIN', $_SESSION['user']['role']) || in_array('RECEPTION_STAFF', $_SESSION['user']['role'])) ){
        //     $this->redirect('index.php?ctrl=home&action=connexion');   
        // }
    }

    /**
     * cette fonction sert à afficher les ventes de tickets
     * @author aurel
    */
    public function index(): void
    {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?ctrl=ticket&action=index');
        }

        $tickets = new Ticket();
        $tickets->getTickets();
        $this->Print();
        $this->createTicket();
        $title = 'Liste des ventes';
        include(__DIR__ . '/../../views/tickets/tickets.php');
        $content = ob_get_clean();
        require __DIR__.'/../../views/template.php';    }

    /**
     * cette fonction sert à générer un fichier PDF
     * @author aurel
    */
    public function print()
    {

        $ticketRefactory = new Ticket();
        $ticket = $ticketRefactory->getTicket($_GET['id']);

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(30, 30, 'Numéro de la facture : '.$ticket->getNumber());
        $pdf->Cell(30, 30, 'fait le : '.$ticket->getBoughtAt());
        $rate = "";
        if($ticket->getPrice() > 5){
            $rate = "Tarif (adulte) : ";
        }
        else{
            $rate = "Tarif (enfant) : ";
        }
        $pdf->Cell(15, 30, $rate.$ticket->getPrice().'€');
        $pdf->Output();
    }

    /**
     * cette fonction sert à créer un ticket
     * @author aurel
    */
    public function createTicket(): void
    {
        $errors = [];
        $safe = array_map('trim', array_map('strip_tags', $_POST['rate']));
        if (
            isset($safe['rate']) && !empty($safe['rate'])
        ){
            if (count($errors) === 0) {
                $ticket = new TicketEntity();
                $ticketRefactory = new Ticket();
                $ticketRefactory->createTicket($ticket, $safe['rate']);
            }
        }
        else{
            $elements = ['rate'];
            $errors = $this->validateForm($elements);
        }

    }
}

<?php

namespace App\Controller;

use App\Entity\Partida;
use App\Entity\Ronda;
use App\Entity\Torneig;
use App\Entity\Jugador;
use App\Form\Torneig1Type;
use App\Repository\JugadorRepository;
use App\Repository\TorneigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/torneig")
 */
class TorneigController extends AbstractController
{
    /**
     * @Route("/", name="torneig_index", methods={"GET"})
     */
    public function index(TorneigRepository $torneigRepository): Response
    {
        return $this->render('torneig/index.html.twig', [
            'torneigs' => $torneigRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="torneig_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $torneig = new Torneig();
        $form = $this->createForm(Torneig1Type::class, $torneig);
        $form->handleRequest($request);
        $torneig->setEstat(0);

        if ($form->isSubmitted() && $form->isValid()) {


            $country = Countries::getName($torneig->getPais(), "ca");

            $torneig->setPais($country);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($torneig);
            $entityManager->flush();

            return $this->redirectToRoute('torneig_index');
        }

        return $this->render('torneig/new.html.twig', [
            'torneig' => $torneig,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="torneig_show", methods={"GET"})
     */
    public function show(Torneig $torneig): Response
    {
        return $this->render('torneig/show.html.twig', [
            'torneig' => $torneig,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="torneig_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Torneig $torneig): Response
    {
        $form = $this->createForm(Torneig1Type::class, $torneig);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('torneig_index');
        }

        return $this->render('torneig/edit.html.twig', [
            'torneig' => $torneig,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/llistaJugadors", name="torneig_llistaJugadors", methods={"GET","POST"})
     */
    public function llistaJugadors(Torneig $torneig, JugadorRepository $jr): Response
    {
        $llistaTorneig = $torneig->getLlistaJugadors();
        $id = $torneig->getId();

        $llistaFinal = [];
        foreach ($jr->findAll() as $jbbdd) {
            $coincidencia = false;
            foreach ($llistaTorneig as $j) {
                if ($j->getId() == $jbbdd->getId()) {
                    $coincidencia = true;
                }
            }
            if (!$coincidencia) {
                array_push($llistaFinal, $jbbdd);
            }
        }

        return $this->render('torneig/llistaJugadors.html.twig', [
            'jugadors' => $llistaFinal,
            'jugadorsTorneig' => $llistaTorneig,
            'idTorneig' => $id,
        ]);
    }

    /**
     * @Route("/{id}/addJugador", name="torneig_addJugador", methods={"GET","POST"})
     */

    // /{idTorneig}Torneig $torneig
    public function addJugador(Request $request, Jugador $jugador, TorneigRepository $torneigRepository, JugadorRepository $jr): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $torneig = $torneigRepository->findById($request->get('idTorneig'));
        $torneig->addLlistaJugador($jugador);

        $entityManager->persist($torneig);
        $entityManager->flush();

        return $this->llistaJugadors($torneig, $jr);
    }

    /**
     * @Route("/{id}/removeJugador", name="torneig_removeJugador", methods={"GET","POST"})
     */

    // /{idTorneig}Torneig $torneig
    public function removeJugador(Request $request, Jugador $jugador, TorneigRepository $torneigRepository, JugadorRepository $jr): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $torneig = $torneigRepository->findById($request->get('idTorneig'));
        $llista = $torneig->getLlistaJugadors();
        $coincidencia = -1;

        for ($i = 0; $i < count($llista); $i++) {
            if ($llista[$i]->getId() == $jugador->getId()) {
                $coincidencia = $i;
            }
        }
        unset($torneig->getLlistaJugadors()[$coincidencia]);

        $entityManager->persist($torneig);
        $entityManager->flush();

        return $this->llistaJugadors($torneig, $jr);
    }

    /**
     * @Route("/{id}", name="torneig_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Torneig $torneig): Response
    {
        if ($this->isCsrfTokenValid('delete' . $torneig->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($torneig);
            $entityManager->flush();
        }

        return $this->redirectToRoute('torneig_index');
    }

    public function cmp($a, $b)
    {
        return $a->elo - $b->elo;
    }

    public function ordenarISepararJugadors(Torneig $torneig)
    {
        $llistaJugadors = $torneig->getLlistaJugadors();
        $llistaJugadors = $llistaJugadors->toArray();



        usort($llistaJugadors, function ($a, $b) {
            return -($a->getElo() - $b->getElo());
        });


        $contador = 3;
        $jugadorsBlanques = [];
        $jugadorsNegres = [];
        foreach ($llistaJugadors as $jugador){
            $jugador->setByes($torneig->getNumByes());
            if($contador%2==0){
                array_push($jugadorsNegres, $jugador);
            }else{
                array_push($jugadorsBlanques, $jugador);
            }
            $contador++;
        }

        $array = [$jugadorsBlanques, $jugadorsNegres];
        return $array;
    }

    /**
     * @Route("/{id}/comencarTorneig", name="comencar_torneig")
     */

    public function comencarTorneig(Torneig $torneig) {

        $entityManager = $this->getDoctrine()->getManager();
        $ronda = new Ronda();
        $ronda->setNumeroRonda(1);
        $ronda->setTorneig($torneig);
        $torneig->setEstat(1);

        $llistaJugadors = $torneig->getLlistaJugadors();
        $llistaJugadors = $llistaJugadors->toArray();
        $numeroDeJugadors = count($llistaJugadors);

        if($torneig->getNumRondes()<=$numeroDeJugadors){
            $torneig->setNumRondes($numeroDeJugadors-1);
        }

        $arrays = $this->ordenarISepararJugadors($torneig);

        $blanques = $arrays[0];
        $midaBlanques = count($blanques);
        $negres = $arrays[1];
        $midaNegres = count($negres);

        if($midaBlanques!=$midaNegres){
            $ronda->setJugadorImparell($blanques[$midaBlanques-1]);
            unset($blanques[$midaBlanques-1]);
        }
        $midaBlanques = count($blanques);

        for( $i = 0; $i<$midaBlanques; $i++){
            $partida = new Partida();
            $partida->setJugadorBlanques($blanques[$i]);
            $partida->setJugadorNegres($negres[$i]);
            $partida->setRonda($ronda);
            $ronda->addPartide($partida);
            $entityManager->persist($partida);

        }
        $partides = $ronda->getPartides();
        $entityManager->persist($ronda);
        $entityManager->persist($torneig);
        $entityManager->flush();

        return $this->render('torneig/partides.html.twig', [
            'partides' => $partides,
            'torneig' => $torneig,
        ]);
    }

    /**
     * @Route("/{id}/veureRonda", name="veure_ronda")
     */

    public function veureRondaTorneig(Torneig $torneig) {

        $rondes = $torneig->getRondes();
        $numRondes = count($rondes);
        $ronda = $rondes[$numRondes-1];
        $partides = $ronda->getPartides();

        return $this->render('torneig/partides.html.twig', [
            'partides' => $partides,
            'torneig' => $torneig,
        ]);
    }
}

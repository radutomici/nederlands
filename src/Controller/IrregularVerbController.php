<?php

namespace App\Controller;

use App\Repository\IrregularVerbRepository;
use App\Serializer\IrregularVerbSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IrregularVerbController extends AbstractController
{
    /**
     * @Route("/verb/{id}", name="verb")
     */
    public function showOne(int $id, IrregularVerbRepository $irregularVerbRepository): Response
    {
        $irregularVerb = $irregularVerbRepository->find($id);

        if (!$irregularVerb) {
            throw $this->createNotFoundException(
                'No irregular verb found for id '.$id
            );
        }

        return $this->render('ShowOneVerb.html.twig', [
            'irregular_verb' => $irregularVerb,
            'conjugated_verb' => IrregularVerbSerializer::conjugate($irregularVerb),
        ]);
    }

    /**
     * @Route("/irregular-verbs", name="irregular-verbs")
     */
    public function showAll( IrregularVerbRepository $irregularVerbRepository): Response
    {
        $irregularVerbs = $irregularVerbRepository->findAll();

        return $this->render('ShowAllVerbs.html.twig', [
            'irregular_verbs' => IrregularVerbSerializer::serializeAll($irregularVerbs),
        ]);
    }
}

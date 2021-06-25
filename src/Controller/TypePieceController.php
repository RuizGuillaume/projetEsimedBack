<?php

namespace App\Controller;

use App\Entity\TypePiece;
use App\Form\TypePieceType;
use App\Repository\TypePieceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/piece")
 */
class TypePieceController extends AbstractController
{
    /**
     * @Route("/", name="type_piece_index", methods={"GET"})
     */
    public function index(TypePieceRepository $typePieceRepository): Response
    {
        return $this->render('type_piece/index.html.twig', [
            'type_pieces' => $typePieceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_piece_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typePiece = new TypePiece();
        $form = $this->createForm(TypePieceType::class, $typePiece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typePiece);
            $entityManager->flush();

            return $this->redirectToRoute('type_piece_index');
        }

        return $this->render('type_piece/new.html.twig', [
            'type_piece' => $typePiece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_piece_show", methods={"GET"})
     */
    public function show(TypePiece $typePiece): Response
    {
        return $this->render('type_piece/show.html.twig', [
            'type_piece' => $typePiece,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_piece_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypePiece $typePiece): Response
    {
        $form = $this->createForm(TypePieceType::class, $typePiece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_piece_index');
        }

        return $this->render('type_piece/edit.html.twig', [
            'type_piece' => $typePiece,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_piece_delete", methods={"POST"})
     */
    public function delete(Request $request, TypePiece $typePiece): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typePiece->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typePiece);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_piece_index');
    }
}

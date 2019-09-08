<?php
namespace App\Controller;

use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug, MarkdownInterface $markdown)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Wooohooo! I\'m going on an all-asteroid diet.',
            'I like bacon too! Buy some from my site! bakinsomebacon.com'
        ];

        $articleContent = <<<EOF
Bacon ipsum dolor amet **burgdoggen tail porchetta**, bacon salami ground round pancetta landjaeger spare ribs turkey [filet mignon](https://filet.com) pig kevin meatball. Biltong picanha landjaeger pork loin t-bone venison salami meatball doner, jowl pig swine. Prosciutto burgdoggen sirloin, turducken swine filet mignon jowl leberkas tongue kevin bresaola turkey ribeye brisket fatback. Tongue filet mignon bacon porchetta, beef ribs meatloaf short loin fatback burgdoggen shank turkey. Fatback filet mignon brisket, andouille burgdoggen drumstick bacon jerky. Pork chop tenderloin beef ham hock sausage. Sausage boudin venison turkey, tenderloin andouille pork bacon jerky kevin filet mignon tail biltong.

Alcatra pastrami chuck tri-tip. Shankle chicken pork jerky meatloaf pastrami kevin. Filet mignon kielbasa leberkas, sirloin pancetta boudin ground round turkey meatball pastrami ham hock porchetta cupim pork salami. Jerky pork pastrami chicken picanha, swine bresaola. Corned beef beef ribs picanha alcatra fatback. Ribeye pancetta beef ribs biltong sausage.
EOF;


        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'articleContent' => $markdown->transform($articleContent),
            'slug' => $slug,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        $logger->info("Article is being hearted");
        return $this->json(['hearts' => rand(5, 100)]);
    }
}
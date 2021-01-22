<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Menu;
use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Homchefsymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Membres', 'fa fa-user', Membre::class);
        yield MenuItem::linkToCrud('Menus', 'fa fa-tags', Menu::class);
        yield MenuItem::linkToCrud('Commandes', 'fa fa-file-text', Commande::class);
    }
}

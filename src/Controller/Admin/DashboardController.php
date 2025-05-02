<?php

namespace App\Controller\Admin;

use App\Controller\Admin\SymptomCrudController;
use App\Controller\Admin\DailyOverviewCrudController;
use App\Controller\Admin\ActivityBlockCrudController;
use App\Controller\Admin\SymptomEntryCrudController;
use App\Controller\Admin\BreakEntryCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symptom Diary');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Symptoms', 'fas fa-list', \App\Entity\Symptom::class);
        yield MenuItem::linkToCrud('Daily Overview', 'fas fa-calendar', \App\Entity\DailyOverview::class);
        yield MenuItem::linkToCrud('Activity Blocks', 'fas fa-tasks', \App\Entity\ActivityBlock::class);
        yield MenuItem::linkToCrud('Symptom Entries', 'fas fa-notes-medical', \App\Entity\SymptomEntry::class);
        yield MenuItem::linkToCrud('Break Entries', 'fas fa-bed', \App\Entity\BreakEntry::class);
    }
}
<?php

namespace App\Controller\Admin;

use App\Entity\DailyOverview;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DailyOverviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DailyOverview::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Daily Overview')
            ->setEntityLabelInPlural('Daily Overviews')
            ->setSearchFields(['id', 'date', 'overallImpression', 'pem']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IntegerField::new('id')->onlyOnIndex();
        yield DateField::new('date');
        yield IntegerField::new('overallImpression');
        yield BooleanField::new('pem');
    }
}
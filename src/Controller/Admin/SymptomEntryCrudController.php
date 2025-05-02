<?php

namespace App\Controller\Admin;

use App\Entity\SymptomEntry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class SymptomEntryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SymptomEntry::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            DateTimeField::new('time'),
            AssociationField::new('symptom'),
            IntegerField::new('severity'),
        ];
    }
}
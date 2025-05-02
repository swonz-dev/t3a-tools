<?php

namespace App\Controller\Admin;

use App\Entity\Symptom;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SymptomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Symptom::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
        ];
    }
    
}
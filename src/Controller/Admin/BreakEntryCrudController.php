<?php

namespace App\Controller\Admin;

use App\Entity\BreakEntry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class BreakEntryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BreakEntry::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('time'),
            TextField::new('typeOfBreak'),
            ChoiceField::new('effect')->setChoices([
                'Erfrischend' => 'erfrischend',
                'Neutral' => 'neutral',
                'Keine' => 'keine',
            ]),
        ];
    }
    
}
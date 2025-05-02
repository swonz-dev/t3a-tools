<?php

namespace App\Controller\Admin;

use App\Entity\ActivityBlock;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActivityBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActivityBlock::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('ActivityBlock')
            ->setEntityLabelInPlural('ActivityBlocks')
            ->setSearchFields(['id', 'time', 'activity', 'effort']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IntegerField::new('id')->onlyOnIndex();
        yield DateTimeField::new('time');
        yield TextField::new('activity');
        yield IntegerField::new('effort');
    }
}
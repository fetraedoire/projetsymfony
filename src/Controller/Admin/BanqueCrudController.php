<?php

namespace App\Controller\Admin;

use App\Entity\Banque;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BanqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banque::class;
    }
    /*Doit fair en commentaire la bas*/
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('bni', 'Banque'),
            TextField::new('bfv', 'Lieu'),
            TextField::new('boa', 'Lot'),
        ];
    }
}

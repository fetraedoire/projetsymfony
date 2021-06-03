<?php

namespace App\Controller\Admin;

use App\Entity\Cheque;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChequeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cheque::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('createdAt', 'Date'),
            NumberField::new('number'),
            NumberField::new('price'),
            TextEditorField::new('description'),
            AssociationField::new('banque'),
            AssociationField::new('user'),
        ];
    }
}

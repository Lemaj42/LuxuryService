<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use Doctrine\ORM\Query\Expr\Func;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('reference'),
            TextField::new('title'),
            TextField::new('description'),
            BooleanField::new('active'),
            TextField::new('notes'),
            TextField::new('location'),
            DateField::new('closingDate'),
            TextField::new('salary'),
            DateField::new('dateCreation'),
            DateField::new('StartingDate'),

            AssociationField::new('client'),
            AssociationField::new('jobCategory'),
            AssociationField::new('jobType'),
        ];
    }

    public function visiblecart(bool $active): void
    {
        if ($active) {
            // Rendre les cartes visibles
        } else {
            // Rendre les cartes invisibles
        }
    }
}

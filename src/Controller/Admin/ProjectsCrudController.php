<?php

namespace App\Controller\Admin;

use IntlCalendar;
use App\Entity\Projects;
use App\Form\ProjectImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            UrlField::new('link'),
            SlugField::new('slug')->setTargetFieldName('name'),
            AssociationField::new('skill')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            IntegerField::new('year'),
            
            CollectionField::new('images')
            ->setEntryType(ProjectImageType::class)
            ->onlyOnForms(),
        ];
    }
}

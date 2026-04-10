<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false),
            IntegerField::new('stock'),
            DateTimeField::new('updatedAt')->hideOnForm(),
            ImageField::new('imageName')
                  // Dossier serveur (chemin réel, relatif à /public)
            ->setUploadDir('public/uploads/images')

            // Chemin utilisé dans le HTML (<img src="">)
            ->setBasePath('/uploads/images')

            // Optionnel : nom du fichier généré
            ->setUploadedFileNamePattern('[slug]-[uuid].[extension]'),
            // ->setRequired($pageName !== Crud::PAGE_EDIT)
            // ->setFormTypeOptions($pageName == Crud::PAGE_EDIT ? ['allow_delete' => false] : []),
            AssociationField::new('category'),
            TextareaField::new('description'),

        ];
    }
}

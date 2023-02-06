<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\Experience;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('nom_etablissement'),
            yield TextField::new('diplome'),
            yield DateField::new('date_debut'),
            yield DateField::new('date_fin'),
            yield TextField::new('description'),
            yield TextField::new('formationPicture')->setFormType(VichImageType::class)->onlyOnIndex(),
            yield ImageField::new('formation_picture')
            ->setBasePath('uploads/avatars')
            ->setUploadDir('public/uploads/avatars'),
        ];
    }
   
    
}

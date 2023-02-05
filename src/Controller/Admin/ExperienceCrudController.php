<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('titreposte'),
            yield TextField::new('nom_entreprise'),
            yield DateField::new('date_debut'),
            yield DateField::new('date_fin'),
            yield TextField::new('experiencePicture')->setFormType(VichImageType::class)->onlyOnIndex(),
            yield ImageField::new('experience_picture')
            ->setBasePath('uploads/avatars')
            ->setUploadDir('public/uploads/avatars'),
        ];
    }

}

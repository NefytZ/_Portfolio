<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class CompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competence::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('niveau'),
            TextField::new('competence_Picture')->setFormType(VichImageType::class)->onlyOnIndex(),
            ImageField::new('competencePicture')
            ->setBasePath('uploads/avatars')
            ->setUploadDir('public/uploads/avatars'),
        ];
    }

}
